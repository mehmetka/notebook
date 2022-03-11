# Errors and Solutions:

## 001
Error Message:
```
configure: error: Unable to detect ICU prefix or no failed. Please verify ICU install prefix and make sure icu-config works
```
Solution:
```
libicu-dev
```

## 002 Encountered this error on m1 mbp
Error Message:
```
Error:
 => ERROR [internal] load metadata for docker.io/library/php:5.6.40-apache-jessie                                                                                                                                                  0.9s
------
 > [internal] load metadata for docker.io/library/php:5.6.40-apache-jessie:
------
failed to solve with frontend dockerfile.v0: failed to create LLB definition: no match for platform in manifest sha256:5a43f74ce996a32c46bdb9c9893c1c21928f1ce53d67934cf0cb7559415ba648: not found
```

Solution:
```
docker build -t imagename --platform linux/amd64 .
```