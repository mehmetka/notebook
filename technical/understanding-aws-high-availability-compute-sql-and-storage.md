    # AWS High Availability: Compute, SQL and Storage
    https://cloud.netapp.com/blog/understanding-aws-high-availability-compute-sql-and-storage

    Highly available systems are reliable in the sense that they continue operating even when critical components fail. They are also resilient, meaning that they are able to simply handle failure without service disruption or data loss, and seamlessly recover from such failure.

    High availability is commonly measured as a percentage of uptime. The number of “nines” is commonly used to indicate the degree of high availability. For example, “four nines” is indicative of a system that is up 99.99% of the time, meaning it is down for only 52.6 minutes during an entire year.

    Redundancy: ensuring that critical system components have another identical component with the same data, that can take over in case of failure.
    Monitoring: identifying problems in production systems that may disrupt or degrade service.
    Failover: the ability to switch from an active system component to a redundant component in case of failure, imminent failure, degraded performance or functionality.
    Failback: the ability to switch back from a redundant component to the primary active component, when it has recovered from failure.

    AWS High Availability: Compute, Databases and Storage

    Compute: Amazon EC2 and other services that let you provision computing resources, provide high availability features such as load balancing, auto-scaling and provisioning across Amazon Availability Zones (AZ), representing isolated parts of an Amazon data center.
    SQL databases: Amazon RDS and other managed SQL databases provide options for automatically deploying databases with a standby replica in a different AZ.
    Storage services: Amazon storage services, such as S3, EFS and EBS, provide built-in high availability options. S3 and EFS automatically store data across different AZs, while EBS enables deployment of snapshots to different AZs.

    AWS High Availability for EC2 Instances
    If you are running instances on Amazon EC2, Amazon provides several built-in capabilities to achieve high availability:
    - Elastic Load Balancing: you can launch several EC2 instances and distribute traffic between them.
    - Availability Zones: you can place instances in different AZs.
    - Auto Scaling: use auto-scaling to detect when loads increase, and then dynamically add more instances.

    The Elastic Load Balancer distributes traffic between two or more EC2 instances, each of which can potentially be deployed in a separate subnet that resides in a separate Amazon Availability Zone. These instances can be part of an Auto-Scaling Group, with additional instances launched on demand.

    AWS High Availability for SQL Databases on Amazon RDS: 
    RDS provides high availability using Multi-Availability Zone (Multi-AZ) deployments. This means RDS automatically provisions a synchronous replica of the database in a different availability zone. When the main database instance goes down, users are redirected transparently to the other availability zone.This provides two levels of redundancy:
    - In case the active database fails, there is a standby replica ready to receive requests
    - In case of a disruption in the AZ your main database instance is running in, there is failover to another AZ.

    You can turn on this capability by specifying ‘Multi-AZ Deployment’ when creating an RDS database instance, either via the RDS Console or the Amazon CLI. Multi-AZ deployments are managed fully automatically, with no administrative intervention.

    Note that Multi-AZ deployment is not supported for read-only instances, and you should use read replicas to enable high availability for those instances.