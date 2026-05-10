@extends('layouts.app')

@section('body_class', 'page-index')
@section('title', 'Muhammad Yahya - Fullstack Engineer Extraordinaire')
@section('meta_description', 'Creative Fullstack Engineer crafting digital masterpieces with Django, Laravel & Golang. Where innovation meets elegant code.')

@section('styles')
<style>
  /* =========================================
     HERO SECTION - Expressive & Dynamic
     ========================================= */
  
  .hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #FFFFFF 0%, #B3E5FC 100%);
    padding: 120px 20px 80px;
  }
  
  /* Floating Gradient Orbs */
  .hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 0;
  }
  
  .orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(80px);
    opacity: 0.6;
    animation: float-orb 12s ease-in-out infinite;
  }
  
  .orb-1 {
    width: 500px;
    height: 500px;
    background: linear-gradient(135deg, #87CEEB, #B3E5FC);
    top: -100px;
    left: -150px;
    animation-delay: 0s;
  }
  
  .orb-2 {
    width: 400px;
    height: 400px;
    background: linear-gradient(135deg, #87CEEB, #ffff);
    top: 40%;
    right: -100px;
    animation-delay: 3s;
  }
  
  .orb-3 {
    width: 300px;
    height: 300px;
    background: linear-gradient(135deg, #87CEEB, #6BB3D8);
    bottom: -50px;
    left: 30%;
    animation-delay: 6s;
  }
  
  @keyframes float-orb {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    33% { transform: translate(30px, -30px) rotate(120deg); }
    66% { transform: translate(-20px, 20px) rotate(240deg); }
  }
  
  .hero-content {
    position: relative;
    z-index: 2;
    max-width: 1000px;
    text-align: center;
    animation: hero-enter 1.2s cubic-bezier(0.22, 1, 0.36, 1);
  }
  
  @keyframes hero-enter {
    from {
      opacity: 0;
      transform: translateY(60px) scale(0.95);
    }
    to {
      opacity: 1;
      transform: translateY(0) scale(1);
    }
  }
  
  .hero-badge {
    display: inline-block;
    padding: 0.6rem 1.5rem;
    background: linear-gradient(135deg, #87CEEB, #FFD700);
    color: white;
    border-radius: 50px;
    font-weight: 700;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 30px rgba(135,206,235,0.4);
    animation: pulse-glow 3s ease-in-out infinite;
  }
  
  @keyframes pulse-glow {
    0%, 100% { box-shadow: 0 8px 30px rgba(135,206,235,0.4); }
    50% { box-shadow: 0 8px 50px rgba(255,215,0,0.5); }
  }
  
  .hero-title {
    font-size: clamp(0.5rem, 7vw, 4rem);
    font-weight: 500;
    line-height: 1;
    margin-bottom: 1rem;
    background: linear-gradient(135deg, #1a1a1a 0%, #444 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    letter-spacing: -0.03em;
  }
  
  .hero-title span {
    display: block;
    background: linear-gradient(135deg, #87CEEB, #FFD700);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }
  
  .hero-subtitle {
    font-size: clamp(1.2rem, 4vw, 2rem);
    color: #666;
    font-weight: 400;
    margin-bottom: 2rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
  }
  
  .hero-typing {
    font-size: clamp(1rem, 2.5vw, 1.3rem);
    color: #444;
    font-weight: 500;
    min-height: 1.5em;
    margin-bottom: 3rem;
    font-family: 'Courier New', monospace;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
  }
  
  .cursor {
    display: inline-block;
    width: 3px;
    height: 1.2em;
    background: #ffda06;
    animation: blink 1s step-end infinite;
  }
  
  @keyframes blink {
    0%, 50% { opacity: 1; }
    51%, 100% { opacity: 0; }
  }
  
  .hero-actions {
    display: flex;
    justify-content: center;
    gap: 1.5rem;
    flex-wrap: wrap;
    margin-bottom: 3rem;
  }
  
  /* Floating social icons */
  .hero-social {
    display: flex;
    justify-content: center;
    gap: 1.2rem;
    margin-top: 2rem;
  }
  
  .social-float {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: white;
    border-radius: 50%;
    color: #87CEEB;
    box-shadow: 0 10px 40px rgba(135,206,235,0.2);
    transition: all 0.5s cubic-bezier(0.68,-0.55,0.265,1.55);
    font-size: 1.2rem;
    position: relative;
    overflow: hidden;
  }
  
  .social-float::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #87CEEB, #FFD700);
    transition: left 0.5s ease;
    z-index: -1;
  }
  
  .social-float:hover::before {
    left: 0;
  }
  
  .social-float:hover {
    color: white;
    transform: translateY(-8px) rotate(360deg) scale(1.15);
    box-shadow: 0 20px 50px rgba(135,206,235,0.4);
  }
  
  /* =========================================
     BUTTONS - Expressive & Bouncy
     ========================================= */
  
  .btn-hero {
    padding: 1.1rem 2.5rem;
    border-radius: 50px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    font-size: 0.95rem;
    display: inline-flex;
    align-items: center;
    gap: 0.8rem;
    transition: all 0.5s cubic-bezier(0.68,-0.55,0.265,1.55);
    border: none;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    text-decoration: none;
  }
  
  .btn-hero::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
  }
  
  .btn-hero:active::before {
    width: 400px;
    height: 400px;
  }
  
  .btn-primary-hero {
    background: linear-gradient(135deg, #87CEEB 0%, #5bb3d8 100%);
    color: white;
    box-shadow: 0 10px 40px rgba(135,206,235,0.3);
  }
  
  .btn-primary-hero:hover {
    transform: translateY(-8px) scale(1.05);
    box-shadow: 0 20px 60px rgba(135,206,235,0.5);
  }
  
  .btn-secondary-hero {
    background: white;
    color: #87CEEB;
    border: 3px solid #87CEEB;
  }
  
  .btn-secondary-hero:hover {
    background: #87CEEB;
    color: white;
    transform: translateY(-8px) rotate(-2deg);
    box-shadow: 0 15px 40px rgba(135,206,235,0.3);
  }
  
  .btn-yellow-hero {
    background: linear-gradient(135deg, #FFD700 0%, #FFB300 100%);
    color: #1a1a1a;
    box-shadow: 0 10px 40px rgba(255,215,0,0.3);
  }
  
  .btn-yellow-hero:hover {
    transform: translateY(-8px) scale(1.05) rotate(2deg);
    box-shadow: 0 20px 60px rgba(255,215,0,0.5);
  }
  
  /* =========================================
     FEATURED SECTION - Bento Grid
     ========================================= */
  
  #featured-portfolio {
    padding: 100px 0;
    background: linear-gradient(180deg, #FFFFFF 0%, #E3F2FD 100%);
  }
  
  .section-header {
    text-align: center;
    margin-bottom: 4rem;
    position: relative;
    padding-top: 2rem;
  }
  
  .section-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 120px;
    height: 6px;
    background: linear-gradient(90deg, #87CEEB, #FFD700]);
    border-radius: 3px;
  }
  
  .section-subtitle {
    font-size: 1rem;
    color: #87CEEB;
    text-transform: uppercase;
    letter-spacing: 3px;
    font-weight: 700;
    margin-bottom: 0.5rem;
  }
  
  .section-title {
    font-size: clamp(2.5rem, 6vw, 4rem);
    font-weight: 900;
    background: linear-gradient(135deg, #1a1a1a 0%, #444 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1rem;
  }
  
  /* Bento Grid */
  .bento-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2rem;
    grid-auto-flow: dense;
    padding: 1rem;
  }
  
  .bento-card {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(135,206,235,0.15);
    transition: all 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    transform-style: preserve-3d;
    perspective: 1000px;
  }
  
  .bento-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(135,206,235,0.1), rgba(255,215,0,0.1));
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: 1;
  }
  
  .bento-card:hover::before {
    opacity: 1;
  }
  
  .bento-card:hover {
    transform: translateY(-15px) rotateX(5deg) rotateY(5deg) scale(1.02);
    box-shadow: 0 40px 80px rgba(135,206,235,0.25);
  }
  
  .bento-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
  }
  
  .bento-card:hover img {
    transform: scale(1.1);
  }
  
  .bento-card-content {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 2rem;
    background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0) 100%);
    color: white;
    transform: translateY(20px);
    opacity: 0;
    transition: all 0.5s ease;
  }
  
  .bento-card:hover .bento-card-content {
    transform: translateY(0);
    opacity: 1;
  }
  
  .bento-card-category {
    display: inline-block;
    padding: 0.3rem 0.8rem;
    background: linear-gradient(135deg, #87CEEB, #FFD700);
    color: #1a1a1a;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 0.5rem;
  }
  
  .bento-card-title {
    font-size: 1.4rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
  }
  
  .bento-card-desc {
    font-size: 0.9rem;
    opacity: 0.9;
    line-height: 1.5;
  }
  
  .bento-card-large {
    grid-column: span 2;
    min-height: 400px;
  }
  
  @media (max-width: 992px) {
    .bento-card-large {
      grid-column: span 1;
    }
  }
  
  /* =========================================
     CERTIFICATES - Fan Layout
     ========================================= */
  
  #certificates {
    padding: 100px 0;
    background: linear-gradient(180deg, #E3F2FD 0%, #FFFFFF 100%);
    position: relative;
  }
  
  .certificates-wrapper {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2.5rem;
    padding: 0 1rem;
  }
  
  .certificate-card {
    background: white;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(135,206,235,0.12);
    transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1);
    position: relative;
    border: 3px solid transparent;
  }
  
  .certificate-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 6px;
    background: linear-gradient(90deg, #87CEEB, #FFD700);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.5s ease;
  }
  
  .certificate-card:hover::before {
    transform: scaleX(1);
  }
  
  .certificate-card:hover {
    transform: translateY(-12px) scale(1.02);
    border-color: #87CEEB;
    box-shadow: 0 30px 80px rgba(135,206,235,0.2);
  }
  
  .certificate-image {
    position: relative;
    height: 200px;
    overflow: hidden;
  }
  
  .certificate-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
  }
  
  .certificate-card:hover .certificate-image img {
    transform: scale(1.1) rotate(2deg);
  }
  
  .certificate-content {
    padding: 2rem;
    position: relative;
  }
  
  .certificate-content::before {
    content: '🏆';
    position: absolute;
    top: -25px;
    right: 20px;
    font-size: 2.5rem;
    filter: drop-shadow(0 5px 10px rgba(0,0,0,0.1));
  }
  
  .certificate-title {
    font-size: 1.4rem;
    font-weight: 800;
    color: #1a1a1a;
    margin-bottom: 0.8rem;
  }
  
  .certificate-desc {
    color: #666;
    line-height: 1.7;
    margin-bottom: 1rem;
  }
  
  .certificate-meta {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    align-items: center;
  }
  
  .cert-date, .cert-credential {
    padding: 0.4rem 1rem;
    background: #E3F2FD;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    color: #87CEEB;
  }
  
  .cert-credential {
    background: #FFF8E1;
    color: #FFB300;
  }
  
  /* =========================================
     ANIMATIONS ON SCROLL
     ========================================= */
  
  .fade-in-up {
    opacity: 0;
    transform: translateY(50px);
    transition: opacity 0.8s ease, transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
  }
  
  .fade-in-up.visible {
    opacity: 1;
    transform: translateY(0);
  }
  
  .stagger-1 { transition-delay: 0.1s; }
  .stagger-2 { transition-delay: 0.2s; }
  .stagger-3 { transition-delay: 0.3s; }
  .stagger-4 { transition-delay: 0.4s; }
  .stagger-5 { transition-delay: 0.5s; }
  
  /* =========================================
     RESPONSIVE
     ========================================= */
  
  @media (max-width: 768px) {
    .hero {
      padding: 100px 15px 60px;
    }
    
    .orb {
      width: 250px !important;
      height: 250px !important;
    }
    
    .hero-actions {
      flex-direction: column;
      align-items: center;
    }
    
    .btn-hero {
      width: 100%;
      max-width: 280px;
      justify-content: center;
    }
    
    .bento-grid {
      grid-template-columns: 1fr;
    }
    
    .certificates-wrapper {
      grid-template-columns: 1fr;
    }
  }
</style>
@endsection

@section('content')
<!-- HERO SECTION -->
<section class="hero">
  <!-- Animated Background Orbs -->
  <div class="hero-bg">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
  </div>
   <img src="assets/img/pt.png" alt="Profile Image">
  <div class="hero-content">
   
    <div class="hero-badge">✨ Backend Engineer & DevOps Specialist</div>
    <h3 class="hero-title">
      Muhammad Yahya
      <span>Abdullahissalam</span>
    </h2>
    <h4class="hero-subtitle">
      Crafting scalable systems with Django, Laravel & Golang. Turning complex problems into elegant solutions.
</h4>
    <div class="hero-typing">
      <span id="typing-text"></span><span class="cursor">&nbsp;</span>
    </div>
    <div class="hero-actions">
      <a href="{{ route('page.show', 'portfolio') }}" class="btn-hero btn-primary-hero">
        <i class="bi bi-briefcase"></i> View Projects
      </a>
      <a href="{{ route('page.show', 'about') }}" class="btn-hero btn-yellow-hero">
        <i class="bi bi-file-person"></i> About Me
      </a>
      <a href="{{ route('page.show', 'contact') }}" class="btn-hero btn-secondary-hero">
        <i class="bi bi-chat-dots"></i> Get In Touch
      </a>
    </div>
    <div class="hero-social">
      <a href="#" class="social-float" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
      <a href="#" class="social-float" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="social-float" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="social-float" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
    </div>
  </div>
</section>

<!-- FEATURED PROJECTS - Bento Grid -->
@if($featuredPortfolio->count() > 0)
<section id="featured-portfolio" class="section">
  <div class="container">
    <div class="section-header fade-in-up">
      <p class="section-subtitle">My Work</p>
      <h2 class="section-title">Featured Projects</h2>
      <p style="color: #666; max-width: 600px; margin: 0 auto; font-size: 1.1rem;">
        A curated selection of projects showcasing expertise in backend architecture, DevOps automation, and fullstack development.
      </p>
    </div>

    <div class="bento-grid">
      @foreach($featuredPortfolio as $index => $item)
      @php
        $delay = 'stagger-' . (($index % 5) + 1);
        $largeClass = $index == 0 ? 'bento-card-large' : '';
      @endphp
      <div class="bento-card {{ $largeClass }} fade-in-up {{ $delay }}" style="border-radius: 24px; overflow: hidden; position: relative;">
        <img src="{{ asset($item->image_path) }}" alt="{{ $item->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease;">
        <div class="bento-card-content" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 2rem; background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0) 100%);">
          <span class="bento-card-category">{{ $item->category->name ?? 'Project' }}</span>
          <h3 class="bento-card-title">{{ $item->title }}</h3>
          <p class="bento-card-desc">{{ Str::limit($item->description, 120) }}</p>
        </div>
      </div>
      @endforeach
    </div>
    
    <div style="text-align: center; margin-top: 3rem;">
      <a href="{{ route('page.show', 'portfolio') }}" class="btn-hero btn-primary-hero" style="margin: 0 auto;">
        <i class="bi bi-grid-3x3-gap"></i> View All Projects
      </a>
    </div>
  </div>
