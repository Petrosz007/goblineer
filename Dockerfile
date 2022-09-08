FROM ubuntu:22.10

RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && apt-get -y install --no-install-recommends \
    apache2 apache2-utils \
    php8.1 php8.1-mysql php8.1-curl

COPY docker/apache2.conf /etc/apache2/sites-enabled/000-default.conf

RUN rm -rf /var/www/html/
COPY src/ /var/www/html/

EXPOSE 80
CMD ["apache2ctl", "-D", "FOREGROUND"]
