## Docker Volume Rename
Create New Volume

    docker volume create --name new_volume

Copy everything from old volume to new volume

    docker container run --rm -it \
            -v old_volume:/from \
            -v new_volume:/to \
            alpine ash -c "cd /from ; cp -av . /to"

### Source: https://stackoverflow.com/a/67568671

## Install LDAP Extension on php:7.3.28-apache Image
```docker
FROM php:7.3.28-apache

RUN apt-get update && \
    apt-get install -y libldap2-dev

RUN docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/
RUN docker-php-ext-install ldap
```