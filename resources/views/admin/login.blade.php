<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800;900&family=Poppins:wght@100;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --white: #FFFFFF;
            --lightblue: #87CEEB;
            --lightblue-dark: #5bb3d8;
            --lightblue-light: #B3E5FC;
            --yellow: #FFD700;
            --yellow-dark: #FFB300;
            --yellow-light: #FFE082;
            --black: #1a1a1a;
            --gray: #666666;
            --off-white: #f8f9fa;
            --gradient-accent: linear-gradient(135deg, #87CEEB 0%, #FFD700 100%);
        }

        * {
            font-family: 'Outfit', sans-serif;
        }

        body {
            background: var(--gradient-accent);
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }

        .login-wrapper {
            background: var(--white);
            border-radius: 30px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
            padding: 50px 40px;
            max-width: 440px;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .login-wrapper::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -30%;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, rgba(135,206,235,0.15), rgba(255,215,0,0.15));
            border-radius: 50%;
            filter: blur(60px);
        }

        .login-wrapper::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -20%;
            width: 250px;
            height: 250px;
            background: linear-gradient(135deg, rgba(255,215,0,0.1), rgba(135,206,235,0.1));
            border-radius: 50%;
            filter: blur(60px);
        }

        .login-header {
            text-align: center;
            margin-bottom: 35px;
            position: relative;
            z-index: 1;
        }

        .login-header .logo-icon {
            width: 70px;
            height: 70px;
            background: var(--gradient-accent);
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            box-shadow: 0 10px 30px rgba(135,206,235,0.3);
        }

        .login-header .logo-icon i {
            font-size: 2rem;
            color: var(--white);
        }

        .login-header h2 {
            color: var(--black);
            font-weight: 800;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            font-family: 'Poppins', sans-serif;
        }

        .login-header p {
            color: var(--gray);
            font-size: 0.95rem;
        }

        .form-floating {
            margin-bottom: 1.2rem;
            position: relative;
            z-index: 1;
        }

        .form-floating .form-control {
            border-radius: 14px;
            padding: 1rem 1.2rem;
            border: 2px solid #E3F2FD;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--off-white);
        }

        .form-floating .form-control:focus {
            border-color: var(--lightblue);
            box-shadow: 0 0 0 0.2rem rgba(135,206,235,0.15);
            background: var(--white);
        }

        .form-floating label {
            padding: 1rem 1.2rem;
            color: var(--gray);
            font-weight: 500;
        }

        .form-check-input:checked {
            background-color: var(--lightblue);
            border-color: var(--lightblue);
        }

        .form-check-label {
            color: var(--gray);
            font-size: 0.9rem;
        }

        .btn-login {
            background: var(--gradient-accent);
            border: none;
            border-radius: 14px;
            padding: 1rem 2rem;
            font-weight: 700;
            font-size: 1.05rem;
            width: 100%;
            color: var(--white);
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            position: relative;
            z-index: 1;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .btn-login:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 15px 40px rgba(135,206,235,0.4);
        }

        .btn-login:active {
            transform: translateY(0) scale(0.98);
        }

        .alert {
            border-radius: 14px;
            border: none;
            padding: 0.8rem 1.2rem;
            font-size: 0.9rem;
            position: relative;
            z-index: 1;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.08);
            color: #dc3545;
            border-left: 4px solid #dc3545;
        }

        .login-footer {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--gray);
            font-size: 0.85rem;
            position: relative;
            z-index: 1;
        }

        .login-footer i {
            color: var(--lightblue);
        }

        @media (max-width: 576px) {
            .login-wrapper {
                padding: 35px 25px;
                border-radius: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-header">
            <div class="logo-icon">
                <i class="bi bi-shield-lock-fill"></i>
            </div>
            <h2>Admin Login</h2>
            <p>Access the portfolio management system</p>
        </div>

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle me-1"></i> {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" required
                       value="{{ old('email') }}" placeholder="Email Address">
                <label for="email"><i class="bi bi-envelope me-1"></i>Email Address</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" required
                       placeholder="Password">
                <label for="password"><i class="bi bi-key me-1"></i>Password</label>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn-login">
                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
            </button>
        </form>

        <div class="login-footer">
            <i class="bi bi-shield-check me-1"></i>
            Only authorized personnel should access this area.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>