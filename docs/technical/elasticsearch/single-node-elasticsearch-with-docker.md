---
tags: [elasticsearch]
---

# Single Node Elasticsearch with Docker

```  
version: '3'  
services:  
  elasticsearch:  
    image: elasticsearch:8.3.2  
    restart: always  
    environment:  
      discovery.type: single-node  
    container_name: elasticsearch  
    ports:  
      - "9200:9200"  
      - "9300:9300"  
```

## Run Elasticsearch With Authentication

```  
docker cp elasticsearch:/usr/share/elasticsearch/config/certs/http_ca.crt .  
docker cp http_ca.crt destination-container:/var  
docker exec -it elasticsearch bin/elasticsearch-reset-password -u elastic  
```

get the 'elastic' user's password

```  
$client = ClientBuilder::create()  
    ->setHosts(['https://es-host:9200'])  
    ->setBasicAuthentication('elastic', 'password')  
    ->setCABundle('/var/http_ca.crt-file-path')  
    ->build();  
```

## Run Elasticsearch Without Authentication:

If you add this line to elasticsearch service environment variables ```xpack.security.enabled: false``` like below  
then you don't need to use password and certificate

```  
    environment:  
      discovery.type: single-node  
      xpack.security.enabled: false  
```

```  
$client = ClientBuilder::create()  
    ->setHosts(['http://es-host:9200'])  
    ->build();  
```

## Add Plugin  
```  
docker exec elasticsearch bin/elasticsearch-plugin install analysis-icu  
docker restart elasticsearch  
```

Source: https://elk-docker.readthedocs.io/#installing-elasticsearch-plugins  

> Unknown (2022-08-13 20:59:25)  
> #elasticsearch

