FROM node:8
ARG DEBIAN_FRONTEND=noninteractive
ARG GIT_USER
ARG GIT_PASSWORD
RUN apt-get update && apt-get install --assume-yes apt-utils
RUN apt-get install curl -y

# Install dependencies
RUN apt-get update
RUN apt-get install -qq wget unzip build-essential cmake gcc libcunit1-dev libudev-dev
RUN apt-get install git -y
#RUN curl -sL https://deb.nodesource.com/setup_10.x -o nodesource_setup.sh
#RUN apt-get install nodejs -y
#RUN apt-get install -y build-essential
#RUN npm -v
#RUN node -v

# Grab the checked out source
WORKDIR /var/www/html

RUN git clone -b dev https://${GIT_USER}:${GIT_PASSWORD}@github.com/primecoreio/ico-transfer.git

RUN cd ./ico-transfer && rm -rf ./node_modules && npm install && npm install -g pm2

COPY ecosystem.config.js /var/www/html/ico-transfer/ecosystem.config.js

# Expose our server port.
EXPOSE 3002

CMD ["pm2-runtime", "/var/www/html/ico-transfer/ecosystem.config.js"]

