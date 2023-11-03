#!/bin/sh

set -e
cd /usr/src/app/

# Adapter l'action si la commande a des options en arguments
if [ "${1#-}" != "$1"]; then
  set -- php-fpm "$@"
else
  php-fpm
fi

exec "$@"