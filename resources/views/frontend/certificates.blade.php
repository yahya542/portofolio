@extends('layouts.app')

@section('title', 'Certifications - Muhammad Yahya')
@section('meta_description', 'Professional certifications and credentials earned throughout my career in software engineering and DevOps.')
@section('body_class', 'certificates-page')

@section('styles')
<style>
  .cert-hero {
    padding: 140px 20px 80px;
    background: linear-gradient(135deg, #FFF8E1 0%, #FFFFFF 100%);
    text-align: center;
    position: relative;
  }
  
  .cert-hero::before {
    content: '🏆';
    position: absolute;
    top: 10%;
    left: 5%;
    font-size: 8rem;
    opacity: 0.1;
    filter: blur(2px);
  }
  
  .cert-hero h1 {
    font-size: clamp(2.5rem, 8vw, 5rem);
    font-weight: 900;
    background: linear-gradient(135deg, #1a1a1a, #444);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1rem;
    position: relative;
  }
  
  .cert-hero p {
    font-size: 1.2rem;
    color: #666;
    max-width: 600px;
    margin: 0 auto;
  }
  
  .cert-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    padding: 4rem 1rem;
    max-width: 1300px;
    margin: 0 auto;
  }
  
  .cert-card {
    background: white;
    border-radius: 28px;
    overflow: hidden;
    box-shadow: 0 25px 70px rgba(255,215,0,0.15);
    transition: all 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    position: relative;
    border: 3px solid transparent;
  }
  
  .cert-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 8px;
    background: linear-gradient(90deg, #FFD700, #87CEEB, #FFD700);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.5s ease;
  }
  
  .cert-card:hover::before {
    transform: scaleX(1);
  }
  
  .cert-card:hover {
    transform: translateY(-15px) scale(1.02) rotate(0.5deg);
    box-shadow: 0 40px 100px rgba(255,215,0,0.25);
    border-color: #FFD700;
  }
  
  .cert-img {
    height: 200px;
    overflow: hidden;
    position: relative;
  }
  
  .cert-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.8s ease;
  }
  
  .cert-card:hover .cert-img img {
    transform: scale(1.1) rotate(1deg);
  }
  
  .cert-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #FFD700, #FFB300);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    box-shadow: 0 8px 20px rgba(255,215,0,0.4);
    z-index: 2;
    animation: pulse 2s ease-in-out infinite;
  }
  
  @keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
  }
  
  .cert-content {
    padding: 2rem;
  }
  
  .cert-title {
    font-size: 1.3rem;
    font-weight: 800;
    margin-bottom: 0.8rem;
    color: #1a1a1a;
  }
  
  .cert-desc {
    color: #666;
    line-height: 1.7;
    margin-bottom: 1.2rem;
  }
  
  .cert-meta {
    display: flex;
    gap: 0.8rem;
    flex-wrap: wrap;
    align-items: center;
  }
  
  .cert-date {
    padding: 0.4rem 1rem;
    background: linear-gradient(135deg, #87CEEB, #B3E5FC);
    color: #1a1a1a;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 700;
  }
  
  .cert-credential {
    padding: 0.4rem 1rem;
    background: linear-gradient(135deg, #FFD700, #FFE082);
    color: #1a1a1a;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 700;
  }
  
  @media (max-width: 768px) {
    .cert-grid {
      grid-template-columns: 1fr;
    }
    
    .cert-hero {
      padding: 100px 15px 60px;
    }
  }
</style>
@endsection

@section('content')
<section class="cert-hero">
  <div class="container">
    <h1>Certifications & Achievements</h1>
    <p>Professional credentials that validate my expertise in modern software development and cloud technologies.</p>
  </div>
</section>

<section class="cert-section" style="padding: 40px 20px 80px; background: white;">
  <div class="container">
    <div class="cert-grid">
      @if($certificates->count() > 0)
        @foreach($certificates as $certificate)
        <div class="cert-card fade-in-up" style="border-radius: 28px; overflow: hidden;">
          @if($certificate->image_path)
          <div class="cert-img">
            <img src="{{ asset($certificate->image_path) }}" alt="{{ $certificate->title }}">
            <div class="cert-badge">🏆</div>
          </div>
          @endif
          <div class="cert-content">
            <h3 class="cert-title">{{ $certificate->title }}</h3>
            <p class="cert-desc">{{ $certificate->description }}</p>
            <div class="cert-meta">
              <span class="cert-date"><i class="bi bi-calendar3" style="margin-right: 0.3rem;"></i> {{ $certificate->date_obtained }}</span>
              @if($certificate->credential_id)
              <span class="cert-credential"><i class="bi bi-card-checklist" style="margin-right: 0.3rem;"></i> {{ $certificate->credential_id }}</span>
              @endif
            </div>
          </div>
        </div>
        @endforeach
      @else
        <div class="empty-state" style="grid-column: 1/-1; text-align: center; padding: 4rem; background: #E3F2FD; border-radius: 24px;">
          <i class="bi bi-award" style="font-size: 4rem; color: #87CEEB;"></i>
          <h3>No Certificates Yet</h3>
          <p>Certifications will appear here as I earn them.</p>
        </div>
      @endif
    </div>
  </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Scroll animations
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
