---
tags: [docker, ldap, mysql, php, phpmyadmin]
---

Install LDAP Extension on php-apache Docker Image

```  
FROM php:7.3.28-apache

RUN apt-get update && \  
    apt-get install -y libldap2-dev

RUN docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/  
RUN docker-php-ext-install ldap  
```  

> Unknown (2022-08-13 20:58:08)  
> #docker #ldap #php

--

Connect PHPMyAdmin to Remote MySQL with Docker

```  
docker run --name phpmyadmin -d -e PMA_HOST=remote-host -p 8080:80 phpmyadmin  
```  

> Unknown (2022-08-13 20:58:46)  
> #docker #mysql #phpmyadmin

--

By default, any Docker Container may consume as much of the hardware such as CPU and RAM. If you are running multiple containers on the same host you should limit how much memory they can consume.

```
-m "300M" --memory-swap "1G"  
```

If you need to change the uid/gid of the user you can use:

```  
RUN groupmod -g 999 node && usermod -u 999 -g 999 node  
```

At the end, set the user to use when running this image

```  
USER node  
```

When creating an image, you can bypass the package.json's start command and bake it directly into the image itself. First off this reduces the number of processes running inside of your container. Secondly it causes exit signals such as SIGTERM and SIGINT to be received by the Node.js process instead of npm swallowing them.

```  
CMD ["node","index.js"]  
```  

> Unknown (2023-08-31 17:24:50)  
> #docker

--

Docker Secrets (Swarm)

```  
docker secret create secret_name secret_value  
docker secret inspect secret_name  
docker secret ls  
```

Docker Secrets kullanım amaçlarından birisi de containerlar ile credentials arasında soyutlama sağlamaktadır. Key-Value gibi çalışan bu sistemde ```docker secret create [isim] [saklanacak_bilgi]``` komutu ile gerekli bilgiyi bir referans ismi ataması gerçekleştirerek kripte edilmiş bir vaziyette “Raft logları” arasında tutmaktadır.

Source: 
- https://medium.com/aws-certified-user-group-turkey/docker-i%C3%A7in-yard%C4%B1mc%C4%B1-bilgiler-84783232a75f  

> Unknown (2022-08-13 20:58:28)  
> #docker

--

Error Message:

```  
configure: error: Unable to detect ICU prefix or no failed. Please verify ICU install prefix and make sure icu-config works  
```

Solution:    
Install ```libicu-dev``` package for "php:5.6.40-apache-jessie" image.  

> Unknown (2022-08-13 21:11:14)  
> #docker

--

Encountered this error on m1 mbp

Error Message:

```  
Error:  
 => ERROR [internal] load metadata for docker.io/library/php:5.6.40-apache-jessie                                                                                                                                                  0.9s
------  
 > [internal] load metadata for docker.io/library/php:5.6.40-apache-jessie:
------  
failed to solve with frontend dockerfile.v0: failed to create LLB definition: no match for platform in manifest sha256:5a43f...ba648: not found  
```

Solution:    
Add --platform flag to pull right images

```  
docker build -t imagename --platform linux/amd64 .  
```  

> Unknown (2022-08-13 20:59:00)  
> #docker

