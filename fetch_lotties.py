import urllib.request
import re

urls = [
    'https://lottiefiles.com/animations/untitled-file-OAHxNuU4Si',
    'https://lottiefiles.com/animations/6-1mo3C04OXC',
    'https://lottiefiles.com/animations/complete-MKKKNzoUXV',
    'https://lottiefiles.com/animations/growing-plant-1sqUkEmSHl',
    'https://lottiefiles.com/animations/fanndrop-spark-6NSSGC1Ans',
    'https://lottiefiles.com/animations/flower-animation-7657sr3SyT',
    'https://lottiefiles.com/animations/flower-animation-qtvo8wJqH2'
]

for url in urls:
    req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
    try:
        with urllib.request.urlopen(req) as response:
            html = response.read().decode('utf-8')
            m = re.search(r'\"lottieUrl\":\"(https://[^\"]+)\"', html)
            if not m:
                m = re.search(r'\"url\":\"(https://[^\"]+\.lottie)\"', html)
            if not m:
                m = re.search(r'\"(https://lottie\.host/[^\"]+\.json)\"', html)
            if m:
                print(url, '=>', m.group(1))
            else:
                print(url, '=> Not found')
    except Exception as e:
        print(url, '=>', e)
