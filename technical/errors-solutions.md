# Errors and Solutions:

## 000
- When you get "sh: Operation not permitted" error while trying to run shell script on cron https://osxdaily.com/2020/04/27/fix-cron-permissions-macos-full-disk-access/

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

## 004 
Keyword: ERR_OSSL_EVP_UNSUPPORTED  
Solution:
```shell
NODE_OPTIONS=--openssl-legacy-provider next build && next export
```

## 005
> if you cannot delete Elasticbeanstalk environment  

You need to go to your CloudFormation console and retry deletion of the CloudFormation stack which the Beanstalk environment used. The deletion may fail, but after retrying it will prompt you if you want to skip the "AWSEBRDSDatabase" resource that failed to delete. You can just confirm that you want to skip deletion (since you have actually already deleted it). This should remove the CloudFormation stack. Then you can retry deletion of the Beanstalk environment from the Beanstalk console.