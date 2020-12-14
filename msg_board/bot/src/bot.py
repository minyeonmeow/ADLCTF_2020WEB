import time
import subprocess
cmd = ['nodejs', './bot.js']

while True :
    try :
        subprocess.run(cmd, timeout = 5)
        time.sleep(5)  # read a new message from any one every 5 sec
    except subprocess.TimeoutExpired :
        print('run script timeout.')

