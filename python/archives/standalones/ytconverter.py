from pytube import YouTube

video = YouTube(input("Link: "))

formats = video.streams

for i in range(len(formats)):
    print(i+1,'- ',formats[i])

vnum = int(input("Escolha o número do formato desejado: "))-1

dir = r"C:\Users\akila\Downloads"

print("Downloading...")
formats[vnum].download(dir)
print("Done!")


