import re

with open('assets/css/main.css', 'r', encoding='utf-8') as f:
    content = f.read()

replacement = """/* Global Colors */
:root {
  --background-color: #0b1120;
  --default-color: #94a3b8;
  --heading-color: #f8fafc;
  --accent-color: #38bdf8;
  --surface-color: #1e293b;
  --contrast-color: #ffffff;
  --gradient-1: #38bdf8;
  --gradient-2: #818cf8;
  --glass-bg: rgba(30, 41, 59, 0.5);
  --glass-border: rgba(255, 255, 255, 0.08);
}"""

content = re.sub(r'/\* Global Colors \*/\s*:root\s*\{[^}]*\}', replacement, content)

with open('assets/css/main.css', 'w', encoding='utf-8') as f:
    f.write(content)

