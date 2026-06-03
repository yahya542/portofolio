#!/usr/bin/env python3
"""Generate static HTML pages from template."""

HEADER_TEMPLATE = '''<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{title}</title>
  <meta name="description" content="{description}">
  <meta name="keywords" content="Portfolio, Projects, Web Development, Design, Muhammad Yahya">
  <link href="assets/img/aku.png" rel="icon" type="image/png">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
  {extra_styles}
</head>
<body class="{body_class}">
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between" style="background: rgba(255,255,255,0.9); backdrop-filter: blur(20px); padding: 1rem 2rem; border-bottom: 3px solid #87CEEB; box-shadow: 0 10px 40px rgba(135,206,235,0.15);">
      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0" style="transition: transform 0.4s cubic-bezier(0.68,-0.55,0.265,1.55);" onmouseover="this.style.transform='rotate(-10deg) scale(1.1)'" onmouseout="this.style.transform='rotate(0) scale(1)'">
        <img src="assets/img/aku.png" alt="Logo" style="height: 60px; width: auto; border-radius: 12px; box-shadow: 0 8px 30px rgba(135,206,235,0.3); margin-right: 0.5rem;">
        <img src="assets/img/sc.png" alt="Logo" style="height: 60px; width: auto; border-radius: 12px; box-shadow: 0 8px 30px rgba(135,206,235,0.3);">
      </a>
      <h3> <span style="color: orange">welcome to my portofolio </span> || <span style="color: #87CEEB;">Sajak</span><span style="color: #FFD700;">Codingan</span></h3>
      <nav id="navmenu" class="navmenu">
        <ul style="display: flex; list-style: none; gap: 0.5rem; align-items: center;">
          {nav_items}
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list" style="font-size: 1.8rem; cursor: pointer; transition: transform 0.3s;" onmouseover="this.style.color='#87CEEB'; this.style.transform='rotate(90deg)'" onmouseout="this.style.color='#1a1a1a'; this.style.transform='rotate(0)'"></i>
      </nav>
      <div class="header-social-links" style="display: flex; gap: 0.8rem; margin-left: 1rem;">
        <a href="#" class="twitter" style="width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; background: white; border-radius: 50%; color: #87CEEB; box-shadow: 0 10px 30px rgba(135,206,235,0.2); transition: all 0.4s cubic-bezier(0.68,-0.55,0.265,1.55); border: 2px solid transparent;" onmouseover="this.style.background='linear-gradient(135deg,#87CEEB 0%,#FFD700 100%)'; this.style.color='white'; this.style.transform='translateY(-5px) rotate(360deg) scale(1.1)'; this.style.borderColor='#FFD700'" onmouseout="this.style.background='white'; this.style.color='#87CEEB'; this.style.transform='translateY(0) rotate(0) scale(1)'; this.style.borderColor='transparent'"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="facebook" style="width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; background: white; border-radius: 50%; color: #87CEEB; box-shadow: 0 10px 30px rgba(135,206,235,0.2); transition: all 0.4s cubic-bezier(0.68,-0.55,0.265,1.55); border: 2px solid transparent;" onmouseover="this.style.background='linear-gradient(135deg,#87CEEB 0%,#FFD700 100%)'; this.style.color='white'; this.style.transform='translateY(-5px) rotate(360deg) scale(1.1)'; this.style.borderColor='#FFD700'" onmouseout="this.style.background='white'; this.style.color='#87CEEB'; this.style.transform='translateY(0) rotate(0) scale(1)'; this.style.borderColor='transparent'"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram" style="width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; background: white; border-radius: 50%; color: #87CEEB; box-shadow: 0 10px 30px rgba(135,206,235,0.2); transition: all 0.4s cubic-bezier(0.68,-0.55,0.265,1.55); border: 2px solid transparent;" onmouseover="this.style.background='linear-gradient(135deg,#87CEEB 0%,#FFD700 100%)'; this.style.color='white'; this.style.transform='translateY(-5px) rotate(360deg) scale(1.1)'; this.style.borderColor='#FFD700'" onmouseout="this.style.background='white'; this.style.color='#87CEEB'; this.style.transform='translateY(0) rotate(0) scale(1)'; this.style.borderColor='transparent'"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin" style="width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; background: white; border-radius: 50%; color: #87CEEB; box-shadow: 0 10px 30px rgba(135,206,235,0.2); transition: all 0.4s cubic-bezier(0.68,-0.55,0.265,1.55); border: 2px solid transparent;" onmouseover="this.style.background='linear-gradient(135deg,#87CEEB 0%,#FFD700 100%)'; this.style.color='white'; this.style.transform='translateY(-5px) rotate(360deg) scale(1.1)'; this.style.borderColor='#FFD700'" onmouseout="this.style.background='white'; this.style.color='#87CEEB'; this.style.transform='translateY(0) rotate(0) scale(1)'; this.style.borderColor='transparent'"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </header>
  <main class="main">
'''

NAV_LINKS = [
    ('Home', 'index.html', 'home'),
    ('About', 'about.html', 'about'),
    ('Resume', 'resume.html', 'resume'),
    ('Portfolio', 'portfolio.html', 'portfolio'),
    ('Certificates', 'certificates.html', 'certificates'),
    ('Pricing', 'pricing.html', 'pricing'),
    ('Contact', 'contact.html', 'contact'),
]

EXPERIENCE_DROPDOWN = '''<li class="dropdown"><a href="#" onclick="return false;" style="position: relative; padding: 0.6rem 1.2rem; font-weight: 600; color: #1a1a1a; border-radius: 50px; transition: all 0.3s ease; overflow: hidden; display: inline-block;" onmouseover="this.style.background='linear-gradient(135deg,#87CEEB 0%,#FFD700 100%)'; this.style.color='white'; this.style.transform='translateY(-2px)';" onmouseout="this.style.background='transparent'; this.style.color='#1a1a1a'; this.style.transform='translateY(0)'"><span>Experience</span><i class="bi bi-chevron-down toggle-dropdown" style="margin-left: 0.3rem; transition: transform 0.3s;"></i></a><ul style="position: absolute; top: 100%; left: 0; background: white; border-radius: 16px; box-shadow: 0 20px 60px rgba(135,206,235,0.2); padding: 0.5rem; min-width: 200px; opacity: 0; visibility: hidden; transform: translateY(10px); transition: all 0.3s ease;"><li style="list-style: none;"><a href="#" style="display: block; padding: 0.6rem 1rem; color: #666; border-radius: 12px; transition: all 0.2s;" onmouseover="this.style.background='#87CEEB'; this.style.color='white';" onmouseout="this.style.background='transparent'; this.style.color='#666'">Cloud &amp; DevOps</a></li><li style="list-style: none;"><a href="#" style="display: block; padding: 0.6rem 1rem; color: #666; border-radius: 12px; transition: all 0.2s;" onmouseover="this.style.background='#87CEEB'; this.style.color='white';" onmouseout="this.style.background='transparent'; this.style.color='#666'">Backend Engineer</a></li><li style="list-style: none;"><a href="#" style="display: block; padding: 0.6rem 1rem; color: #666; border-radius: 12px; transition: all 0.2s;" onmouseover="this.style.background='#87CEEB'; this.style.color='white';" onmouseout="this.style.background='transparent'; this.style.color='#666'">Mentoring</a></li></ul></li>'''

