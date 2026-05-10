import glob
import re

html_files = glob.glob('*.html')
old_font = r'<link\s+href="https://fonts\.googleapis\.com/css2\?family=Roboto[^>]*>'
new_font = '<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">'

for file in html_files:
    if file == 'index.html':
        continue
    with open(file, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # We can use regex to replace it, or just match part of it
    content = re.sub(r'<link[^>]*family=Roboto[^>]*>', new_font, content)
    
    with open(file, 'w', encoding='utf-8') as f:
        f.write(content)

