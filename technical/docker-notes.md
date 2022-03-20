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

## [Docker Swarm Kullanimi](https://medium.com/aws-certified-user-group-turkey/docker-%C3%BCzerine-genel-bak%C4%B1%C5%9F-docker-swarm-kullan%C4%B1m%C4%B1-46d9c17df6f6)
- Swarm, yönetici (master) ve yönetilen (worker) adı verilen makinelerin oluşturduğu bir ağdır (cluster). Yada diğer bir değiş ile multiple hostlar üzerinde birden fazla instance koşturarak single point of failure problemlerini çözümlemek üzerine Docker ile birlikte bizlere sunulan bir servistir.

- Docker Swarm ile birlikte:
    - entegre cluster yönetimi (Container Orchestrating), 
    - ölçekleme (Scaling), 
    - periyodik güncellemeler (Reduce Downtime Cost), 
    - güvenlik (TLS Connection), 
    - yük dağıtımı (Load Balancing), 
    - dahili DNS sunucusu (Service Discovery), 
    - containerlar arası durum yönetimi (Desired State Reconciliation), 
    - bileşen gruplandırma (Declarative Service Model)

gibi kavramlara çözümler sunulmaktadır.

- Manager node’lar kendi aralarında consensus(fikir birliği) sağlamak için RAFT algoritmasını kullanmaktadır. Manager’ların kendi aralarında ve worker’larla konuştuğunu göreceğiz. Worker’lar kendi aralarında iletişim kurmazlar.
- RAFT Algoritması (N — 1) / 2 : Cluster ortamınızda 3 adet manager node var ise (3–1)/2 = 1, yani 1 manager node down olsa bile cluster mimariniz bundan etkilenmeyecektir.
- Service kelimesi bizim için içinde bulunan containera ait bir adet iş parçacığını (task) simgelemektedir.

## [Why We Love Docker and Best Practices for DevOps](https://hackernoon.com/docker-and-best-practices-for-devops-c53ta30kiv)

- Build images to do just one thing
- Use tags to reference specific versions of your image
- Prefer minimalist base images
- Use multi-stage builds
- Don’t use a root user, whenever possible
- Use official, purpose-built images
- Enable Docker content trust
- Use Docker Bench for security
- Use Artifactory to manage Docker images
- Leverage Docker enterprise features for additional protection
- Writing a docker file is always critical, build docker image which is slim and smart not the fat one
- Persist data outside of a container
- Use Docker compose to use as Infrastructure As Code and keep track using tags
- Role-based access control
- Do not add user credentials/keys/critical data to the image. Use it as a deployment variable
- Make use of docker caching, try pushing "COPY . ." to the last line in Dockerfile if possible
- Use .dockerignore file
- Don't install debugging tools to reduce image size
- Always use resource limits with docker/containers
- Use swarm mode for small application
- Don't blindly trust downloads from the DockerHub! Verify them! See more at ‘DockerHub Breach Can Have a Long Reach’
- Make Docker image with tuned kernel parameters
- Use alpine image
- See Security Best Practices for Docker Images