</section>
@endif

<!-- CERTIFICATES SECTION -->
@if($certificates->count() > 0)
<section id="certificates" class="section">
  <div class="container">
    <div class="section-header fade-in-up">
      <p class="section-subtitle">Achievements</p>
      <h2 class="section-title">Certifications</h2>
      <p style="color: #666; max-width: 600px; margin: 0 auto; font-size: 1.1rem;">
        Professional certifications that validate expertise in cloud technologies and modern software development.
      </p>
    </div>

    <div class="certificates-wrapper">
      @foreach($certificates as $index => $certificate)
      <div class="certificate-card fade-in-up stagger-{{ ($index % 5) + 1 }}" style="border-radius: 24px; overflow: hidden; background: white; box-shadow: 0 20px 60px rgba(135,206,235,0.12); transition: all 0.5s ease;">
        <div class="certificate-image" style="height: 220px; overflow: hidden;">
          <img src="{{ asset($certificate->image_path) }}" alt="{{ $certificate->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease;">
        </div>
        <div class="certificate-content" style="padding: 2rem; position: relative;">
          <h3 class="certificate-title" style="font-size: 1.3rem; font-weight: 800; margin-bottom: 0.8rem;">{{ $certificate->title }}</h3>
          <p class="certificate-desc" style="color: #666; line-height: 1.7; margin-bottom: 1rem;">{{ $certificate->description }}</p>
          <div class="certificate-meta" style="display: flex; gap: 0.8rem; flex-wrap: wrap; align-items: center;">
            <span class="cert-date" style="padding: 0.4rem 1rem; background: #E3F2FD; border-radius: 20px; font-size: 0.85rem; font-weight: 600; color: #87CEEB;">{{ $certificate->date_obtained }}</span>
            @if($certificate->credential_id)
            <span class="cert-credential" style="padding: 0.4rem 1rem; background: #FFF8E1; border-radius: 20px; font-size: 0.85rem; font-weight: 600; color: #FFB300;">ID: {{ $certificate->credential_id }}</span>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- QUICK CTA -->
