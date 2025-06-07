@include('home.header')

<section class="glass-contact-section layout_padding">
  <div class="container px-0">
    <div class="heading_container text-center mb-4">
      <h2 style="color: #055160; font-weight: 700;">Contact Us</h2>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center align-items-stretch">
      <!-- Map Column -->
      <div class="col-lg-7 col-md-6 mb-4 mb-md-0">
        <div class="glassy-box h-100 p-3">
          <div class="map-responsive">
           <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3699.0599533674554!2d77.81860999999999!3d12.738593999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTLCsDQ0JzE4LjkiTiA3N8KwNDknMDcuMCJF!5e1!3m2!1sen!2sin!4v1748964598915!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="col-lg-5 col-md-6">
        <div class="glassy-box h-100 p-4">
          <form action="{{ url('contact') }}" method="post">

          @csrf

            <div class="form-group">
              <input type="text" class="form-control" placeholder="Name" name="name"/>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email" name="email"/>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Phone" name="phone" />
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="4" placeholder="Message" name="message"></textarea>
            </div>
            <button type="submit" class="btn btn-glass w-100 btn-primary mt-4">SEND</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


@include('home.footer')