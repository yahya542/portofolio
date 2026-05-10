@extends('layouts.app')

@section('title', 'Contact - Muhammad Yahya | Let\'s Connect')
@section('meta_description', 'Get in touch with Muhammad Yahya for collaborations, projects, or just to say hello. Let\'s build something amazing together.')
@section('body_class', 'contact-page')

@section('styles')
<style>
  .contact-hero {
    padding: 140px 20px 60px;
    background: linear-gradient(135deg, #E3F2FD 0%, #FFFFFF 100%);
    text-align: center;
    position: relative;
    overflow: hidden;
  }
  
  .contact-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3z' fill='%2387CEEB' fill-opacity='0.08' fill-rule='evenodd'/%3E%3C/svg%3E");
  }
  
  .contact-hero h1 {
    font-size: clamp(2.5rem, 8vw, 5rem);
    font-weight: 900;
    background: linear-gradient(135deg, #1a1a1a, #444);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1rem;
  }
  
  .contact-hero p {
    font-size: 1.2rem;
    color: #666;
    max-width: 600px;
    margin: 0 auto 3rem;
  }
  
  .contact-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
    margin-bottom: 4rem;
  }
  
  .contact-card {
    background: white;
    padding: 2rem;
    border-radius: 24px;
    box-shadow: 0 15px 50px rgba(135,206,235,0.1);
    transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1);
    text-align: center;
    position: relative;
    border: 3px solid #E3F2FD;
  }
  
  .contact-card::before {
    content: '';
    position: absolute;
    top: -3px;
    left: -3px;
    right: -3px;
    bottom: -3px;
    background: linear-gradient(135deg, #87CEEB, #FFD700);
    border-radius: 27px;
    opacity: 0;
    z-index: -1;
    transition: opacity 0.4s ease;
  }
  
  .contact-card:hover::before {
    opacity: 1;
  }
  
  .contact-card:hover {
    transform: translateY(-12px) scale(1.02);
    box-shadow: 0 30px 80px rgba(135,206,235,0.2);
    border-color: transparent;
  }
  
  .contact-icon {
    width: 70px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #87CEEB, #FFD700);
    border-radius: 50%;
    color: white;
    font-size: 1.8rem;
    margin: 0 auto 1.2rem;
    transition: all 0.5s cubic-bezier(0.68,-0.55,0.265,1.55);
  }
  
  .contact-card:hover .contact-icon {
    transform: rotate(360deg) scale(1.15);
  }
  
  .contact-card h4 {
    font-size: 1.2rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
    color: #1a1a1a;
  }
  
  .contact-card p {
    color: #666;
    font-size: 1rem;
  }
  
  /* Contact Form */
  .contact-form-section {
    padding: 80px 0;
    background: linear-gradient(180deg, #FFFFFF 0%, #E3F2FD 100%);
  }
  
  .contact-form-wrapper {
    max-width: 900px;
    margin: 0 auto;
    background: white;
    border-radius: 32px;
    padding: 3rem;
    box-shadow: 0 40px 120px rgba(135,206,235,0.15);
    position: relative;
    overflow: hidden;
  }
  
  .contact-form-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 8px;
    background: linear-gradient(90deg, #87CEEB, #FFD700, #87CEEB);
  }
  
  .form-title {
    text-align: center;
    font-size: clamp(1.8rem, 4vw, 2.5rem);
    font-weight: 900;
    margin-bottom: 0.5rem;
    background: linear-gradient(135deg, #1a1a1a, #444);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }
  
  .form-subtitle {
    text-align: center;
    color: #666;
    margin-bottom: 2.5rem;
    font-size: 1.1rem;
  }
  
  .contact-form .form-control {
    border: 2px solid #E3F2FD;
    border-radius: 16px;
    padding: 1.1rem 1.5rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #FAFBFC;
  }
  
  .contact-form .form-control:focus {
    border-color: #87CEEB;
    box-shadow: 0 0 0 4px rgba(135,206,235,0.15);
    background: white;
    outline: none;
  }
  
  .contact-form textarea.form-control {
    resize: vertical;
    min-height: 150px;
  }
  
  .btn-submit {
    width: 100%;
    padding: 1.2rem;
    background: linear-gradient(135deg, #87CEEB, #FFD700);
    border: none;
    border-radius: 50px;
    color: white;
    font-weight: 700;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    cursor: pointer;
    transition: all 0.5s cubic-bezier(0.68,-0.55,0.265,1.55);
    position: relative;
    overflow: hidden;
  }
  
  .btn-submit::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255,255,255,0.3);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
  }
  
  .btn-submit:hover::before {
    width: 600px;
    height: 600px;
  }
  
  .btn-submit:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(135,206,235,0.4);
  }
  
  .btn-submit:active {
    transform: translateY(-2px);
  }
  
  @media (max-width: 768px) {
    .contact-hero {
      padding: 100px 15px 40px;
    }
    
    .contact-form-wrapper {
      padding: 2rem 1.5rem;
      border-radius: 24px;
    }
    
    .contact-cards {
      grid-template-columns: 1fr;
    }
  }
</style>
@endsection

@section('content')
<!-- Contact Hero -->
<section class="contact-hero">
  <div class="container">
    <h1>Let's Connect</h1>
    <p>Have a project in mind or want to collaborate? I'd love to hear from you. Let's create something amazing together.</p>
    
    <!-- Quick Contact Cards -->
    <div class="contact-cards">
      <div class="contact-card fade-in-up" style="animation-delay: 0.1s;">
        <div class="contact-icon">
          <i class="bi bi-envelope-fill"></i>
        </div>
        <h4>Email</h4>
        <p>sajakcodingan@gmail.com</p>
      </div>
      <div class="contact-card fade-in-up" style="animation-delay: 0.2s;">
        <div class="contact-icon">
          <i class="bi bi-telephone-fill"></i>
        </div>
        <h4>Phone</h4>
        <p>+62 851 8464 7793</p>
      </div>
      <div class="contact-card fade-in-up" style="animation-delay: 0.3s;">
        <div class="contact-icon">
          <i class="bi bi-geo-alt-fill"></i>
        </div>
        <h4>Location</h4>
        <p>Pamekasan, East Java, Indonesia</p>
      </div>
    </div>
  </div>
</section>

<!-- Contact Form -->
<section class="contact-form-section">
  <div class="container">
    <div class="contact-form-wrapper fade-in-up">
      <h2 class="form-title">Send Me a Message</h2>
      <p class="form-subtitle">Fill out the form below and I'll get back to you as soon as possible.</p>
      
      <form action="#" method="post" class="contact-form">
        @csrf
        <div class="row g-3">
          <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="Your Full Name" required>
          </div>
          <div class="col-md-6">
            <input type="email" class="form-control" name="email" placeholder="your.email@example.com" required>
          </div>
          <div class="col-12">
            <input type="text" class="form-control" name="subject" placeholder="What's this about?" required>
          </div>
          <div class="col-12">
            <textarea class="form-control" name="message" rows="6" placeholder="Tell me about your project, idea, or just say hi..." required></textarea>
          </div>
          <div class="col-12">
            <button type="submit" class="btn-submit">
              <i class="bi bi-send-fill" style="margin-right: 0.5rem;"></i>
              Send Message
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- Map / Extra CTA -->
<section style="padding: 80px 20px; background: linear-gradient(135deg, #87CEEB 0%, #FFD700 100%); text-align: center;">
  <div class="container">
    <h2 style="font-size: clamp(1.8rem, 4vw, 2.5rem); font-weight: 900; color: white; margin-bottom: 1.5rem;">
      Ready to Start Your Project?
    </h2>
    <p style="font-size: 1.1rem; color: white; opacity: 0.95; max-width: 600px; margin: 0 auto 2rem;">
      I'm always excited to work on new challenges. Whether you need a robust backend, a scalable system, or a full-stack solution, let's make it happen.
    </p>
    <a href="mailto:sajakcodingan@gmail.com" class="btn-submit" style="background: white; color: #87CEEB; padding: 1.2rem 3rem; border-radius: 50px; text-decoration: none; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; display: inline-flex; align-items: center; gap: 0.8rem; transition: all 0.5s ease; box-shadow: 0 15px 40px rgba(0,0,0,0.15);"
       onmouseover="this.style.transform='translateY(-8px) scale(1.05)'; this.style.boxShadow='0 25px 60px rgba(0,0,0,0.2)';"
       onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'">
      <i class="bi bi-envelope-fill"></i> Email Me Directly
    </a>
  </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Form submission simulation
  const contactForm = document.querySelector('.contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const btn = this.querySelector('.btn-submit');
      const originalText = btn.innerHTML;
      btn.innerHTML = '<i class="bi bi-arrow-repeat spin"></i> Sending...';
      btn.disabled = true;
      
      setTimeout(() => {
        btn.innerHTML = '<i class="bi bi-check-circle-fill"></i> Message Sent!';
        btn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
        this.reset();
        
        setTimeout(() => {
          btn.innerHTML = originalText;
          btn.style.background = '';
          btn.disabled = false;
        }, 3000);
      }, 1500);
    });
  }
  
  // Add spin animation
  const style = document.createElement('style');
  style.textContent = '.spin { animation: spin 1s linear infinite; } @keyframes spin { to { transform: rotate(360deg); } }';
  document.head.appendChild(style);
  
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