FOOTER_AND_SCRIPTS = '''
  </main>
  <footer id="footer" style="background: #1a1a1a; padding: 60px 20px 30px; position: relative; overflow: hidden;">
    <div style="position: absolute; top: -50%; left: -10%; width: 400px; height: 400px; background: linear-gradient(135deg, #87CEEB, #FFD700); border-radius: 50%; opacity: 0.05; filter: blur(80px);"></div>
    <div style="position: absolute; bottom: -30%; right: -5%; width: 300px; height: 300px; background: linear-gradient(135deg, #FFD700, #87CEEB); border-radius: 50%; opacity: 0.05; filter: blur(60px);"></div>
    <div class="container" style="position: relative; z-index: 1;">
      <div class="row gy-4 mb-4">
        <div class="col-lg-4"><div style="margin-bottom: 1.5rem;"><a href="index.html" style="display: flex; align-items: center; gap: 0.8rem; text-decoration: none;"><img src="assets/img/aku.png" alt="Logo" style="height: 45px; width: auto; border-radius: 10px; border: 2px solid #87CEEB;"><span style="font-size: 1.3rem; font-weight: 800; color: white;">MUHAMMAD YAHYA</span></a></div><p style="color: #aaa; line-height: 1.7; font-size: 0.95rem; max-width: 320px;">Fullstack Engineer &amp; DevOps Specialist crafting innovative solutions with Django, Laravel, and Golang.</p></div>
        <div class="col-lg-2 col-md-4 col-6"><h4 style="color: #87CEEB; font-weight: 700; font-size: 1rem; margin-bottom: 1.2rem; text-transform: uppercase; letter-spacing: 1px;">Quick Links</h4><ul style="list-style: none; padding: 0;"><li style="margin-bottom: 0.5rem;"><a href="index.html" style="color: #aaa; text-decoration: none; transition: all 0.3s; display: flex; align-items: center; gap: 0.5rem;"><i class="bi bi-chevron-right" style="font-size: 0.7rem;"></i> Home</a></li><li style="margin-bottom: 0.5rem;"><a href="about.html" style="color: #aaa; text-decoration: none; transition: all 0.3s; display: flex; align-items: center; gap: 0.5rem;"><i class="bi bi-chevron-right" style="font-size: 0.7rem;"></i> About</a></li><li style="margin-bottom: 0.5rem;"><a href="portfolio.html" style="color: #aaa; text-decoration: none; transition: all 0.3s; display: flex; align-items: center; gap: 0.5rem;"><i class="bi bi-chevron-right" style="font-size: 0.7rem;"></i> Portfolio</a></li><li style="margin-bottom: 0.5rem;"><a href="services.html" style="color: #aaa; text-decoration: none; transition: all 0.3s; display: flex; align-items: center; gap: 0.5rem;"><i class="bi bi-chevron-right" style="font-size: 0.7rem;"></i> Services</a></li><li style="margin-bottom: 0.5rem;"><a href="contact.html" style="color: #aaa; text-decoration: none; transition: all 0.3s; display: flex; align-items: center; gap: 0.5rem;"><i class="bi bi-chevron-right" style="font-size: 0.7rem;"></i> Contact</a></li><li><a href="resume.html" style="color: #aaa; text-decoration: none; transition: all 0.3s; display: flex; align-items: center; gap: 0.5rem;"><i class="bi bi-chevron-right" style="font-size: 0.7rem;"></i> Resume</a></li></ul></div>
        <div class="col-lg-3 col-md-4 col-6"><h4 style="color: #FFD700; font-weight: 700; font-size: 1rem; margin-bottom: 1.2rem; text-transform: uppercase; letter-spacing: 1px;">Expertise</h4><div style="display: flex; flex-wrap: wrap; gap: 0.5rem;"><span style="padding: 0.3rem 0.8rem; background: rgba(135,206,235,0.15); border-radius: 20px; font-size: 0.8rem; color: #87CEEB; font-weight: 600;">Django</span><span style="padding: 0.3rem 0.8rem; background: rgba(135,206,235,0.15); border-radius: 20px; font-size: 0.8rem; color: #87CEEB; font-weight: 600;">Laravel</span><span style="padding: 0.3rem 0.8rem; background: rgba(135,206,235,0.15); border-radius: 20px; font-size: 0.8rem; color: #87CEEB; font-weight: 600;">Golang</span><span style="padding: 0.3rem 0.8rem; background: rgba(255,215,0,0.15); border-radius: 20px; font-size: 0.8rem; color: #FFD700; font-weight: 600;">Docker</span><span style="padding: 0.3rem 0.8rem; background: rgba(255,215,0,0.15); border-radius: 20px; font-size: 0.8rem; color: #FFD700; font-weight: 600;">Linux</span><span style="padding: 0.3rem 0.8rem; background: rgba(255,215,0,0.15); border-radius: 20px; font-size: 0.8rem; color: #FFD700; font-weight: 600;">React Native</span><span style="padding: 0.3rem 0.8rem; background: rgba(135,206,235,0.15); border-radius: 20px; font-size: 0.8rem; color: #87CEEB; font-weight: 600;">Flask</span><span style="padding: 0.3rem 0.8rem; background: rgba(135,206,235,0.15); border-radius: 20px; font-size: 0.8rem; color: #87CEEB; font-weight: 600;">MySQL</span></div></div>
        <div class="col-lg-3 col-md-4"><h4 style="color: white; font-weight: 700; font-size: 1rem; margin-bottom: 1.2rem; text-transform: uppercase; letter-spacing: 1px;">Contact</h4><div style="display: flex; flex-direction: column; gap: 0.8rem;"><a href="mailto:sajakcodingan@gmail.com" style="display: flex; align-items: center; gap: 0.8rem; color: #aaa; text-decoration: none; transition: all 0.3s;"><div style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #87CEEB, #FFD700); border-radius: 50%; font-size: 0.9rem; color: white;"><i class="bi bi-envelope-fill"></i></div><span>sajakcodingan@gmail.com</span></a><a href="https://wa.me/6285184647793" style="display: flex; align-items: center; gap: 0.8rem; color: #aaa; text-decoration: none; transition: all 0.3s;"><div style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #87CEEB, #FFD700); border-radius: 50%; font-size: 0.9rem; color: white;"><i class="bi bi-telephone-fill"></i></div><span>0851 8464 7793</span></a><div style="display: flex; align-items: center; gap: 0.8rem; color: #aaa;"><div style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #87CEEB, #FFD700); border-radius: 50%; font-size: 0.9rem; color: white;"><i class="bi bi-geo-alt-fill"></i></div><span>Pamekasan, East Java</span></div></div></div>
      </div>
      <hr style="border: none; border-top: 1px solid rgba(255,255,255,0.1); margin: 30px 0;">
      <div class="row align-items-center"><div class="col-md-6"><p style="color: #777; font-size: 0.9rem; margin: 0;">&copy; <span id="footer-year">2026</span> <strong style="color: white;">Muhammad Yahya</strong>. All Rights Reserved.</p></div><div class="col-md-6 text-md-end"><div class="social-links d-flex justify-content-center justify-content-md-end gap-3" style="margin-top: 0;"><a href="#" style="width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.08); border-radius: 50%; color: #87CEEB; font-size: 1.1rem; transition: all 0.4s cubic-bezier(0.68,-0.55,0.265,1.55);" onmouseover="this.style.background='linear-gradient(135deg,#87CEEB,#FFD700)'; this.style.color='white'; this.style.transform='translateY(-6px) scale(1.1)';" onmouseout="this.style.background='rgba(255,255,255,0.08)'; this.style.color='#87CEEB'; this.style.transform='translateY(0) scale(1)';"><i class="bi bi-twitter-x"></i></a><a href="#" style="width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.08); border-radius: 50%; color: #87CEEB; font-size: 1.1rem; transition: all 0.4s cubic-bezier(0.68,-0.55,0.265,1.55);" onmouseover="this.style.background='linear-gradient(135deg,#87CEEB,#FFD700)'; this.style.color='white'; this.style.transform='translateY(-6px) scale(1.1)';" onmouseout="this.style.background='rgba(255,255,255,0.08)'; this.style.color='#87CEEB'; this.style.transform='translateY(0) scale(1)';"><i class="bi bi-facebook"></i></a><a href="#" style="width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.08); border-radius: 50%; color: #87CEEB; font-size: 1.1rem; transition: all 0.4s cubic-bezier(0.68,-0.55,0.265,1.55);" onmouseover="this.style.background='linear-gradient(135deg,#87CEEB,#FFD700)'; this.style.color='white'; this.style.transform='translateY(-6px) scale(1.1)';" onmouseout="this.style.background='rgba(255,255,255,0.08)'; this.style.color='#87CEEB'; this.style.transform='translateY(0) scale(1)';"><i class="bi bi-instagram"></i></a><a href="#" style="width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.08); border-radius: 50%; color: #87CEEB; font-size: 1.1rem; transition: all 0.4s cubic-bezier(0.68,-0.55,0.265,1.55);" onmouseover="this.style.background='linear-gradient(135deg,#87CEEB,#FFD700)'; this.style.color='white'; this.style.transform='translateY(-6px) scale(1.1)';" onmouseout="this.style.background='rgba(255,255,255,0.08)'; this.style.color='#87CEEB'; this.style.transform='translateY(0) scale(1)';"><i class="bi bi-linkedin"></i></a></div></div></div>
      <div style="text-align: center; margin-top: 30px;"><a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 45px; height: 45px; background: rgba(255,255,255,0.08); border-radius: 50%; color: #87CEEB; font-size: 1.2rem; transition: all 0.3s; text-decoration: none;" onmouseover="this.style.background='linear-gradient(135deg,#87CEEB,#FFD700)'; this.style.color='white';" onmouseout="this.style.background='rgba(255,255,255,0.08)'; this.style.color='#87CEEB';"><i class="bi bi-arrow-up-short"></i></a></div>
    </div>
  </footer>
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/js/main.js"></script>
  {extra_scripts}
</body>
</html>
'''

