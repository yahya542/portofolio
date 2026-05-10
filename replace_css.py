import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

new_style = """  <style>
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
    
    .hero-content img {
        border-radius: 50%;
        border: 4px solid rgba(255, 255, 255, 0.1);
        padding: 5px;
        transition: all 0.5s ease;
    }
    
    .hero-content img:hover {
        transform: scale(1.05) rotate(5deg);
        border-color: var(--gradient-1);
        box-shadow: 0 0 30px rgba(56, 189, 248, 0.4);
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

    .btn-custom, .btn-outline-custom {
      padding: 14px 40px;
      border-radius: 50px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      font-size: 0.9rem;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      margin: 5px;
    }

    .btn-outline-custom {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      color: #f8fafc;
    }

    .btn-outline-custom:hover {
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

    .scroll-indicator {
      position: absolute;
      bottom: 40px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 2;
      color: #64748b;
      display: flex;
      flex-direction: column;
      align-items: center;
      animation: bounce 2s infinite;
    }

    .scroll-indicator span {
      margin-bottom: 10px;
      font-size: 0.75rem;
      letter-spacing: 3px;
      font-weight: 600;
      text-transform: uppercase;
    }

    @keyframes rotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(40px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
      40% { transform: translateX(-50%) translateY(-15px); }
      60% { transform: translateX(-50%) translateY(-5px); }
    }

    /* Service Offers */
    .service-offers {
      background-color: #0f172a;
      padding: 100px 0;
      position: relative;
    }

    .service-offers::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
    }

    .service-offers .section-title h2 {
      font-family: 'Outfit', sans-serif;
      color: #f8fafc;
      font-size: 2.5rem;
    }

    .service-offers .section-title p {
      color: var(--gradient-1);
      letter-spacing: 2px;
      text-transform: uppercase;
      font-size: 0.9rem;
      font-weight: 600;
    }

    .service-header h3 {
      background: linear-gradient(135deg, var(--gradient-1), var(--gradient-2));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-weight: 800;
      font-size: 2.5rem;
    }
    
    .service-header p {
        color: #94a3b8;
        font-size: 1.1rem;
    }

    .pricing-card {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border-radius: 24px;
      border: 1px solid var(--glass-border);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
      transition: all 0.4s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
      position: relative;
      overflow: hidden;
    }

    .pricing-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: linear-gradient(90deg, var(--gradient-1), var(--gradient-2));
      opacity: 0;
      transition: opacity 0.4s ease;
    }

    .pricing-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
      border-color: rgba(255,255,255,0.15);
    }
    
    .pricing-card:hover::before {
        opacity: 1;
    }

    .pricing-header {
      text-align: center;
      padding: 40px 30px 20px;
      border-bottom: 1px solid var(--glass-border);
    }

    .pricing-title {
      color: #f8fafc;
      font-weight: 700;
      font-family: 'Outfit', sans-serif;
    }

    .pricing-price {
      font-size: 32px;
      font-weight: 800;
      color: var(--gradient-1);
      margin-bottom: 5px;
    }

    .pricing-subtitle {
      color: #64748b;
      font-size: 0.85rem;
      letter-spacing: 2px;
    }

    .pricing-body {
      padding: 30px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .pricing-body p {
      color: #94a3b8;
      font-size: 1rem;
    }

    .btn-custom {
      background: linear-gradient(135deg, var(--gradient-1), var(--gradient-2));
      border: none;
      color: white;
      width: 100%;
      display: block;
      padding: 14px;
      border-radius: 12px;
    }

    .btn-custom:hover {
      box-shadow: 0 10px 20px rgba(129, 140, 248, 0.3);
      color: white;
      transform: translateY(-2px);
    }

    @media (max-width: 992px) {
      .hero h1 { font-size: 3rem; }
    }

    @media (max-width: 768px) {
      .hero h1 { font-size: 2.2rem; }
      .hero-content { padding: 3rem 2rem; }
      .welcome-msg { font-size: 0.8rem; margin-bottom: 20px; }
      .hero h2 { font-size: 1.2rem; }
    }
  </style>"""

pattern = re.compile(r'<style>.*?</style>', re.DOTALL)
new_content = pattern.sub(new_style, content)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(new_content)
