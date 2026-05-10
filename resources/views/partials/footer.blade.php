<footer id="footer" style="background: #1a1a1a; padding: 60px 20px 30px; position: relative; overflow: hidden;">

  <div style="position: absolute; top: -50%; left: -10%; width: 400px; height: 400px; background: linear-gradient(135deg, #87CEEB, #FFD700); border-radius: 50%; opacity: 0.05; filter: blur(80px);"></div>
  <div style="position: absolute; bottom: -30%; right: -5%; width: 300px; height: 300px; background: linear-gradient(135deg, #FFD700, #87CEEB); border-radius: 50%; opacity: 0.05; filter: blur(60px);"></div>

  <div class="container" style="position: relative; z-index: 1;">
    
    <!-- Footer Top -->
    <div class="row gy-4 mb-4">

      <!-- About -->
      <div class="col-lg-4">
        <div style="margin-bottom: 1.5rem;">
          <a href="{{ route('home') }}" style="display: flex; align-items: center; gap: 0.8rem; text-decoration: none;">
            <img src="{{ asset('assets/img/aku.png') }}" alt="Logo" style="height: 45px; width: auto; border-radius: 10px; border: 2px solid #87CEEB;">
            <span style="font-size: 1.3rem; font-weight: 800; color: white;">MUHAMMAD YAHYA</span>
          </a>
        </div>
        <p style="color: #aaa; line-height: 1.7; font-size: 0.95rem; max-width: 320px;">
          Fullstack Engineer & DevOps Specialist crafting innovative digital solutions with Django, Laravel, and Golang.
        </p>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-2 col-md-4 col-6">
        <h4 style="color: #87CEEB; font-weight: 700; font-size: 1rem; margin-bottom: 1.2rem; text-transform: uppercase; letter-spacing: 1px;">Quick Links</h4>
        <ul style="list-style: none; padding: 0;">
          <li style="margin-bottom: 0.5rem;"><a href="{{ route('home') }}" style="color: #aaa; text-decoration: none; transition: all 0.3s; display: flex; align-items: center; gap: 0.5rem;"><i class="bi bi-chevron-right" style="font-size: 0.7rem;"></i> Home</a></li>
          <li style="margin-bottom: 0.5rem;"><a href="{{ route('page.show', 'about') }}" style="color: #aaa; text-decoration: none; transition: all 0.3s; display: flex; align-items: center; gap: 0.5rem;"><i class="bi bi-chevron-right" style="font-size: 0.7rem;"></i> About</a></li>
          <li style="margin-bottom: 0.5rem;"><a href="{{ route('page.show', 'portfolio') }}" style="color: #aaa; text-decoration: none; transition: all 0.3s; display: flex; align-items: center; gap: 0.5rem;"><i class="bi bi-chevron-right" style="font-size: 0.7rem;"></i> Portfolio</a></li>
          <li style="margin-bottom: 0.5rem;"><a href="{{ route('page.show', 'services') }}" style="color: #aaa; text-decoration: none; transition: all 0.3s; display: flex; align-items: center; gap: 0.5rem;"><i class="bi bi-chevron-right" style="font-size: 0.7rem;"></i> Services</a></li>
          <li style="margin-bottom: 0.5rem;"><a href="{{ route('page.show', 'contact') }}" style="color: #aaa; text-decoration: none; transition: all 0.3s; display: flex; align-items: center; gap: 0.5rem;"><i class="bi bi-chevron-right" style="font-size: 0.7rem;"></i> Contact</a></li>
          <li><a href="{{ route('page.show', 'resume') }}" style="color: #aaa; text-decoration: none; transition: all 0.3s; display: flex; align-items: center; gap: 0.5rem;"><i class="bi bi-chevron-right" style="font-size: 0.7rem;"></i> Resume</a></li>
          <li style="margin-top: 0.3rem;"><a href="/secret-login" style="color: #FFD700; text-decoration: none; transition: all 0.3s; display: flex; align-items: center; gap: 0.5rem; font-weight: 700;"><i class="bi bi-shield-lock-fill" style="color: #FFD700;"></i> Admin Login</a></li>
        </ul>
      </div>

      <!-- Expertise -->
      <div class="col-lg-3 col-md-4 col-6">
        <h4 style="color: #FFD700; font-weight: 700; font-size: 1rem; margin-bottom: 1.2rem; text-transform: uppercase; letter-spacing: 1px;">Expertise</h4>
        <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
          <span style="padding: 0.3rem 0.8rem; background: rgba(135,206,235,0.15); border-radius: 20px; font-size: 0.8rem; color: #87CEEB; font-weight: 600;">Django</span>
          <span style="padding: 0.3rem 0.8rem; background: rgba(135,206,235,0.15); border-radius: 20px; font-size: 0.8rem; color: #87CEEB; font-weight: 600;">Laravel</span>
          <span style="padding: 0.3rem 0.8rem; background: rgba(135,206,235,0.15); border-radius: 20px; font-size: 0.8rem; color: #87CEEB; font-weight: 600;">Golang</span>
          <span style="padding: 0.3rem 0.8rem; background: rgba(255,215,0,0.15); border-radius: 20px; font-size: 0.8rem; color: #FFD700; font-weight: 600;">Docker</span>
          <span style="padding: 0.3rem 0.8rem; background: rgba(255,215,0,0.15); border-radius: 20px; font-size: 0.8rem; color: #FFD700; font-weight: 600;">Linux</span>
          <span style="padding: 0.3rem 0.8rem; background: rgba(255,215,0,0.15); border-radius: 20px; font-size: 0.8rem; color: #FFD700; font-weight: 600;">React Native</span>
          <span style="padding: 0.3rem 0.8rem; background: rgba(135,206,235,0.15); border-radius: 20px; font-size: 0.8rem; color: #87CEEB; font-weight: 600;">Flask</span>
          <span style="padding: 0.3rem 0.8rem; background: rgba(135,206,235,0.15); border-radius: 20px; font-size: 0.8rem; color: #87CEEB; font-weight: 600;">MySQL</span>
        </div>
      </div>

      <!-- Contact Info -->
      <div class="col-lg-3 col-md-4">
        <h4 style="color: white; font-weight: 700; font-size: 1rem; margin-bottom: 1.2rem; text-transform: uppercase; letter-spacing: 1px;">Contact</h4>
        <div style="display: flex; flex-direction: column; gap: 0.8rem;">
          <a href="mailto:sajakcodingan@gmail.com" style="display: flex; align-items: center; gap: 0.8rem; color: #aaa; text-decoration: none; transition: all 0.3s;">
            <div style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #87CEEB, #FFD700); border-radius: 50%; font-size: 0.9rem; color: white;">
              <i class="bi bi-envelope-fill"></i>
            </div>
            <span>sajakcodingan@gmail.com</span>
          </a>
          <a href="https://wa.me/6285184647793" style="display: flex; align-items: center; gap: 0.8rem; color: #aaa; text-decoration: none; transition: all 0.3s;">
            <div style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #87CEEB, #FFD700); border-radius: 50%; font-size: 0.9rem; color: white;">
              <i class="bi bi-telephone-fill"></i>
            </div>
            <span>0851 8464 7793</span>
          </a>
          <div style="display: flex; align-items: center; gap: 0.8rem; color: #aaa;">
            <div style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #87CEEB, #FFD700); border-radius: 50%; font-size: 0.9rem; color: white;">
              <i class="bi bi-geo-alt-fill"></i>
            </div>
            <span>Pamekasan, East Java</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Divider -->
    <hr style="border: none; border-top: 1px solid rgba(255,255,255,0.1); margin: 30px 0;">

    <!-- Footer Bottom -->
    <div class="row align-items-center">
      <div class="col-md-6">
        <p style="color: #777; font-size: 0.9rem; margin: 0;">
          © <span id="footer-year">2026</span> <strong style="color: white;">Muhammad Yahya</strong>. All Rights Reserved.
        </p>
      </div>
      <div class="col-md-6 text-md-end">
        <div class="social-links d-flex justify-content-center justify-content-md-end gap-3" style="margin-top: 0;">
          <a href="#" style="width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.08); border-radius: 50%; color: #87CEEB; font-size: 1.1rem; transition: all 0.4s cubic-bezier(0.68,-0.55,0.265,1.55);"
             onmouseover="this.style.background='linear-gradient(135deg,#87CEEB,#FFD700)'; this.style.color='white'; this.style.transform='translateY(-6px) scale(1.1)';"
             onmouseout="this.style.background='rgba(255,255,255,0.08)'; this.style.color='#87CEEB'; this.style.transform='translateY(0) scale(1)';">
            <i class="bi bi-twitter-x"></i>
          </a>
          <a href="#" style="width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.08); border-radius: 50%; color: #87CEEB; font-size: 1.1rem; transition: all 0.4s cubic-bezier(0.68,-0.55,0.265,1.55);"
             onmouseover="this.style.background='linear-gradient(135deg,#87CEEB,#FFD700)'; this.style.color='white'; this.style.transform='translateY(-6px) scale(1.1)';"
             onmouseout="this.style.background='rgba(255,255,255,0.08)'; this.style.color='#87CEEB'; this.style.transform='translateY(0) scale(1)';">
            <i class="bi bi-facebook"></i>
          </a>
          <a href="#" style="width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.08); border-radius: 50%; color: #87CEEB; font-size: 1.1rem; transition: all 0.4s cubic-bezier(0.68,-0.55,0.265,1.55);"
             onmouseover="this.style.background='linear-gradient(135deg,#87CEEB,#FFD700)'; this.style.color='white'; this.style.transform='translateY(-6px) scale(1.1)';"
             onmouseout="this.style.background='rgba(255,255,255,0.08)'; this.style.color='#87CEEB'; this.style.transform='translateY(0) scale(1)';">
            <i class="bi bi-instagram"></i>
          </a>
          <a href="#" style="width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.08); border-radius: 50%; color: #87CEEB; font-size: 1.1rem; transition: all 0.4s cubic-bezier(0.68,-0.55,0.265,1.55);"
             onmouseover="this.style.background='linear-gradient(135deg,#87CEEB,#FFD700)'; this.style.color='white'; this.style.transform='translateY(-6px) scale(1.1)';"
             onmouseout="this.style.background='rgba(255,255,255,0.08)'; this.style.color='#87CEEB'; this.style.transform='translateY(0) scale(1)';">
            <i class="bi bi-linkedin"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Back to Top -->
    <div style="text-align: center; margin-top: 30px;">
      <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 45px; height: 45px; background: rgba(255,255,255,0.08); border-radius: 50%; color: #87CEEB; font-size: 1.2rem; transition: all 0.3s; text-decoration: none;"
         onmouseover="this.style.background='linear-gradient(135deg,#87CEEB,#FFD700)'; this.style.color='white';"
         onmouseout="this.style.background='rgba(255,255,255,0.08)'; this.style.color='#87CEEB';">
        <i class="bi bi-arrow-up-short"></i>
      </a>
    </div>
  </div>
</footer>

<!-- Scroll Top Button (for main layout) -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"
   style="position: fixed; bottom: 30px; right: 30px; width: 48px; height: 48px; background: linear-gradient(135deg, #87CEEB, #FFD700); color: white; border-radius: 50%; z-index: 999; box-shadow: 0 8px 25px rgba(135,206,235,0.4); transition: all 0.3s; opacity: 0; visibility: hidden;">
  <i class="bi bi-arrow-up-short" style="font-size: 1.5rem;"></i>
</a>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Scroll to Top visibility
  const scrollTop = document.getElementById('scroll-top');
  if (scrollTop) {
    window.addEventListener('scroll', function() {
      if (window.scrollY > 400) {
        scrollTop.style.opacity = '1';
        scrollTop.style.visibility = 'visible';
      } else {
        scrollTop.style.opacity = '0';
        scrollTop.style.visibility = 'hidden';
      }
    });
    
    scrollTop.addEventListener('click', function(e) {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }
  
  // Set footer year
  document.getElementById('footer-year').textContent = new Date().getFullYear();
});
</script>