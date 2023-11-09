m = int(input())
n = int(input())

mapa = [[0 for i in range(n)] for j in range(m)]

for i in range(m):
    for j in range(n):
      x = int(input())
      mapa[i][j] = x

pedidos = int(input())
pedidos_realizados = 0

for i in range(pedidos):
    tipo = int(input())-1
    tamanho = int(input())-1

    if (mapa[tipo][tamanho] >= 1):
      mapa[tipo][tamanho] -= 1
      pedidos_realizados += 1

print(pedidos_realizados)