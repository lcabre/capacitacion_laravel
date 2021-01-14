FROM node:14-alpine

# Create app directory
RUN mkdir -p /usr/src/app
WORKDIR /usr/src/app

# Install app dependencies
COPY package.json /usr/src/app/

RUN apk add --update \
    python \
    python-dev \
    py-pip \
    build-base

RUN npm install

# Bundle app source
COPY laravel-echo-server.json /usr/src/app/laravel-echo-server.json
COPY laravel-echo-server-prod.json /usr/src/app/prod/laravel-echo-server.json
COPY laravel-echo-server-testing.json /usr/src/app/testing/laravel-echo-server.json

CMD ["sh", "-c", "npm run $ECHO_BUILD_ENVIROMENT --force"]