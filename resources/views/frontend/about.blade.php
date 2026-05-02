@extends('layouts.app')

@section('title', 'About - Muhammad Yahya | Full Stack Engineer')
@section('meta_description', 'Learn more about Muhammad Yahya, a passionate Full Stack Engineer with expertise in web development, DevOps, and cloud technologies.')

@section('content')
<section id="about" class="about section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>About</h2>
    <p>Learn more about my journey and expertise</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4 justify-content-center">
      <div class="col-lg-4">
        <img src="{{ asset('assets/img/aku.png') }}" class="img-fluid" alt="Muhammad Yahya">
      </div>
      <div class="col-lg-8 content">

        <h2>Full Stack Engineer & Developer</h2>
        <p class="fst-italic py-3">
          Passionate about creating innovative digital solutions that make a difference.
          With expertise in modern web technologies and cloud infrastructure.
        </p>

        <div class="row">
          <div class="col-lg-6">
            <ul>
              <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>January 1, 1995</span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>www.yahya.dev</span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+62 812 3456 7890</span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>Jakarta, Indonesia</span></li>
            </ul>
          </div>
          <div class="col-lg-6">
            <ul>
              <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{ date('Y') - 1995 }}</span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>Bachelor's in Computer Science</span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>yahya@example.com</span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
            </ul>
          </div>
        </div>

        <p class="py-3">
          I specialize in full-stack web development with a focus on creating scalable,
          user-friendly applications. My expertise spans from frontend technologies like
          React and Vue.js to backend solutions using Laravel, Node.js, and cloud platforms.
        </p>

      </div>
    </div>

  </div>

</section><!-- /About Section -->
@endsection