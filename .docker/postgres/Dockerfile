FROM postgres:12-alpine
RUN apk add --no-cache shadow && usermod -u 1000 postgres && groupmod -g 1000 postgres
COPY ./init.sql /docker-entrypoint-initdb.d/
