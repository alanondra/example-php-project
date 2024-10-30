FROM php:8.3.13-fpm

ARG NODE_VERSION=23.1.0

ARG USERNAME=user
ARG UID=1000
ARG GID=1000

ENV TZ=UTC
ENV LANG=C.UTF-8
ENV LC_ALL=C.UTF-8

# Install Tools & Libraries
RUN apt update && \
    apt install -y --no-install-recommends \
        sudo \
        wget \
    && \
    apt clean

# Setup Configuration
COPY php.conf.d/ /usr/local/etc/php/conf.d/
COPY fpm.conf.d/ /usr/local/etc/php-fpm.d/

RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

# Install Extensions
# https://github.com/mlocati/docker-php-extension-installer
COPY --from=mlocati/php-extension-installer \
    /usr/bin/install-php-extensions \
    /usr/local/bin/

RUN install-php-extensions \
        mysqli \
        pdo_mysql

# Install Composer
# https://getcomposer.org
COPY --from=composer:2 \
    /usr/bin/composer \
    /usr/local/bin/

# Install NodeJS
RUN mkdir -p /tmp/node && \
    cd /tmp/node && \
    wget -O nodejs.tar.xz https://nodejs.org/dist/v${NODE_VERSION}/node-v${NODE_VERSION}-linux-x64.tar.xz && \
    tar -xf nodejs.tar.xz && \
    cd node-v${NODE_VERSION}-linux-x64 && \
    cp -r bin /usr/local/ && \
    cp -r include /usr/local/ && \
    cp -r lib /usr/local/ && \
    cp -r share /usr/local/ && \
    cd /tmp && \
    rm -rf node

# Setup User
RUN groupadd -g $GID $USERNAME && \
    useradd -m -u $UID -g $GID -c $USERNAME $USERNAME && \
    mkdir -p /home/$USERNAME && \
    chown -R $USERNAME:$USERNAME /home/$USERNAME && \
    echo "$USERNAME ALL=(ALL) NOPASSWD:ALL" > /etc/sudoers.d/$USERNAME && \
    chmod 0440 /etc/sudoers.d/$USERNAME

USER $USERNAME
