#!/bin/sh

adduser -D -g 'www' www
cd /usr/share/webapps/
if [[ ! -d wordpress ]]; then
	wget http://wordpress.org/latest.tar.gz
	tar -xzvf latest.tar.gz
fi

if [[ ! -f /usr/share/webapps/wordpress/wp-config.php ]]; then
	mv /wp-config.php /usr/share/webapps/wordpress
fi

chown -R www:www *

tail -f /dev/null