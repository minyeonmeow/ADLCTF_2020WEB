FROM php:7.2-apache

# crontab
RUN echo "30 * * * *  find /var/www/html/upload/ -type f -mmin +30 -name \"*.jpg\" -exec rm -rf {}" >> /etc/crontab
