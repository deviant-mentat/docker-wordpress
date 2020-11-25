#!/bin/sh  

trap "exit" SIGINT
trap "exit" SIGTERM

# Start the first process
if [ "$1" = 'nginx' ]; then
    echo "Démarrage de nginx :"
    mkdir -p /run/nginx
    nginx
    status=$?
    if [[ $status -eq 0 ]];then
	echo "Démarrage de nginx : OK"
    else
	echo "Démarrage de nginx : KO > $status"
    exit $status
    fi
else
    echo "Argument 1 non reconnu"
fi

if [ "$2" = 'php-fpm7' ]; then
    echo "Démarrage de php-fpm7 :"
    mkdir -p /run/php-fpm7
    php-fpm7 -D
    status=$?
    if [[ $? -eq 0 ]]; then
	echo "Démarrage de php-fpm7 : OK"
    else
	echo "Démarrage de php-fpm7 : KO > $status"
    exit $status
    fi
else
    echo "Argument 2 non reconnu"
fi

while sleep 60; do
  ps aux |grep nginx |grep -q -v grep
  PROCESS_1_STATUS=$?
  ps aux |grep php |grep -q -v grep
  PROCESS_2_STATUS=$?
  # If the greps above find anything, they exit with 0 status
  # If they are not both 0, then something is wrong
  if [ $PROCESS_1_STATUS -ne 0 -o $PROCESS_2_STATUS -ne 0 ]; then
    echo "One of the processes has already exited."
    exit 1
  fi
done