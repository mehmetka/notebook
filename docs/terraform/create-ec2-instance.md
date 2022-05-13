# Create EC2 Instance with PHP 7.4 and apache2 Installations

```shell
terraform init
terraform apply
terraform destroy
```

main.tf:

```
terraform {
  required_providers {
    aws = {
      source  = "hashicorp/aws"
      version = "~> 3.27"
    }
  }

  required_version = ">= 0.14.9"
}

provider "aws" {
  profile = "default"
  region  = "eu-central-1"
}

resource "aws_instance" "resource-name" {
  ami                    = "base-ami-id"
  instance_type          = "t2.micro"
  vpc_security_group_ids = ["sg-ids"]
  tags                   = {
    Name = "instance-name"
  }
  associate_public_ip_address = true
  key_name                    = "key-pair-name"
  user_data = file("installations.sh")
}

```

installations.sh:

```shell
#!/bin/bash

sudo yum update -y
sudo amazon-linux-extras install -y php7.4
sudo yum install -y httpd

sudo systemctl start httpd
sudo systemctl enable httpd
sudo systemctl is-enabled httpd

## add ec2-user permissions to /var/www and apache group
sudo usermod -a -G apache ec2-user
sudo chown -R ec2-user:apache /var/www
sudo chmod 2775 /var/www && find /var/www -type d -exec sudo chmod 2775 {} \;
find /var/www -type f -exec sudo chmod 0664 {} \;
```