COMMON_SCRIPT = '''<script>
  document.addEventListener('DOMContentLoaded', function() {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => { if (entry.isIntersecting) { entry.target.classList.add('visible'); } });
    }, { threshold: 0.1 });
    document.querySelectorAll('.fade-in-up').forEach(el => observer.observe(el));
    document.getElementById('footer-year').textContent = new Date().getFullYear();
    const scrollTop = document.getElementById('scroll-top');
    if (scrollTop) {
      window.addEventListener('scroll', function() { scrollTop.style.opacity = window.scrollY > 400 ? '1' : '0'; scrollTop.style.visibility = window.scrollY > 400 ? 'visible' : 'hidden'; });
      scrollTop.addEventListener('click', function(e) { e.preventDefault(); window.scrollTo({ top: 0, behavior: 'smooth' }); });
    }
  });
</script>'''

def make_nav(active_slug):
    items = []
    nav_style = "position: relative; padding: 0.6rem 1.2rem; font-weight: 600; color: #1a1a1a; border-radius: 50px; transition: all 0.3s ease; overflow: hidden; display: inline-block;"
    hover_on = "this.style.background='linear-gradient(135deg,#87CEEB 0%,#FFD700 100%)'; this.style.color='white'; this.style.transform='translateY(-2px)';"
    hover_off = "this.style.background='transparent'; this.style.color='#1a1a1a'; this.style.transform='translateY(0)'"
    for name, href, slug in NAV_LINKS:
        if slug == active_slug:
            items.append(f'<li><a href="{href}" class="active" style="{nav_style}" onmouseover="{hover_on}" onmouseout="{hover_off}"><span>{name}</span><span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 60%; height: 3px; background: #FFD700; border-radius: 2px;"></span></a></li>')
        else:
            items.append(f'<li><a href="{href}" style="{nav_style}" onmouseover="{hover_on}" onmouseout="{hover_off}"><span>{name}</span></a></li>')
    # Insert experience dropdown before Contact
    items.insert(-1, EXPERIENCE_DROPDOWN)
    return '\n          '.join(items)

def generate_page(filename, title, description, body_class, content, extra_styles='', extra_scripts=''):
    nav = make_nav(body_class.replace('-page', ''))
    scripts = extra_scripts + '\n' + COMMON_SCRIPT
    html = HEADER_TEMPLATE.format(
        title=title, description=description, body_class=body_class,
        nav_items=nav, extra_styles=extra_styles
    ) + content + FOOTER_AND_SCRIPTS.format(extra_scripts=scripts)
    with open(filename, 'w') as f:
        f.write(html)
    print(f"Generated {filename}")

# === PORTFOLIO PAGE ===
PORTFOLIO_STYLES = '''<style>
  .portfolio-hero { padding: 140px 20px 80px; background: linear-gradient(135deg, #FFFFFF 0%, #E3F2FD 100%); text-align: center; position: relative; overflow: hidden; }
  .portfolio-hero::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2387CEEB' fill-opacity='0.08'%3E%3Cpath d='M40 0l40 40-40 40L0 40z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E"); }
  .portfolio-hero h1 { font-size: clamp(2.5rem, 8vw, 5rem); font-weight: 900; background: linear-gradient(135deg, #1a1a1a, #444); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1rem; position: relative; }
  .portfolio-hero p { font-size: 1.2rem; color: #666; max-width: 600px; margin: 0 auto 2rem; position: relative; }
  .portfolio-filters { display: flex; justify-content: center; flex-wrap: wrap; gap: 0.8rem; margin-bottom: 3rem; position: relative; }
  .filter-btn { padding: 0.7rem 1.5rem; background: white; border: 2px solid #E3F2FD; color: #87CEEB; border-radius: 50px; font-weight: 700; font-size: 0.9rem; cursor: pointer; transition: all 0.3s ease; }
  .filter-btn:hover, .filter-btn.active { background: linear-gradient(135deg, #87CEEB, #FFD700); color: white; border-color: transparent; transform: translateY(-3px); box-shadow: 0 10px 30px rgba(135,206,235,0.3); }
  .bento-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 2rem; margin-bottom: 4rem; }
  .project-card { position: relative; border-radius: 28px; overflow: hidden; box-shadow: 0 25px 70px rgba(135,206,235,0.15); transition: all 0.6s cubic-bezier(0.22, 1, 0.36, 1); cursor: pointer; }
  .project-card::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(135,206,235,0.9) 0%, rgba(255,215,0,0.8) 100%); opacity: 0; z-index: 1; transition: opacity 0.5s ease; }
  .project-card:hover::before { opacity: 1; }
  .project-card:hover { transform: translateY(-20px) scale(1.02) rotate(1deg); box-shadow: 0 40px 100px rgba(135,206,235,0.3); }
  .project-img-wrapper { position: relative; overflow: hidden; height: 280px; }
  .project-img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease; }
  .project-card:hover .project-img { transform: scale(1.15) rotate(2deg); }
  .project-category { position: absolute; top: 20px; left: 20px; padding: 0.5rem 1.2rem; background: rgba(255, 255, 255, 0.95); color: #87CEEB; border-radius: 50px; font-size: 0.8rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; z-index: 2; backdrop-filter: blur(10px); transition: all 0.4s ease; }
  .project-card:hover .project-category { background: #1a1a1a; color: white; transform: translateY(-5px); }
  .project-content { position: absolute; bottom: 0; left: 0; right: 0; padding: 2rem; background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0) 100%); color: white; transform: translateY(30px); opacity: 0; transition: all 0.5s ease; z-index: 2; }
  .project-card:hover .project-content { transform: translateY(0); opacity: 1; }
  .project-title { font-size: 1.4rem; font-weight: 800; margin-bottom: 0.5rem; }
  .project-desc { font-size: 0.95rem; opacity: 0.9; line-height: 1.5; margin-bottom: 1rem; }
  .project-tags { display: flex; gap: 0.5rem; flex-wrap: wrap; }
  .project-tag { padding: 0.3rem 0.8rem; background: rgba(255,255,255,0.2); border-radius: 20px; font-size: 0.75rem; font-weight: 600; backdrop-filter: blur(5px); }
  .project-link { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) scale(0); width: 60px; height: 60px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #87CEEB; font-size: 1.5rem; z-index: 3; transition: all 0.5s cubic-bezier(0.68,-0.55,0.265,1.55); box-shadow: 0 10px 40px rgba(0,0,0,0.2); }
  .project-card:hover .project-link { transform: translate(-50%, -50%) scale(1); }
  .project-link:hover { background: #FFD700; color: #1a1a1a; transform: translate(-50%, -50%) scale(1.1) rotate(90deg); }
  @media (max-width: 768px) { .portfolio-hero { padding: 100px 15px 60px; } .bento-grid { grid-template-columns: 1fr; } .project-card:hover { transform: translateY(-10px) scale(1) rotate(0); } }
</style>'''

PORTFOLIO_ITEMS = [
    ('Studora (API Integration)', 'Backend', 'filter-app', 'assets/img/portfolio/studora.png', 'Full-stack application with API integration for educational platform'),
    ('Corporate Website', 'DevOps', 'filter-product', 'assets/img/masonry-portfolio/masonry-portfolio-2.jpg', 'Modern corporate website with responsive design and CMS integration'),
    ('Brand Identity', 'Frontend', 'filter-branding', 'assets/img/masonry-portfolio/masonry-portfolio-3.jpg', 'Complete brand identity package including logo and marketing materials'),
    ('Task Management App', 'Backend', 'filter-app', 'assets/img/masonry-portfolio/masonry-portfolio-4.jpg', 'Productivity application for teams with real-time collaboration features'),
    ('Restaurant Website', 'DevOps', 'filter-product', 'assets/img/masonry-portfolio/masonry-portfolio-5.jpg', 'Interactive restaurant website with online ordering system'),
    ('Mobile App UI', 'Frontend', 'filter-branding', 'assets/img/masonry-portfolio/masonry-portfolio-6.jpg', 'User interface design for a fitness tracking mobile application'),
    ('Finance Dashboard', 'Backend', 'filter-app', 'assets/img/masonry-portfolio/masonry-portfolio-7.jpg', 'Data visualization dashboard for financial analytics and reporting'),
    ('E-Learning Platform', 'DevOps', 'filter-product', 'assets/img/masonry-portfolio/masonry-portfolio-8.jpg', 'Comprehensive online learning platform with course management'),
    ('Social Media Graphics', 'Frontend', 'filter-branding', 'assets/img/masonry-portfolio/masonry-portfolio-9.jpg', 'Collection of social media graphics and promotional materials'),
]

