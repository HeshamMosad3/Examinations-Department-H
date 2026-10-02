import math

cx_d = 480.5
cy_d = 401.5
r_d = 129.8

pts_d = [
    (493.7, 127.5),
    (739.0, 230.8),
    (787.7, 461.7),
    (628.8, 661.3),
    (340.2, 661.3),
    (169.5, 466.5),
    (231.6, 230.8)
]

print('Desktop Points:')
for px, py in pts_d:
    dx = px - cx_d
    dy = py - cy_d
    dist = math.sqrt(dx**2 + dy**2)
    x1 = cx_d + r_d * (dx / dist)
    y1 = cy_d + r_d * (dy / dist)
    print(f'Line: x1="{x1:.1f}" y1="{y1:.1f}" x2="{px:.1f}" y2="{py:.1f}"')
    print(f'Circle: cx="{x1:.1f}" cy="{y1:.1f}" r="10.1"')

cx_m = 198.2
cy_m = 168.0
r_m = 54.3

pts_m = [
    (203.7, 53.3),
    (306.3, 96.6),
    (324.4, 193.1),
    (263.1, 276.6),
    (142.3, 276.6),
    (70.9, 195.1),
    (94.1, 96.6)
]

print('\nMobile Points:')
for px, py in pts_m:
    dx = px - cx_m
    dy = py - cy_m
    dist = math.sqrt(dx**2 + dy**2)
    x1 = cx_m + r_m * (dx / dist)
    y1 = cy_m + r_m * (dy / dist)
    print(f'Line: x1="{x1:.1f}" y1="{y1:.1f}" x2="{px:.1f}" y2="{py:.1f}"')
    print(f'Circle: cx="{x1:.1f}" cy="{y1:.1f}" r="4.2"')
