#! /bin/bash
# Install a cleanup task into root's crontab.

if [[ $EUID != 0 ]]; then
    echo "Root privilege required!"
    exit 1
fi

tmp=$(mktemp)

sudo crontab -l > $tmp
echo "30 * * * *  find ${PWD}/server/upload/ -type f -mmin +30 -name \"*.*\" -exec rm -rf {}" >> $tmp
sudo crontab $tmp

echo "Done."
