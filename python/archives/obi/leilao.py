n = int(input())
lances = {}

for i in range(n):
    c = input()
    v = int(input())
    lances[c] = v

m_lance = max(lances, key=lances.get)

print(m_lance)
print(lances[m_lance])