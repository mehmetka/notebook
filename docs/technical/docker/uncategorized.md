---
tags: [technical, docker]
---

# notes

Docker Secrets (Swarm)

```  
docker secret create secret_name secret_value  
docker secret inspect secret_name  
docker secret ls  
```

Docker Secrets kullanım amaçlarından birisi de containerlar ile credentials arasında soyutlama sağlamaktadır. Key-Value gibi çalışan bu sistemde ```docker secret create [isim] [saklanacak_bilgi]``` komutu ile gerekli bilgiyi bir referans ismi ataması gerçekleştirerek kripte edilmiş bir vaziyette “Raft logları” arasında tutmaktadır.

Source: 
- https://medium.com/aws-certified-user-group-turkey/docker-i%C3%A7in-yard%C4%B1mc%C4%B1-bilgiler-84783232a75f

*>_ Unknown* (2022-08-13 20:58:28)

tags: technical, docker

---

Error Message:

```  
configure: error: Unable to detect ICU prefix or no failed. Please verify ICU install prefix and make sure icu-config works  
```

Solution:    
Install ```libicu-dev``` package for "php:5.6.40-apache-jessie" image.

*>_ Unknown* (2022-08-13 21:11:14)

tags: technical, docker

---

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

*>_ Unknown* (2022-08-13 20:59:00)

tags: technical, docker

