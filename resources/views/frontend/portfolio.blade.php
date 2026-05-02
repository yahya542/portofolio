@extends('layouts.app')

@section('title', 'Portfolio - Muhammad Yahya | Full Stack Engineer')
@section('body_class', 'portfolio-page')

@section('styles')
<style>
    #header {
      background-color: black;
    }
    #portfolio {
      background-color: black;
      padding: 60px 0;
    }

    .portfolio-filters {
      padding: 0;
      margin: 0 auto 30px auto;
      list-style: none;
      text-align: center;
    }

    .portfolio-filters li {
      cursor: pointer;
      display: inline-block;
      padding: 10px 20px;
      margin: 0 5px;
      font-size: 16px;
      font-weight: 500;
      line-height: 1;
      border-radius: 50px;
      transition: all 0.3s ease-in-out;
      font-family: var(--heading-font);
      background: rgba(0, 119, 182, 0.1);
      color: #0077b6;
      border: 1px solid #0077b6;
    }

    .portfolio-filters li:hover,
    .portfolio-filters li.filter-active {
      color: #fff;
      background: linear-gradient(90deg, #F87B1B, #0077b6);
      border-color: #F87B1B;
      box-shadow: 0 5px 15px rgba(248, 123, 27, 0.3);
    }

    .portfolio-item {
      position: relative;
      overflow: hidden;
      border-radius: 10px;
      margin-bottom: 30px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
    }

    .portfolio-item:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .portfolio-item img {
      transition: all 0.5s ease;
      width: 100%;
      height: 300px;
      object-fit: cover;
    }

    .portfolio-item:hover img {
      transform: scale(1.1);
    }

    .portfolio-info {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: rgba(255, 255, 255, 0.9);
      padding: 20px;
      transition: all 0.3s ease;
      transform: translateY(100%);
      opacity: 0;
    }

    .portfolio-item:hover .portfolio-info {
      transform: translateY(0);
      opacity: 1;
    }

    .portfolio-info h4 {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 5px;
      color: #222;
    }

    .portfolio-info p {
      color: #666;
      font-size: 14px;
      margin-bottom: 15px;
    }

    .portfolio-links {
      display: flex;
      gap: 10px;
    }

    .portfolio-links a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: linear-gradient(90deg, #F87B1B, #0077b6);
      color: white;
      font-size: 18px;
      transition: all 0.3s ease;
    }

    .portfolio-links a:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(248, 123, 27, 0.4);
    }

    .section-title h2 {
      position: relative;
      padding-bottom: 15px;
    }

    .section-title h2:after {
      content: "";
      position: absolute;
      display: block;
      width: 80px;
      height: 3px;
      background: linear-gradient(90deg, #F87B1B, #0077b6);
      left: 0;
      right: 0;
      bottom: 0;
      margin: auto;
    }

    .portfolio-category {
      position: absolute;
      top: 15px;
      left: 15px;
      background: linear-gradient(90deg, #F87B1B, #0077b6);
      color: white;
      padding: 5px 15px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
</style>
@endsection

@section('content')
<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Portfolio</h2>
    <p>Showcasing my latest projects and creative work</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

      <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">All</li>
        @foreach($categories as $category)
        <li data-filter=".filter-{{ $category->slug }}">{{ $category->name }}</li>
        @endforeach
      </ul><!-- End Portfolio Filters -->

      <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
        @foreach($portfolioItems as $item)
        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $item->category->slug }}">
          <div class="portfolio-category">{{ $item->category->name }}</div>
          <img src="{{ asset($item->image_path) }}" class="img-fluid" alt="{{ $item->title }}">
          <div class="portfolio-info">
            <h4>{{ $item->title }}</h4>
            <p>{{ $item->description }}</p>
            <div class="portfolio-links">
              <a href="{{ asset($item->image_path) }}" title="{{ $item->title }}" data-gallery="portfolio-gallery-{{ $item->category->slug }}" class="glightbox preview-link">
                <i class="bi bi-zoom-in"></i>
              </a>
              <a href="#" title="More Details" class="details-link">
                <i class="bi bi-link-45deg"></i>
              </a>
            </div>
          </div>
        </div><!-- End Portfolio Item -->
        @endforeach
      </div><!-- End Portfolio Container -->

    </div>

  </div>

</section><!-- /Portfolio Section -->
@endsection