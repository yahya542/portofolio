@extends('layouts.app')

@section('title', 'Contact - Muhammad Yahya | Full Stack Engineer')
@section('meta_description', 'Get in touch with Muhammad Yahya for web development projects, consulting, or collaboration opportunities.')

@section('content')
<section id="contact" class="contact section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
    <p>Let's work together on your next project</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-6">

        <div class="row gy-4">
          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <p>Jakarta, Indonesia</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              <p>+62 812 3456 7890</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email Us</h3>
              <p>yahya@example.com</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="500">
              <i class="bi bi-clock"></i>
              <h3>Open Hours</h3>
              <p>Mon-Fri<br>9:00 AM - 6:00 PM</p>
            </div>
          </div><!-- End Info Item -->
        </div>

      </div>

      <div class="col-lg-6">
        <form action="#" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
          @csrf
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required>
            </div>

            <div class="col-md-6">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required>
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required>
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
            </div>

            <div class="col-md-12 text-center">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>

              <button type="submit">Send Message</button>
            </div>

          </div>
        </form>
      </div><!-- End Contact Form -->

    </div>

  </div>

</section><!-- /Contact Section -->
@endsection

@section('styles')
<style>
  .info-item {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    height: 100%;
    text-align: center;
    transition: all 0.3s ease;
  }

  .info-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
  }

  .info-item i {
    font-size: 24px;
    color: #0077b6;
    margin-bottom: 10px;
  }

  .info-item h3 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 10px;
    color: #222;
  }

  .info-item p {
    color: #666;
    margin: 0;
  }

  .php-email-form {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
  }

  .php-email-form .form-control {
    border: 1px solid #e0e0e0;
    border-radius: 5px;
    padding: 12px 15px;
    margin-bottom: 15px;
  }

  .php-email-form .form-control:focus {
    border-color: #0077b6;
    box-shadow: 0 0 0 0.2rem rgba(0, 119, 182, 0.25);
  }

  .php-email-form button {
    background: linear-gradient(90deg, #F87B1B, #0077b6);
    border: none;
    padding: 12px 30px;
    border-radius: 50px;
    color: white;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .php-email-form button:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(248, 123, 27, 0.4);
  }

  .php-email-form .loading,
  .php-email-form .error-message,
  .php-email-form .sent-message {
    display: none;
    text-align: center;
    margin-top: 15px;
  }

  .php-email-form .loading {
    color: #0077b6;
  }

  .php-email-form .error-message {
    color: #dc3545;
  }

  .php-email-form .sent-message {
    color: #28a745;
  }
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('.php-email-form');

  if (form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();

      const submitBtn = form.querySelector('button[type="submit"]');
      const loading = form.querySelector('.loading');
      const errorMessage = form.querySelector('.error-message');
      const sentMessage = form.querySelector('.sent-message');

      // Hide all messages
      loading.style.display = 'none';
      errorMessage.style.display = 'none';
      sentMessage.style.display = 'none';

      // Show loading
      loading.style.display = 'block';
      submitBtn.disabled = true;

      // Simulate form submission (replace with actual AJAX call)
      setTimeout(() => {
        loading.style.display = 'none';
        sentMessage.style.display = 'block';
        submitBtn.disabled = false;

        // Reset form
        form.reset();
      }, 2000);
    });
  }
});
</script>
@endsection