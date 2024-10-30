#!/bin/sh
set -e

sudo groupmod -g $HOST_DOCKER_GID docker

cp -r .devcontainer/home/. /home/$(whoami)

sudo apt update

sudo apt install -y --no-install-recommends \
    default-mysql-client \
    git \
    keychain \
    mariadb-client \
    openssh-client \
    postgresql-client \
    vim

sudo apt clean
