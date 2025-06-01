@include ('home.header')

    <!-- slider section -->
 
    <section class="slider_section">
      <div class="slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box"> 
                      <h1>
                        Welcome To Our <br>
                        Gift Shop
                      </h1>
                      <p>
                        Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.
                      </p>
                      <a href="">
                        Contact Us
                      </a>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <img style="width:600px" src="{{ asset('images/image3.jpeg') }}" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          
        </div>
      </div>
    </section>

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->
<section class="container py-5 ark-shop-section">
  <div class="text-center mb-5">
    <h2>Latest Products</h2>
  </div>
  <div class="row g-4">
    @foreach ($product as $products)
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="ark-product-box glass-wrapper text-center p-3">
          <img src="products/{{ $products->image }}" alt="{{ $products->title }}" class="img-fluid mb-3">
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
</section>

  <!-- end shop section -->

  <br><br><br>

  <!-- end contact section -->

   
   
    @include ('home.footer')