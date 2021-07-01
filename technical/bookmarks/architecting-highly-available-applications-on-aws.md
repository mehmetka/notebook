    https://www.slideshare.net/AmazonWebServices/t1architecting-highly-available-applications-on-aws

    scaling on AWS
    Auto Scaling - AWS
    Auto Scaling Documentation - AWS

    Auto scaling is a tool. It's not the single thing that fixes everything

    Service Reference Model:

    Deployment & Administration
    App Services
    Compute - Storage & Content Delivery - Database
    Networking
    AWS Global Infra.

    # Day 1: User one (you)
    - A single EC2 instance (with fullstack on this host - web app, database, management, etc...)
    - A single elastic ip
    - Route53 for DNS

    -> we could potentially get to a few hujndred to a few thousand depending on application complexity and traffic, no failover, no redundancy, too many eggs in one basket

    “We’re gonna need a bigger box” 
    Simplest approach 
    Can now leverage PIOPs 
    High I/O instances 
    High memory instances 
    High CPU instances 
    High storage instances 
    Easy to change instance sizes 
    Will hit an endpoint eventually

    # Day 2: User > 1:

    Let's seperate out our single host into more than one:
    - web
    - database: make use of a database service
        - self-managed: database server on EC2
        - fully-managed: amazon rds, amazon dynamo db, amazon redshift

    User > 100 (yalnizca Route53, Elastic IP, web instance, rds db instance)
    Seperate out our sungle host into more than one
    - web
    - database (use rds to make your life easier)

    User > 1000 (Amazon Route53, ELB, Web Instance, RDS DB instance Active/Standby (Multi-AZ))
    let's address our lack of failover and redundancy issues
    - ELB
    - Another web instance - in another AZ
    - Enable Amazon RDS multi-AZ

    User > 10k - 100k
    Amazon Route53 -> ELB -> Multi-AZ'de cesitli sayida instance'lar. (bu ornekte farkli AZ'de 4'er instance var) -> Butun instance'lar RDS DB Instance Active (Multi-AZ)'deki DB'ye baglaniyor ve Read Replica'lari kullaniyor. RDS DB Instance Standby hazirda bekliyor.

    # Shift some load around: (36)
    - let's lighten the load on our web and database instances:
        - move static content from the web instance to amazon s3 and cloudfront
        - move dynamic content from the load balancer to cloudfront
        - move session/state and DB caching to elasticache or amazon dynamodb

    User -> Amazon Route53 -> Amazon CloudFront -> ELB -> Web Instance -> ElastiCache
                        \-> ELB/Amazon S3                           \_> RDS DB Instance Active (Multi-AZ)
                                                                        \_> Amazon DynamoDB

    Amazon Route 53'den Amazon CloudFront'a gidiyor. CloudFront ile ELB ve Amazon S3 arasinda dagiliyor.

    Amazon DynamoDB ve S3 AZ'lerden bagimsiz. VPC icerisinde diyebiliriz.

    # Loose Coupling:
        - Decoupled components
        - Use SQS as a buffer
        - Continuous monitoring and adjusting

    User > 500k+ :
    You’ll potentially start to run into issues with speed and performance of your applications: 
    • Have monitoring/metrics/logging in place 
        – If you can’t build it internally, outsource it! (3rd party SaaS) 
    • Pay attention to what customers are saying works well 
    • Squeeze as much performance as you can out of each service/component

    * Review: (77/80):
    Split tiers into individual services (SOA)