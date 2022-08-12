# Customizing Lambda with Docker Image

## Dockerfile

```dockerfile
FROM public.ecr.aws/lambda/python:3.8
RUN yum -y install some-stuff
COPY app.py ${LAMBDA_TASK_ROOT}
RUN pip3 install --target "${LAMBDA_TASK_ROOT}" dependencies
CMD [ "app.handler" ]
```

## workdir/app.py

```python
def handler(event, context):
    # your code
```

## Testing at local

```shell
cd workdir
docker build -t ecr-repository-name .
docker run --rm -v "$PWD":/tmp -p 9001:8080 ecr-repository-name
curl -XPOST "http://localhost:9001/2015-03-31/functions/function/invocations" -d '{}'
```

## ECR Operations

- Required permissions to do ECR operations

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

- Create a repository on ECR
- Build image (We did already before)
- docker tag ecr-repository-name:latest account-id.dkr.ecr.location.amazonaws.com/ecr-repository-name:latest
- aws ecr get-login-password --region location | docker login --username AWS --password-stdin account-id.dkr.ecr.location.amazonaws.com
- docker push account-id.dkr.ecr.location.amazonaws.com/ecr-repository-name:latest

## Create Lambda

Create Function > Container Image > Fill the required fields > Select container image URI > Finalize Create Function
step

> Add trigger to your lambda if needed

## Auto build and push with Gitlab CI

```yaml
stages:
  - build
  - push

build:
  only:
    - master
  stage: build
  script:
    - docker build -t ecr-repository-name .
    - docker tag ecr-repository-name:latest account-id.dkr.ecr.location.amazonaws.com/ecr-repository-name:latest
  tags:
    - cd

push:
  only:
    - master
  stage: push
  script:
    - aws ecr get-login-password --region location | docker login --username AWS --password-stdin account-id.dkr.ecr.location.amazonaws.com
    - docker push account-id.dkr.ecr.location.amazonaws.com/ecr-repository-name:latest
  tags:
    - cd
```