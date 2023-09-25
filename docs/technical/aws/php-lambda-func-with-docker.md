---
tags: [aws, docker, lambda, php]
---

# PHP Lambda Functions with Docker Images

Complete guide is here: https://github.com/aws-samples/php-examples-for-aws-lambda/tree/master/0.7-PHP-Lambda-functions-with-Docker-container-images

I wrote steps and forked the repository in case of the source deleted: https://github.com/mehmetka/php-examples-for-aws-lambda

```  
docker build -t php-lambda .
# Run container  
docker run -p 9000:8080 -v $PWD:/var/task php-lambda:latest
# Trig lambda function locally  
curl "http://localhost:9000/2015-03-31/functions/function/invocations" -d '{"queryStringParameters": {"name":"Ben"}}'  
```

You can use this image https://hub.docker.com/r/amazon/aws-lambda-provided instead of public.ecr.aws/lambda/provided if you get authorization problem.

Source: https://aws.amazon.com/blogs/compute/building-php-lambda-functions-with-docker-container-images  

> Unknown (2023-09-25 16:22:58)  
> #aws #docker #lambda #php

