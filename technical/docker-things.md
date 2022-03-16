## Docker Volume Rename
Create New Volume

    docker volume create --name new_volume

Copy everything from old volume to new volume

    docker container run --rm -it \
            -v old_volume:/from \
            -v new_volume:/to \
            alpine ash -c "cd /from ; cp -av . /to"

### Source: 
- https://stackoverflow.com/a/67568671

## Install LDAP Extension on php:7.3.28-apache Image
```docker
FROM php:7.3.28-apache

RUN apt-get update && \
    apt-get install -y libldap2-dev

RUN docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/
RUN docker-php-ext-install ldap
```

## Docker Secrets (Swarm)

```shell
docker secret create secret_name secret_value
docker secret inspect secret_name
docker secret ls
```

Docker Secrets kullanım amaçlarından birisi de containerlar ile credentials arasında soyutlama sağlamaktadır. Key-Value gibi çalışan bu sistemde $ docker secret create [isim] [saklanacak_bilgi] komutu ile gerekli bilgiyi bir referans ismi ataması gerçekleştirerek kripte edilmiş bir vaziyette “Raft logları” arasında tutmaktadır.

### Source: 
- https://medium.com/aws-certified-user-group-turkey/docker-i%C3%A7in-yard%C4%B1mc%C4%B1-bilgiler-84783232a75f