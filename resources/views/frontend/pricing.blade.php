@extends('layouts.app')

@section('title', 'Pricing - Muhammad Yahya | Full Stack Engineer')
@section('meta_description', 'View pricing packages for web development services, consulting, and custom software solutions.')

@section('content')
<section id="pricing" class="pricing section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Pricing</h2>
    <p>Choose the perfect package for your project</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="pricing-item">
          <h3>Basic Website</h3>
          <h4><sup>$</sup>299<span> / project</span></h4>
          <ul>
            <li><i class="bi bi-check"></i> Up to 5 pages</li>
            <li><i class="bi bi-check"></i> Responsive design</li>
            <li><i class="bi bi-check"></i> Contact form</li>
            <li><i class="bi bi-check"></i> Basic SEO</li>
            <li><i class="bi bi-check"></i> 1 month support</li>
            <li class="na"><i class="bi bi-x"></i> CMS integration</li>
            <li class="na"><i class="bi bi-x"></i> E-commerce</li>
          </ul>
          <a href="{{ route('page.show', 'contact') }}" class="buy-btn">Get Started</a>
        </div>
      </div><!-- End Pricing Item -->

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="pricing-item featured">
          <h3>Professional Website</h3>
          <h4><sup>$</sup>799<span> / project</span></h4>
          <p class="featured-text">Most Popular</p>
          <ul>
            <li><i class="bi bi-check"></i> Up to 15 pages</li>
            <li><i class="bi bi-check"></i> Advanced responsive design</li>
            <li><i class="bi bi-check"></i> Multiple contact forms</li>
            <li><i class="bi bi-check"></i> Advanced SEO</li>
            <li><i class="bi bi-check"></i> CMS integration</li>
            <li><i class="bi bi-check"></i> 3 months support</li>
            <li class="na"><i class="bi bi-x"></i> E-commerce</li>
          </ul>
          <a href="{{ route('page.show', 'contact') }}" class="buy-btn">Get Started</a>
        </div>
      </div><!-- End Pricing Item -->

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="pricing-item">
          <h3>E-Commerce Solution</h3>
          <h4><sup>$</sup>1499<span> / project</span></h4>
          <ul>
            <li><i class="bi bi-check"></i> Unlimited products</li>
            <li><i class="bi bi-check"></i> Payment gateway integration</li>
            <li><i class="bi bi-check"></i> Inventory management</li>
            <li><i class="bi bi-check"></i> Order management</li>
            <li><i class="bi bi-check"></i> Customer accounts</li>
            <li><i class="bi bi-check"></i> 6 months support</li>
            <li><i class="bi bi-check"></i> Advanced analytics</li>
          </ul>
          <a href="{{ route('page.show', 'contact') }}" class="buy-btn">Get Started</a>
        </div>
      </div><!-- End Pricing Item -->

    </div>

  </div>

</section><!-- /Pricing Section -->

<!-- Additional Services -->
<section id="additional-services" class="additional-services section">

  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-box">
          <h3>Consulting & Strategy</h3>
          <p>Get expert advice on technology stack selection, architecture design, and project planning.</p>
          <div class="price">$150/hour</div>
          <a href="{{ route('page.show', 'contact') }}" class="read-more">Learn More <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-box">
          <h3>Maintenance & Support</h3>
          <p>Ongoing support, updates, security patches, and performance optimization for your applications.</p>
          <div class="price">$99/month</div>
          <a href="{{ route('page.show', 'contact') }}" class="read-more">Learn More <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

    </div>

  </div>

</section><!-- /Additional Services Section -->
@endsection

@section('styles')
<style>
  .pricing-item {
    background: #fff;
    border: 1px solid #e0e0e0;
    padding: 40px 30px;
    text-align: center;
    border-radius: 10px;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
  }

  .pricing-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
  }

  .pricing-item.featured {
    border: 2px solid #0077b6;
    transform: scale(1.05);
  }

  .pricing-item.featured .featured-text {
    position: absolute;
    top: 0;
    right: 0;
    background: linear-gradient(90deg, #F87B1B, #0077b6);
    color: white;
    padding: 5px 15px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
  }

  .pricing-item h3 {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 15px;
    color: #222;
  }

  .pricing-item h4 {
    font-size: 36px;
    font-weight: 800;
    margin-bottom: 20px;
    color: #0077b6;
  }

  .pricing-item h4 sup {
    font-size: 20px;
    top: -15px;
  }

  .pricing-item h4 span {
    color: #666;
    font-size: 16px;
    font-weight: 400;
  }

  .pricing-item ul {
    list-style: none;
    padding: 0;
    margin-bottom: 30px;
  }

  .pricing-item ul li {
    padding: 8px 0;
    color: #666;
  }

  .pricing-item ul li i {
    margin-right: 8px;
  }

  .pricing-item ul li.na {
    color: #ccc;
  }

  .pricing-item .buy-btn {
    display: inline-block;
    background: linear-gradient(90deg, #F87B1B, #0077b6);
    color: white;
    padding: 12px 30px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .pricing-item .buy-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(248, 123, 27, 0.4);
  }

  .service-box {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
  }

  .service-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
  }

  .service-box h3 {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 15px;
    color: #222;
  }

  .service-box p {
    color: #666;
    margin-bottom: 20px;
    line-height: 1.6;
  }

  .service-box .price {
    font-size: 24px;
    font-weight: 800;
    color: #0077b6;
    margin-bottom: 20px;
  }

  .service-box .read-more {
    color: #0077b6;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .service-box .read-more:hover {
    color: #F87B1B;
  }
</style>
@endsection