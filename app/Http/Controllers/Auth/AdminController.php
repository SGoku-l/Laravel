<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use function Pest\Laravel\get;

class AdminController extends Controller
{
    // tostr()->timeout(10000)->closeBox()->addSuccess or addWarning('User Added Successfully');   --->this will display a tostr like an notification on the page use to indecate deleted success updated success.

    public function view_catagory(){

        $data = Catagory::paginate(10);
        return view('admin.catagory', compact('data') );

    }    

    public function add_catagory(Request $request){

        $data = new Catagory();
        $data->catagory_name = $request->catagory;
        $data->save();
        // toastr()->timeout(10000)->closeBox()->addSuccess('Catagory Added Successfully');

       return redirect('/view_catagory');

    }

    public function delete_catagory($id){

        $data = Catagory::find($id);
        $data->delete();

        return redirect('/view_catagory');

    }

    public function edit_catagory($id){

        $datas = Catagory::find($id);
        
        return view('admin.edit_catagory',compact('datas'));
        
    }

    public function updata_catagory(Request $request,$id){

        $data = Catagory::find($id);
        $data->catagory_name = $request->catagory;
        $data->save(); 

        return redirect('/view_catagory');

    }

    public function add_products(){
        $data = Catagory::all();
        return view('admin.products',compact('data'));

    }

    public function upload_products(Request $request){

        $data = new Product();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->catagory = $request->pcatagory;
       
        $image = $request->pimage;

        if($image){

            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->pimage->move('products',$imagename);
            
            $data->image = $imagename;

        }

        $data->save();

        return redirect()->back();
       
    }

    public function view_products(){

        $list = Product::paginate(10    );
        return view('admin.view_products',compact('list'));

    }

    public function delete_products($slug){

        $delete = Product::find($slug);

        $imagepath = public_path('products/'.$delete->image);

        if(file_exists($imagepath)){

            unlink($imagepath);

        }

        $delete->delete();
        
        return redirect()->back();

    }

    public function edit_productsget($id){

        $data = Product::find($id);
        return view('admin.edit_products',compact('data'));

    }

    public function update_products(Request $request,$id){

        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->catagory = $request->pcatagory;
        $image = $request->pimage;
        $oldimagepath = public_path('products/'.$data->image);
        if($image){
            
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->pimage->move('products',$imagename);

            $data->image = $imagename;
            unlink($oldimagepath);
        }

        $data->save();

        return redirect('view_products');

    }

    public function product_search(Request $request){

        $search = $request->search;

        $list = Product::where('title','LIKE','%'.$search.'%')->orWhere('catagory','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.view_products',compact('list'),compact('search'));
        
    }

    public function view_orders(){

        $data = Order::paginate(10);
        return view('admin.order',compact('data'));

    }

    public function on_the_way($id){

        $data = Order::find($id);
        $data->status = 'On The Way';
        $data->save();

        return redirect('view_orders');

    }

    public function order_deliverd($id){

        $data = Order::find($id);
        $data->status = 'Deliverd';
        $data->save();

        return redirect('view_orders');

    }

    public function print_pdf($id){

        
        $data = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice',compact('data'));
        return $pdf->download('invoice.pdf');

    }

    public function users_list(){

        $users_list = User::where('usertype','user')->paginate(10);

        return view('admin.users',compact('users_list'));

    }


}