cards = ''
for title, cat, slug, img, desc in PORTFOLIO_ITEMS:
    cards += f'''      <div class="project-card {slug} fade-in-up" style="border-radius: 28px; overflow: hidden;">
        <div class="project-img-wrapper">
          <span class="project-category">{cat}</span>
          <img src="{img}" alt="{title}" class="project-img">
          <a href="{img}" class="glightbox project-link" title="{title}"><i class="bi bi-zoom-in"></i></a>
        </div>
        <div class="project-content">
          <h3 class="project-title">{title}</h3>
          <p class="project-desc">{desc}</p>
          <div class="project-tags"><span class="project-tag">{cat}</span></div>
        </div>
      </div>
'''

PORTFOLIO_CONTENT = f'''<section class="portfolio-hero">
  <div class="container">
    <h1>My Portfolio</h1>
    <p>A collection of projects that showcase my passion for building scalable, efficient, and elegant solutions.</p>
    <div class="portfolio-filters">
      <button class="filter-btn active" data-filter="*">All Projects</button>
      <button class="filter-btn" data-filter=".filter-app">Backend</button>
      <button class="filter-btn" data-filter=".filter-product">DevOps</button>
      <button class="filter-btn" data-filter=".filter-branding">Frontend</button>
    </div>
  </div>
</section>
<section id="portfolio" style="padding: 60px 20px; background: white;">
  <div class="container">
    <div class="bento-grid">
{cards}    </div>
  </div>
</section>'''

PORTFOLIO_SCRIPTS = '''<script>
document.addEventListener('DOMContentLoaded', function() {
  const filterBtns = document.querySelectorAll('.filter-btn');
  const projectCards = document.querySelectorAll('.project-card');
  filterBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      filterBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      const filter = this.getAttribute('data-filter');
      projectCards.forEach(card => {
        if (filter === '*' || card.classList.contains(filter.replace('.', ''))) {
          card.style.display = 'block';
          card.style.animation = 'fadeInUp 0.6s ease forwards';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
});
</script>'''

generate_page('portfolio.html', 'Portfolio - Muhammad Yahya | Creative Projects',
    'Explore my portfolio of innovative projects in backend development, DevOps, and fullstack applications.',
    'portfolio-page', PORTFOLIO_CONTENT, PORTFOLIO_STYLES, PORTFOLIO_SCRIPTS)

# === SERVICES PAGE ===
SERVICES_STYLES = '''<style>
  .services-hero { padding: 140px 20px 80px; background: linear-gradient(135deg, #E3F2FD 0%, #B3E5FC 100%); text-align: center; position: relative; overflow: hidden; }
  .services-hero h1 { font-size: clamp(2.5rem, 8vw, 5rem); font-weight: 900; background: linear-gradient(135deg, #1a1a1a, #444); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1rem; position: relative; }
  .services-hero p { font-size: 1.2rem; color: #666; max-width: 650px; margin: 0 auto 3rem; position: relative; }
  .services-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; padding: 4rem 1rem; max-width: 1300px; margin: 0 auto; }
  .service-card { background: white; border-radius: 26px; padding: 2.5rem 2rem; box-shadow: 0 20px 60px rgba(135,206,235,0.12); transition: all 0.6s cubic-bezier(0.22, 1, 0.36, 1); position: relative; border: 3px solid #E3F2FD; text-align: center; }
  .service-card::before { content: ''; position: absolute; top: -3px; left: -3px; right: -3px; bottom: -3px; background: linear-gradient(135deg, #87CEEB, #FFD700); border-radius: 29px; opacity: 0; z-index: -1; transition: opacity 0.4s ease; }
  .service-card:hover::before { opacity: 1; }
  .service-card:hover { transform: translateY(-15px) rotate(0.5deg); box-shadow: 0 35px 90px rgba(135,206,235,0.2); border-color: transparent; }
  .service-icon { width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #87CEEB, #FFD700); border-radius: 50%; color: white; font-size: 2rem; margin: 0 auto 1.5rem; transition: all 0.5s cubic-bezier(0.68,-0.55,0.265,1.55); box-shadow: 0 10px 30px rgba(135,206,235,0.3); }
  .service-card:hover .service-icon { transform: rotate(360deg) scale(1.15); }
  .service-title { font-size: 1.3rem; font-weight: 800; margin-bottom: 1rem; color: #1a1a1a; }
  .service-desc { color: #666; line-height: 1.7; margin-bottom: 1.5rem; }
  .service-badge { display: inline-block; padding: 0.4rem 1.2rem; background: #E3F2FD; color: #87CEEB; border-radius: 20px; font-size: 0.8rem; font-weight: 700; }
  .service-card:hover .service-badge { background: #1a1a1a; color: white; }
  @media (max-width: 768px) { .services-grid { grid-template-columns: 1fr; } .services-hero { padding: 100px 15px 60px; } }
</style>'''

CERT_ITEMS = [
    ('Python Programming Fundamentals', 'Certificate of completion for foundational Python programming concepts including data structures, algorithms, and object-oriented programming.', 'Jan 2024'),
    ('Full Stack Web Development', 'Advanced certification covering frontend and backend technologies including HTML, CSS, JavaScript, Node.js, and database management.', 'Mar 2024'),
    ('Artificial Intelligence Fundamentals', 'Specialized training in machine learning concepts, neural networks, and practical AI implementation using Python frameworks.', 'May 2024'),
    ('Cloud Computing Essentials', 'Comprehensive course on cloud infrastructure, deployment strategies, and scalable application architecture on major cloud platforms.', 'Jul 2024'),
]

svc_cards = ''
for title, desc, date in CERT_ITEMS:
    svc_cards += f'''      <div class="service-card fade-in-up" style="border-radius: 26px;">
        <div class="service-icon"><i class="bi bi-award"></i></div>
        <h3 class="service-title">{title}</h3>
        <p class="service-desc">{desc}</p>
        <span class="service-badge">{date}</span>
      </div>
'''

SERVICES_CONTENT = f'''<section class="services-hero">
  <div class="container">
    <h1>My Services</h1>
    <p>Specialized expertise in modern web technologies, cloud infrastructure, and scalable system architecture.</p>
  </div>
</section>
<section class="services-section" style="padding: 40px 20px 80px; background: white;">
  <div class="container">
    <div class="services-grid">
{svc_cards}    </div>
  </div>
</section>'''

generate_page('services.html', 'Services & Expertise - Muhammad Yahya',
    'Explore my professional services: Backend Development, DevOps, System Administration, and Technical Consulting.',
    'services-page', SERVICES_CONTENT, SERVICES_STYLES)

