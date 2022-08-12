# Deploy with Gitlab Runner

## Define these variables on Gitlab as CI/CD variables

- PRIVATE_KEY
- SERVER_IP

## Way_0

.gitlab-ci.yml

```yaml
before_script:
  - echo "$PRIVATE_KEY" > ~/generic.pem
  - chmod 600 ~/generic.pem
  - 'echo -e "Host *\n\tStrictHostKeyChecking no\n\n" > ~/.ssh/config'

stages:
  - deploy

deploy:
  only:
    - master
  stage: deploy
  script:
    - ssh -i ~/generic.pem ec2-user@$SERVER_IP "do deployment stuff"
    - rm ~/generic.pem
  tags:
    - cd
```

## Way_1

.gitlab-ci.yml

```yaml
before_script:
  - 'which ssh-agent || ( apt-get update -y && apt-get install openssh-client -y )'

stages:
  - deploy

deploy-to-test:
  only:
    - master
  stage: deploy
  script:
    - bash runner-script.sh # shell script that will run on "deploy" runner
  tags:
    - deploy # run on a specific runner
```

## Runner Script

```shell
#!/bin/bash

eval $(ssh-agent -s)
echo "$PRIVATE_KEY" | tr -d '\r' | ssh-add - > /dev/null

mkdir -p ~/.ssh
touch ~/.ssh/config
echo -e "Host *\n\tStrictHostKeyChecking no\n\n" >> ~/.ssh/config

ssh username@$SERVER_IP 'bash -s' < deploy-script.sh
```

## Deploy Script (Runs on server connected with SSH)

```shell
#!/bin/bash

# deployment steps
```