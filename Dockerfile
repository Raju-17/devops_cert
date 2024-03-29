#use a node base image
FROM php:7.1-cli

#set maintainer
LABEL maintainer “raj170594@gmail.com”

#set a health check
HEALTHCHECK --interval=5s \
            --timeout=5s \
            CMD curl –f https://127.0.01:8000 || exit 1

# tell docker which port to expose
EXPOSE 8000

COPY . /usr/src/dockerimage
WORKDIR /usr/src/dockerimage
