#use a node base image
FROM node:7-onbuild

#set maintainer
LABEL maintainer “email”

#set a health check
HEALTHCHECK --interval=5s \
            --timeout=5s \
            CMD curl –f https://127.0.01:8000 || exit 1

# tell docker which port to expose
EXPOSE 8000