FROM node:4-slim
MAINTAINER Cédric Merouani

# Install dependencies
RUN apt-get update && \
    apt-get install -y curl php5-cli && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN npm install -g brunch

RUN adduser --disabled-password --gecos '' portfolio
RUN adduser portfolio sudo
RUN echo '%sudo ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers