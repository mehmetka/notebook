---
tags: [aws, docker, ecr, gitlabci, lambda, python, s3]
---

# Lambda Function Container Image with S3 Trigger

Probably won't work directly. Just to give an idea.

When an image uploaded to your S3 bucket, trig a lambda function and manipulate image as you want. Use Python 3.8, Pillow and Imagemagick libraries to do your image operations. Function is deployed as container image using below Dockerfile.

## Dockerfile

```  
FROM public.ecr.aws/lambda/python:3.8  
RUN yum -y install +bytecode ImageMagick-devel OpenEXR-devel autotrace-devel bzip2-devel freetype freetype-devel ghostscript-devel giflib-devel graphviz gs imagemagick jasper-devel jbig jpeg jpeg2 lcms lcms-devel ldconfig libXext-devel libXt-devel libfreetype6-dev libjpeg libjpeg-devel libjpeg62-turbo-dev liblpr-1 liblqr-1-devel libpng-dev librsvg librsvg2 librsvg2* libtiff libtiff-devel libtool-ltdl-devel libwebp libwebp-devel libwebp-tools libwmf-devel rpmdevtool wmf zlib1g-dev  
COPY app.py ${LAMBDA_TASK_ROOT}  
RUN pip3 install --target "${LAMBDA_TASK_ROOT}" pillow  
CMD [ "app.handler" ]  
```

## workdir/app.py

```  
def handler(event, context):  
    # do image manipulation ops  
```

## Testing at local

```  
cd workdir  
docker build -t ecr-repository-name .  
docker run --rm -e AWS_ACCESS_KEY_ID="..." -e AWS_SECRET_ACCESS_KEY="..." -e AWS_REGION="location" -v "$PWD":/tmp -p 9001:8080 ecr-repository-name  
curl -XPOST "http://localhost:9001/2015-03-31/functions/function/invocations" -d '{}'  
```

### S3 Payload

Use `['s3']['bucket']['name']` and `record['s3']['object']['key']` to do your operations

```  
{  
  "Records": [  
    {  
			...  
      "s3": {  
        "s3SchemaVersion": "1.0",  
        "configurationId": "...",  
        "bucket": {  
          "name": "bucket-name",  
          "ownerIdentity": {  
            "principalId": "..."  
          },  
          "arn": "arn:aws:s3:::source-bucket-name"  
        },  
        "object": {  
          "key": "imageName.jpg",  
          "size": 26862,  
          "eTag": "...",  
          "sequencer": "..."  
        }  
      }  
    }  
  ]  
}  
```

## S3 Bucket Permissions

Create permission like below and give it to the lambda role to be able to work with Buckets.

```  
{  
  "Version": "2012-10-17",  
  "Statement": [  
    {  
      "Sid": "VisualEditor0",  
      "Effect": "Allow",  
      "Action": [  
        "s3:*",  
        "s3-object-lambda:*"  
      ],  
			"Resource": [  
				"arn:aws:s3:::bucket-name/*"  
			]  
    }  
  ]  
}  
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
docker tag ecr-repository-name:latest account-id.dkr.ecr.location.amazonaws.com/ecr-repository-name:latest  
aws ecr get-login-password --region location | docker login --username AWS --password-stdin account-id.dkr.ecr.location.amazonaws.com  
docker push account-id.dkr.ecr.location.amazonaws.com/ecr-repository-name:latest  
```

## Create Lambda

Create Function > Container Image > Fill the required fields > Select container image URI > Finalize Create Function  
step

## Add Trigger

Add trigger > S3 > Choose Source Bucket > Event Type (All object crete) > Add (If there is already defined a trigger,  
should be delete old one and then add new one)

## Auto build and push with Gitlab CI

Should be define AWS credentials into ~/.aws or CI/CD variables.

```  
stages:  
  - build  
  - push

build:  
  only:  
    - master  
  stage: build  
  script:  
    - docker build -t account-id.dkr.ecr.location.amazonaws.com/ecr-repository-name:latest .  
  tags:  
    - runner-tag

push:  
  only:  
    - master  
  stage: push  
  script:  
    - aws ecr get-login-password --region location | docker login --username AWS --password-stdin account-id.dkr.ecr.location.amazonaws.com  
    - docker push account-id.dkr.ecr.location.amazonaws.com/ecr-repository-name:latest  
  tags:  
    - runner-tag  
```  

> Unknown (2022-08-13 20:55:21)  
> #aws #docker #ecr #gitlabci #lambda #python #s3

