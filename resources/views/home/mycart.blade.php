@include ('home.header')

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">

      
            <table class="table table-success">
            
            <tr>
                <th>P.Id</th>
                <th>Product name</th>
                <th> Decription</th>
                <th>price</th>
                <th>Photo</th>
                <th>Remove Product</th>
            </tr>
            <?php
            $value = 0;
            ?>
         @foreach ($cart as $cartone )
         <tr>
            <td>{{ $cartone->product_id }}</td>
            <td>{{ $cartone->product->title  }}</td>
            <td>{{ $cartone->product->description  }}</td>
            <td>{{ $cartone->product->price  }}</td>
            <td><img class="w-50" src="products/{{$cartone->product->image}}" alt=""></td>
            <td><a href="{{ url('delete_cart_product',$cartone->id) }}" class="btn btn-danger">Remove</a></td>
         </tr>

         <?php 
         
         $value = $value + $cartone->product->price;

         ?>

         @endforeach
         </table>
      </div>
      <div  style="text-align: center;">

      <h2>Total Price of Your Product Is : ₹ {{ $value }}</h2>

      </div>
      <div style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">
        <form action="{{ url('conform_order') }}" method="post">
            @csrf
        <div>
            <label for="receivername">Receiver Name:</label>
            <input type="text" name="name" id="receivername" value="{{ Auth::user()->name }}">
        </div>
        <div>
            <label for="receiveraddress">Receiver Address:</label>
           <textarea name="address" id="receiveraddress">{{ Auth::user()->address }}</textarea>
        </div>
        <div>
            <label for="receiverphone">Receiver Name:</label>
            <input type="text" name="phone" id="receiverphone" value="{{ Auth::user()->phone }}">
        </div>
       <button class="btn btn-success">Cash On Deliverey</button>
       <a href="{{ url('razorpay-payment',$value) }}" class="btn btn-primary">Pay Using Card</a>
        </form>
      </div>

    </div>
  </section>

  <!-- end shop section -->


  <!-- info section -->

  <section class="info_section  layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-youtube" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>
              ABOUT US
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form ">
              <h5>
                Newsletter
              </h5>
              <form action="#">
                <input type="email" placeholder="Enter your email">
                <button>
                  Subscribe
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              NEED HELP
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              CONTACT US
            </h6>
            <div class="info_link-box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> Gb road 123 london Uk </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>+01 12345678901</span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span> demo@gmail.com</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
   
    @include ('home.footer')