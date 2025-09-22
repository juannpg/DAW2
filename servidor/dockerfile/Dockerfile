FROM ubuntu:latest

RUN apt update && apt install -y apache2 libapache2-mod-php

COPY ./src/ /var/www/html/

EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]