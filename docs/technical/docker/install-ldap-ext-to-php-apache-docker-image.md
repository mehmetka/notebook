---
tags: [technical, docker]
---

# Install LDAP Extension on php-apache Docker Image

```  
FROM php:7.3.28-apache

RUN apt-get update && \  
    apt-get install -y libldap2-dev

RUN docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/  
RUN docker-php-ext-install ldap  
```

*>_ Unknown* (2022-08-13 20:58:08)

tags: technical, docker

