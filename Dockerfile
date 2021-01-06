FROM php:7.3-cli-stretch
COPY app /usr/src/myapp
WORKDIR /usr/src/myapp
COPY entrypoint.sh /
RUN chmod +x /entrypoint.sh
RUN mkdir /var/log/myapp
RUN  uname -a && apt update
RUN docker-php-ext-install sockets  pcntl
RUN  apt-get install libevent-dev libssl-dev nano -y && pecl install event
RUN  echo extension=event.so > /usr/local/etc/php/conf.d/30-event.ini
#ENTRYPOINT [ "/entrypoint.sh" ]
#CMD /entrypoint.sh
EXPOSE 2345
ENTRYPOINT [ "/bin/sh", "$STARTFILE" ]