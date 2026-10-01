import sys, io, re
sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')
php_path = r'database\seeders\WheelOfLifeSeeder.php'
content = open(php_path, 'r', encoding='utf-8').read()
idx = content.find('$recs = [')
print(content[idx:idx+1500])