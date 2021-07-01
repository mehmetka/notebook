    https://jayendrapatil.com/aws-high-availability-fault-tolerance-architecture-certification

    AWS High Availability & Fault Tolerance Architecture
    Amazon Web Services provides services and infrastructure to build reliable, fault-tolerant, and highly available systems in the cloud.
    Fault-tolerance defines the ability for a system to remain in operation even if some of the components used to build the system fail.
    Most of the higher-level services, such as S3, SimpleDB, SQS, and ELB, have been built with fault tolerance and high availability in mind.
    Services that provide basic infrastructure, such as EC2 and EBS, provide specific features, such as availability zones, elastic IP addresses, and snapshots, that a fault-tolerant and highly available system must take advantage of and use correctly.

    - Regions & Availability Zones
    Amazon Web Services are available in geographic Regions and with multiple Availability zones (AZs) within a region, which provide easy access to redundant deployment locations.
    AZs are distinct geographical locations that are engineered to be insulated from failures in other AZs.
    Regions and AZs help achieve greater fault tolerance by distributing the application geographically and help build multi-site solution.
    AZs provide inexpensive, low latency network connectivity to other Availability Zones in the same Region
    By placing EC2 instances in multiple AZs, an application can be protected from failure at a single data center
    It is important to run independent application stacks in more than one AZ, either in the same region or in another region, so that if one zone fails, the application in the other zone can continue to run.

    - Amazon Machine Image – AMIs
    EC2 is a web service within Amazon Web Services that provides computing resources.
    Amazon Machine Image (AMI) provides a Template that can be used to define the service instances.
    Template basically contains a software configuration (i.e., OS, application server, and applications) and is applied to an instance type
    AMI can either contain all the softwares, applications and the code bundled or can be configured to have a bootstrap script to install the same on startup.
    A single AMI can be used to create server resources of different instance types and start creating new instances or replacing failed instances

    - Auto Scaling
    Auto Scaling helps to automatically scale EC2 capacity up or down based on defined rules.
    Auto Scaling also enables addition of more instances in response to an increasing load; and when those instances are no longer needed, they will be automatically terminated.
    Auto Scaling enables terminating server instances at will, knowing that replacement instances will be automatically launched.
    Auto Scaling can work across multiple AZs within an AWS Region

    - Elastic Load Balancing – ELB
    Elastic Load balancing is an effective way to increase the availability of a system and distributes incoming traffic to application across several EC2 instances
    With ELB, a DNS host name is created and any requests sent to this host name are delegated to a pool of EC2 instances
    ELB supports health checks on hosts, distribution of traffic to EC2 instances across multiple availability zones, and dynamic addition and removal of EC2 hosts from the load-balancing rotation
    Elastic Load Balancing detects unhealthy instances within its pool of EC2 instances and automatically reroutes traffic to healthy instances, until the unhealthy instances have been restored seamlessly using Auto Scaling.
    Auto Scaling and Elastic Load Balancing are an ideal combination – while ELB gives a single DNS name for addressing, Auto Scaling ensures there is always the right number of healthy EC2 instances to accept requests.
    ELB can be used to balance across instances in multiple AZs of a region.

    - Elastic IPs – EIPs
    Elastic IP addresses are public static IP addresses that can be mapped programmatically between instances within a region.
    EIPs associated with the AWS account and not with a specific instance or lifetime of an instance.
    Elastic IP addresses can be used for instances and services that require consistent endpoints, such as, master databases, central file servers, and EC2-hosted load balancers
    Elastic IP addresses can be used to work around host or availability zone failures by quickly remapping the address to another running instance or a replacement instance that was just started.
    Reserved Instance
    Reserved instances help reserve and guarantee computing capacity is available at a lower cost always.

    - Elastic Block Store – EBS
    Elastic Block Store (EBS) offers persistent off-instance storage volumes that persists independently from the life of an instance and are about an order of magnitude more durable than on-instance storage.
    EBS volumes store data redundantly and are automatically replicated within a single availability zone.
    EBS helps in failover scenarios where if an EC2 instance fails and needs to be replaced, the EBS volume can be attached to the new EC2 instance
    Valuable data should never be stored only on instance (ephemeral) storage without proper backups, replication, or the ability to re-create the data.
    EBS Snapshots
    EBS volumes are highly reliable, but to further mitigate the possibility of a failure and increase durability, point-in-time Snapshots can be created to store data on volumes in S3, which is then replicated to multiple AZs.
    Snapshots can be used to create new EBS volumes, which are an exact replica of the original volume at the time the snapshot was taken
    Snapshots provide an effective way to deal with disk failures or other host-level issues, as well as with problems affecting an AZ.
    Snapshots are incremental and back up only changes since the previous snapshot, so it is advisable to hold on to recent snapshots
    Snapshots are tied to the region, while EBS volumes are tied to a single AZ

    - Relational Database Service – RDS
    RDS makes it easy to run relational databases in the cloud
    RDS Multi-AZ deployments, where a synchronous standby replica of the database is provisioned in a different AZ, which helps increase the database availability and protect the database against unplanned outages
    In case of a failover scenario, the standby is promoted to be the primary seamlessly and will handle the database operations.
    Automated backups, enabled by default, of the database provides point-in-time recovery for the database instance.
    RDS will back up your database and transaction logs and store both for a user-specified retention period.
    In addition to the automated backups, manual RDS backups can also be performed which are retained until explicitly deleted.
    Backups help recover from higher-level faults such as unintentional data modification, either by operator error or by bugs in the application.
    RDS Read Replicas provide read-only replicas of the database an provides the ability to scale out beyond the capacity of a single database deployment for read-heavy database workloads
    RDS Read Replicas is a scalability and not a High Availability solution

    - Simple Storage Service – S3
    S3 provides highly durable, fault-tolerant and redundant object store
    S3 stores objects redundantly on multiple devices across multiple facilities in an S3 Region
    S3 is a great storage solution for somewhat static or slow-changing objects, such as images, videos, and other static media.
    S3 also supports edge caching and streaming of these assets by interacting with the Amazon CloudFront service.

    - Simple Queue Service – SQS
    Simple Queue Service (SQS) is a highly reliable distributed messaging system that can serve as the backbone of fault-tolerant application
    SQS is engineered to provide “at least once” delivery of all messages
    Messages are guaranteed for sent to a queue are retained for up to four days( by default, and can be extended upto 14 days)  or until they are read and deleted by the application
    Messages can be polled by multiple workers and processed, while SQS takes care that a request is processed by only one worker at a time using configurable time interval called visibility timeout
    If the number of messages in a queue starts to grow or if the average time to process a message becomes too high, workers can be scaled upwards by simply adding additional EC2 instances.

    - Route 53
    Amazon Route 53 is a highly available and scalable DNS web service.
    Queries for the domain are automatically routed to the nearest DNS server and thus are answered with the best possible performance.
    Route 53 resolves requests for your domain name (for example, www.example.com) to your Elastic Load Balancer, as well as your zone apex record (example.com).

    - CloudFront
    CloudFront can be used to deliver website, including dynamic, static and streaming content using a global network of edge locations.
    Requests for your content are automatically routed to the nearest edge location, so content is delivered with the best possible performance.
    CloudFront is optimized to work with other Amazon Web Services, like S3 and EC2
    CloudFront also works seamlessly with any non-AWS origin server, which stores the original, definitive versions of your files.