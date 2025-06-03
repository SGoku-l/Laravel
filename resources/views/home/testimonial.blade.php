@include('home.header')

<section class="testimonial_section" style="margin-top: 25px; margin-bottom: 20px;">
  <div class="container">
    <div class="section_title">
      <h2 style="color: #055160; font-weight: 700;">Testimonials</h2>
    </div>
  </div>
  <div class="container px-0">
    <div id="testimonialCarousel" class="carousel carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="testimonial_card">
            <div class="client_details">
              <div class="client_text">
                <h5>Morijorch</h5>
                <h6>Client</h6>
              </div>
              <i class="fa fa-quote-left" aria-hidden="true"></i>
            </div>
            <p>
              Editors now use Lorem Ipsum as their default model text. A search for 'lorem ipsum' will uncover many web sites still in their infancy.
            </p>
          </div>
        </div>
        <div class="carousel-item">
          <div class="testimonial_card">
            <div class="client_details">
              <div class="client_text">
                <h5>Rochak</h5>
                <h6>Customer</h6>
              </div>
              <i class="fa fa-quote-left" aria-hidden="true"></i>
            </div>
            <p>
              Many websites still use Lorem Ipsum. It remains a standard dummy text in typesetting and web design.
            </p>
          </div>
        </div>
        <div class="carousel-item">
          <div class="testimonial_card">
            <div class="client_details">
              <div class="client_text">
                <h5>Brad Johns</h5>
                <h6>Visitor</h6>
              </div>
              <i class="fa fa-quote-left" aria-hidden="true"></i>
            </div>
            <p>
              Lorem Ipsum continues to be used in modern design. Designers rely on it for clean mock-ups and placeholder content.
            </p>
          </div>
        </div>
      </div>
      <div class="testimonial_controls">
        <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-slide="prev">
          <i class="fa fa-angle-left" aria-hidden="true"></i>
        </a>
        <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-slide="next">
          <i class="fa fa-angle-right" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- jQuery (required for Bootstrap 4) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper.js (for Bootstrap tooltips/popovers) -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@include('home.footer')