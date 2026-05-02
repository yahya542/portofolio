@extends('layouts.app')

@section('body_class', 'page-index')
@section('title', 'Muhammad Yahya - Professional Portfolio')
@section('meta_description', 'Full Stack Engineer Portfolio - Creating digital experiences that think, learn, and grow')

@section('styles')
<style>
    /* page-specific header/nav colour for index */
    #header {
      background-color: transparent !important; /* Gunakan !important agar tidak ditimpa */
      position: fixed;
      border: none !important;
      box-shadow: none !important; /* Pastikan tidak ada bayangan di header */
      outline: none;
    }
    #nav-menu  {
      color: #fff;
    }
    .page-index .nav-menu a:hover {
      color: whitesmoke;
    }
    .hero {
      position: relative;
      overflow: hidden;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: url('{{ asset("assets/img/bg/dark.jpg") }}') no-repeat center center fixed;
      background-blend-mode: overlay;
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      width: 100%;
    }

    .hero::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(248, 123, 27, 0.05);
      z-index: 1;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      padding: 4rem 3rem;
      max-width: 900px;
      margin: 0 auto;
      background: rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.8);
      border-radius: 30px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
      animation: fadeInUp 1s cubic-bezier(0.2, 0.8, 0.2, 1);
    }

    .welcome-msg {
      font-size: 1rem;
      text-transform: uppercase;
      letter-spacing: 3px;
      color: orange;
      margin-bottom: 1.5rem;
      font-weight: 700;
      display: inline-block;
      background: #fff;
      padding: 8px 20px;
      border-radius: 50px;
      border: 1px solid rgba(255, 255, 255, 0.8);
    }

    .hero h1 {
      font-family: 'Raleway', sans-serif;
      font-size: 3.5rem;
      font-weight: 800;
      margin-bottom: 1rem;
      line-height: 1.2;
      letter-spacing: -0.5px;
      text-transform: capitalize;
    }

    .hero h2 {
      font-size: 1.5rem;
      margin-bottom: 2rem;
      color: #555;
      font-weight: 400;
      letter-spacing: 1px;
    }

    .buttons-container {
      display: flex;
      justify-content: center;
      gap: 15px;
      flex-wrap: wrap;
    }

    .btn-custom {
      background: #0077b6;
      border: none;
      padding: 14px 35px;
      border-radius: 50px;
      color: white;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s ease;
      box-shadow: 0 10px 20px rgba(0, 119, 182, 0.2);
      font-size: 0.9rem;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      margin: 5px;
    }

    .btn-custom:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 30px rgba(0, 119, 182, 0.3);
      background: #005f91;
      color: white;
    }

    .social-icons {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 2.5rem;
      padding-top: 2rem;
      border-top: 1px solid rgba(0, 0, 0, 0.05);
    }

    .social-icons a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 45px;
      height: 45px;
      border-radius: 50%;
      background: white;
      color: #0077b6;
      font-size: 1.2rem;
      transition: all 0.3s ease;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      border: 1px solid rgba(0, 119, 182, 0.1);
    }

    .social-icons a:hover {
      transform: translateY(-5px);
      background: #0077b6;
      color: white;
      box-shadow: 0 8px 20px rgba(0, 119, 182, 0.2);
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
</style>
@endsection

@section('content')
<section class="hero">
  <div class="hero-content">
    <div class="welcome-msg">Welcome to My Portfolio</div>
    <h1>Muhammad Yahya</h1>
    <h2>Full Stack Engineer</h2>
    <div class="typing-text" id="typing-text">Creating digital experiences that think, learn, and grow</div>

    <div class="buttons-container">
      <a href="{{ route('page.show', 'portfolio') }}" class="btn-custom">
        <i class="bi bi-grid"></i> View Portfolio
      </a>
      <a href="{{ route('page.show', 'contact') }}" class="btn-custom">
        <i class="bi bi-envelope"></i> Contact Me
      </a>
    </div>

    <div class="social-icons">
      <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>
  </div>
</section>

<!-- Featured Portfolio Section -->
@if($featuredPortfolio->count() > 0)
<section id="featured-portfolio" class="portfolio section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Featured Projects</h2>
    <p>Showcasing my latest and most impactful work</p>
  </div>

  <div class="container">
    <div class="row gy-4">
      @foreach($featuredPortfolio as $item)
      <div class="col-lg-4 col-md-6 portfolio-item" data-aos="fade-up" data-aos-delay="100">
        <div class="portfolio-category">{{ $item->category->name ?? 'Project' }}</div>
        <img src="{{ asset($item->image_path) }}" class="img-fluid" alt="{{ $item->title }}">
        <div class="portfolio-info">
          <h4>{{ $item->title }}</h4>
          <p>{{ $item->description }}</p>
          <div class="portfolio-links">
            <a href="{{ asset($item->image_path) }}" title="{{ $item->title }}" data-gallery="portfolio-gallery" class="glightbox preview-link">
              <i class="bi bi-zoom-in"></i>
            </a>
            <a href="{{ route('page.show', 'portfolio') }}" title="View All Projects" class="details-link">
              <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- Certificates Section -->
@if($certificates->count() > 0)
<section id="certificates" class="section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Certifications</h2>
    <p>Professional certifications and achievements</p>
  </div>

  <div class="container">
    <div class="row gy-4">
      @foreach($certificates as $certificate)
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="certificate-item">
          <div class="certificate-content">
            <h4>{{ $certificate->title }}</h4>
            <p>{{ $certificate->description }}</p>
            <div class="certificate-meta">
              <span class="date">{{ $certificate->date_obtained }}</span>
              @if($certificate->credential_id)
              <span class="credential">ID: {{ $certificate->credential_id }}</span>
              @endif
            </div>
          </div>
          <div class="certificate-image">
            <img src="{{ asset($certificate->image_path) }}" alt="{{ $certificate->title }}" class="img-fluid">
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Typing effect
  const text = "Creating digital experiences that think, learn, and grow";
  const typingElement = document.getElementById('typing-text');
  let index = 0;
  let isDeleting = false;

  function typeWriter() {
    if (!isDeleting && index <= text.length) {
      typingElement.textContent = text.substring(0, index);
      index++;
      setTimeout(typeWriter, 100);
    } else if (isDeleting && index >= 0) {
      typingElement.textContent = text.substring(0, index);
      index--;
      setTimeout(typeWriter, 50);
    } else {
      isDeleting = !isDeleting;
      setTimeout(typeWriter, 2000);
    }
  }

  typeWriter();
});
</script>
@endsection