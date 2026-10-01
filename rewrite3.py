import sys, io, re, json
sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')

md_path = r'C:\Users\AIO\Downloads\مقياس_عجلة_الحياة.md'
php_path = r'database\seeders\WheelOfLifeSeeder.php'

text = open(md_path, 'r', encoding='utf-8').read()

descriptions = {
  'الجانب الروحاني': 'الروحاني يقيس مدى التزام الفرد بالعبادات والممارسات الإيمانية، وانعكاس القيم الروحية على سلوكه بما يمنحه السكينة والاستقرار النفسي.',
  'الجانب الصحي': 'الصحي يقيس مدى تبني الفرد لعادات صحية متكاملة تشمل التغذية، النشاط البدني، كفاية النوم، والتدابير الوقائية لدعم العافية الجسدية.',
  'الجانب الشخصي (النمو والتطوير الذاتي)': 'الشخصي يقيس مستوى سعي الفرد للتعلم المستمر، وفاعليته في تنظيم وقته، ووضع الأهداف الشخصية والعمل على تحقيقها',
  'الجانب العائلي': 'العائلي يقيس جودة التواصل الأسري، ومستوى تحمل المسؤوليات، والدعم المتبادل، والقدرة على إدارة الخلافات العائلية بحوار وإيجابية',
  'الجانب الاجتماعي': 'الاجتماعي يقيس مدى اهتمام الفرد بصلة الأرحام وبناء علاقات إيجابية مع المحيط، والمشاركة الفاعلة في المناسبات والمبادرات المجتمعية.',
  'الجانب المهني': 'المهني يقيس انضباط الفرد والتزامه بأنظمة العمل، وجودة أدائه المهني، وسعيه لتطوير مهاراته وبناء علاقات عمل إيجابية.',
  'الجانب المالي': 'المالي يقيس مدى كفاءة الفرد في التخطيط المالي، وإدارة الدخل والمصروفات، والقدرة على الادخار والاستثمار والوفاء بالالتزامات المالية.',
  'الجانب الترفيهي': 'الترفيهي يقيس قدرة الفرد على التوازن بين العمل والحياة، وممارسة الهوايات والأنشطة الترفيهية لتجديد الطاقة وتخفيف ضغوط الحياة.'
}

dimensions = []
current_dim = None

lines = text.split('\n')
for line in lines:
    line = line.strip()
    if line.startswith('# المحور '):
        name = line.split(':')[-1].strip()
        desc = descriptions.get(name, '')
        if not desc and 'الروحاني' in name: desc = descriptions['الجانب الروحاني']
        if not desc and 'الصحي' in name: desc = descriptions['الجانب الصحي']
        if not desc and 'الشخصي' in name: desc = descriptions['الجانب الشخصي (النمو والتطوير الذاتي)']
        if not desc and 'العائلي' in name: desc = descriptions['الجانب العائلي']
        if not desc and 'الاجتماعي' in name: desc = descriptions['الجانب الاجتماعي']
        if not desc and 'المهني' in name: desc = descriptions['الجانب المهني']
        if not desc and 'المالي' in name: desc = descriptions['الجانب المالي']
        if not desc and 'الترفيهي' in name: desc = descriptions['الجانب الترفيهي']
        
        short_name = name
        if 'الروحاني' in name: short_name = 'الروحي'
        elif 'الصحي' in name: short_name = 'الصحي'
        elif 'الشخصي' in name: short_name = 'الشخصي'
        elif 'العائلي' in name: short_name = 'العائلي'
        elif 'الاجتماعي' in name: short_name = 'الاجتماعي'
        elif 'المهني' in name: short_name = 'المهني'
        elif 'المالي' in name: short_name = 'المالي'
        elif 'الترفيهي' in name: short_name = 'الترفيهي'
        
        current_dim = {'name': short_name, 'description': desc, 'questions': []}
        dimensions.append(current_dim)
    elif line.startswith('|') and len(line.split('|')) > 2:
        parts = line.split('|')
        try:
            num = int(parts[1].strip())
            q_text = parts[2].strip()
            if current_dim:
                current_dim['questions'].append(q_text)
        except:
            pass

php_array = "        $dimensionsData = [\n"
for i_dim, dim in enumerate(dimensions):
    php_array += "            [\n"
    php_array += f"                'name' => '{dim['name']}',\n"
    php_array += f"                'description' => '{dim['description']}',\n"
    php_array += "                'questions' => [\n"
    for i, q in enumerate(dim['questions']):
        comma = "," if i < len(dim['questions']) - 1 else ""
        q = q.replace("'", "\\'")
        php_array += f"                    '{q}'{comma}\n"
    php_array += "                ]\n"
    comma_dim = "," if i_dim < len(dimensions) - 1 else ""
    php_array += f"            ]{comma_dim}\n"
php_array += "        ];"

# Read PHP
php_content = open(php_path, 'r', encoding='utf-8').read()

# Replace block
# It might currently be `        \ = [` or `        = [` or something broken from before.
# Let's replace anything from `// 2. Dimensions & Questions` to the next block `        $dimOrder = 1;`
start_marker = "// 2. Dimensions & Questions"
end_marker = "        $dimOrder = 1;"

start_idx = php_content.find(start_marker)
end_idx = php_content.find(end_marker)

if start_idx != -1 and end_idx != -1:
    new_php = php_content[:start_idx + len(start_marker)] + "\n" + php_array + "\n\n" + php_content[end_idx:]
    with open(php_path, 'w', encoding='utf-8') as f:
        f.write(new_php)
    print("Successfully replaced dimensionsData array.")
else:
    print("Could not find markers.")