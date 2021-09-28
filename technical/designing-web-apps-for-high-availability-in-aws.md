    # https://dzone.com/articles/designing-web-apps-for-high-availability-in-aws

    Database Servers High Availability
    If you are using regionally redundant NoSQL data storage such as AWS DynamoDB, AWS internally manages the availability of them.
    If we are looking at relational databases like MySQL or Postgres, it is recommended to have at least two instances of database servers
    (Master and Slave with active-passive high availability) which span across Availability Zones.
    Implementing this with EC2 will be slightly complex since its also required to synchronize the data across these instances as well as
    to switch to the active version via DNS when a database instance failure happens. If you use Amazon RDS for the relational database,
    you can enable the multi-AZ feature to implement high availability without any additional complexities.