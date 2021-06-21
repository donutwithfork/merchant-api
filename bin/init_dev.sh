#!/usr/bin/env bash

#todo
#echo -en "- Creating docker-compose file...\n"
#cp .docker--compose.yml.dist .docker--compose.yml

echo -en "- Install composer...\n"
composer install

echo -en "- Implement migrations...\n"
php bin/console doctrine:database:create
php bin/console doctrine:migration:migrate -n
