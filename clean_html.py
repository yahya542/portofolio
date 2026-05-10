import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace all margin-left: 200px; and colors
content = re.sub(r'style="[^"]*margin-left:\s*200px[^"]*"', '', content)
content = re.sub(r'style="margin-bottom: 30px;\s*color: #ff9f43;"', '', content)
content = re.sub(r'style="color: #0077b6; font-weight: bolder;"', '', content)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)
