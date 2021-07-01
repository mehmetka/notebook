    https://www.slideshare.net/AmazonWebServices/availability-scalability-with-elastic-load-balancing-route-53-cpn204-aws-reinvent-2013
    Elastic Load Balancing and Amazon Route 53 are critical components when building scalable and highly-available applications
    3 Levels of Availability: 1- Instance Availability, 2- Zonal Availability, 3- Regional Availability

    1- Instance Availability:
        - [Instance Redundancy] Load balancer used to route incoming requests to multiple EC2 instances
        - Incoming request load shared by all instances behind the load balancer
        - [Request routing] Least conns used to spread request across healthy instances
        - Instances that fail can be replaced seamlessly while other instances continue to operate \ application level health checks ensure that request traffic is shifted away from a failed instance
        - Failure detected - traffic shifted - healthy instances carry additional request load

    2- Zonal Availability:
        - It is important to run application stacks in more than one zone
        - Avoid unnecessary dependencies between zones
        - Load balancer used to balance across instances in multiple AZs
        - Using multiple AZs does bring a few challenges - AZs may see traffic imbalances due to clients caching DNS records - an unequal number of instances per zone can lead to over utilization if instances in a zone - Problem Solved -> Cross-Zone load balancing distributes traffic across all healthy instances, regardless of AZ - Effectively balances the request load across all instances behind the load balancer - Traffic is spread evenly across each of the active AZs - Cross-Zone Load Balancing -> No bandwidth charge for cross-zone traffic / eliminates imbalances in instance utilization / requests distributed equally to all instances regardless of zone / reduces impact of clients caching dns records 

    3- Regional Redundancy - Availability:
        - Elastic Load Balancing and Amazon Route 53 have been integrated to support a single application across multiple regions.

    Route 53: 
        - improves availability by: health checking load balancer nodes and rerouting traffic to avoid failures
        - supporting multi-region and backup architectures for highly-availability
        - amazon route 53 conducts health checks from within each AWS region