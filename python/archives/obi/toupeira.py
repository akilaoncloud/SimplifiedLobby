s = int(input())
t = int(input())

mapa = [[0 for i in range(s)] for j in range(s)]

for i in range(t):
      x = int(input())-1
      y = int(input())-1
      mapa[x][y] = 1
      mapa[y][x] = 1

print(mapa)
p = int(input())
p_check = 0

for i in range(p):
    tm_p = int(input())
    rota_ant = -1
    p_close = 0

    for i in range(tm_p):
    
      rota = int(input())-1

      if rota_ant >= 0:

        if mapa[rota_ant][rota] != 1:
          p_close = 1
          break

        rota_ant = rota

      else:
        rota_ant = rota
    
    if p_close == 0:
        p_check += 1

print(p_check)