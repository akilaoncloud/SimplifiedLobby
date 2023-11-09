v = int(input())
cp = [int(input()),int(input()),int(input())]
contas_pagas = 0

for i in range(3):
    mnc = min(cp)
    if (v - mnc) >= 0:
        v = v - mnc
        contas_pagas += 1
        cp.remove(mnc)

print(contas_pagas)

