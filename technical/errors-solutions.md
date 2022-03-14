# Errors and Solutions:

## 001
Error Message:
```
configure: error: Unable to detect ICU prefix or no failed. Please verify ICU install prefix and make sure icu-config works
```
Solution:  
Install ```libicu-dev``` package for "php:5.6.40-apache-jessie" image.

## 002- Encountered this error on m1 mbp
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

## 003
Error Message:
```
... es no alive nodes found in your cluster elasticsearch ...
```

Solution:
```
$ setsebool httpd_can_network_connect 1
```