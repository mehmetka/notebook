# notes

- aws api gateway uses token bucket algorithm for rate limiting
- s3 bucket name best practices: images.domain.com

---

## If you cannot delete Elasticbeanstalk environment

You need to go to your CloudFormation console and retry deletion of the CloudFormation stack which the Beanstalk
environment used. The deletion may fail, but after retrying it will prompt you if you want to skip the
"AWSEBRDSDatabase" resource that failed to delete. You can just confirm that you want to skip deletion (since you have
actually already deleted it). This should remove the CloudFormation stack. Then you can retry deletion of the Beanstalk
environment from the Beanstalk console.

---

## Extend EC2 Instance Volume

- Extending OS file system. After you finish modifying volume, you need to extend OS file system in order to see your
  increased volume size. The example below is the command I used for Ubuntu OS.
- SSH into your instance.
- Type "lsblk" -> Your increased volume will be shown just above your current volume, e.g. xvda1 is your current volume
  with 30GB size and xvda with 40GB size.
- Extend the partition by typing "sudo growpart /dev/xvda1" (Note that dev/xvda is the partition name and 1 is the
  partition number.)
- Extend the volume by typing -> sudo resize2fs /dev/xvda1

Source: https://medium.com/@m.yunan.helmy/increase-the-size-of-ebs-volume-in-your-ec2-instance-3859e4be6cb7

---

## Difference of AWS Public-Private Subnet

- https://serverfault.com/questions/556363/what-is-the-difference-between-a-public-and-private-subnet-in-a-amazon-vpc
- PUBLIC SUBNET: If a subnet's traffic is routed to an internet gateway, the subnet is known as a public subnet.
- PRIVATE SUBNET: If a subnet doesn't have a route to the internet gateway, the subnet is known as a private subnet.