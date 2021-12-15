FROM phpdockerio/php74-fpm:latest
WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install sudo supervisor cron php7.4-mysql php-redis php7.4-bcmath php7.4-gd php-imagick php7.4-imap php7.4-soap \
    && composer global require hirak/prestissimo \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN apt-get update \
    && apt-get -y --no-install-recommends install  php7.4-xdebug
    
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY cron/app /etc/cron.d/app

RUN chmod 0744 /etc/cron.d/app
RUN crontab /etc/cron.d/app

RUN adduser --system --disabled-password --uid 1000 --gid 33 user \
    && usermod -a -G sudo user \
    && echo "user ALL=(root) NOPASSWD:ALL" >> /etc/sudoers \
    && chmod 0440 /etc/sudoers

USER user

CMD ["sudo","/usr/bin/supervisord"]
