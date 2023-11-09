import pygame, sys, os
from random import randrange

# Função de Movimentação do Obstáculo

def obstacleMoving():
    global ox_speed, oy_speed, life # <- Transforma a variável local em global, podendo ser usada antes de ser declarada abaixo.

    obstaculo.x += ox_speed
    obstaculo.y += oy_speed

    # Colisão com bordas da tela
    if (obstaculo.right >= screen_width or obstaculo.left <= 0):
        ox_speed *= -1 # <- Inverte a direção do obstáculo.

    if (obstaculo.bottom >= screen_height or obstaculo.top <= 0):
        oy_speed *= -1

    if obstaculo.bottom > screen_height:
            obstaculo.y = screen_height - obstaculo.height
    
    if obstaculo.top < 0:
            obstaculo.y = 0

    if obstaculo.right > screen_width:
            obstaculo.x = screen_width - obstaculo.width
    
    if obstaculo.left < 0:
            obstaculo.x = 0

    # Colisão com Obstáculo
    collision_tolerance = 15
    if obstaculo.colliderect(player):
        if abs(player.top - obstaculo.bottom) < collision_tolerance and oy_speed > 0:
            oy_speed *= -1
            life -= 1
            pygame.mixer.Sound.play(hit)
        if abs(player.bottom - obstaculo.top) < collision_tolerance and oy_speed < 0:
            oy_speed *= -1
            life -= 1
            pygame.mixer.Sound.play(hit)
        if abs(player.right - obstaculo.left) < collision_tolerance and ox_speed < 0:
            ox_speed *= -1
            life -= 1
            pygame.mixer.Sound.play(hit)
        if abs(player.left - obstaculo.right) < collision_tolerance and ox_speed > 0:
            ox_speed *= -1
            life -= 1
            pygame.mixer.Sound.play(hit)

        if (life <= 0):
            pygame.quit()
            sys.exit()

def obstacleMoving2():
    global ox_speed2, oy_speed2, life # <- Transforma a variável local em global, podendo ser usada antes de ser declarada abaixo.

    obstaculo2.x += ox_speed2
    obstaculo2.y += oy_speed2

    # Colisão com bordas da tela
    if (obstaculo2.right >= screen_width or obstaculo2.left <= 0):
        ox_speed2 *= -1 # <- Inverte a direção do obstáculo.

    if (obstaculo2.bottom >= screen_height or obstaculo2.top <= 0):
        oy_speed2 *= -1

    if obstaculo2.bottom > screen_height:
            obstaculo2.y = screen_height - obstaculo2.height
    
    if obstaculo2.top < 0:
            obstaculo2.y = 0

    if obstaculo2.right > screen_width:
            obstaculo2.x = screen_width - obstaculo2.width
    
    if obstaculo2.left < 0:
            obstaculo2.x = 0

    # Colisão com Obstáculo
    collision_tolerance = 15
    if obstaculo2.colliderect(player):
        if abs(player.top - obstaculo2.bottom) < collision_tolerance and oy_speed2 > 0:
            oy_speed2 *= -1
            life -= 1
            pygame.mixer.Sound.play(hit)
        if abs(player.bottom - obstaculo2.top) < collision_tolerance and oy_speed2 < 0:
            oy_speed2 *= -1
            life -= 1
            pygame.mixer.Sound.play(hit)
        if abs(player.right - obstaculo2.left) < collision_tolerance and ox_speed2 < 0:
            ox_speed2 *= -1
            life -= 1
            pygame.mixer.Sound.play(hit)
        if abs(player.left - obstaculo2.right) < collision_tolerance and ox_speed2 > 0:
            ox_speed2 *= -1
            life -= 1
            pygame.mixer.Sound.play(hit)

        if (life <= 0):
            pygame.quit()
            sys.exit()

# Inicialização do Jogo

pygame.init()
pygame.mixer.init()

screen_width, screen_height = 600,400 
screen = pygame.display.set_mode((screen_width,screen_height))

clock = pygame.time.Clock() # <- Acompanha o tempo de jogo (Pode medir o tempo entre dois frames ou limitar o FPS).
count = 0

# Música e SFX
s = "python/archives/joguinho/music_sfx"

music = pygame.mixer.music.load(os.path.join(s, 'music.mp3'))
hit = pygame.mixer.Sound(os.path.join(s, 'hit.mp3'))

pygame.mixer.music.play(0)

# Criação do Player
player = pygame.Rect(randrange(560),randrange(360),40,40) # <- Cria o Retângulo Player
p_speed, life = 3, 15

# Criação do Obstáculo 1 e 2
obstaculo = pygame.Rect(randrange(560),randrange(360),40,40) # <- Cria o Retângulo Obstáculo
ox_speed, oy_speed = 3,3

obstaculo2 = pygame.Rect(randrange(560),randrange(360),40,40) # <- Cria o Retângulo Obstáculo 2
ox_speed2, oy_speed2 = -3,-3

# Jogo funcionando
while True:
    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            pygame.quit()
            sys.exit()

    screen.fill((30,30,30))

    pygame.draw.rect(screen,(0,0,255),player) # <- Desenha o Retângulo Player
    pygame.draw.rect(screen,(255,0,0),obstaculo) # <- Desenha o Retângulo Obstáculo 1
    pygame.draw.rect(screen,(255,255,0),obstaculo2) # <- Desenha o Retângulo Obstáculo 2

    for i in range(life):
        pygame.draw.circle(screen, (0, 255, 20), (20 + i * 30, 20), 10)

    clock.tick(200)

    count += 1
    timer = count / 200

    font = pygame.font.Font(None, 36)       
    text = font.render("Score: " + str(round(timer) * 10), False, (255, 255, 255))
    screen.blit(text, (14, 40))

    keys = pygame.key.get_pressed()
    if keys[pygame.K_UP]:
        player.y -= p_speed
    if keys[pygame.K_DOWN]:
        player.y += p_speed
    if keys[pygame.K_LEFT]:
        player.x -= p_speed
    if keys[pygame.K_RIGHT]:
        player.x += p_speed

    if player.bottom > screen_height:
            player.y = screen_height - player.height
    
    if player.top < 0:
            player.y = 0

    if player.right > screen_width:
            player.x = screen_width - player.width
    
    if player.left < 0:
            player.x = 0

    if (timer >= 3.28):
        obstacleMoving()
        obstacleMoving2()

    pygame.display.flip()  