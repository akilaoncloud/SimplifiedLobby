n = int(input()) 
pi = int(input()) 
pa = int(input()) 

pf = pi

for i in range(pa):
    if pf == n:
        pf = 1
    else:
        pf += 1

print(pf)