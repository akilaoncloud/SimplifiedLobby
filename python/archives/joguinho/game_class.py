import pygame, sys, os
from random import randrange

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
class player:
    def __init__(self):
        self.size = 40
        self.shape = pygame.Rect(randrange(screen_height-self.size),randrange(screen_height-self.size),self.size,self.size)
        self.speed = 3
        self.life = 15

    def playerAppearMov(self):
        
        for i in range(self.life):
            pygame.draw.circle(screen, (0, 255, 20), (20 + i * 30, 20), 10)

        pygame.draw.rect(screen,(0,0,255),player1.shape)

        keys = pygame.key.get_pressed()
        if keys[pygame.K_UP]:
            self.shape.y -= self.speed
        if keys[pygame.K_DOWN]:
            self.shape.y += self.speed
        if keys[pygame.K_LEFT]:
            self.shape.x -= self.speed
        if keys[pygame.K_RIGHT]:
            self.shape.x += self.speed

        if self.shape.bottom > screen_height:
                self.shape.y = screen_height - self.shape.height
        
        if self.shape.top < 0:
                self.shape.y = 0

        if self.shape.right > screen_width:
                self.shape.x = screen_width - self.shape.width
        
        if self.shape.left < 0:
                self.shape.x = 0

    pass

player1 = player()

# Criação do Obstáculo
class obstaculo:
    def __init__(self):
        self.size = 40
        self.shape = pygame.Rect(randrange(screen_height-self.size),randrange(screen_height-self.size),self.size,self.size)
        self.color = [
            randrange(255),
            randrange(255),
            randrange(255),
        ]
        self.ox_speed, self.oy_speed = 3,3

    def obstacleAppear(self):
        pygame.draw.rect(screen,(self.color[0],self.color[1],self.color[2]),self.shape)
    
    def obstacleMoving(self):

        self.shape.x += self.ox_speed
        self.shape.y += self.oy_speed

        # Colisão com bordas da tela
        if (self.shape.right >= screen_width or self.shape.left <= 0):
            self.ox_speed *= -1 # <- Inverte a direção do obstáculo.

        if (self.shape.bottom >= screen_height or self.shape.top <= 0):
            self.oy_speed *= -1

        if self.shape.bottom > screen_height:
                self.shape.y = screen_height - self.shape.height
        
        if self.shape.top < 0:
                self.shape.y = 0

        if self.shape.right > screen_width:
                self.shape.x = screen_width - self.shape.width
        
        if self.shape.left < 0:
                self.shape.x = 0

        # Colisão com Obstáculo
        collision_tolerance = 15
        if self.shape.colliderect(player1.shape):
            if abs(player1.shape.top - self.shape.bottom) < collision_tolerance and self.oy_speed > 0:
                self.oy_speed *= -1
                player1.life -= 1
                pygame.mixer.Sound.play(hit)
            if abs(player1.shape.bottom - self.shape.top) < collision_tolerance and self.oy_speed < 0:
                self.oy_speed *= -1
                player1.life -= 1
                pygame.mixer.Sound.play(hit)
            if abs(player1.shape.right - self.shape.left) < collision_tolerance and self.ox_speed < 0:
                self.ox_speed *= -1
                player1.life -= 1
                pygame.mixer.Sound.play(hit)
            if abs(player1.shape.left - self.shape.right) < collision_tolerance and self.ox_speed > 0:
                self.ox_speed *= -1
                player1.life -= 1
                pygame.mixer.Sound.play(hit)

            if (player1.life <= 0):
                pygame.quit()
                sys.exit()

obst1 = obstaculo()
obst2 = obstaculo()
obst3 = obstaculo()

# Jogo funcionando
while True:
    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            pygame.quit()
            sys.exit()

    screen.fill((30,30,30))

    obst1.obstacleAppear()
    obst2.obstacleAppear()
    obst3.obstacleAppear()

    player1.playerAppearMov()

    clock.tick(200)

    count += 1
    timer = count / 200

    font = pygame.font.Font(None, 36)       
    text = font.render("Score: " + str(round(timer) * 10), False, (255, 255, 255))
    screen.blit(text, (14, 40))

    if (timer >= 3.28):
        obst1.obstacleMoving()
        obst2.obstacleMoving()
        obst3.obstacleMoving()

    pygame.display.flip()  