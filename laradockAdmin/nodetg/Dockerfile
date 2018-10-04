FROM node:8
ARG DEBIAN_FRONTEND=noninteractive
ARG GIT_USER=git
ARG GIT_PASSWORD=password
RUN apt-get update && apt-get install --assume-yes apt-utils
RUN apt-get install curl -y

# Install dependencies
RUN apt-get update
RUN apt-get install -qq wget unzip build-essential cmake gcc libcunit1-dev libudev-dev
RUN apt-get install git -y
RUN apt-get install netcat-traditional
#RUN curl -sL https://deb.nodesource.com/setup_10.x -o nodesource_setup.sh
#RUN apt-get install nodejs -y
#RUN apt-get install -y build-essential
#RUN npm -v
#RUN node -v

# Grab the checked out source
WORKDIR /var/www/html

RUN git clone https://${GIT_USER}:${GIT_PASSWORD}@github.com/primecoreio/ico-telegram.git

RUN cd ./ico-telegram && rm -rf ./node_modules && npm install && npm install -g pm2 &&\
      apt-get install -y --no-install-recommends \
      build-essential \
      git \
      luajit \
      luarocks \
      libreadline-dev \
      libconfig-dev \
      libssl-dev \
      lua5.2 \
      liblua5.2-dev \
      libevent-dev \
      libjansson-dev \
      libpython-dev \
      zlib1g-dev \
      libgcrypt11-dev && \
  git clone --recursive https://github.com/vysheng/tg.git && \
  cd ./tg && ./configure --disable-openssl && make

COPY ecosystem.config.js /var/www/html/ico-telegram/ecosystem.config.js

RUN cd /var/www/html/ico-telegram/tg && \
    ./bin/telegram-cli -vvvvRC -k tg-server.pub -W --json -dL tg.log -P 1234 &



# Expose our server port.
EXPOSE 7272

CMD ["pm2-runtime", "/var/www/html/ico-telegram/ecosystem.config.js"]

