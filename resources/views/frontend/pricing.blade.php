@extends('layouts.app')

@section('title', 'Pricing & Packages - Muhammad Yahya')
@section('meta_description', 'Transparent pricing for web development, DevOps, and consulting services. Choose a plan that fits your project needs.')
@section('body_class', 'pricing-page')

@section('styles')
<style>
  .pricing-hero {
    padding: 140px 20px 60px;
    background: linear-gradient(135deg, #FFF8E1 0%, #FFF3E0 100%);
    text-align: center;
  }
  
  .pricing-hero::before {
    content: '💰';
    position: absolute;
    top: 10%;
    right: 5%;
    font-size: 8rem;
    opacity: 0.1;
  }
  
  .pricing-hero h1 {
    font-size: clamp(2.5rem, 8vw, 5rem);
    font-weight: 900;
    background: linear-gradient(135deg, #1a1a1a, #444);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1rem;
  }
  
  .pricing-hero p {
    font-size: 1.2rem;
    color: #666;
    max-width: 600px;
    margin: 0 auto 2rem;
  }
  
  .pricing-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    padding: 2rem 1rem 4rem;
    max-width: 1300px;
    margin: 0 auto;
  }
  
  .pricing-card {
    background: white;
    border-radius: 28px;
    padding: 2.5rem 2rem;
    box-shadow: 0 20px 60px rgba(255,215,0,0.12);
    transition: all 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    position: relative;
    border: 3px solid transparent;
    display: flex;
    flex-direction: column;
  }
  
  .pricing-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 28px;
    padding: 3px;
    background: linear-gradient(135deg, #87CEEB, #FFD700);
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    opacity: 0;
    transition: opacity 0.4s ease;
  }
  
  .pricing-card:hover::before {
    opacity: 1;
  }
  
  .pricing-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 40px 100px rgba(255,215,0,0.2);
  }
  
  .pricing-card.featured {
    transform: scale(1.05);
    border-color: #FFD700;
    box-shadow: 0 30px 80px rgba(255,215,0,0.25);
  }
  
  .pricing-card.featured:hover {
    transform: scale(1.07) translateY(-10px);
  }
  
  .pricing-badge {
    position: absolute;
    top: -12px;
    right: 20px;
    padding: 0.4rem 1.2rem;
    background: linear-gradient(135deg, #FFD700, #FFB300);
    color: #1a1a1a;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 5px 15px rgba(255,215,0,0.3);
  }
  
  .pricing-title {
    font-size: 1.4rem;
    font-weight: 800;
    margin-bottom: 1rem;
    color: #1a1a1a;
  }
  
  .pricing-price {
    font-size: 3rem;
    font-weight: 900;
    background: linear-gradient(135deg, #87CEEB, #FFD700);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1.5rem;
    line-height: 1;
  }
  
  .pricing-price sup {
    font-size: 1.2rem;
    vertical-align: top;
  }
  
  .pricing-price span {
    font-size: 1rem;
    font-weight: 500;
    color: #666;
  }
  
  .pricing-features {
    list-style: none;
    padding: 0;
    margin: 0 0 2rem 0;
    flex-grow: 1;
  }
  
  .pricing-features li {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.6rem 0;
    border-bottom: 1px dashed #E3F2FD;
    color: #555;
  }
  
  .pricing-features li:last-child {
    border-bottom: none;
  }
  
  .pricing-features li i.bi-check {
    color: #28a745;
    font-weight: bold;
  }
  
  .pricing-features li.na {
    color: #ccc;
  }
  
  .pricing-features li.na i {
    color: #ccc;
  }
  
  .btn-pricing {
    display: inline-block;
    width: 100%;
    padding: 1rem 2rem;
    background: linear-gradient(135deg, #87CEEB, #FFD700);
    color: white;
    border-radius: 50px;
    font-weight: 700;
    text-align: center;
    text-decoration: none;
    transition: all 0.5s cubic-bezier(0.68,-0.55,0.265,1.55);
    box-shadow: 0 8px 30px rgba(135,206,235,0.3);
    border: none;
    cursor: pointer;
    font-size: 1rem;
  }
  
  .btn-pricing:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(135,206,235,0.4);
    color: white;
    background: linear-gradient(135deg, #6BB3D8, #FFB300);
  }
  
  /* Additional Services */
  .additional-services {
    padding: 80px 20px;
    background: linear-gradient(180deg, #FFFFFF 0%, #E3F2FD 100%);
  }
  
  .services-additional-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    max-width: 1100px;
    margin: 0 auto;
  }
  
  .additional-card {
    background: white;
    border-radius: 24px;
    padding: 2.5rem;
    box-shadow: 0 15px 50px rgba(135,206,235,0.1);
    transition: all 0.5s ease;
    border-left: 5px solid #FFD700;
  }
  
  .additional-card:hover {
    transform: translateX(10px) scale(1.02);
    box-shadow: 0 25px 70px rgba(135,206,235,0.2);
    border-left-color: #87CEEB;
  }
  
  .additional-card h3 {
    font-size: 1.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
    color: #1a1a1a;
  }
  
  .additional-card p {
    color: #666;
    line-height: 1.7;
    margin-bottom: 1.5rem;
  }
  
  .additional-price {
    font-size: 1.8rem;
    font-weight: 900;
    color: #87CEEB;
    margin-bottom: 1.5rem;
    display: block;
  }
  
  .link-arrow {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: #87CEEB;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
  }
  
  .link-arrow:hover {
    gap: 1rem;
    color: #FFD700;
  }
  
  @media (max-width: 768px) {
    .pricing-grid {
      grid-template-columns: 1fr;
    }
    
    .pricing-card.featured {
      transform: scale(1);
    }
    
    .pricing-hero {
      padding: 100px 15px 40px;
    }
  }
</style>
@endsection

@section('content')
<section class="pricing-hero">
  <div class="container">
    <h1>Pricing & Packages</h1>
    <p>Flexible pricing options tailored to your project's size and complexity. No hidden fees, just transparent value.</p>
  </div>
</section>

<section class="pricing-section" style="padding: 40px 20px 80px; background: white;">
  <div class="container">
    <div class="pricing-grid">
      <!-- Basic Plan -->
      <div class="pricing-card fade-in-up stagger-1" style="border-radius: 28px;">
        <h3 class="pricing-title">Basic Website</h3>
        <div class="pricing-price">
          <sup>$</sup>299<span> / project</span>
        </div>
        <ul class="pricing-features">
          <li><i class="bi bi-check-fill"></i> Up to 5 pages</li>
          <li><i class="bi bi-check-fill"></i> Fully responsive</li>
          <li><i class="bi bi-check-fill"></i> Contact form</li>
          <li><i class="bi bi-check-fill"></i> Basic SEO setup</li>
          <li><i class="bi bi-check-fill"></i> 1 month support</li>
          <li class="na"><i class="bi bi-x-circle"></i> CMS integration</li>
          <li class="na"><i class="bi bi-x-circle"></i> E-commerce</li>
        </ul>
        <a href="{{ route('page.show', 'contact') }}" class="btn-pricing">Choose Basic</a>
      </div>

      <!-- Professional Plan (Featured) -->
      <div class="pricing-card featured fade-in-up stagger-2" style="border-radius: 28px;">
        <span class="pricing-badge">Most Popular</span>
        <h3 class="pricing-title">Professional Website</h3>
        <div class="pricing-price">
          <sup>$</sup>799<span> / project</span>
        </div>
        <ul class="pricing-features">
          <li><i class="bi bi-check-fill"></i> Up to 15 pages</li>
          <li><i class="bi bi-check-fill"></i> Advanced responsive</li>
          <li><i class="bi bi-check-fill"></i> Multiple forms</li>
          <li><i class="bi bi-check-fill"></i> Advanced SEO</li>
          <li><i class="bi bi-check-fill"></i> CMS integration</li>
          <li><i class="bi bi-check-fill"></i> 3 months support</li>
          <li class="na"><i class="bi bi-x-circle"></i> E-commerce</li>
        </ul>
        <a href="{{ route('page.show', 'contact') }}" class="btn-pricing">Get Started</a>
      </div>

      <!-- E-Commerce Plan -->
      <div class="pricing-card fade-in-up stagger-3" style="border-radius: 28px;">
        <h3 class="pricing-title">E-Commerce Solution</h3>
        <div class="pricing-price">
          <sup>$</sup>1,499<span> / project</span>
        </div>
        <ul class="pricing-features">
          <li><i class="bi bi-check-fill"></i> Unlimited products</li>
          <li><i class="bi bi-check-fill"></i> Payment gateway</li>
          <li><i class="bi bi-check-fill"></i> Inventory management</li>
          <li><i class="bi bi-check-fill"></i> Order management</li>
          <li><i class="bi bi-check-fill"></i> Customer accounts</li>
          <li><i class="bi bi-check-fill"></i> 6 months support</li>
          <li><i class="bi bi-check-fill"></i> Advanced analytics</li>
        </ul>
        <a href="{{ route('page.show', 'contact') }}" class="btn-pricing">Start Store</a>
      </div>
    </div>
    
    <!-- Additional Services -->
    <div style="margin-top: 5rem;">
      <div class="section-header text-center fade-in-up" style="margin-bottom: 3rem;">
        <h2 style="font-size: clamp(2rem, 5vw, 3rem); font-weight: 900; background: linear-gradient(135deg, #1a1a1a, #444); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
          Additional Services
        </h2>
        <p style="color: #666; max-width: 600px; margin: 1rem auto 0;">Need ongoing support or expert advice? I also offer consulting and maintenance plans.</p>
      </div>
      
      <div class="services-additional-grid">
        <div class="additional-card fade-in-up stagger-1">
          <h3>Consulting & Strategy</h3>
          <p>Get expert advice on technology stack selection, architecture design, and project planning for your next big idea.</p>
          <span class="additional-price">$150/hour</span>
          <a href="{{ route('page.show', 'contact') }}" class="link-arrow">
            Learn More <i class="bi bi-arrow-right"></i>
          </a>
        </div>
        
        <div class="additional-card fade-in-up stagger-2">
          <h3>Maintenance & Support</h3>
          <p>Ongoing support, security patches, performance optimization, and updates to keep your applications running smoothly.</p>
          <span class="additional-price">$99/month</span>
          <a href="{{ route('page.show', 'contact') }}" class="link-arrow">
            Learn More <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>
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
