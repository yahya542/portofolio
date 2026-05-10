@extends('layouts.app')

@section('title', 'Resume - Muhammad Yahya | Fullstack Engineer')
@section('meta_description', 'Professional resume of Muhammad Yahya - Fullstack Engineer with expertise in Django, Laravel, Golang, DevOps, and System Administration.')
@section('body_class', 'resume-page')

@section('content')
<!-- Resume Hero -->
<section class="about-hero">
  <div class="profile-wrapper">
    <div class="profile-card fade-in-up">
      <div class="row g-0 align-items-center">
        <div class="col-lg-4 mb-4 mb-lg-0 text-center">
          <div class="profile-img-container">
            <img src="{{ asset('assets/img/aku.png') }}" alt="Muhammad Yahya" class="profile-img">
          </div>
        </div>
        <div class="col-lg-8 ps-lg-5">
          <h1 class="profile-name">MUHAMMAD YAHYA</h1>
          <h2 class="profile-title">FULLSTACK ENGINEER & DEVOPS SPECIALIST</h2>
          <p class="profile-bio">
            Innovative Fullstack Engineer with proven expertise in Django, Laravel, Golang, and Cloud Infrastructure. Passionate about building scalable systems and elegant solutions.
          </p>
          <div class="profile-details">
            <div class="profile-detail"><i class="bi bi-geo-alt-fill"></i><span>Pamekasan, 69316</span></div>
            <div class="profile-detail"><i class="bi bi-envelope-fill"></i><span>sajakcodingan@gmail.com</span></div>
            <div class="profile-detail"><i class="bi bi-telephone-fill"></i><span>0851 8464 7793</span></div>
            <div class="profile-detail"><i class="bi bi-linkedin"></i><span>linkedin.com/in/muhammad-yahya</span></div>
            <div class="profile-detail"><i class="bi bi-github"></i><span>github.com/yahya542</span></div>
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

<!-- Download CTA -->
<section class="cta-section">
  <div class="container">
    <div class="cta-content fade-in-up" style="text-align: center;">
      <h2 class="cta-title">Download My Resume</h2>
      <p class="cta-text" style="max-width: 500px; margin: 0 auto 2rem;">
        Get a PDF copy of my full professional resume for your records.
      </p>
      <a href="#" class="btn-cta" onclick="event.preventDefault(); alert('PDF download coming soon!');">
        <i class="bi bi-download"></i> Download PDF Resume
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