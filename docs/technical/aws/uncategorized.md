---
tags: [technical, aws]
---

# notes

# Extending EC2 Volume Size

```  
lsblk # find root volume name

NAME          MAJ:MIN RM SIZE RO TYPE MOUNTPOINT  
nvme0n1       259:0    0  64G  0 disk  
|-nvme0n1p1   259:1    0  64G  0 part /  
`-nvme0n1p128 259:2    0   1M  0 part  
```

Volume Name: nvme0n1

```  
df -hT # find volume type, should be "xfs" 

Filesystem     Type      Size  Used Avail Use% Mounted on  
devtmpfs       devtmpfs  3.9G     0  3.9G   0% /dev  
tmpfs          tmpfs     3.9G     0  3.9G   0% /dev/shm  
tmpfs          tmpfs     3.9G  460K  3.9G   1% /run  
tmpfs          tmpfs     3.9G     0  3.9G   0% /sys/fs/cgroup  
/dev/nvme0n1p1 xfs        64G   15G   50G  24% /  
tmpfs          tmpfs     784M     0  784M   0% /run/user/1000  
```

Volume type: xfs

```  
sudo growpart /dev/nvme0n1 1  
sudo xfs_growfs -d /  
```

Source: https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/recognize-expanded-volume-linux.html

*>_ Unknown* (2023-07-31 21:52:51)

tags: technical, aws

---

## Difference of AWS Public-Private Subnet

- https://serverfault.com/questions/556363/what-is-the-difference-between-a-public-and-private-subnet-in-a-amazon-vpc
- PUBLIC SUBNET: If a subnet's traffic is routed to an internet gateway, the subnet is known as a public subnet.
- PRIVATE SUBNET: If a subnet doesn't have a route to the internet gateway, the subnet is known as a private subnet.

*>_ Unknown* (2022-08-13 21:10:25)

tags: technical, aws

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

*>_ Unknown* (2022-08-13 21:10:06)

tags: technical, aws

---

## If you cannot delete Elasticbeanstalk environment

You need to go to your CloudFormation console and retry deletion of the CloudFormation stack which the Beanstalk  
environment used. The deletion may fail, but after retrying it will prompt you if you want to skip the  
"AWSEBRDSDatabase" resource that failed to delete. You can just confirm that you want to skip deletion (since you have  
actually already deleted it). This should remove the CloudFormation stack. Then you can retry deletion of the Beanstalk  
environment from the Beanstalk console.

*>_ Unknown* (2022-08-13 20:56:36)

tags: technical, aws

---

- aws api gateway uses token bucket algorithm for rate limiting
- s3 bucket name best practices: images.domain.com

*>_ Unknown* (2022-08-13 20:56:20)

tags: technical, aws

