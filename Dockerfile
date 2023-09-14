FROM php:7.4-apache

LABEL maintainer="github/jkhurshed"

ENV PYTHONUNBUFFERED 1
ENV PYTHONDONTWRITEBYTECODE 1

RUN mkdir compose/
COPY ./app/ compose/app/
# COPY ./infrastructure/backend/ sellary/infrastructure/backend/
WORKDIR compose/app/

EXPOSE 80

RUN apt-get update
RUN apt-get install -y wget vim git zip unzip zlib1g-dev libzip-dev libpng-dev
 
# Install PHP extensions needed
RUN docker-php-ext-install -j$(nproc) mysqli pdo_mysql gd zip pcntl exif
 
# Enable common Apache modules
RUN a2enmod headers expires rewrite
