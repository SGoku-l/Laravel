@include('home.header')

@if($orderss > 0)
<section class="ark-cart-section py-5">
  <div class="container ark-glassy-container">
    <div class="row gx-4 gy-4">
      
      <!-- LEFT: Orders Section -->
      <div class="col-lg-7 col-md-12">
        <h4 class="text-center mb-4" style="color: #055160; font-weight: 700;">Your Orders</h4>

        @php $value = 0; @endphp
        @foreach ($myorder as $orders)
        @php $value += $orders->product->price; @endphp

        <div class="ark-glass p-4 mb-4 d-flex flex-wrap justify-content-between align-items-start">
          
          <!-- Product Details -->
          <div class="ark-product-text mb-3" style="flex: 1 1 55%;">
            <h5><strong style="color:#055160;">Product ID:</strong> {{ $orders->product_id }}</h5>
            <h5><strong style="color:#055160;">Product Name:</strong> {{ $orders->product->title }}</h5>
            <h5><strong style="color:#055160;">Description:</strong>
              <p class="text-dark">{{ $orders->product->description }}</p>
            </h5>
            <h5><strong style="color:#055160;">Receiver Address:</strong>
              <p class="text-dark">{{ $orders->rec_address }}</p>
            </h5>
            <h5><strong style="color:#055160;">Order Status:</strong>
              @if ($orders->status == 'Deliverd')
              <p class="text-success">{{ strtoupper($orders->status) }}</p>
              @elseif($orders->status == 'On The Way')
              <p class="text-warning">{{ strtoupper($orders->status) }}</p>
              @else
              <p class="text-danger">{{ strtoupper($orders->status) }}</p>
              @endif
            </h5>
          </div>

          <!-- Image + Price -->
          <div class="ark-product-media text-center" style="flex: 1 1 40%;">
            <img src="products/{{ $orders->product->image }}" class="img-fluid rounded shadow mb-3"
              style="max-width: 100%; height: auto;" alt="Product Image">
            <h6 class="text-black">
              <strong style="color: #055160; font-weight: 700;">Price:</strong> ₹{{ $orders->product->price }}
            </h6>
          </div>

        </div>
        @endforeach

        <!-- Total -->
        <div class="ark-glass p-3 mt-4 text-center">
          <h5 class="text-black">
            <strong style="color: #055160; font-weight: 700;">Total Price:</strong> ₹{{ $value }}
          </h5>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
          {{ $myorder->links() }}
        </div>
      </div>

      <!-- RIGHT: User Info Form -->
      <div class="col-lg-5 col-md-12">
        <div class="ark-glass p-4 seprate ">
          <h4 class="text-center mb-4" style="color: #055160; font-weight: 700;">User Information</h4>
          <form action="{{ url('conform_order') }}" method="post">
            @csrf
            <div class="form-group mb-3">
              <label for="receivername">Name</label>
              <input type="text" name="name" id="receivername" class="form-control" value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group mb-3">
              <label for="receiveraddress">Address</label>
              <textarea name="address" id="receiveraddress" class="form-control">{{ Auth::user()->address }}</textarea>
            </div>
            <div class="form-group mb-3">
              <label for="receiverphone">Phone</label>
              <input type="text" name="phone" id="receiverphone" class="form-control" value="{{ Auth::user()->phone }}">
            </div>
          </form>
        </div>
      </div>
      
    </div>
  </div>
</section>
@else
<div class="alert alert-info text-center p-4 rounded-3 shadow-sm bg-white glassy-card">
  <h4>No Orders Found</h4>
  <a href="{{ url('shop') }}" class="btn btn-outline-primary mt-3">Add Products & Order</a>
</div>
@endif

<style>
.ark-glassy-container {
  background: rgba(255, 255, 255, 0.08);
  border-radius: 20px;
  backdrop-filter: blur(12px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  padding: 30px;
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

.ark-glass p {
  font-size: 18px;
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

.glassy-card {
  background-image: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-radius: 15px;
  height: 30vh;
  border: 1px solid rgba(255, 255, 255, 0.2);
}

.seprate .form-group label {
  color: #055160;
  font-weight: 600;
}

</style>

@include('home.footer')
