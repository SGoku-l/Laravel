@include ('home.header')

<!-- Shop section with category sidebar -->
<section class="container-fluid py-5 ark-shop-section px-4">
  <div class="row">
    <!-- Sidebar for Categories -->
   <div class="col-md-3 mb-4 ps-0">
      <div class="ark-sidebar">
        <h5><strong style="color: #055160; font-weight: 700;">Categories</strong></h5>
        
        <ul class="list-unstyled mt-3 ark-category-list" id="categoryList">
          @foreach ($catagory as $index => $catagories)
            <li class="category-item {{ $index >= 8 ? 'd-none extra-category' : '' }}" value="{{ $catagories->catagory_name }}">
              <a href="{{ url('catagory_list_find', $catagories->catagory_name) }}">{{ $catagories->catagory_name }}</a>
            </li>
          @endforeach
        </ul>

        <!-- Show More/Less Toggle Button -->
        <div class="text-center mt-3">
          <button class="btn btn-sm btn-outline-light" id="toggleCategoryBtn">
            Show More <span id="toggleIcon">▼</span>
          </button>
        </div>
      </div>
    </div>

    <!-- Product Grid -->
    <div class="col-md-9">
      <div class="text-center mb-5">
        <h2>{{ $product_catagory }} Catagories</h2>
      </div>
      <div class="row g-4">
        @foreach ($product as $products)
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="ark-product-box glass-wrapper text-center p-3">
              <img src="{{ asset('products/'.$products->image) }}" alt="{{ $products->title }}" class="img-fluid mb-3 rounded">
              <h5>{{ $products->title }}</h5>
              <p class="text-muted">₹{{ $products->price }}</p>
              <div class="ark-btn-group d-flex justify-content-center gap-2 mt-3">
                <a href="{{ url('product_details', $products->id) }}" class="btn btn-outline-primary btn-sm">Details</a>
                <a href="{{ url('add_cart', $products->id) }}" class="btn btn-outline-secondary btn-sm">Add To Cart</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>


<style>
/* Sidebar Styling */
.ark-sidebar {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(12px);
  border-radius: 16px;
  padding: 20px;
  border: 1px solid rgba(255, 255, 255, 0.2);
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
  margin-left: 10px;
  color: white;
}

/* Sidebar List */
.ark-sidebar ul {
  padding-left: 0;
}

.ark-sidebar ul li a {
  display: block;
  padding: 6px 0;
  color: white;
  text-decoration: none;
  font-weight: 500;
  transition: 0.3s;
}

.ark-sidebar ul li a:hover {
  color: #0d6efd;
}

/* Product Card Styling (Glassy) */
.glass-wrapper {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(10px);
  border-radius: 16px;
  border: 1px solid rgba(255, 255, 255, 0.3);
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  transition: 0.3s ease;
}

.glass-wrapper:hover {
  transform: translateY(-5px);
}


</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const toggleBtn = document.getElementById('toggleCategoryBtn');
  const extraItems = document.querySelectorAll('.extra-category');
  const icon = document.getElementById('toggleIcon');
  let expanded = false;

  toggleBtn.addEventListener('click', () => {
    expanded = !expanded;
    extraItems.forEach(item => item.classList.toggle('d-none'));
    toggleBtn.innerHTML = expanded ? 'Show Less <span id="toggleIcon">▲</span>' : 'Show More <span id="toggleIcon">▼</span>';
  });
});
</script>

@include ('home.footer')
