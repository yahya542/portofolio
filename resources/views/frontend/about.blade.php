@extends('layouts.app')

@section('title', 'About - Muhammad Yahya | Fullstack Engineer')
@section('meta_description', 'Meet Muhammad Yahya - Fullstack Engineer & DevOps Specialist. Discover my journey, skills, and passion for elegant code.')
@section('body_class', 'about-page')

@section('content')
<section class="about-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="profile-card fade-in-up">
          <div class="row g-0 align-items-center">
            <div class="col-lg-4 mb-4 mb-lg-0 text-center">
              <div class="profile-img-wrapper">
                <img src="{{ asset('assets/img/aku.png') }}" alt="Muhammad Yahya" class="profile-img">
              </div>
            </div>
            <div class="col-lg-8 ps-lg-5">
              <div class="profile-info">
                <h2>MUHAMMAD YAHYA</h2>
                <p class="profile-title" style="font-size: 1.2rem; font-weight: 600; color: #87CEEB; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 2px;">FULLSTACK ENGINEER & DEVOPS SPECIALIST</p>
                <p>Innovative Fullstack Engineer with proven expertise in Django, Laravel, Golang, and Cloud Infrastructure. Passionate about building scalable systems and turning complex challenges into elegant solutions.</p>
              </div>
            </div>
          </div>

          <div class="profile-details mt-4">
            <div class="profile-detail-item">
              <i class="bi bi-geo-alt-fill"></i>
              <span>Pamekasan, 69316</span>
            </div>
            <div class="profile-detail-item">
              <i class="bi bi-envelope-fill"></i>
              <span>sajakcodingan@gmail.com</span>
            </div>
            <div class="profile-detail-item">
              <i class="bi bi-telephone-fill"></i>
              <span>0851 8464 7793</span>
            </div>
            <div class="profile-detail-item">
              <i class="bi bi-linkedin"></i>
              <span>linkedin.com/in/muhammad-yahya</span>
            </div>
            <div class="profile-detail-item">
              <i class="bi bi-github"></i>
              <span>github.com/yahya542</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Resume Sections -->
@if(isset($resumeSections) && $resumeSections->count() > 0)
  @foreach($resumeSections as $sectionType => $sections)
    @foreach($sections as $section)
      @include('frontend.resume.partials.' . $sectionType, ['section' => $section])
    @endforeach
  @endforeach
@endif

<!-- CTA Section -->
<section class="cta-section">
  <div class="container">
    <div class="cta-content fade-in-up" style="text-align: center;">
      <h2 class="cta-title">Ready to Build Something Extraordinary?</h2>
      <p class="cta-text" style="max-width: 600px; margin: 1rem auto 2rem; font-size: 1.1rem;">
        Have a project in mind? Let's collaborate and bring your vision to life.
      </p>
      <a href="{{ route('page.show', 'contact') }}" class="btn-cta">
        <i class="bi bi-chat-dots-fill"></i> Start a Conversation
      </a>
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
  }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
  document.querySelectorAll('.fade-in-up').forEach(el => observer.observe(el));
});
</script>
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
  }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
  document.querySelectorAll('.fade-in-up').forEach(el => observer.observe(el));
});
</script>
@endsection