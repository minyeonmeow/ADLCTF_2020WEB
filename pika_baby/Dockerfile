FROM php:7.2-apache

# turn AllowOverride on
WORKDIR /etc/apache2
RUN cat apache2.conf | grep '<Directory /var/www/>' --before-context 10000 | grep -v '<Directory /var/www/>' >/tmp/apache2.conf
RUN cat apache2.conf | grep '<Directory /var/www/>' --after-context  10000 | sed -E '1,5s/AllowOverride.*/AllowOverride All/' >>/tmp/apache2.conf
RUN mv /tmp/apache2.conf .

# enable rewrite module
RUN a2enmod rewrite
RUN service apache2 restart
