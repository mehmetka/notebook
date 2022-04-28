# Deploy with Gitlab Runner

## Define these variables on Gitlab as CI/CD variables
- PUBLIC_KEY
- DEPLOY_TO

## .gitlab-ci.yml File
```yaml
before_script:
  - 'which ssh-agent || ( apt-get update -y && apt-get install openssh-client -y )'

stages:
  - deploy-to-test

deploy-to-test:
  only:
    - master
  stage: deploy-to-test
  script:
    - bash runner-script.sh # shell script that will run on "deploy" runner
  tags:
    - deploy # run on a specific runner
```

## Runner Script
```shell
#!/bin/bash

eval $(ssh-agent -s)
echo "$PUBLIC_KEY" | tr -d '\r' | ssh-add - > /dev/null

mkdir -p ~/.ssh
touch ~/.ssh/config
echo -e "Host *\n\tStrictHostKeyChecking no\n\n" >> ~/.ssh/config

ssh username@$DEPLOY_TO 'bash -s' < deploy-script.sh
```

## Deploy Script (Runs on server connected with SSH)
```shell
#!/bin/bash

# deployment steps
```