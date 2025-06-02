@include ('home.header')

<!-- product details section -->
<section class="product-detail-section py-5">
  <div class="container white-bg-container rounded p-4">
    <div class="text-center mb-5">
      <h2 class="text-white">{{ $detail->title }} Product Details</h2>
    </div>

    <div class="row justify-content-center align-items-start g-4">
      <!-- Glassy Image Box -->
      <div class="col-md-5">
        <div class="glass-box text-center p-4">
          <img src="{{ url('products', $detail->image) }}" alt="{{ $detail->title }}" class="img-fluid rounded" style="max-height: 300px;">
        </div>
      </div>

      <!-- Glassy Content Box -->
      <div class="col-md-7">
        <div class="glass-box p-4">
          <div class="mb-3">
            <h6><strong>Description:</strong></h6>
            <h5 class="text-white">{{ $detail->description }}</h5>
          </div>
          <div class="mb-3">
            <h6><strong>Price:</strong></h6>
            <h5 class="text-white">₹{{ $detail->price }}</h5>
          </div>
          <div class="mb-3">
            <h6><strong>Category:</strong></h6>
            <h5 class="text-white">{{ $detail->catagory }}</h5>
          </div>
          <div class="mb-3">
            <h6><strong>Quantity:</strong></h6>
            <h5 class="text-white">{{ $detail->quantity }}</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
/* Full white background inside the section */
.white-bg-container {
  background: blur(16px);
  backdrop-filter: blur(16px);
  border-radius: 20px;
  padding: 40px;
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
}

/* Glassy floating box */
.glass-box {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(16px);
  border-radius: 16px;
  border: 1px solid rgba(255, 255, 255, 0.2);
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
  transition: transform 0.3s ease;
}

.glass-box:hover {
  border: 1px white solid;
  transform: translateY(-5px);
}

/* Text styling */
.glass-box h6 {
  font-weight: 600;
  color: #333;
}

.glass-box p {
  font-size: 15px;
  color: #444;
}

</style>


@include ('home.footer')
