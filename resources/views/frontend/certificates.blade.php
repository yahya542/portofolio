@extends('layouts.app')

@section('title', 'Certificates - Muhammad Yahya | Full Stack Engineer')

@section('content')
<section id="services" class="services section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Certificates</h2>
    <p>Professional certifications and achievements</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">
      @foreach($certificates as $certificate)
      <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-award"></i>
          </div>
          <h3>{{ $certificate->title }}</h3>
          <p>{{ $certificate->description }}</p>
          <div class="certificate-meta">
            <span class="date">{{ $certificate->date_obtained }}</span>
            @if($certificate->credential_id)
            <span class="credential">ID: {{ $certificate->credential_id }}</span>
            @endif
          </div>
          @if($certificate->image_path)
          <div class="certificate-image">
            <img src="{{ asset($certificate->image_path) }}" alt="{{ $certificate->title }}" class="img-fluid">
          </div>
          @endif
        </div>
      </div><!-- End Service Item -->
      @endforeach
    </div>

  </div>

</section><!-- /Services Section -->
@endsection

@section('styles')
<style>
  .service-item {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
  }

  .service-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
  }

  .service-item .icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(90deg, #F87B1B, #0077b6);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
    margin-bottom: 20px;
  }

  .service-item h3 {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 15px;
    color: #222;
  }

  .service-item p {
    color: #666;
    margin-bottom: 20px;
    line-height: 1.6;
  }

  .certificate-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 20px;
  }

  .certificate-meta span {
    background: #f8f9fa;
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 12px;
    color: #666;
  }

  .certificate-image {
    text-align: center;
    margin-top: 20px;
  }

  .certificate-image img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  }
</style>
@endsection