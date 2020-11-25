FROM alpine:latest

RUN apk update && apk add nginx openssl \
&& adduser -D -g 'www' www \
&& mkdir /www \
&& chown -R www:www /var/lib/nginx \
&& chown -R www:www /www \
&& openssl req -x509 -nodes -days 365 \
-subj "/C=CA/ST=QC/O=Company, Inc./CN=mydomain.com" \
-addext "subjectAltName=DNS:mydomain.com" -newkey rsa:2048 \
-keyout /etc/ssl/private/nginx-selfsigned.key \
-out /etc/ssl/certs/nginx-selfsigned.crt \
&& mv /etc/nginx/nginx.conf /etc/nginx.conf.orig

RUN apk add php7-fpm \
php7-mcrypt \
php7-soap \
php7-openssl \
php7-gmp \
php7-pdo_odbc \
php7-json \
php7-dom \
php7-pdo \
php7-zip \
php7-mysqli \
php7-sqlite3 \
php7-apcu \
php7-pdo_pgsql \
php7-bcmath \
php7-gd \
php7-odbc \
php7-pdo_mysql \
php7-pdo_sqlite \
php7-gettext \
php7-xmlreader \
php7-xmlrpc \
php7-bz2 \
php7-iconv \
php7-pdo_dblib \
php7-curl \
php7-ctype

ENV PHP_FPM_USER="www" \
PHP_FPM_GROUP="www" \
PHP_FPM_LISTEN_MODE="0660" \
PHP_MEMORY_LIMIT="512M" \
PHP_MAX_UPLOAD="50M" \
PHP_MAX_FILE_UPLOAD="200" \
PHP_MAX_POST="100M" \
PHP_DISPLAY_ERRORS="On" \
PHP_DISPLAY_STARTUP_ERRORS="On" \
PHP_ERROR_REPORTING="E_COMPILE_ERROR\|E_RECOVERABLE_ERROR\|E_ERROR\|E_CORE_ERROR" \
PHP_CGI_FIX_PATHINFO=0

COPY ./conf/php/www.conf /etc/php7/php-fpm.d/www.conf
COPY ./conf/nginx/nginx.conf /etc/nginx/
COPY ./conf/php/php.ini /etc/php7/

RUN apk add tzdata \
&& TIMEZONE="Europe/Paris" \
&& cp /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
&& echo "${TIMEZONE}" > /etc/timezone \
&& sed -i "s|;*date.timezone =.*|date.timezone = ${TIMEZONE}|i" /etc/php7/php.ini

COPY ./index.html /www
COPY ./phpinfo.php /www

COPY docker-entry.sh /

EXPOSE 80
EXPOSE 443

ENTRYPOINT ["/docker-entry.sh"]
CMD ["nginx", "php-fpm7"]