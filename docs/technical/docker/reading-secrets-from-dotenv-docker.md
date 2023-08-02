---
tags: [technical, docker]
---

# Read Secrets from Dotenv

docker-compose.yml content:

```  
version: '3'

services:  
  db:  
    container_name: mysql  
    image: mysql:5.6.28  
    restart: always  
    environment:  
      MYSQL_DATABASE: ${DB_NAME}  
      MYSQL_USER: ${DB_USER}  
      MYSQL_PASSWORD: ${DB_PASSWORD}  
      MYSQL_ROOT_PASSWORD: ${DB_ROOT_PASSWORD}  
...  
```

.env file content:

```  
DB_USER=username  
DB_PASSWORD=password  
DB_NAME=databasename  
DB_ROOT_PASSWORD=root  
```

"docker compose config" command output

```  
Output:  
services:  
db:  
    container_name: mysql  
    environment:  
    MYSQL_DATABASE: databasename  
    MYSQL_PASSWORD: password  
    MYSQL_ROOT_PASSWORD: root  
    MYSQL_USER: username  
    image: mysql:5.6.28  
    networks:  
    default: null  
    restart: always  
networks:  
default:  
    name: docker-compose-dotenv_default  
```

*>_ Unknown* (2022-08-13 20:56:59)

tags: technical, docker

