#!/bin/bash
docker-compose up -d
while true; do
    var=$(git pull origin master)
    if [ "$var" != "Already up to date." ]; then
        docker-compose build app
        docker-compose up -d
    fi
    sleep 120
done
