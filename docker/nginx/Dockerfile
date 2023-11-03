FROM nginx:stable-alpine

VOLUME /usr/src/app_data/
EXPOSE 80
WORKDIR /usr/src/app

COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf