    https://www.linkedin.com/pulse/aws-highly-available-resilient-architecture-using-lampstack-sharma

    Proposed Solution:
    # The proposed solution consists of three layers: 
    - Web/App Server Layer: Manages application on EC2 instance via Elastic Beanstalk, Load balancing and Auto Scaling Groups. Manage User Identity & sync using Cognito 
    - Database Layer: Manages database servers configuration, security, availability using RDS Mysql Instance 
    - Network Layer: Manages network configurations and security via AWS Route 53, Cloudfront, ELB, MultiAvailability Zones, Elastic IPs, Security Groups, etc. Responsible for ensuring access to the application from across the globe and load balancing them.

    - The HTTPS request is served by Route53 which forwards it to corresponding ELB(Elastic Load Balancer) consisting of ASG-EC2 instances. EC2 instances are provisioned using Elastic Beanstalk in Multi AZ and load balanced.
    - Request to static objects(image/videos etc) are served from a S3 bucket via Cloudfront as a CDN.
    - The data access layer from EC2 instance connects to RDS(MySQL) master instance for CRUD operations.
    - RDS is set up for High availability/Failover in Multi AZ environment. A synchronous standby replica is provisioned and maintained in a different Availability Zone.
    - Automated backups and snapshots can be provisioned for disaster recovery.
    - Cognito is used to manage user identities & sync user specific data across multiple devices. Load Balancer is used to securely authenticate users as they access the applications.
    - Kinesis is used to process the streams of data in real time. The app on the EC2 instances pushes app logs, error logs or custom logs onto the Kinesis. RDS can push error logs/custom data to Kinesis.
    - S3 is used to store all the logs produced in Kinesis Streams. Lifecycle Rule is set up to archive this data in Glacier after 180 days.
    - Quicksight is leveraged for analytics having source in S3 bucket in above step.
    - Pinpoint is used for customer engagement like sending notifications or campaigns with data source from S3 bucket. 
    - SNS is used to send notifications to consumers from the application. 
    - Cloud formation can be used to provision, configure and also auto scale the infrastructure. AMI can be created for EC2 and leveraged for provisioning.