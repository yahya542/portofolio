import re

with open('resources/views/frontend/home.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

new_styles = """@section('styles')
<style>
    /* page-specific header/nav colour for index */
    #header {
      background-color: transparent !important;
      position: fixed;
      border: none !important;
      box-shadow: none !important;
      outline: none;
    }
    #nav-menu  {
      color: #fff;
    }
    .page-index .nav-menu a:hover {
      color: whitesmoke;
    }
    
    :root {
      --gradient-1: #38bdf8;
      --gradient-2: #818cf8;
      --glass-bg: rgba(30, 41, 59, 0.5);
      --glass-border: rgba(255, 255, 255, 0.08);
    }
    
    body {
        background-color: #0b1120;
    }

    .hero {
      position: relative;
      overflow: hidden;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #0b1120;
      width: 100%;
    }

    .hero::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle at 50% 50%, rgba(56, 189, 248, 0.1) 0%, transparent 50%),
                  radial-gradient(circle at 80% 20%, rgba(129, 140, 248, 0.15) 0%, transparent 40%);
      z-index: 1;
      animation: rotate 30s linear infinite;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      padding: 5rem 4rem;
      max-width: 900px;
      margin: 0 auto;
      background: var(--glass-bg);
      backdrop-filter: blur(24px);
      -webkit-backdrop-filter: blur(24px);
      border: 1px solid var(--glass-border);
      border-radius: 32px;
      box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.1);
      animation: fadeInUp 1s cubic-bezier(0.2, 0.8, 0.2, 1);
    }

    .welcome-msg {
      font-size: 0.9rem;
      text-transform: uppercase;
      letter-spacing: 4px;
      color: var(--gradient-1);
      margin-bottom: 2rem;
      font-weight: 700;
      display: inline-block;
      background: rgba(56, 189, 248, 0.1);
      padding: 10px 24px;
      border-radius: 50px;
      border: 1px solid rgba(56, 189, 248, 0.2);
    }

    .hero h1 {
      font-family: 'Outfit', sans-serif;
      font-size: 4rem;
      font-weight: 800;
      margin-bottom: 1rem;
      line-height: 1.1;
      letter-spacing: -1px;
      background: linear-gradient(135deg, #f8fafc 0%, #94a3b8 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .hero h2 {
      font-size: 1.5rem;
      margin-bottom: 2rem;
      color: #94a3b8;
      font-weight: 400;
      letter-spacing: 1px;
    }

    .typing-text {
      font-size: 1.25rem;
      color: #cbd5e1;
      font-weight: 500;
      min-height: 2rem;
      margin-bottom: 3rem;
      font-family: 'Inter', sans-serif;
    }

    .buttons-container {
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
    }

    .btn-custom {
      padding: 14px 40px;
      border-radius: 50px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      transition: all 0.4s ease;
      font-size: 0.9rem;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      margin: 5px;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      color: #f8fafc;
    }

    .btn-custom:hover {
      background: linear-gradient(135deg, var(--gradient-1), var(--gradient-2));
      border-color: transparent;
      color: white;
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(56, 189, 248, 0.3);
    }

    .social-icons {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 3.5rem;
      padding-top: 2rem;
      border-top: 1px solid rgba(255, 255, 255, 0.08);
    }

    .social-icons a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 48px;
      height: 48px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.03);
      color: #94a3b8;
      font-size: 1.2rem;
      transition: all 0.4s ease;
      border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .social-icons a:hover {
      transform: translateY(-5px) scale(1.1);
      background: linear-gradient(135deg, var(--gradient-1), var(--gradient-2));
      color: white;
      border-color: transparent;
      box-shadow: 0 10px 20px rgba(56, 189, 248, 0.3);
    }

    @keyframes rotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(40px); }
      to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection"""

# replace @section('styles') up to @endsection
content = re.sub(r"@section\('styles'\).*?@endsection", new_styles, content, flags=re.DOTALL)

with open('resources/views/frontend/home.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)
