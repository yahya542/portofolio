<header id="header" class="header d-flex align-items-center light-background sticky-top">
  <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

    <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
      <img src="{{ asset('assets/img/aku.png') }}" alt="" srcset="" id="admin-login-trigger">
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        @php
          $mainMenus = $menus[null] ?? collect();
        @endphp
        @foreach($mainMenus as $menu)
          @if($menu->children->count() > 0)
            <li class="dropdown">
              <a href="{{ $menu->url }}" @if($menu->url == '#') onclick="return false;" @endif>
                <span>{{ $menu->name }}</span>
                <i class="bi bi-chevron-down toggle-dropdown"></i>
              </a>
              <ul>
                @foreach($menu->children as $child)
                  <li><a href="{{ $child->url }}">{{ $child->name }}</a></li>
                @endforeach
              </ul>
            </li>
          @else
            <li><a href="{{ $menu->url }}" class="{{ request()->is($menu->url == '/' ? '' : ltrim($menu->url, '/')) ? 'active' : '' }}">{{ $menu->name }}</a></li>
          @endif
        @endforeach
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <div class="header-social-links">
      <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>

  </div>
</header>