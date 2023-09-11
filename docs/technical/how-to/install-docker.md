---
tags: [how-to]
---

# Install Docker

## Ubuntu

```shell  
sudo apt install docker.io  
sudo usermod -a -G docker ubuntu  
```

## Amazon Linux 2

```shell  
sudo yum update -y
# sudo amazon-linux-extras install docker # removed amazon-linux-extras on Amazon Linux 2023  
sudo yum install -y docker  
sudo service docker start  
sudo systemctl enable docker  
sudo usermod -a -G docker ec2-user  
```

Source: https://docs.aws.amazon.com/AmazonECS/latest/userguide/create-container-image.html#create-container-image-install-docker  

> Unknown (2022-08-13 21:03:18)  
> #how-to

