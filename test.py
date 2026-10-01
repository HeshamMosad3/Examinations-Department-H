import sys, io
sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')
with open('C:/Users/AIO/.gemini/antigravity/brain/22dc2960-aef7-4d75-8051-5bc39c630082/.system_generated/steps/24227/output.txt', 'r', encoding='utf-8') as f:
    text = f.read()

cp1252_to_byte = {}
for b in range(256):
    try:
        c = bytes([b]).decode('cp1252')
        cp1252_to_byte[c] = b
    except:
        pass

res_bytes = bytearray()
for char in text:
    if char in cp1252_to_byte:
        res_bytes.append(cp1252_to_byte[char])
    else:
        if ord(char) < 256:
            res_bytes.append(ord(char))
        else:
            res_bytes.append(63)

import re
matches = re.findall(b'text="([^"]+)"', res_bytes)
for m in matches[:30]:
    try:
        print(m.decode('utf-8'))
    except Exception as e:
        print(e)