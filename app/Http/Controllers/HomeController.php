<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Exception;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    
    public function index(){

        $users = User::where('usertype','user')->get()->count();

        $products = Product::all()->count();
        
        $orders = Order::all()->count();

        $delivered = Order::where('status','deliverd')->get()->count();

        $catagory = Catagory::all()->count();

        $progress = Order::where('status','in progress')->get()->count();

        return view('admin.index',compact('users','products','orders','delivered','catagory','progress'));

    }

    public function home(){

        $product = Product::all();

        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
            $orderss = Order::where('user_id',$userid)->count();
        }
        else{
            $count = '';
            $orderss = '';
        }

        return view('home.index',compact('product','count','orderss'));

    }

    public function login_index(){

        $product = Product::all();

        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id',$userid)->count();
        $orderss = Order::where('user_id',$userid)->count();

        return view('home.index',compact('product','count','orderss'));

    }

    public function product_details($id){

        $userid = Auth::user()->id;
        $detail = Product::find($id);
        $count = Cart::where('id',$detail)->count();
        $orderss = Order::where('user_id',$userid)->count();

        return view('home.product_details',compact('detail','count','orderss'));

    }

    public function add_cart($id){

        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;

        $cart = new Cart();
        $cart->product_id = $product_id;
        $cart->user_id = $user_id;
        $cart->save();

        return redirect()->back();

    }

    public function mycart(){

        if(Auth::id()){

            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
            $orderss = Order::where('user_id',$userid)->count();
            $cart = Cart::where('user_id',$userid)->get();

        }
        else{

            $count = '';
            $orderss = '';

        }

        return view('home.mycart',compact('count','cart','orderss'));

    }

    public function delete_cart_product($id){

        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();

    }

    public function conform_order(Request $request) {
        
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id',$userid)->get();

        foreach($cart as $carts){

            $order = new Order();
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;

            $order->save();

        }

        $cart_remove = Cart::where('user_id',$userid)->get();

        foreach($cart_remove as $remove){

            $delete = Cart::find($remove->id);
            $delete->delete();

        }

        return redirect()->back();


    }

     public function indexx($value)
    {   
        session()->forget('payment_done');

        return view('home.razorpay',compact('value'));
    }

     public function store(Request $request,$value): RedirectResponse
    {

        $input = $request->all();
  
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(!empty($input['razorpay_payment_id'])) {

            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(['amount'=>$value * 100]); 
  
            } catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
            
        }

        $paymentid = $payment['id'];
        $amount = $payment['amount']/100;
        $method = $payment['method'];
        $pay_status = $payment['status'];
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;

       
        $transaction = Transaction::create([

            't_id' => $paymentid,
            'amount_paid' => $amount,
            'payment_method' => $method,
            'status' => $pay_status,
            'user_id' => $user_id,
            'user_name' => $user_name,


        ]);
        

        $name = Auth::user()->name;
        $address = Auth::user()->address;
        $phone = Auth::user()->phone;

        $user_id = Auth::id();

        $cart = Cart::where('user_id',$user_id)->get();

        foreach($cart as $carts){

            $order = new Order();
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $user_id;
            $order->product_id = $carts->product_id;
            $order->payment_status = 'Paid By Online';
            $order->save();

        }

        $cart_remove = Cart::where('user_id',$user_id)->get();

        foreach($cart_remove as $remove){

            $delete = Cart::find($remove->id);
            $delete->delete();

        }

        session()->put('payment_done',true);

        return redirect('mycart')->with('success', 'Payment successful');
    }

    public function shop(){

        if(Auth::id()){

            $userid = Auth::user()->id;
            $count = Cart::where('user_id',$userid)->get()->count();
            $orderss = Order::where('user_id',$userid)->count();

        }
        else{

            $count = '';
            $orderss = '';

        }

        $product = Product::all();

        $catagory = Catagory::all();

        return view('home.shop',compact('count','product','catagory','orderss'));

    }

    public function catagory_list_find($catagory_name){

        if(Auth::id()){

            $user_id = Auth::user()->id;
            $count = Cart::where('user_id',$user_id)->get()->count();
            $orderss = Order::where('user_id',$user_id)->count();

        }
        else{

            $count = '';
            $orderss = '';

        }

        $product = Product::where('catagory',$catagory_name)->get();
        $product_catagory = $catagory_name; 
        $catagory = Catagory::all();

        return view('home.catagory_product',compact('product','catagory','count','product_catagory','orderss'));

    }

    public function search_product(Request $request){

        $search = $request->search_items;

        $product =Product::where('title','LIKE','%'.$search.'%')->orWhere('catagory','LIKE','%'.$search.'%')->get();

        $catagory = Catagory::all();

        return view('home.shop',compact('product','catagory'),compact('search'));

    }

    public function why(){

        if(Auth::id()){

            $userid = Auth::user()->id;

            $count = Cart::where('user_id',$userid)->get()->count();
            $orderss = Order::where('user_id',$userid)->count();

        }
        else{

            $count = '';
            $orderss = '';

        }

        return view('home.why',compact('count','orderss'));

    }

    public function testimonial(){

         if(Auth::id()){

            $userid = Auth::user()->id;

            $count = Cart::where('user_id',$userid)->get()->count();
            $orderss = Order::where('user_id',$userid)->count();

        }
        else{

            $count = '';
            $orderss = '';

        }

        return view('home.testimonial',compact('count','orderss'));

    }

    public function contact(){

         if(Auth::id()){

            $userid = Auth::user()->id;

            $count = Cart::where('user_id',$userid)->get()->count();
            $orderss = Order::where('user_id',$userid)->count();

        }
        else{

            $count = '';
            $orderss = '';

        }

        return view('home.contact',compact('count','orderss'));

    }

    public function my_order(){

        if(Auth::id()){

            $userid = Auth::user()->id;

            $count = Cart::where('user_id',$userid)->get()->count();
            $orderss = Order::where('user_id',$userid)->count();

        }
        else{

            $count = '';
            $orderss = '';

        }

        $myorder = Order::where('user_id',$userid)->paginate(3);

        return view('home.orders',compact('myorder','count','orderss'));

    }
        

}
