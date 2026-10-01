import sys, io, re
sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')

php_path = r'database\seeders\WheelOfLifeSeeder.php'
text = open('temp_dims.txt', 'r', encoding='utf-8').read()

php_content = open(php_path, 'r', encoding='utf-8').read()
new_content = re.sub(r'\$dimensionsData\s*=\s*\[.*?\];', text, php_content, flags=re.DOTALL)

with open(php_path, 'w', encoding='utf-8') as f:
    f.write(new_content)

print('Updated dimensions in WheelOfLifeSeeder.php')