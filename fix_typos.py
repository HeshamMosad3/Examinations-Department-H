import os
import glob
import re

units_dir = r"C:\Users\AIO\source\reposVsc\antigravity-exam-system\antigravity-exam-system\antigravity\database\data\graded_exams\marketing_ibta\units"

replacements = [
    (r"الواحدة الأولى", r"الوحدة الأولى"),
    (r"التوزبع", r"التوزيع"),
    (r"الاستبانات والاستطلاعية السرية", r"الاستبيانات والاستطلاعات السرية"),
    (r"الوحدة الثالثة سلوك المستهلك", r"الوحدة الثانية: سلوك المستهلك"),
    (r"الوحدة الثالثة: سلوك المستهلك", r"الوحدة الثانية: سلوك المستهلك"), # Just in case
    (r"م نخفض", r"منخفض"),
    (r"مضوع", r"موضوع"),
    (r"التخزين\.راجع", r"التخزين. راجع"),
    (r"Google Trendsو", r"Google Trends، "),
    (r"ضمنKeyword Generator", r"ضمن Keyword Generator"),
]

# also need to replace English words connected with و like `Google Trendsو Analytics` -> `Google Trends, Analytics`
# Actually, the user asked to replace "و" between english words with ","
def replace_english_waw(text):
    # match English word + و + optional space + English word
    # e.g., "Trendsو Analytics" -> "Trends, Analytics"
    return re.sub(r'([a-zA-Z]+)و\s*([a-zA-Z]+)', r'\1, \2', text)

def fix_punctuation(text):
    # Normalize "ص : 17", "ص: 17", "ص:17" to "ص: 17"
    text = re.sub(r"ص\s*:\s*(\d+)", r"ص: \1", text)
    return text

for file_path in glob.glob(os.path.join(units_dir, "*.php")):
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()
    
    orig_content = content
    for old, new in replacements:
        content = re.sub(old, new, content)
    
    content = replace_english_waw(content)
    content = fix_punctuation(content)
    
    if orig_content != content:
        with open(file_path, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"Updated {os.path.basename(file_path)}")
print("Done")
