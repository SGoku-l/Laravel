@include('home.header')

<section class="ark-cart-section py-5">
  <div class="container ark-glassy-container">
    <div class="row justify-content-center">
      <!-- Center: Cart Products -->
      <div class="col-md-7">
        <h4 class="text-center mb-4 text-white">Your Cart</h4>

        @php $value = 0; @endphp

        @foreach ($cart as $cartone)
        @php $value += $cartone->product->price; @endphp
        <div class="ark-glass p-4 mb-4 d-flex justify-content-between flex-wrap align-items-start">
        <!-- LEFT: Product Details -->
        <div class="ark-product-text" style="flex: 1 1 55%;">
          <h5><strong>Product ID:</strong> {{ $cartone->product_id }}</h5>
          <h5><strong>Product Name:</strong> {{ $cartone->product->title }}</h5>
          <h5><strong>Description:</strong> <p>{{ $cartone->product->description }}</p></h5>
        </div>

        <!-- RIGHT: Image, Price, Remove Button -->
        <div class="ark-product-media text-center" style="flex: 1 1 40%;">
          <img src="products/{{ $cartone->product->image }}" class="img-fluid rounded shadow mb-3" style="max-width: 100%; height: auto;" alt="">
          <div class="d-flex justify-content-between align-items-center">
            <h6 class="text-black"><strong>Price:</strong> ₹{{ $cartone->product->price }}</h6>
            <a href="{{ url('delete_cart_product', $cartone->id) }}" class="btn btn-danger btn-sm">Remove</a>
          </div>
        </div>
      </div>

        @endforeach

        <div class="ark-glass p-3 mt-4 text-center">
          <h5 class="text-black">Total Price: ₹{{ $value }}</h5>
        </div>
      </div>

      <!-- Right: Receiver Info -->
      <div class="col-md-5 ark-glass p-4 mb-4 seprate">
        <h4 class="text-white text-center mb-4">Receiver Information</h4>
        <form action="{{ url('conform_order') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="receivername" class="text-white">Name</label>
            <input type="text" name="name" id="receivername" class="form-control" value="{{ Auth::user()->name }}">
          </div>
          <div class="form-group">
            <label for="receiveraddress" class="text-white">Address</label>
            <textarea name="address" id="receiveraddress" class="form-control">{{ Auth::user()->address }}</textarea>
          </div>
          <div class="form-group">
            <label for="receiverphone" class="text-white">Phone</label>
            <input type="text" name="phone" id="receiverphone" class="form-control" value="{{ Auth::user()->phone }}">
          </div>
          <button class="btn btn-success mt-3 w-100">Cash On Delivery</button>
          <a href="{{ url('razorpay-payment', $value) }}" class="btn btn-primary mt-2 w-100">Pay Using Card</a>
        </form>
      </div>
    </div>
  </div>
</section>

@include('home.footer')

<style>
  
  

.ark-glassy-container {
  background: rgba(255, 255, 255, 0.08);
  border-radius: 20px;
  backdrop-filter: blur(12px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  padding: 30px;
}

.seprate{
   background: rgba(255, 255, 255, 0.08);
  border-radius: 20px;
  backdrop-filter: blur(12px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  padding: 30px;
  height: 500px;
  margin-top: 50px;
}

.ark-glass {
  background: rgba(255, 255, 255, 0.08);
  border: 1px solid rgba(255, 255, 255, 0.3);
  border-radius: 16px;
  backdrop-filter: blur(10px);
  transition: 0.3s ease;
}

.ark-glass:hover {
  border-color: #fff;
}

.ark-glass h4,
.ark-glass p,
.ark-glass label {
  color: #fff;
  font-weight: 600;
}

.ark-glass p{
  font-size: 20px;
}

.ark-glass input,
.ark-glass textarea {
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.3);
  font-weight: 500;
  color: black;
}

.ark-glass input::placeholder,
.ark-glass textarea::placeholder {
  color: #ccc;
}

</style>