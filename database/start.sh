#!/bin/sh

trap "exit" SIGINT
trap "exit" SIGTERM

if [ ! -d /run/mysqld ]; then
	echo "Creating mysqld"
	mkdir -p /run/mysqld
	chown -R mysql:mysql /run/mysqld
else
	echo "mysqld found, skipping creation"
	chown -R mysql:mysql /run/mysqld
fi


if [ -z "$(ls -A /var/lib/mysql)" ]; then
	echo "/var/lib/mysql empty, initializing mysql system database"
	mysql_install_db --user=mysql --datadir=/var/lib/mysql
	chown -R mysql:mysql /var/lib/mysql
else
	echo "Mysql system db already present"
	chown -R mysql:mysql /var/lib/mysql
fi

tfile=`mktemp`

if [ ! -f "$tfile" ]; then
	return 1
fi

cat << EOF > $tfile
CREATE DATABASE IF NOT EXISTS $MYSQL_WORDPRESS_DB;
CREATE USER  IF NOT EXISTS '$MYSQL_WORDPRESS_USER'@'localhost' IDENTIFIED BY '$MYSQL_WORDPRESS_PASSWORD';
GRANT ALL ON $MYSQL_WORDPRESS_DB.* to '$MYSQL_WORDPRESS_USER'@'%' IDENTIFIED BY '$MYSQL_WORDPRESS_PASSWORD' WITH GRANT OPTION;
FLUSH PRIVILEGES;
EOF

mysqld_safe --user=mysql --datadir=/var/lib/mysql --no-watch &

sleep 3

mysql -u root < $tfile

tail -f /dev/null