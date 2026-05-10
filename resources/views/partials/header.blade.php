<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container-fluid position-relative d-flex align-items-center justify-content-between"
       style="background: rgba(255,255,255,0.9); backdrop-filter: blur(20px); padding: 1rem 2rem; border-bottom: 3px solid #87CEEB; box-shadow: 0 10px 40px rgba(135,206,235,0.15);">

    <!-- Logo - Expressive & Playful -->
    <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0"
       style="transition: transform 0.4s cubic-bezier(0.68,-0.55,0.265,1.55);"
       onmouseover="this.style.transform='rotate(-10deg) scale(1.1)'"
       onmouseout="this.style.transform='rotate(0) scale(1)'">
      <img src="{{ asset('assets/img/aku.png') }}" alt="Logo" id="admin-login-trigger"
           style="height: 60px; width: auto; border-radius: 12px; box-shadow: 0 8px 30px rgba(135,206,235,0.3); margin-right: 0.5rem;">
      <img src="{{ asset('assets/img/sc.png') }}" alt="Logo" id="admin-login-trigger"
           style="height: 60px; width: auto; border-radius: 12px; box-shadow: 0 8px 30px rgba(135,206,235,0.3);">
    </a>
  
    <h3> <span style="color: orange">welcome to my portofolio </span> || 
      <span style="color: #87CEEB;">Sajak</span><span style="color: #FFD700;">Codingan</span></h3>

    <!-- Navigation - Floating Style -->
    <nav id="navmenu" class="navmenu">
      <ul style="display: flex; list-style: none; gap: 0.5rem; align-items: center;">
        @php
          $mainMenus = $menus[null] ?? collect();
        @endphp
        @foreach($mainMenus as $menu)
          @if($menu->children->count() > 0)
            <li class="dropdown">
              <a href="{{ $menu->url }}" @if($menu->url == '#') onclick="return false;" @endif
                 style="position: relative; padding: 0.6rem 1.2rem; font-weight: 600; color: #1a1a1a; border-radius: 50px; transition: all 0.3s ease; overflow: hidden; display: inline-block;"
                 onmouseover="this.style.background='linear-gradient(135deg,#87CEEB 0%,#FFD700 100%)'; this.style.color='white'; this.style.transform='translateY(-2px)';"
                 onmouseout="this.style.background='transparent'; this.style.color='#1a1a1a'; this.style.transform='translateY(0)'">
                <span>{{ $menu->name }}</span>
                <i class="bi bi-chevron-down toggle-dropdown" style="margin-left: 0.3rem; transition: transform 0.3s;"></i>
              </a>
              <ul style="position: absolute; top: 100%; left: 0; background: white; border-radius: 16px; box-shadow: 0 20px 60px rgba(135,206,235,0.2); padding: 0.5rem; min-width: 200px; opacity: 0; visibility: hidden; transform: translateY(10px); transition: all 0.3s ease;">
                @foreach($menu->children as $child)
                  <li style="list-style: none;">
                    <a href="{{ $child->url }}"
                       style="display: block; padding: 0.6rem 1rem; color: #666; border-radius: 12px; transition: all 0.2s;"
                       onmouseover="this.style.background='#87CEEB'; this.style.color='white';"
                       onmouseout="this.style.background='transparent'; this.style.color='#666'">
                      {{ $child->name }}
                    </a>
                  </li>
                @endforeach
              </ul>
            </li>
          @else
            <li>
              <a href="{{ $menu->url }}" 
                 class="{{ request()->is($menu->url == '/' ? '' : ltrim($menu->url, '/')) ? 'active' : '' }}"
                 style="position: relative; padding: 0.6rem 1.2rem; font-weight: 600; color: #1a1a1a; border-radius: 50px; transition: all 0.3s ease; overflow: hidden; display: inline-block;"
                 onmouseover="this.style.background='linear-gradient(135deg,#87CEEB 0%,#FFD700 100%)'; this.style.color='white'; this.style.transform='translateY(-2px)';"
                 onmouseout="this.style.background='transparent'; this.style.color='#1a1a1a'; this.style.transform='translateY(0)'">
                <span>{{ $menu->name }}</span>
                @if(request()->is($menu->url == '/' ? '' : ltrim($menu->url, '/')))
                  <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 60%; height: 3px; background: #FFD700; border-radius: 2px;"></span>
                @endif
              </a>
            </li>
          @endif
        @endforeach
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list" 
         style="font-size: 1.8rem; cursor: pointer; transition: transform 0.3s;"
         onmouseover="this.style.color='#87CEEB'; this.style.transform='rotate(90deg)'"
         onmouseout="this.style.color='#1a1a1a'; this.style.transform='rotate(0)'"></i>
    </nav>

    <!-- Social Icons - playful floating -->
    <div class="header-social-links" style="display: flex; gap: 0.8rem; margin-left: 1rem;">
      <a href="#" class="twitter" 
         style="width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; background: white; border-radius: 50%; color: #87CEEB; box-shadow: 0 10px 30px rgba(135,206,235,0.2); transition: all 0.4s cubic-bezier(0.68,-0.55,0.265,1.55); border: 2px solid transparent;"
         onmouseover="this.style.background='linear-gradient(135deg,#87CEEB 0%,#FFD700 100%)'; this.style.color='white'; this.style.transform='translateY(-5px) rotate(360deg) scale(1.1)'; this.style.borderColor='#FFD700'"
         onmouseout="this.style.background='white'; this.style.color='#87CEEB'; this.style.transform='translateY(0) rotate(0) scale(1)'; this.style.borderColor='transparent'">
        <i class="bi bi-twitter-x"></i>
      </a>
      <a href="#" class="facebook"
         style="width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; background: white; border-radius: 50%; color: #87CEEB; box-shadow: 0 10px 30px rgba(135,206,235,0.2); transition: all 0.4s cubic-bezier(0.68,-0.55,0.265,1.55); border: 2px solid transparent;"
         onmouseover="this.style.background='linear-gradient(135deg,#87CEEB 0%,#FFD700 100%)'; this.style.color='white'; this.style.transform='translateY(-5px) rotate(360deg) scale(1.1)'; this.style.borderColor='#FFD700'"
         onmouseout="this.style.background='white'; this.style.color='#87CEEB'; this.style.transform='translateY(0) rotate(0) scale(1)'; this.style.borderColor='transparent'">
        <i class="bi bi-facebook"></i>
      </a>
      <a href="#" class="instagram"
         style="width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; background: white; border-radius: 50%; color: #87CEEB; box-shadow: 0 10px 30px rgba(135,206,235,0.2); transition: all 0.4s cubic-bezier(0.68,-0.55,0.265,1.55); border: 2px solid transparent;"
         onmouseover="this.style.background='linear-gradient(135deg,#87CEEB 0%,#FFD700 100%)'; this.style.color='white'; this.style.transform='translateY(-5px) rotate(360deg) scale(1.1)'; this.style.borderColor='#FFD700'"
         onmouseout="this.style.background='white'; this.style.color='#87CEEB'; this.style.transform='translateY(0) rotate(0) scale(1)'; this.style.borderColor='transparent'">
        <i class="bi bi-instagram"></i>
      </a>
      <a href="#" class="linkedin"
         style="width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; background: white; border-radius: 50%; color: #87CEEB; box-shadow: 0 10px 30px rgba(135,206,235,0.2); transition: all 0.4s cubic-bezier(0.68,-0.55,0.265,1.55); border: 2px solid transparent;"
         onmouseover="this.style.background='linear-gradient(135deg,#87CEEB 0%,#FFD700 100%)'; this.style.color='white'; this.style.transform='translateY(-5px) rotate(360deg) scale(1.1)'; this.style.borderColor='#FFD700'"
         onmouseout="this.style.background='white'; this.style.color='#87CEEB'; this.style.transform='translateY(0) rotate(0) scale(1)'; this.style.borderColor='transparent'">
        <i class="bi bi-linkedin"></i>
      </a>
    </div>

  </div>
</header>

<script>
// Header scroll effect
window.addEventListener('scroll', function() {
  const header = document.getElementById('header');
  if (window.scrollY > 50) {
    header.classList.add('scrolled');
  } else {
    header.classList.remove('scrolled');
  }
});

// Mobile menu toggle (expressive)
document.querySelector('.mobile-nav-toggle')?.addEventListener('click', function() {
  this.style.transform = 'rotate(180deg) scale(1.2)';
  setTimeout(() => {
    this.style.transform = '';
  }, 300);
});
</script>
