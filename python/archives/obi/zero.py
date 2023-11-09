n = int(input())
x = []

for i in range(n):

    x.append(int(input()))
    
    if x[-1] == 0 and x != [0]:
        x.pop(); x.pop()

print(sum(x))