# aws-notes

## [Architecting Highly Available Appliations on AWS](https://www.slideshare.net/AmazonWebServices/t1architecting-highly-available-applications-on-aws)
- User > 100: seperate single host into more than one: web, database: make use of a database service (self-managed: database server on EC2, fully-managed: amazon rds, amazon dynamo db, amazon redshift)
- User > 1000 (Amazon Route53, ELB, Web Instance, RDS DB instance Active/Standby (Multi-AZ)) - let's address our lack of failover and redundancy issues: ELB, Another web instance(different AZ), Enable Amazon RDS multi-AZ
- Let's lighten the load on our web and database instances:
  - move static content from the web instance to amazon s3 and cloudfront
  - move dynamic content from the load balancer to cloudfront
  - move session/state and DB caching to elasticache or amazon dynamodb
- User > 500k+ :
  - Have monitoring/metrics/logging in place - If you can’t build it internally, outsource it! (3rd party SaaS) 
  - Pay attention to what customers are saying works well 
  - Squeeze as much performance as you can out of each service/component

## [AWS maliyetlerini azaltmak için bugün yapabileceğiniz 10 şey](https://aws.amazon.com/tr/blogs/turkey/aws-maliyetlerini-azaltmak-icin-bugun-yapabileceginiz-10-sey)

- Az kullanilan, boşta olan veya kullanımı düşük olan EC2 sunucularına ait raporu alın. Bu sunucuları durdurarak veya küçülterek maliyetleri azaltabilirsiniz
- Az kullanılan Amazon EBS birimlerini belirleyin ve anlık yedek (snapshot) imajını silerek maliyeti azaltın
- Amazon S3 kullanımını analiz edin ve daha düşük maliyetli S3 katmanlarından yararlanarak maliyeti azaltın
- Az kullanılan Amazon RDS ve Amazon Redshift sunucularını durdurarak (RDS) veya duraklatarak (Redshift) maliyetleri azaltın
- Amazon DynamoDB kullanımını analiz edin ve Otomatik Ölçeklendirme (Autoscaling) veya isteğe bağlı kullanım (On-Demand) özelliğinden yararlanarak maliyeti azaltın
- Boşta olan yük dengeleyicilerini silerek maliyetleri düşürün
- EC2 maliyetlerini azaltmak için Amazon EC2 Spot sunucularını kullanın (İş yükünüz hataya dayanıklı ise maliyetlerini %90’a kadar azaltır)
	- Otomatik Ölçeklendirme Spot sunucularını otomatik olarak istemeyi gerçekleştirir ve Spot sunucularınız kesintiye uğratılsa bile hedef kapasiteyi korumaya çalışır.