# === CONTACT PAGE ===
CONTACT_STYLES = '''<style>
  .contact-hero { padding: 140px 20px 60px; background: linear-gradient(135deg, #E3F2FD 0%, #FFFFFF 100%); text-align: center; position: relative; overflow: hidden; }
  .contact-hero h1 { font-size: clamp(2.5rem, 8vw, 5rem); font-weight: 900; background: linear-gradient(135deg, #1a1a1a, #444); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1rem; position: relative; }
  .contact-hero p { font-size: 1.2rem; color: #666; max-width: 600px; margin: 0 auto 3rem; position: relative; }
  .contact-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 4rem; position: relative; }
  .contact-card { background: white; padding: 2rem; border-radius: 24px; box-shadow: 0 15px 50px rgba(135,206,235,0.1); transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1); text-align: center; position: relative; border: 3px solid #E3F2FD; }
  .contact-card::before { content: ''; position: absolute; top: -3px; left: -3px; right: -3px; bottom: -3px; background: linear-gradient(135deg, #87CEEB, #FFD700); border-radius: 27px; opacity: 0; z-index: -1; transition: opacity 0.4s ease; }
  .contact-card:hover::before { opacity: 1; }
  .contact-card:hover { transform: translateY(-12px) scale(1.02); box-shadow: 0 30px 80px rgba(135,206,235,0.2); border-color: transparent; }
  .contact-icon { width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #87CEEB, #FFD700); border-radius: 50%; color: white; font-size: 1.8rem; margin: 0 auto 1.2rem; transition: all 0.5s cubic-bezier(0.68,-0.55,0.265,1.55); }
  .contact-card:hover .contact-icon { transform: rotate(360deg) scale(1.15); }
  .contact-card h4 { font-size: 1.2rem; font-weight: 800; margin-bottom: 0.5rem; color: #1a1a1a; }
  .contact-card p { color: #666; font-size: 1rem; }
  .contact-form-section { padding: 80px 0; background: linear-gradient(180deg, #FFFFFF 0%, #E3F2FD 100%); }
  .contact-form-wrapper { max-width: 900px; margin: 0 auto; background: white; border-radius: 32px; padding: 3rem; box-shadow: 0 40px 120px rgba(135,206,235,0.15); position: relative; overflow: hidden; }
  .contact-form-wrapper::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 8px; background: linear-gradient(90deg, #87CEEB, #FFD700, #87CEEB); }
  .form-title { text-align: center; font-size: clamp(1.8rem, 4vw, 2.5rem); font-weight: 900; margin-bottom: 0.5rem; background: linear-gradient(135deg, #1a1a1a, #444); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
  .form-subtitle { text-align: center; color: #666; margin-bottom: 2.5rem; font-size: 1.1rem; }
  .contact-form .form-control { border: 2px solid #E3F2FD; border-radius: 16px; padding: 1.1rem 1.5rem; font-size: 1rem; transition: all 0.3s ease; background: #FAFBFC; }
  .contact-form .form-control:focus { border-color: #87CEEB; box-shadow: 0 0 0 4px rgba(135,206,235,0.15); background: white; outline: none; }
  .contact-form textarea.form-control { resize: vertical; min-height: 150px; }
  .btn-submit { width: 100%; padding: 1.2rem; background: linear-gradient(135deg, #87CEEB, #FFD700); border: none; border-radius: 50px; color: white; font-weight: 700; font-size: 1rem; text-transform: uppercase; letter-spacing: 2px; cursor: pointer; transition: all 0.5s cubic-bezier(0.68,-0.55,0.265,1.55); position: relative; overflow: hidden; }
  .btn-submit::before { content: ''; position: absolute; top: 50%; left: 50%; width: 0; height: 0; background: rgba(255,255,255,0.3); border-radius: 50%; transform: translate(-50%, -50%); transition: width 0.6s, height 0.6s; }
  .btn-submit:hover::before { width: 600px; height: 600px; }
  .btn-submit:hover { transform: translateY(-5px); box-shadow: 0 20px 50px rgba(135,206,235,0.4); }
  .btn-submit:active { transform: translateY(-2px); }
  @media (max-width: 768px) { .contact-hero { padding: 100px 15px 40px; } .contact-form-wrapper { padding: 2rem 1.5rem; border-radius: 24px; } .contact-cards { grid-template-columns: 1fr; } }
</style>'''

CONTACT_CONTENT = '''<section class="contact-hero">
  <div class="container">
    <h1>Let's Connect</h1>
    <p>Have a project in mind or want to collaborate? I'd love to hear from you. Let's create something amazing together.</p>
    <div class="contact-cards">
      <div class="contact-card fade-in-up" style="animation-delay: 0.1s;"><div class="contact-icon"><i class="bi bi-envelope-fill"></i></div><h4>Email</h4><p>sajakcodingan@gmail.com</p></div>
      <div class="contact-card fade-in-up" style="animation-delay: 0.2s;"><div class="contact-icon"><i class="bi bi-telephone-fill"></i></div><h4>Phone</h4><p>+62 851 8464 7793</p></div>
      <div class="contact-card fade-in-up" style="animation-delay: 0.3s;"><div class="contact-icon"><i class="bi bi-geo-alt-fill"></i></div><h4>Location</h4><p>Pamekasan, East Java, Indonesia</p></div>
    </div>
  </div>
</section>
<section class="contact-form-section">
  <div class="container">
    <div class="contact-form-wrapper fade-in-up">
      <h2 class="form-title">Send Me a Message</h2>
      <p class="form-subtitle">Fill out the form below and I'll get back to you as soon as possible.</p>
      <form action="#" method="post" class="contact-form">
        <div class="row g-3">
          <div class="col-md-6"><input type="text" name="name" class="form-control" placeholder="Your Full Name" required></div>
          <div class="col-md-6"><input type="email" class="form-control" name="email" placeholder="your.email@example.com" required></div>
          <div class="col-12"><input type="text" class="form-control" name="subject" placeholder="What's this about?" required></div>
          <div class="col-12"><textarea class="form-control" name="message" rows="6" placeholder="Tell me about your project, idea, or just say hi..." required></textarea></div>
          <div class="col-12"><button type="submit" class="btn-submit"><i class="bi bi-send-fill" style="margin-right: 0.5rem;"></i> Send Message</button></div>
        </div>
      </form>
    </div>
  </div>
</section>
<section style="padding: 80px 20px; background: linear-gradient(135deg, #87CEEB 0%, #FFD700 100%); text-align: center;">
  <div class="container">
    <h2 style="font-size: clamp(1.8rem, 4vw, 2.5rem); font-weight: 900; color: white; margin-bottom: 1.5rem;">Ready to Start Your Project?</h2>
    <p style="font-size: 1.1rem; color: white; opacity: 0.95; max-width: 600px; margin: 0 auto 2rem;">I'm always excited to work on new challenges. Whether you need a robust backend, a scalable system, or a full-stack solution, let's make it happen.</p>
    <a href="mailto:sajakcodingan@gmail.com" class="btn-submit" style="background: white; color: #87CEEB; padding: 1.2rem 3rem; border-radius: 50px; text-decoration: none; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; display: inline-flex; align-items: center; gap: 0.8rem; transition: all 0.5s ease; box-shadow: 0 15px 40px rgba(0,0,0,0.15);" onmouseover="this.style.transform='translateY(-8px) scale(1.05)'; this.style.boxShadow='0 25px 60px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'"><i class="bi bi-envelope-fill"></i> Email Me Directly</a>
  </div>
</section>'''

CONTACT_SCRIPTS = '''<script>
document.addEventListener('DOMContentLoaded', function() {
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
        setTimeout(() => { btn.innerHTML = originalText; btn.style.background = ''; btn.disabled = false; }, 3000);
      }, 1500);
    });
  }
  const style = document.createElement('style');
  style.textContent = '.spin { animation: spin 1s linear infinite; } @keyframes spin { to { transform: rotate(360deg); } }';
  document.head.appendChild(style);
});
</script>'''

generate_page('contact.html', "Contact - Muhammad Yahya | Let's Connect",
    "Get in touch with Muhammad Yahya for collaborations, projects, or just to say hello.",
    'contact-page', CONTACT_CONTENT, CONTACT_STYLES, CONTACT_SCRIPTS)

# === CERTIFICATES PAGE ===
CERT_STYLES = '''<style>
  .cert-hero { padding: 140px 20px 80px; background: linear-gradient(135deg, #FFF8E1 0%, #FFFFFF 100%); text-align: center; position: relative; }
  .cert-hero h1 { font-size: clamp(2.5rem, 8vw, 5rem); font-weight: 900; background: linear-gradient(135deg, #1a1a1a, #444); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1rem; position: relative; }
  .cert-hero p { font-size: 1.2rem; color: #666; max-width: 600px; margin: 0 auto; position: relative; }
  .cert-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; padding: 4rem 1rem; max-width: 1300px; margin: 0 auto; }
  .cert-card { background: white; border-radius: 28px; overflow: hidden; box-shadow: 0 25px 70px rgba(255,215,0,0.15); transition: all 0.6s cubic-bezier(0.22, 1, 0.36, 1); position: relative; border: 3px solid transparent; }
  .cert-card::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 8px; background: linear-gradient(90deg, #FFD700, #87CEEB, #FFD700); transform: scaleX(0); transform-origin: left; transition: transform 0.5s ease; }
  .cert-card:hover::before { transform: scaleX(1); }
  .cert-card:hover { transform: translateY(-15px) scale(1.02) rotate(0.5deg); box-shadow: 0 40px 100px rgba(255,215,0,0.25); border-color: #FFD700; }
  .cert-img { height: 200px; overflow: hidden; position: relative; }
  .cert-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease; }
  .cert-card:hover .cert-img img { transform: scale(1.1) rotate(1deg); }
  .cert-badge { position: absolute; top: 15px; right: 15px; width: 60px; height: 60px; background: linear-gradient(135deg, #FFD700, #FFB300); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; box-shadow: 0 8px 20px rgba(255,215,0,0.4); z-index: 2; animation: pulse 2s ease-in-out infinite; }
  @keyframes pulse { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.1); } }
  .cert-content { padding: 2rem; }
  .cert-title { font-size: 1.3rem; font-weight: 800; margin-bottom: 0.8rem; color: #1a1a1a; }
  .cert-desc { color: #666; line-height: 1.7; margin-bottom: 1.2rem; }
  .cert-meta { display: flex; gap: 0.8rem; flex-wrap: wrap; align-items: center; }
  .cert-date { padding: 0.4rem 1rem; background: linear-gradient(135deg, #87CEEB, #B3E5FC); color: #1a1a1a; border-radius: 20px; font-size: 0.85rem; font-weight: 700; }
  .cert-credential { padding: 0.4rem 1rem; background: linear-gradient(135deg, #FFD700, #FFE082); color: #1a1a1a; border-radius: 20px; font-size: 0.85rem; font-weight: 700; }
  @media (max-width: 768px) { .cert-grid { grid-template-columns: 1fr; } .cert-hero { padding: 100px 15px 60px; } }
</style>'''

