<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Portfolio')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #343a40;
            color: white;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,.75);
        }
        .sidebar .nav-link:hover {
            color: white;
        }
        .content-wrapper {
            margin-left: 0;
        }
        @media (min-width: 768px) {
            .content-wrapper {
                margin-left: 250px;
            }
        }
        .main-header {
            background: white;
            border-bottom: 1px solid #dee2e6;
            padding: 15px 0;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar col-md-3 col-lg-2 d-md-block bg-dark sidebar-collapse">
            <div class="sidebar-sticky">
                <div class="p-3">
                    <h5 class="text-white">Admin Panel</h5>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.menus.index') }}">
                            <i class="fas fa-bars"></i> Menus
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.pages.index') }}">
                            <i class="fas fa-file"></i> Pages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.portfolio.index') }}">
                            <i class="fas fa-images"></i> Portfolio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.certificates.index') }}">
                            <i class="fas fa-award"></i> Certificates
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.images.index') }}">
                            <i class="fas fa-images"></i> Image Gallery
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <a class="nav-link text-danger" href="{{ route('admin.logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <div class="flex-grow-1">
            <!-- Header -->
            <header class="main-header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="mb-0">@yield('page_title', 'Dashboard')</h4>
                        </div>
                        <div class="col-auto">
                            <span class="text-muted">Welcome, {{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>