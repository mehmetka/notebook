# Building High Availability architecture on AWS for enterprises: Compute, Database and Storage 

https://vticloud.io/en/xay-dung-kien-truc-high-availability-tren-aws-cho-doanh-nghiep/

- there are many factors to consider, such as performance, scalability, availability, reliability, cost, and operation
- High availability is usually measured as a percentage of uptime. The amount of “nines” is often used to indicate high availability

Compute Amazon EC2 and other services that let you provision computing resources provide high availability features such as load balancing, auto-scaling, and provisioning across Amazon Availability Zones (AZ), representing isolated parts of an Amazon data center.

Database: Amazon RDS and other managed SQL databases provide options for automatically deploying databases with a standby replica in a different AZ.

Storage: Amazon storage services, such as S3, EFS, and EBS, provide built-in high availability options. S3 and EFS automatically store data across different AZs, while EBS enables the deployment of snapshots to different AZs.

AWS High Availability for EC2 Instances
If you are running instances on Amazon EC2, Amazon provides several built-in capabilities to achieve high availability:
Elastic Load Balancing: Can launch several EC2 instances and distribute traffic between them.
Availability Zones: Can place instances in different AZs.
Auto Scaling: Detect when loads increase, and then dynamically add more instances.

* Each AZ is approximately 100km apart to ensure safety from disasters while retaining optimal latency.

AWS High Availability for SQL Databases on Amazon RDS