- EC2 Otomatik Ölçeklendirme Grupları (Autoscaling Groups) yapılandırmasını gözden geçirin ve değiştirin (?)
- RDS, Redshift, ElastiCache ve Elasticsearch maliyetlerini azaltmak için Rezerve Edilmiş Sunucuları (RI) kullanın
- Ön ödemesiz taahhütle İsteğe Bağlı fiyatlandırmaya kıyasla %42’ye varan indirim elde etmek için 1 yıllık Rezerve Edilmiş Sunucuları (Reserved Instance – RI) kullanın. RDS, Redshift, ElastiCache ve Elasticsearch kullanımınıza dayanan AWS Cost Explorer RI satın alma önerileri aracını kullanın. Parametreleri bir yıla ayarladığınızdan emin olun. Bu bir yıl taahhüt gerektirir ancak başabaş noktası tipik olarak yedi ila dokuz aydır. Bu maddeden (#9) önce madde #4’ü gerçekleştirmenizi öneririz.
- EC2, Fargate ve Lambda maliyetlerini azaltmak için Compute Savings Plans kullanın

## [AWS: Highly Available & Resilient architecture using LAMP stack](https://www.linkedin.com/pulse/aws-highly-available-resilient-architecture-using-lampstack-sharma)

- Network Layer: Manages network configurations and security via AWS Route 53, Cloudfront, ELB, MultiAvailability Zones, Elastic IPs, Security Groups, etc. Responsible for ensuring access to the application from across the globe and load balancing them.
- The HTTPs request is served by Route53 which forwards it to corresponding ELB(Elastic Load Balancer) consisting of ASG-EC2 instances. EC2 instances are provisioned using Elastic Beanstalk in Multi AZ and load balanced.
- Request to static objects(image/videos etc) are served from a S3 bucket via Cloudfront as a CDN.
- RDS is set up for High availability/Failover in Multi AZ environment. A synchronous standby replica is provisioned and maintained in a different Availability Zone.
- Automated backups and snapshots can be provisioned for disaster recovery.
- Cognito is used to manage user identities & sync user specific data across multiple devices. Load Balancer is used to securely authenticate users as they access the applications.
- Kinesis is used to process the streams of data in real time. The app on the EC2 instances pushes app logs, error logs or custom logs onto the Kinesis. RDS can push error logs/custom data to Kinesis.
- S3 is used to store all the logs produced in Kinesis Streams. Lifecycle Rule is set up to archive this data in Glacier after 180 days.
- Quicksight is leveraged for analytics having source in S3 bucket in above step.
- Pinpoint is used for customer engagement like sending notifications or campaigns with data source from S3 bucket. 
- SNS is used to send notifications to consumers from the application. 
- Cloudformation can be used to provision, configure and also auto scale the infrastructure. AMI can be created for EC2 and leveraged for provisioning.

## [RDS (Relational Database Services)](https://medium.com/@sametustaoglu/rds-relational-database-services-9e3d3f5d61bc)

- Veritabanına erişim, okuma ve yazma hızlarını etkiler.
- Disk olarak "General Purpose", "Provisioned IOPS" ve "Magnetic" olarak 3 seçenek mevcuttur. 
  - General Purpose: fiyat-performans ürünüdür. 20GB — 64TB arası veri depolanabilir. Hız verinin boyutu ile orantılıdır. GB başına 3 IOPS olmakla birlikte maksimum limit 3000 IOPS dur. 
  - Provisioned IOPS: extra hız gerektiren işlemlerde kulanılır. 1000 IOPS’dan 80000 IOPS’a kadar seçilebilir.
  - Magnetic: eski bir çözümdür ama hala kullanılır maksimum 3 TB depolama ve 1000 IOPS değeri sağlanabilir.
- Multi AZ özelliği sayesinde kesintisiz çalışma ve olumsuz şartlardan korunma sağlar. Bu seçenekte aynı anda aynı region’da farklı AZ’lerde iki DB instance oluşturulur. Bir AZ’deki instance aktiftir diğeri pasiftir ama tamamen senkrondur. Asıl DB instance’ın çalışması herhangi bir sebeple durursa pasif olan aktif konuma geçerek operasyona devam eder.
- Storage type seçeneğiyle öncelikle tipini seçiyoruz. Burada okuma yazma hız ihtiyacınız ön plana çıkıyor. 
  - Eğer yüksek değerlere ihtiyacınız varsa Provisioned seçip IOPS değerini kendiniz seçebilirsiniz. 
  - General purpose olarak bırakırsanız da verinin boyutuna göre performans ayarını kendisi yapar. 
- Storage autoscaling ile de depolama için gereksinimi otomatik artırma yaptırabiliriz depolama alanı azaldığında kendisi sistemi büyütecektir. Burada maksimum değer de seçilebiliyor.
- Maintenance window'da' seçtiğiniz zaman dilimi ile otomatik back-up zaman dilimi çakışmamalıdır.


## [AWS High Availability: Compute, SQL and Storage](https://cloud.netapp.com/blog/understanding-aws-high-availability-compute-sql-and-storage)

- Highly available systems are reliable in the sense that they continue operating even when critical components fail. 
- They are also resilient, meaning that they are able to simply handle failure without service disruption or data loss, and seamlessly recover from such failure.
- High availability is commonly measured as a percentage of uptime. The number of “nines” is commonly used to indicate the degree of high availability. For example, “four nines” is indicative of a system that is up 99.99% of the time, meaning it is down for only 52.6 minutes during an entire year.
- Redundancy: ensuring that critical system components have another identical component with the same data, that can take over in case of failure.
- Monitoring: identifying problems in production systems that may disrupt or degrade service.
- Failover: the ability to switch from an active system component to a redundant component in case of failure, imminent failure, degraded performance or functionality.
- Failback: the ability to switch back from a redundant component to the primary active component, when it has recovered from failure.

## [Availability & Scalability with Elastic Load Balancing & Route 53](https://www.slideshare.net/AmazonWebServices/availability-scalability-with-elastic-load-balancing-route-53-cpn204-aws-reinvent-2013)

### Route 53: 
- improves availability by: health checking load balancer nodes and rerouting traffic to avoid failures
- supporting multi-region and backup architectures for highly-availability
- amazon route 53 conducts health checks from within each AWS region

### Instance Availability:
- [Instance Redundancy] Load balancer used to route incoming requests to multiple EC2 instances. Incoming request load shared by all instances behind the load balancer
- [Request routing] Least conns used to spread request across healthy instances. Instances that fail can be replaced seamlessly while other instances continue to operate \ application level health checks ensure that request traffic is shifted away from a failed instance
- Failure detected - traffic shifted - healthy instances carry additional request load

### Zonal Availability:
- It is important to run application stacks in more than one zone
- Avoid unnecessary dependencies between zones
- Load balancer used to balance across instances in multiple AZs

### Regional Redundancy - Availability:
- Elastic Load Balancing and Amazon Route 53 have been integrated to support a single application across multiple regions.