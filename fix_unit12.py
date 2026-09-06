import os
import glob
import re

units_dir = r"C:\Users\AIO\source\reposVsc\antigravity-exam-system\antigravity-exam-system\antigravity\database\data\graded_exams\marketing_ibta\units"

for file_path in glob.glob(os.path.join(units_dir, "*.php")):
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()
    
    orig = content
    
    # Fix the specific line in unit_12
    content = content.replace(
        "تعتبر Google Trends،  Answer the Public Keyword Generatorضمن الأدوات",
        "تعتبر Google Trends, Answer the Public, Keyword Generator ضمن الأدوات"
    )
    
    # Also I will revert and fix Google Trends، if any other exists
    content = content.replace("Google Trends،", "Google Trends,")
    
    if orig != content:
        with open(file_path, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"Fixed {os.path.basename(file_path)}")
print("Done")
