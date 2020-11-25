FROM alpine:latest

RUN mkdir -p /usr/share/webapps

COPY ./entry.sh /
COPY ./wp-config.php /

ENTRYPOINT [ "/entry.sh" ]