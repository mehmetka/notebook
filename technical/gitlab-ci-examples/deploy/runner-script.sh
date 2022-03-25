#!/bin/bash

set -e # any future command that fails will exit the script
eval $(ssh-agent -s)
echo "$PUBLIC_KEY" | tr -d '\r' | ssh-add - > /dev/null

mkdir -p ~/.ssh
touch ~/.ssh/config
echo -e "Host *\n\tStrictHostKeyChecking no\n\n" >> ~/.ssh/config

ssh username@$DEPLOY_TO 'bash -s' < deploy-script.sh