CERT_FULL = [
    ('Python Programming Fundamentals', 'Certificate of completion for foundational Python programming concepts including data structures, algorithms, and object-oriented programming.', 'Jan 2024', 'PY2024-001'),
    ('Full Stack Web Development', 'Advanced certification covering frontend and backend technologies including HTML, CSS, JavaScript, Node.js, and database management.', 'Mar 2024', 'FS2024-002'),
    ('Artificial Intelligence Fundamentals', 'Specialized training in machine learning concepts, neural networks, and practical AI implementation using Python frameworks.', 'May 2024', 'AI2024-003'),
    ('Cloud Computing Essentials', 'Comprehensive course on cloud infrastructure, deployment strategies, and scalable application architecture on major cloud platforms.', 'Jul 2024', 'CC2024-004'),
]

cert_cards = ''
for title, desc, date, cred in CERT_FULL:
    cert_cards += f'''      <div class="cert-card fade-in-up" style="border-radius: 28px; overflow: hidden;">
        <div class="cert-img"><img src="assets/img/sertifikat/py.png" alt="{title}"><div class="cert-badge">&#x1F3C6;</div></div>
        <div class="cert-content">
          <h3 class="cert-title">{title}</h3>
          <p class="cert-desc">{desc}</p>
          <div class="cert-meta">
            <span class="cert-date"><i class="bi bi-calendar3" style="margin-right: 0.3rem;"></i> {date}</span>
            <span class="cert-credential"><i class="bi bi-card-checklist" style="margin-right: 0.3rem;"></i> {cred}</span>
          </div>
        </div>
      </div>
'''

CERTIFICATES_CONTENT = f'''<section class="cert-hero">
  <div class="container">
    <h1>Certifications &amp; Achievements</h1>
    <p>Professional credentials that validate my expertise in modern software development and cloud technologies.</p>
  </div>
</section>
<section class="cert-section" style="padding: 40px 20px 80px; background: white;">
  <div class="container">
    <div class="cert-grid">
{cert_cards}    </div>
  </div>
</section>'''

generate_page('certificates.html', 'Certifications - Muhammad Yahya',
    'Professional certifications and credentials earned throughout my career in software engineering and DevOps.',
    'certificates-page', CERTIFICATES_CONTENT, CERT_STYLES)