<section style="padding: 80px 20px; background: linear-gradient(135deg, #87CEEB 0%, #FFD700 100%); text-align: center; position: relative; overflow: hidden;">
  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="%23ffffff" fill-opacity="0.1"><circle cx="30" cy="30" r="4"/></g></g></svg></div>
  <div style="position: relative; z-index: 1; max-width: 800px; margin: 0 auto;">
    <h2 style="font-size: clamp(2rem, 5vw, 3rem); font-weight: 900; margin-bottom: 1.5rem; color: white; text-shadow: 0 5px 20px rgba(0,0,0,0.1);">
      Ready to Build Something Amazing?
    </h2>
    <p style="font-size: 1.2rem; margin-bottom: 2rem; color: white; opacity: 0.95;">
      Let's collaborate and turn your vision into reality. I'm always open to discussing new projects, creative ideas, or opportunities to be part of your vision.
    </p>
    <a href="{{ route('page.show', 'contact') }}" class="btn-hero" style="background: white; color: #87CEEB; padding: 1.2rem 3rem; border-radius: 50px; font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 0.8rem; box-shadow: 0 15px 40px rgba(0,0,0,0.15); transition: all 0.5s ease;"
       onmouseover="this.style.transform='translateY(-8px) scale(1.05)'; this.style.boxShadow='0 25px 60px rgba(0,0,0,0.2)';"
       onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'">
      <i class="bi bi-chat-dots-fill"></i> Start a Conversation
    </a>
  </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Typing effect
  const text = "Crafting digital experiences with Django, Laravel, and Golang. Turning complex problems into elegant solutions.";
  const typingElement = document.getElementById('typing-text');
  let index = 0;
  let isDeleting = false;
  
  function typeWriter() {
    if (!isDeleting && index <= text.length) {
      typingElement.textContent = text.substring(0, index);
      index++;
      setTimeout(typeWriter, 80);
    } else if (isDeleting && index >= 0) {
      typingElement.textContent = text.substring(0, index);
      index--;
      setTimeout(typeWriter, 40);
    } else {
      isDeleting = !isDeleting;
      setTimeout(typeWriter, 2000);
    }
  }
  typeWriter();
  
  // Scroll animations
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.1 });
  
  document.querySelectorAll('.fade-in-up').forEach(el => observer.observe(el));
  
  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
});
</script>
@endsection
