FROM alpine:latest

ENV MYSQL_ROOT_USER=root \
	MYSQL_ROOT_PASSWORD=root \
	MYSQL_WORDPRESS_DB=wordpress \
	MYSQL_WORDPRESS_USER=wordpress \
	MYSQL_WORDPRESS_PASSWORD=wordpress

RUN apk add --no-cache mysql mysql-client

COPY mariadb-server.cnf /etc/my.cnf.d/

COPY start.sh start.sh

EXPOSE 3306

ENTRYPOINT ["/start.sh"]