# === RESUME PAGE ===
RESUME_CONTENT = '''<section class="about-hero">
  <div class="profile-wrapper">
    <div class="profile-card fade-in-up">
      <div class="row g-0 align-items-center">
        <div class="col-lg-4 mb-4 mb-lg-0 text-center">
          <div class="profile-img-container"><img src="assets/img/aku.png" alt="Muhammad Yahya" class="profile-img"></div>
        </div>
        <div class="col-lg-8 ps-lg-5">
          <h1 class="profile-name">MUHAMMAD YAHYA</h1>
          <h2 class="profile-title">FULLSTACK ENGINEER &amp; DEVOPS SPECIALIST</h2>
          <p class="profile-bio">Innovative Fullstack Engineer with proven expertise in Django, Laravel, Golang, and Cloud Infrastructure. Passionate about building scalable systems and elegant solutions.</p>
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

<!-- About Me -->
<section class="resume-section" id="resume">
  <div class="section-decoration decor-1"></div>
  <div class="resume-container">
    <div class="resume-section-header fade-in-up"><div class="section-icon">&#x1F464;</div><h2>ABOUT ME</h2></div>
    <div class="row g-4 align-items-center" style="max-width: 1100px; margin: 0 auto;">
      <div class="col-lg-7 fade-in-up stagger-1">
        <div style="background: white; padding: 2.5rem; border-radius: 24px; box-shadow: 0 20px 60px rgba(135,206,235,0.1); position: relative; overflow: hidden; border: 3px solid #87CEEB;">
          <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: linear-gradient(135deg, #FFD700, #FFE082); border-radius: 50%; opacity: 0.2; filter: blur(40px);"></div>
          <h3 style="font-size: 2rem; font-weight: 900; margin-bottom: 1.5rem; background: linear-gradient(135deg, #1a1a1a, #444); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">MUHAMMAD YAHYA ABDULLAHISSALAM</h3>
          <p style="font-size: 1.1rem; line-height: 1.8; color: #555;">Innovative and deadline-driven Fullstack Engineer with proven experience in designing and implementing scalable systems, managing cloud infrastructure, and developing robust backend solutions using Django, Laravel, and Golang.</p>
          <p style="margin-top: 1rem; line-height: 1.8; color: #444;">Mahasiswa Teknik Informatika (Semester 5) dengan keahlian <strong>Full Stack</strong> dan fokus kuat pada <strong>Backend Engineering</strong> (Django, Laravel, Golang) serta <strong>Administrasi Infrastruktur (DevOps)</strong>.</p>
          <p style="margin-top: 1rem; line-height: 1.8; color: #444;">Memiliki pengalaman nyata sebagai <strong>Kontraktor Junior DevOps Kampus</strong> yang bertanggung jawab atas <em>upgrade</em> sistem <em>live</em> dan <em>troubleshooting</em> server VPS Linux.</p>
        </div>
      </div>
      <div class="col-lg-5 fade-in-up stagger-2">
        <div style="background: white; padding: 2rem; border-radius: 24px; box-shadow: 0 15px 50px rgba(135,206,235,0.1); border: 3px solid #FFD700; position: relative;">
          <div style="position: absolute; top: 0; left: 0; width: 100%; height: 6px; background: linear-gradient(90deg, #87CEEB, #FFD700);"></div>
          <h4 style="font-size: 1.2rem; font-weight: 800; margin-bottom: 1.5rem; color: #1a1a1a;">Get In Touch</h4>
          <div style="display: flex; align-items: center; gap: 1rem; padding: 0.8rem; border-radius: 12px; margin-bottom: 0.5rem; transition: all 0.3s ease;" onmouseover="this.style.background='#E3F2FD'; this.style.transform='translateX(5px)'" onmouseout="this.style.background='transparent'; this.style.transform='translateX(0)'"><div style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #87CEEB, #FFD700); border-radius: 50%; color: white; font-size: 1.1rem; flex-shrink: 0;"><i class="bi bi-geo-alt"></i></div><div style="flex: 1;"><div style="font-weight: 700; font-size: 0.85rem; color: #87CEEB; text-transform: uppercase; letter-spacing: 1px;">Location</div><div style="color: #333;">Pamekasan, 69316</div></div></div>
          <div style="display: flex; align-items: center; gap: 1rem; padding: 0.8rem; border-radius: 12px; margin-bottom: 0.5rem; transition: all 0.3s ease;" onmouseover="this.style.background='#E3F2FD'; this.style.transform='translateX(5px)'" onmouseout="this.style.background='transparent'; this.style.transform='translateX(0)'"><div style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #87CEEB, #FFD700); border-radius: 50%; color: white; font-size: 1.1rem; flex-shrink: 0;"><i class="bi bi-envelope"></i></div><div style="flex: 1;"><div style="font-weight: 700; font-size: 0.85rem; color: #87CEEB; text-transform: uppercase; letter-spacing: 1px;">Email</div><div style="color: #333;">sajakcodingan@gmail.com</div></div></div>
          <div style="display: flex; align-items: center; gap: 1rem; padding: 0.8rem; border-radius: 12px; margin-bottom: 0.5rem; transition: all 0.3s ease;" onmouseover="this.style.background='#E3F2FD'; this.style.transform='translateX(5px)'" onmouseout="this.style.background='transparent'; this.style.transform='translateX(0)'"><div style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #87CEEB, #FFD700); border-radius: 50%; color: white; font-size: 1.1rem; flex-shrink: 0;"><i class="bi bi-phone"></i></div><div style="flex: 1;"><div style="font-weight: 700; font-size: 0.85rem; color: #87CEEB; text-transform: uppercase; letter-spacing: 1px;">Phone</div><div style="color: #333;">0851 8464 7793</div></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Work Experience -->
<section class="resume-section">
  <div class="resume-container">
    <div class="resume-section-header fade-in-up"><div class="section-icon">&#x1F4BC;</div><h2>WORK EXPERIENCE</h2></div>
    <div class="timeline">
      <div class="timeline-item fade-in-up stagger-1"><div class="timeline-dot"></div><div class="timeline-card"><h3>DevOps System Administrator (Kontrak Kampus)</h3><h4>Kontrak Paruh Waktu Kampus (Sedang Berjalan)</h4><span class="timeline-period">Present</span><p class="timeline-desc">Bertanggung jawab sebagai Kontraktor Junior DevOps untuk pemeliharaan dan peningkatan sistem jurnal akademik kampus (OJS) yang berjalan di lingkungan VPS Linux.</p><ul class="timeline-achievements"><li>System Upgrade Kritis: Berhasil melaksanakan migrasi dan <em>upgrade</em> sistem OJS dari versi <strong>3.1 ke versi LTS</strong> yang stabil.</li><li>Administrasi Server: Memastikan stabilitas server dengan mendiagnosis error, mengelola <em>dependency</em>, menggunakan Docker untuk isolasi.</li></ul></div></div>
      <div class="timeline-item fade-in-up stagger-2"><div class="timeline-dot"></div><div class="timeline-card"><h3>Asisten Penelitian &amp; Backend Engineer</h3><h4>Kementrian Kelautan dan Perikanan (Sedang Berjalan)</h4><span class="timeline-period">Present</span><p class="timeline-desc">Membangun sistem di kementerian perikanan, berfokus pada pengembangan <strong>Backend Django REST API</strong>.</p><ul class="timeline-achievements"><li>Mengembangkan logika pemrograman, fitur CRUD, dan integrasi API untuk mendukung sistem yang terhubung dengan <strong>Machine Learning</strong>.</li></ul></div></div>
      <div class="timeline-item fade-in-up stagger-3"><div class="timeline-dot"></div><div class="timeline-card"><h3>Pengajar Backend (Volunteer)</h3><h4>Komunitas Bareng Saya</h4><span class="timeline-period">April 2025 - Present</span><p class="timeline-desc">Menjadi pengajar backend web secara <em>volunteer</em>, membimbing peserta memahami pengembangan web menggunakan <strong>Django dan Flask</strong>.</p><ul class="timeline-achievements"><li>Materi mencakup <em>routing</em>, <em>views</em>, <em>model</em>, serta pembuatan fitur CRUD berbasis <strong>MVC</strong> dan <strong>REST API</strong>.</li></ul></div></div>
    </div>
  </div>
</section>

<!-- Technical Skills -->
<section class="resume-section">
  <div class="resume-container" style="position: relative; flex-direction: column; align-items: center;">
    <div class="resume-section-header fade-in-up"><div class="section-icon">&#x1F680;</div><h2>TECHNICAL SKILLS</h2></div>
    <div class="skills-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; width: 100%;">
      <div class="skill-card fade-in-up stagger-1" style="background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); display: flex; flex-direction: column; align-items: flex-start;"><div class="skill-icon"><i class="bi bi-code-slash"></i></div><h4 class="skill-category-title">Backend &amp; Frameworks</h4><div class="skill-tags" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">Django</span><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">Laravel</span><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">Golang</span><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">Flask</span><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">PHP</span><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">Django Rest Framework</span><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">REST API</span></div></div>
      <div class="skill-card fade-in-up stagger-2" style="background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); display: flex; flex-direction: column; align-items: flex-start;"><div class="skill-icon"><i class="bi bi-database"></i></div><h4 class="skill-category-title">Database</h4><div class="skill-tags" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">MySQL</span><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">Database Management</span><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">Query Optimization</span></div></div>
      <div class="skill-card fade-in-up stagger-3" style="background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); display: flex; flex-direction: column; align-items: flex-start;"><div class="skill-icon"><i class="bi bi-phone"></i></div><h4 class="skill-category-title">Frontend/Mobile</h4><div class="skill-tags" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">React Native</span><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">JavaScript</span><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">HTML</span><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">CSS</span><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">Bootstrap</span></div></div>
      <div class="skill-card fade-in-up stagger-4" style="background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); display: flex; flex-direction: column; align-items: flex-start;"><div class="skill-icon"><i class="bi bi-server"></i></div><h4 class="skill-category-title">DevOps &amp; Infrastructure</h4><div class="skill-tags" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">Linux CLI (VPS/Ubuntu)</span><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">Docker</span><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">Composer</span><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">Git &amp; GitHub</span><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">System Administration</span><span class="skill-tag" style="background: #f0f4f8; border: 1px solid #d1d9e0; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">Troubleshooting</span></div></div>
    </div>
  </div>
</section>

<!-- Education -->
<section class="resume-section">
  <div class="section-decoration decor-2"></div>
  <div class="resume-container">
    <div class="resume-section-header fade-in-up"><div class="section-icon">&#x1F393;</div><h2>EDUCATION</h2></div>
    <div class="info-grid">
      <div class="info-card fade-in-up"><h3>S1 Informatika</h3><h4>Universitas Islam Madura</h4><span class="period">2023 - Sekarang (Semester 5)</span><p>Currently pursuing a degree in Computer Science with focus on software engineering and system administration.</p></div>
    </div>
  </div>
</section>

<!-- Languages -->
<section class="resume-section">
  <div class="resume-container">
    <div class="resume-section-header fade-in-up"><div class="section-icon">&#x1F5E3;&#xFE0F;</div><h2>LANGUAGES</h2></div>
    <div class="info-grid">
      <div class="info-card fade-in-up">
        <div class="language-item"><span class="lang-name">Indonesian</span><span class="lang-level">Native proficiency</span></div>
        <div class="language-item"><span class="lang-name">English</span><span class="lang-level">Intermediate level (reading, writing, basic conversation)</span></div>
      </div>
    </div>
  </div>
</section>

<!-- Download CTA -->
<section class="cta-section">
  <div class="container">
    <div class="cta-content fade-in-up" style="text-align: center;">
      <h2 class="cta-title">Download My Resume</h2>
      <p class="cta-text" style="max-width: 500px; margin: 0 auto 2rem;">Get a PDF copy of my full professional resume for your records.</p>
      <a href="#" class="btn-cta" onclick="event.preventDefault(); alert('PDF download coming soon!');"><i class="bi bi-download"></i> Download PDF Resume</a>
    </div>
  </div>
</section>'''

generate_page('resume.html', 'Resume - Muhammad Yahya | Fullstack Engineer',
    'Professional resume of Muhammad Yahya - Fullstack Engineer with expertise in Django, Laravel, Golang, DevOps, and System Administration.',
    'resume-page', RESUME_CONTENT)

