---
tags: [aws, docker, ecr, lambda, python]
---

# Lambda Function Container Image: Python

## Sourcecode

```  
def handler(event, context):  
    # your code  
```

## Dockerfile

```  
FROM public.ecr.aws/lambda/python:3.8  
RUN yum -y install some-stuff  
COPY app.py ${LAMBDA_TASK_ROOT}  
RUN pip3 install --target "${LAMBDA_TASK_ROOT}" dependencies  
CMD [ "app.handler" ]  
```

## Testing at local

```
# go to folder that contains Dockerfile and app.py  
docker build -t ecr-repository-name .  
docker run --rm -v "$PWD":/tmp -p 9001:8080 ecr-repository-name  
curl -XPOST "http://localhost:9001/2015-03-31/functions/function/invocations" -d '{}'  
```

## ECR Operations

Required permissions to do ECR operations

```  
"ecr:CreateRepository",  
"ecr:BatchGetImage",  
"ecr:GetAuthorizationToken",  
"ecr:UploadLayerPart",  
"ecr:PutImage",  
"ecr:BatchCheckLayerAvailability",  
"ecr:CompleteLayerUpload",  
"ecr:GetDownloadUrlForLayer",  
"ecr:InitiateLayerUpload"  
```

- Create repository
- Build image (We did already before)

```  
aws ecr get-login-password --region location | docker login --username AWS --password-stdin account-id.dkr.ecr.location.amazonaws.com  
docker tag ecr-repository-name:latest account-id.dkr.ecr.location.amazonaws.com/ecr-repository-name:latest  
docker push account-id.dkr.ecr.location.amazonaws.com/ecr-repository-name:latest  
```

## Create Lambda Function

Create Function > Container Image > Fill the required fields > Select container image URI > Finalize Create Function  
step  

> Unknown (2023-09-25 22:42:17)  
> #aws #docker #ecr #lambda #python

