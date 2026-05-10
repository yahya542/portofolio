import re

css_files = ['public/assets/css/main.css', 'assets/css/main.css']

light_vars = """/* Global Colors */
:root {
  --background-color: #f8fafc;
  --default-color: #475569;
  --heading-color: #0f172a;
  --accent-color: #2563eb;
  --surface-color: #ffffff;
  --contrast-color: #ffffff;
  --gradient-1: #2563eb;
  --gradient-2: #7c3aed;
  --glass-bg: rgba(255, 255, 255, 0.7);
  --glass-border: rgba(255, 255, 255, 1);
}"""

for file in css_files:
    with open(file, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Replace the Global Colors block
    content = re.sub(r'/\* Global Colors \*/\s*:root\s*\{[^}]*\}', light_vars, content)
    
    # Replace header glassmorphism
    content = re.sub(r'background-color: rgba\(11,\s*17,\s*32,\s*0\.7\);', 'background-color: rgba(255, 255, 255, 0.85);', content)
    content = re.sub(r'border-bottom: 1px solid rgba\(255,\s*255,\s*255,\s*0\.05\);', 'border-bottom: 1px solid rgba(0, 0, 0, 0.05);', content)
    
    # Replace footer
    content = re.sub(r'\.footer \{\s*color: var\(--default-color\);\s*background-color: #0b1120;\s*border-top: 1px solid rgba\(255,\s*255,\s*255,\s*0\.05\);', '.footer {\n  color: var(--default-color);\n  background-color: #ffffff;\n  border-top: 1px solid rgba(0, 0, 0, 0.05);', content)
    
    with open(file, 'w', encoding='utf-8') as f:
        f.write(content)
