#! /bin/bash
# Remove the cleanup task installed before from root's crontab.

if [[ $EUID != 0 ]]; then
    echo "Root privilege required!"
    exit 1
fi

tmp=$(mktemp)

sudo crontab -l | \
    grep -v "30 \* \* \* \*  find.*-type f -mmin +30 -name \"\*\.jpg\" -exec rm -rf {}" > $tmp

sudo crontab $tmp

echo "Done."
