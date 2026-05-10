import re

files_to_update = ['resources/views/frontend/home.blade.php', 'index.html']

for file in files_to_update:
    with open(file, 'r', encoding='utf-8') as f:
        content = f.read()

    # Update body background
    content = re.sub(r'body \{\s*background-color: #0b1120;\s*\}', 'body {\n        background-color: #f8fafc;\n    }', content)
    
    # Update hero background
    content = re.sub(r'\.hero \{\s*position: relative;[^{]*?background: #0b1120;', '.hero {\n      position: relative;\n      overflow: hidden;\n      min-height: 100vh;\n      display: flex;\n      align-items: center;\n      justify-content: center;\n      background: #f8fafc;', content)

    # Hero::before dark radial gradients -> light radial gradients
    content = re.sub(r'rgba\(56,\s*189,\s*248,\s*0\.1\)', 'rgba(37, 99, 235, 0.1)', content)
    content = re.sub(r'rgba\(129,\s*140,\s*248,\s*0\.15\)', 'rgba(124, 58, 237, 0.1)\n', content)

    # Hero content box shadow
    content = re.sub(r'box-shadow: 0 30px 60px rgba\(0, 0, 0, 0\.3\), inset 0 1px 0 rgba\(255, 255, 255, 0\.1\);', 'box-shadow: 0 30px 60px rgba(0, 0, 0, 0.05), inset 0 1px 0 rgba(255, 255, 255, 1);', content)

    # Welcome msg background and border
    content = re.sub(r'background: rgba\(56,\s*189,\s*248,\s*0\.1\);\s*padding: 10px 24px;\s*border-radius: 50px;\s*border: 1px solid rgba\(56,\s*189,\s*248,\s*0\.2\);', 'background: rgba(37, 99, 235, 0.05);\n      padding: 10px 24px;\n      border-radius: 50px;\n      border: 1px solid rgba(37, 99, 235, 0.2);', content)
    
    # hero h1 font colors
    content = re.sub(r'background: linear-gradient\(135deg,\s*#f8fafc\s*0%,\s*#94a3b8\s*100%\);', 'background: linear-gradient(135deg, #0f172a 0%, #475569 100%);', content)

    # hero h2 color
    content = re.sub(r'color: #94a3b8;', 'color: #475569;', content)

    # typing-text color
    content = re.sub(r'color: #cbd5e1;', 'color: #334155;', content)

    # btn-custom default style
    content = re.sub(r'background: rgba\(255,\s*255,\s*255,\s*0\.05\);\s*border: 1px solid rgba\(255,\s*255,\s*255,\s*0\.1\);\s*color: #f8fafc;', 'background: #ffffff;\n      border: 1px solid rgba(0, 0, 0, 0.1);\n      color: #0f172a;', content)
    
    # social icons
    content = re.sub(r'border-top: 1px solid rgba\(255,\s*255,\s*255,\s*0\.08\);', 'border-top: 1px solid rgba(0, 0, 0, 0.05);', content)
    content = re.sub(r'background: rgba\(255,\s*255,\s*255,\s*0\.03\);', 'background: #ffffff;', content)
    content = re.sub(r'border: 1px solid rgba\(255,\s*255,\s*255,\s*0\.08\);', 'border: 1px solid rgba(0, 0, 0, 0.05);', content)

    # hover colors on buttons and icons
    content = re.sub(r'rgba\(56,\s*189,\s*248,\s*0\.3\)', 'rgba(37, 99, 235, 0.2)', content)

    # specific inline variables in home.blade.php
    content = re.sub(r'--glass-bg: rgba\(30,\s*41,\s*59,\s*0\.5\);', '--glass-bg: rgba(255, 255, 255, 0.85);', content)
    content = re.sub(r'--glass-border: rgba\(255,\s*255,\s*255,\s*0\.08\);', '--glass-border: rgba(255, 255, 255, 1);', content)
    content = re.sub(r'--gradient-1: #38bdf8;', '--gradient-1: #2563eb;', content)
    content = re.sub(r'--gradient-2: #818cf8;', '--gradient-2: #7c3aed;', content)

    # In home.blade.php there's a body text color for #nav-menu:
    content = re.sub(r'#nav-menu\s*\{\s*color:\s*#fff;\s*\}', '#nav-menu  {\n      color: #0f172a;\n    }', content)
    content = re.sub(r'\.page-index .nav-menu a:hover\s*\{\s*color:\s*whitesmoke;\s*\}', '.page-index .nav-menu a:hover {\n      color: #64748b;\n    }', content)

    with open(file, 'w', encoding='utf-8') as f:
        f.write(content)
