@extends('layouts.app')

@section('title', 'Services & Expertise - Muhammad Yahya')
@section('meta_description', 'Explore my professional services: Backend Development, DevOps, System Administration, and Technical Consulting.')
@section('body_class', 'services-page')

@section('styles')
<style>
  .services-hero {
    padding: 140px 20px 80px;
    background: linear-gradient(135deg, #E3F2FD 0%, #B3E5FC 100%);
    text-align: center;
    position: relative;
    overflow: hidden;
  }
  
  .services-hero::before {
    content: '⚡';
    position: absolute;
    top: 15%;
    left: 8%;
    font-size: 10rem;
    opacity: 0.1;
    filter: blur(2px);
  }
  
  .services-hero h1 {
    font-size: clamp(2.5rem, 8vw, 5rem);
    font-weight: 900;
    background: linear-gradient(135deg, #1a1a1a, #444);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1rem;
  }
  
  .services-hero p {
    font-size: 1.2rem;
    color: #666;
    max-width: 650px;
    margin: 0 auto 3rem;
  }
  
  .services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    padding: 4rem 1rem;
    max-width: 1300px;
    margin: 0 auto;
  }
  
  .service-card {
    background: white;
    border-radius: 26px;
    padding: 2.5rem 2rem;
    box-shadow: 0 20px 60px rgba(135,206,235,0.12);
    transition: all 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    position: relative;
    border: 3px solid #E3F2FD;
    text-align: center;
  }
  
  .service-card::before {
    content: '';
    position: absolute;
    top: -3px;
    left: -3px;
    right: -3px;
    bottom: -3px;
    background: linear-gradient(135deg, #87CEEB, #FFD700);
    border-radius: 29px;
    opacity: 0;
    z-index: -1;
    transition: opacity 0.4s ease;
  }
  
  .service-card:hover::before {
    opacity: 1;
  }
  
  .service-card:hover {
    transform: translateY(-15px) rotate(0.5deg);
    box-shadow: 0 35px 90px rgba(135,206,235,0.2);
    border-color: transparent;
  }
  
  .service-icon {
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #87CEEB, #FFD700);
    border-radius: 50%;
    color: white;
    font-size: 2rem;
    margin: 0 auto 1.5rem;
    transition: all 0.5s cubic-bezier(0.68,-0.55,0.265,1.55);
    box-shadow: 0 10px 30px rgba(135,206,235,0.3);
  }
  
  .service-card:hover .service-icon {
    transform: rotate(360deg) scale(1.15);
  }
  
  .service-title {
    font-size: 1.3rem;
    font-weight: 800;
    margin-bottom: 1rem;
    color: #1a1a1a;
  }
  
  .service-desc {
    color: #666;
    line-height: 1.7;
    margin-bottom: 1.5rem;
  }
  
  .service-badge {
    display: inline-block;
    padding: 0.4rem 1.2rem;
    background: #E3F2FD;
    color: #87CEEB;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 700;
  }
  
  .service-card:hover .service-badge {
    background: #1a1a1a;
    color: white;
  }
  
  @media (max-width: 768px) {
    .services-grid {
      grid-template-columns: 1fr;
    }
    
    .services-hero {
      padding: 100px 15px 60px;
    }
  }
</style>
@endsection

@section('content')
<section class="services-hero">
  <div class="container">
    <h1>My Services</h1>
    <p>Specialized expertise in modern web technologies, cloud infrastructure, and scalable system architecture.</p>
  </div>
</section>

<section class="services-section" style="padding: 40px 20px 80px; background: white;">
  <div class="container">
    <div class="services-grid">
      @if($certificates->count() > 0)
        @foreach($certificates as $certificate)
        <div class="service-card fade-in-up" style="border-radius: 26px;">
          <div class="service-icon">
            <i class="bi bi-award"></i>
          </div>
          <h3 class="service-title">{{ $certificate->title }}</h3>
          <p class="service-desc">{{ $certificate->description }}</p>
          <span class="service-badge">{{ $certificate->date_obtained }}</span>
        </div>
        @endforeach
      @else
        <div class="empty-state" style="grid-column: 1/-1; text-align: center; padding: 4rem; background: #E3F2FD; border-radius: 24px;">
          <i class="bi bi-tools" style="font-size: 4rem; color: #87CEEB;"></i>
          <h3>No Services Listed</h3>
          <p>Services will be displayed here.</p>
        </div>
      @endif
    </div>
  </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.1 });
  
  document.querySelectorAll('.fade-in-up').forEach(el => observer.observe(el));
});
</script>
@endsection
