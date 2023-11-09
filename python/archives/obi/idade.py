n = [int(input()),int(input()),int(input())]

nmx = n.index(max(n))
nmn = n.index(min(n))

n[nmx] = 0
n[nmn] = 0

print(max(n))