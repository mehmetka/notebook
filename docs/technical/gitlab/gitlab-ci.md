# Deploy with Gitlab Runner

- https://mehmetka.com/gitlab/gitlab-ci burada public key olmaz, private key olmali. --- bunu pem file ile de degistirebiliriz, daha pratik gibi.
- Asiri uzun bir is yoksa asagidaki gibi halledilebilir
```yaml
before_script:
  - echo "$PRIVATE_KEY_SERVER_API" > ~/generic.pem
  - chmod 600 ~/generic.pem
  - 'echo -e "Host *\n\tStrictHostKeyChecking no\n\n" > ~/.ssh/config'

stages:
  - deploy

deploy:
  only:
    - master
  stage: deploy
  script:
    - ssh -i ~/generic.pem ec2-user@$SERVER_API_IP "cd /var/shopier/api && git pull && pm2 restart server --update-env"
    - rm ~/generic.pem
  tags:
    - cd
```

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