# === PRICING PAGE ===
PRICING_STYLES = '''<style>
  .pricing-hero { padding: 140px 20px 60px; background: linear-gradient(135deg, #FFF8E1 0%, #FFF3E0 100%); text-align: center; }
  .pricing-hero h1 { font-size: clamp(2.5rem, 8vw, 5rem); font-weight: 900; background: linear-gradient(135deg, #1a1a1a, #444); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1rem; position: relative; }
  .pricing-hero p { font-size: 1.2rem; color: #666; max-width: 600px; margin: 0 auto 2rem; position: relative; }
  .pricing-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; padding: 2rem 1rem 4rem; max-width: 1300px; margin: 0 auto; }
  .pricing-card { background: white; border-radius: 28px; padding: 2.5rem 2rem; box-shadow: 0 20px 60px rgba(255,215,0,0.12); transition: all 0.6s cubic-bezier(0.22, 1, 0.36, 1); position: relative; border: 3px solid transparent; display: flex; flex-direction: column; }
  .pricing-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0; border-radius: 28px; padding: 3px; background: linear-gradient(135deg, #87CEEB, #FFD700); -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0); mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0); -webkit-mask-composite: xor; mask-composite: exclude; opacity: 0; transition: opacity 0.4s ease; }
  .pricing-card:hover::before { opacity: 1; }
  .pricing-card:hover { transform: translateY(-15px) scale(1.02); box-shadow: 0 40px 100px rgba(255,215,0,0.2); }
  .pricing-card.featured { transform: scale(1.05); border-color: #FFD700; box-shadow: 0 30px 80px rgba(255,215,0,0.25); }
  .pricing-card.featured:hover { transform: scale(1.07) translateY(-10px); }
  .pricing-badge { position: absolute; top: -12px; right: 20px; padding: 0.4rem 1.2rem; background: linear-gradient(135deg, #FFD700, #FFB300); color: #1a1a1a; border-radius: 20px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 5px 15px rgba(255,215,0,0.3); }
  .pricing-title { font-size: 1.4rem; font-weight: 800; margin-bottom: 1rem; color: #1a1a1a; }
  .pricing-price { font-size: 3rem; font-weight: 900; background: linear-gradient(135deg, #87CEEB, #FFD700); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1.5rem; line-height: 1; }
  .pricing-price sup { font-size: 1.2rem; vertical-align: top; }
  .pricing-price span { font-size: 1rem; font-weight: 500; color: #666; }
  .pricing-features { list-style: none; padding: 0; margin: 0 0 2rem 0; flex-grow: 1; }
  .pricing-features li { display: flex; align-items: center; gap: 0.5rem; padding: 0.6rem 0; border-bottom: 1px dashed #E3F2FD; color: #555; }
  .pricing-features li:last-child { border-bottom: none; }
  .pricing-features li i.bi-check-fill { color: #28a745; font-weight: bold; }
  .pricing-features li.na { color: #ccc; }
  .pricing-features li.na i { color: #ccc; }
  .btn-pricing { display: inline-block; width: 100%; padding: 1rem 2rem; background: linear-gradient(135deg, #87CEEB, #FFD700); color: white; border-radius: 50px; font-weight: 700; text-align: center; text-decoration: none; transition: all 0.5s cubic-bezier(0.68,-0.55,0.265,1.55); box-shadow: 0 8px 30px rgba(135,206,235,0.3); border: none; cursor: pointer; font-size: 1rem; }
  .btn-pricing:hover { transform: translateY(-5px); box-shadow: 0 15px 40px rgba(135,206,235,0.4); color: white; background: linear-gradient(135deg, #6BB3D8, #FFB300); }
  .additional-services { padding: 80px 20px; background: linear-gradient(180deg, #FFFFFF 0%, #E3F2FD 100%); }
  .services-additional-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; max-width: 1100px; margin: 0 auto; }
  .additional-card { background: white; border-radius: 24px; padding: 2.5rem; box-shadow: 0 15px 50px rgba(135,206,235,0.1); transition: all 0.5s ease; border-left: 5px solid #FFD700; }
  .additional-card:hover { transform: translateX(10px) scale(1.02); box-shadow: 0 25px 70px rgba(135,206,235,0.2); border-left-color: #87CEEB; }
  .additional-card h3 { font-size: 1.5rem; font-weight: 800; margin-bottom: 1rem; color: #1a1a1a; }
  .additional-card p { color: #666; line-height: 1.7; margin-bottom: 1.5rem; }
  .additional-price { font-size: 1.8rem; font-weight: 900; color: #87CEEB; margin-bottom: 1.5rem; display: block; }
  .link-arrow { display: inline-flex; align-items: center; gap: 0.5rem; color: #87CEEB; font-weight: 700; text-decoration: none; transition: all 0.3s ease; }
  .link-arrow:hover { gap: 1rem; color: #FFD700; }
  @media (max-width: 768px) { .pricing-grid { grid-template-columns: 1fr; } .pricing-card.featured { transform: scale(1); } .pricing-hero { padding: 100px 15px 40px; } }
</style>'''

PRICING_CONTENT = '''<section class="pricing-hero">
  <div class="container"><h1>Pricing &amp; Packages</h1><p>Flexible pricing options tailored to your project's size and complexity. No hidden fees, just transparent value.</p></div>
</section>
<section class="pricing-section" style="padding: 40px 20px 80px; background: white;">
  <div class="container">
    <div class="pricing-grid">
      <div class="pricing-card fade-in-up stagger-1" style="border-radius: 28px;">
        <h3 class="pricing-title">Basic Website</h3>
        <div class="pricing-price"><sup>$</sup>299<span> / project</span></div>
        <ul class="pricing-features"><li><i class="bi bi-check-fill"></i> Up to 5 pages</li><li><i class="bi bi-check-fill"></i> Fully responsive</li><li><i class="bi bi-check-fill"></i> Contact form</li><li><i class="bi bi-check-fill"></i> Basic SEO setup</li><li><i class="bi bi-check-fill"></i> 1 month support</li><li class="na"><i class="bi bi-x-circle"></i> CMS integration</li><li class="na"><i class="bi bi-x-circle"></i> E-commerce</li></ul>
        <a href="contact.html" class="btn-pricing">Choose Basic</a>
      </div>
      <div class="pricing-card featured fade-in-up stagger-2" style="border-radius: 28px;">
        <span class="pricing-badge">Most Popular</span>
        <h3 class="pricing-title">Professional Website</h3>
        <div class="pricing-price"><sup>$</sup>799<span> / project</span></div>
        <ul class="pricing-features"><li><i class="bi bi-check-fill"></i> Up to 15 pages</li><li><i class="bi bi-check-fill"></i> Advanced responsive</li><li><i class="bi bi-check-fill"></i> Multiple forms</li><li><i class="bi bi-check-fill"></i> Advanced SEO</li><li><i class="bi bi-check-fill"></i> CMS integration</li><li><i class="bi bi-check-fill"></i> 3 months support</li><li class="na"><i class="bi bi-x-circle"></i> E-commerce</li></ul>
        <a href="contact.html" class="btn-pricing">Get Started</a>
      </div>
      <div class="pricing-card fade-in-up stagger-3" style="border-radius: 28px;">
        <h3 class="pricing-title">E-Commerce Solution</h3>
        <div class="pricing-price"><sup>$</sup>1,499<span> / project</span></div>
        <ul class="pricing-features"><li><i class="bi bi-check-fill"></i> Unlimited products</li><li><i class="bi bi-check-fill"></i> Payment gateway</li><li><i class="bi bi-check-fill"></i> Inventory management</li><li><i class="bi bi-check-fill"></i> Order management</li><li><i class="bi bi-check-fill"></i> Customer accounts</li><li><i class="bi bi-check-fill"></i> 6 months support</li><li><i class="bi bi-check-fill"></i> Advanced analytics</li></ul>
        <a href="contact.html" class="btn-pricing">Start Store</a>
      </div>
    </div>
    <div style="margin-top: 5rem;">
      <div class="section-header text-center fade-in-up" style="margin-bottom: 3rem;">
        <h2 style="font-size: clamp(2rem, 5vw, 3rem); font-weight: 900; background: linear-gradient(135deg, #1a1a1a, #444); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Additional Services</h2>
        <p style="color: #666; max-width: 600px; margin: 1rem auto 0;">Need ongoing support or expert advice? I also offer consulting and maintenance plans.</p>
      </div>
      <div class="services-additional-grid">
        <div class="additional-card fade-in-up stagger-1"><h3>Consulting &amp; Strategy</h3><p>Get expert advice on technology stack selection, architecture design, and project planning for your next big idea.</p><span class="additional-price">$150/hour</span><a href="contact.html" class="link-arrow">Learn More <i class="bi bi-arrow-right"></i></a></div>
        <div class="additional-card fade-in-up stagger-2"><h3>Maintenance &amp; Support</h3><p>Ongoing support, security patches, performance optimization, and updates to keep your applications running smoothly.</p><span class="additional-price">$99/month</span><a href="contact.html" class="link-arrow">Learn More <i class="bi bi-arrow-right"></i></a></div>
      </div>
    </div>
  </div>
</section>'''

generate_page('pricing.html', 'Pricing & Packages - Muhammad Yahya',
    "Transparent pricing for web development, DevOps, and consulting services. Choose a plan that fits your project needs.",
    'pricing-page', PRICING_CONTENT, PRICING_STYLES)

print("\nAll pages generated successfully!")
