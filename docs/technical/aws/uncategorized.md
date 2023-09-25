---
tags: [aws, elasticbeanstalk, graviton, httpd, performance]
---

The size of a volume can only be increased, not decreased.  

> Unknown (2023-09-18 19:35:52)  
> #aws

--

- Using T4g instances you can enjoy a **performance benefit of up to 40% at a 20% lower cost in comparison to T3 instances**, providing the best price/performance for a broader spectrum of workloads.
- T4g instances are designed for applications that don’t use CPU at full power most of the time  

> Unknown (2023-08-31 16:04:56)  
> #aws #graviton #performance

--

## Add new SSH public key to AWS EC2 Instance

- Create new Key-Pair on AWS Console (private key will be downloaded automatically.)
- Change permissions of private key: ```chmod 600 private-key.pem```
- Generate public key from private key: ```ssh-keygen -y -f private-key.pem```
- SSH into destination server
- Add public key to "~/.ssh/authorized_keys" file  
Done \m/

You can use more than one public key to ssh if you want or delete old ones

https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/replacing-key-pair.html  

> Unknown (2023-08-17 17:31:35)  
> #aws

--

## Get EC2 Instance Type inside of instance

```  
curl http://169.254.169.254/latest/meta-data/instance-type  
```

https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/instancedata-data-retrieval.html  

> Unknown (2023-08-17 17:03:50)  
> #aws

--

## AWS ElasticBeanstalk PHP 7.4 Environment httpd.conf

```  
...  
<IfModule worker.c>  
StartServers        10  
MinSpareThreads     240  
MaxSpareThreads     240  
ServerLimit         10  
MaxRequestWorkers          250  
MaxConnectionsPerChild 1000000  
</IfModule>  
...  
```

Same for t4g.micro and t4g.xlarge.  

> Unknown (2023-08-04 23:22:46)  
> #aws #elasticbeanstalk #httpd

--

## Extending EC2 Volume Size

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

> Unknown (2023-07-31 21:52:51)  
> #aws

--

## Difference of AWS Public-Private Subnet

- https://serverfault.com/questions/556363/what-is-the-difference-between-a-public-and-private-subnet-in-a-amazon-vpc
- PUBLIC SUBNET: If a subnet's traffic is routed to an internet gateway, the subnet is known as a public subnet.
- PRIVATE SUBNET: If a subnet doesn't have a route to the internet gateway, the subnet is known as a private subnet.  

> Unknown (2022-08-13 21:10:25)  
> #aws

--

## If you cannot delete Elasticbeanstalk environment

You need to go to your CloudFormation console and retry deletion of the CloudFormation stack which the Beanstalk  
environment used. The deletion may fail, but after retrying it will prompt you if you want to skip the  
"AWSEBRDSDatabase" resource that failed to delete. You can just confirm that you want to skip deletion (since you have  
actually already deleted it). This should remove the CloudFormation stack. Then you can retry deletion of the Beanstalk  
environment from the Beanstalk console.  

> Unknown (2022-08-13 20:56:36)  
> #aws

