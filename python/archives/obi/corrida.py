lo = 0
ns = 0
l = 0
h = 0

n = int(input())

for i in range(n):
    d = input()
    di = int(d[:2])

    if "L" in d:
        lo += di
    if "O" in d:
        lo -= di
    if abs(lo) > l:
        l = abs(lo)

    if "N" in d:
        ns += di
    if "S" in d:
        ns -= di
    if abs(ns) > h:
        h = abs(ns)

print(int((l+h+4)*2))