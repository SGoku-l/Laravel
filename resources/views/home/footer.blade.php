<!-- Custom Info Footer Section -->
<section class="ark-footer-container py-5">
  <div class="container">

    <!-- Social Icons -->
    <div class="row mb-4">
      <div class="col text-center">
        <div class="ark-social-icons d-inline-flex gap-3 justify-content-center">
          <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
          <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
          <a href="#"><i class="fa fa-instagram fa-lg"></i></a>
          <a href="#"><i class="fa fa-youtube fa-lg"></i></a>
        </div>
      </div>
    </div>

    <!-- Glassy Info Boxes -->
    <div class="row gy-4 justify-content-center">
      <!-- About Us -->
      <div class="col-md-6 col-lg-3">
        <div class="ark-glassy-box p-4 h-100">
          <h6 class="fw-bold text-uppercase">About Us</h6>
          <p class="text-white-50">
           Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem dolores enim laboriosam autem dignissimos veritatis at nisi dolorem sint quisquam?
          </p>
        </div>
      </div>

      <!-- Newsletter -->
      <div class="col-md-6 col-lg-3">
        <div class="ark-glassy-box p-4 h-100">
          <h6 class="fw-bold text-uppercase">Newsletter</h6>
          <p class="text-white-50">Stay updated with our latest news and health tips.</p>
          <form id="ark-newsletter-form" action="#">
            <input type="email" class="form-control mb-2" placeholder="Enter your email" required>
            <button class="btn btn-primary w-100" type="submit">Subscribe</button>
          </form>
        </div>
      </div>

      <!-- Need Help -->
      <div class="col-md-6 col-lg-3">
        <div class="ark-glassy-box p-4 h-100">
          <h6 class="fw-bold text-uppercase">Need Help?</h6>
          <p class="text-white-50">
            Our support team is available from 8AM to 8PM to answer your questions. Visit our FAQ for more help.
          </p>
        </div>
      </div>

      <!-- Contact Info -->
      <div class="col-md-6 col-lg-3">
        <div class="ark-glassy-box p-4 h-100">
          <h6 class="fw-bold text-uppercase">Contact Us</h6>
          <ul class="list-unstyled text-white-50">
            <li class="mb-2">
              <i class="fa fa-map-marker me-2 text-light"></i> ABC Street,Hosur,India.
            </li>
            <li class="mb-2">
              <i class="fa fa-phone me-2 text-light"></i> +91 63819 87483
            </li>
            <li>
              <i class="fa fa-envelope me-2 text-light"></i> abc@gmail.com
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer Bottom -->
<footer class="ark-footer-bottom text-white text-center py-3">
  <div class="container">
    <p class="mb-0">
      &copy; <span id="arkDisplayYear"></span> E-Commers. All rights reserved.
      Powered by <a class="text-warning text-decoration-none" href="https://github.com/SGoku-l/Laravel" target="_blank">Gokul</a>
    </p>
  </div>

  <script>
  document.getElementById("arkDisplayYear").textContent = new Date().getFullYear();
</script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<!-- JS scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function () {
    $(window).on('scroll', function () {
      if ($('.navbar-collapse').hasClass('show')) {
        $('.navbar-collapse').collapse('hide');
      }
    });
  });
</script>

<script>
  $(document).ready(function () {
    // Show/hide search form
    $('#searchIcon').on('click', function (e) {
      e.preventDefault();
      $('#searchForm').toggleClass('d-none');
    });

    // Close search form when clicking outside
    $(document).on('click', function (e) {
      if (!$(e.target).closest('.search-toggle').length) {
        $('#searchForm').addClass('d-none');
      }
    });
  });
</script>





</footer>
