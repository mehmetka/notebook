---
tags: [technical, aws]
---

# Send Docker Images to AWS ECR

Necessary permissions

```  
ecr:CreateRepository  
ecr:BatchGetImage  
ecr:GetAuthorizationToken  
ecr:UploadLayerPart  
ecr:PutImage  
ecr:BatchCheckLayerAvailability  
ecr:CompleteLayerUpload  
ecr:GetDownloadUrlForLayer  
ecr:InitiateLayerUpload  
```

```shell  
aws ecr get-login-password --region location | docker login --username AWS --password-stdin account_id.dkr.ecr.location.amazonaws.com  
```

```shell  
aws ecr create-repository \  
    --repository-name hello-world \  
    --image-scanning-configuration scanOnPush=true \  
    --region region  
```

```shell  
docker tag hello-world:latest account_id.dkr.ecr.location.amazonaws.com/hello-world:latest  
docker push aws_id.dkr.ecr.location.amazonaws.com/hello-world:latest  
docker pull account_id.dkr.ecr.eu-central-1.amazonaws.com/hello-world:latest  
```

* You can detect your image's vulnerabilities by setting "--image-scanning-configuration scanOnPush=true"
* Create repository for each image.

### Sources:

- https://docs.aws.amazon.com/AmazonECR/latest/userguide/getting-started-cli.html

*>_ Unknown* (2022-08-13 20:53:53)

tags: technical, aws

