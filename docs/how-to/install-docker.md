# Install Docker

## Ubuntu

```shell
sudo apt install docker.io
sudo usermod -a -G docker ubuntu
```

## Amazon Linux 2

```shell
sudo yum update -y
sudo amazon-linux-extras install docker
sudo service docker start
sudo systemctl enable docker
sudo usermod -a -G docker ec2-user
```

Source: https://docs.aws.amazon.com/AmazonECS/latest/userguide/create-container-image.html#create-container-image-install-docker