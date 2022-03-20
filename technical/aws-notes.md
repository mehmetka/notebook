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

![architecture](https://media-exp1.licdn.com/dms/image/C4E12AQGWOMv8oeTRqQ/article-inline_image-shrink_1000_1488/0/1598785444602?e=1652918400&v=beta&t=OgYVP9jhFoi0w_Rq6SLSmXUeGAAtwArKxw9cXczV2f0)

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

## [AWS Elastic Beanstalk ve Best Practice’leri](https://engineering.teknasyon.com/aws-elastic-beanstalk-ve-best-practiceleri-128846ae6473)

- Beanstalk ortam kurulumunda yapmış olduğunuz konfigürasyonlarında Notifications bölümünde mutlaka her zaman ulaşabileceğiniz bir mail adresi girmelisiniz. Bu sayede Beanstalk ortamınızla her türlü bilgiyi mail ile öğrenebilirsiniz.
- en sağlıklı deployment şekli Rolling with additional batch olacaktır.
- Configuration Updates; Burada en sağlıklı güncelleme şekli olarak Rolling based on Health seçeneği ile devam edebilirsiniz.

### Deployment Types:
* All at once — Yeni sürümü tüm EC2'lara aynı anda dağıtır. Dağıtım gerçekleşirken ortamınızdaki tüm örnekler kısa bir süre hizmet dışı kalır.
* Rolling — Yeni sürümü, ortamın EC2'larını gruplara böler ve uygulamanın yeni sürümünü her seferinde bir toplu gruba dağıtarak ortamdaki örneklerin geri kalanını eski sürümü çalıştırır. Dönen bir dağıtım sırasında, örneklerin bir kısmı uygulamanın eski sürümüyle isteklere hizmet ederken, tamamlanmış gruplardaki örnekler yeni sürümle diğer istekleri sunar. Dağıtımı tamamlanmış olan örnek sayısı kadar ortamınızın kapasitesini azaltır.
> Not: Rolling stratejisini kullanacaksanız batchlerin ortamınızdaki EC2'ların yüzde kaçına veya kaç tanesine dağıtılarak dönen bir dağıtım gerçekleştirmesi gerektiğini belirtebilirsiniz. Bu kısım default olarak yüzdelik seçenekte %30'dur, adet olarak ise 1'dir.
* Rolling with additional batch — Yeni sürümü gruplar halinde dağıtır, ancak dağıtım işlemi sırasında tam kapasiteyi sağlamak için önce yeni bir örnek grubu oluşturur.
* Immutable — Değişmez bir güncelleme gerçekleştirerek yeni sürümü yeni bir örnek grubuna dağıtın.
* Traffic splitting — Yeni sürümü, yeni bir örnek grubuna dağıtır ve gelen istemci trafiğini mevcut uygulama sürümü ile yenisi arasında geçici olarak böler. Dağıtım tamamlandıktan sonra ise trafik tamamen yeni ortama geçmiş olacaktır. Bu seçeneği seçerseniz trafiğin ne kadarlık kısmını yeni ortama yönlendirmek istediğinizi belirtebilirsiniz.

### Configuration Updates
* Rolling based on Health — Ortamın EC2'larını gruplara böler ve örnekleri hizmete sokmadan ve sonraki gruba başlatmadan önce, mevcut gruptaki örneklerin sağlıklı olmasını bekler.
* Rolling based on Time — Ortamın EC2'larını gruplara böler ve bir sonraki gruba başlamadan önce yeni örneklerin başlatılması ile hizmete alınması arasında beklenecek bir süre belirlemenizi ister.
* Immutable — Değişmez bir güncelleme gerçekleştirerek yapılandırma değişikliğini yeni bir örnek grubuna uygular.

## [AWS’de Maliyet Optimizasyonu](https://ebrudalkir6.medium.com/awsde-maliyet-optimizasyonu-bc552a1f188b)

- Müşteri sistemini kurmadan önce uygulamanın ne kadar kaynağa ihtiyacı olduğunu belirleyip tahmini bir fiyatlandırma yapabilmek için [AWS Pricing Calculator](https://calculator.aws) kullanılabilir.
- Rezerve Edilmiş Bulut Sunucuları satın alınırken peşin ödeme oranı ne kadar yüksek olursa indirim de o kadar fazla olabiliyor. Amazon EC2, RDS ve Elasticsearch gibi hizmetler için rezerve edilmiş kapasite yatırımı yapılabilir ve on-demand kapasite ile karşılaştırdığında %75'e kadar tasarruf sağlayabiliriz.
- S3 gibi hizmetler için katmanlı fiyatlandırma uygulanır. Yani bunları ne kadar çok kullanırsak GB başına o kadar az ücret ödeyebiliyoruz.
- EC2 Savings Plans, 1 veya 3 yıl boyunca sürekli bir kullanım tutarına (saat başına ödeme) taahhüt etmeye karşılık olarak EC2 ve Fargate kullanımında düşük fiyatlar sunan esnek bir fiyatlandırma modelidir.
- Amazon EC2 Spot bulut sunucuları, bulut sunucularımız çalıştığı sırada geçerli olan spot fiyatı öderiz. on-demad seçeneğine göre %90'a kadar indirimlidir. Başlangıç ve bitiş zamanı esnek olan uygulamalarımız içi kullanabiliriz.
- Geliştirme, test, eğitim için açılmış ve bir süre sonra kullanılmayan sunucuları ve kaynakları kapatabilir veya sadece çalışma saatlerinde açık kalacak şekilde konfigüre edebiliriz.
- Harcamalarımız hakkında bize anında fikir vermesi için Amazon CloudWatch alarmları ve bildirimlerini ayarlayabiliriz.
- EC2 bulut sunucularımızdan CPU kullanımı, veri aktarımı ve disk kullanım etkinliği ölçümlerini takip edebilir ve iletişim kanallarımıza bu bildirimlerin gelmesini sağlayabiliriz.
- Kaynaklarımızı oluştururken CostCenter tagi ile tagleyerek hangi kaynak için ne kadar kullandığımızı görebiliriz.
- Ayrıca maliyet optimizasyonu ile ilgili AWS’nin kendi servisi olan AWS Trusted Advisor‘u da kullanabiliriz. Kaynaklarımızı AWS’nin en iyi uygulamalarına uygun bir şekilde tedarik etmemize yardımcı olan gerçek zamanlı rehberlik hizmeti sunan çevrimiçi bir araçtır. Servisin denetimleri ile AWS altyapımızı optimize etmemize, güvenliği ve performansı arttırmamıza, genel maliyetlerimizi düşürmemize ve hizmet sınırlarını izlememize yardımcı olur.
- tahmini ve gerçek kullanım maliyet raporları oluşturmada; AWS konsolunda yer alan ve başlıca hizmetler, kullanım türleri, API işlemleri ve diğerleri gibi AWS maliyetimize katkıda bulunan ilgili öğeleri görselleştirmemize olanak tanıyan bir grafik arabirimi olan AWS Cost Explorer’dan faydalanabiliriz. Ayrıca bu ara yüzden aylık maliyet tahmin raporları, kaynak tipine göre kullanım miktarları, trend kullanımları, reserved instance kullanımları ve saving planlarımızı görebiliriz.

## [Boosting MySQL database performance with Amazon ElastiCache for Redis](https://aws.amazon.com/getting-started/hands-on/boosting-mysql-database-performance-with-amazon-elasticache-for-redis/)
You will implement a cache-aside strategy using Amazon ElastiCache for Redis on top of a MySQL database. The cache-aside strategy is one of the most popular options for boosting database performance.  When an application needs to read data from a database, it first queries the cache.  If the data is not found, the application queries the database and populates the cache with the result.  There are many ways to invalidate the cache if the relevant records are modified in the underlying database, but for this tutorial we will use the Time To Live (TTL) expiration feature provided by Redis.

## [Scalable & Highly Available Web & Mobile App Architecture](https://medium.com/swlh/scalable-highly-available-web-mobile-app-architecture-d803b8ba56e)
- High Availability: A highly available application is one that can function properly when one or more of its components fail. It does not have a single point of failure, that is, when one component fails, the application can still deliver correct results.
- Design for High Availability: The first step is to identify where a failure can compromise the availability of the application (Single points of failure)
- Using Amazon ELB has another advantage, it can do the SSL/HTTPS connection management for us so that our servers receive plain HTTP traffic. This is a big advantage, given the high cost of SSL connection management computing. And since usage of SSL is increasingly being enforced by web browsers and platforms, this comes really handy.
- HA for Database: The typical way to ensure high availability of a database is to have replicas in different availability zones that are the mirror of the master database
- Another way to achieve scalability is to use Amazon API Gateway in combination with AWS Lambda. The first lets you define endpoints for your API. The second lets you execute functions without managing any server. This is called Serverless Computing. Express application servers can easily be updated to run as lambda function using serverless-http npm module. It will be triggered when front-end clients fire HTTPS requests to your defined APIs. Amazon API Gateway is highly available and scalable and you can use your own domains and subdomains to trigger it. Amazon API Gateway + AWS Lambda can be used as a replacement for Amazon Elastic Load Balancer + Amazon EC2 Auto Scaling + EC2 with less administration overhead. It should also cost less. It costs nothing when you have no or low traffic.

## [AWS ElastiCache Hakkında Bilmeniz Gereken Her Şey](https://engineering.teknasyon.com/aws-elasticache-hakk%C4%B1nda-bilmeniz-gereken-her-%C5%9Fey-52b6f7f06c23)
- Amazon ElastiCache gibi bir önbelleğe alma katmanı, her web sitesinin çoğunlukla statik ve sık erişilen verileri sunmak için tercih ettiği ilk araçtır.
- Önbelleğe alma işlemi, sık erişilen bilgileri, html sayfalarını, görüntüleri ve diğer statik bilgileri sunucudaki geçici bir bellek konumunda depolamak için kullanılan bir tekniktir.
- Önbellek verilerini kalıcı kılmak istiyorsanız, Redis’te dosya kurtarma senaryolarında kullanışlı olan Redis AOF (Append only files) adlı bir özellik vardır. Bir düğümün yeniden başlatılması veya hizmetin çökmesi durumunda Redis, güncellemeleri bir AOF dosyasından yeniden oynatır ve böylece kaybolan verileri kurtarır. Ancak bir donanım çökmesi durumunda AOF kullanışlı değildir. (Note: like mysql binlog?)
- Bunun daha iyi bir yolu ise, farklı kullanılabilirlik bölgelerinde bir veya daha fazla okuma kopyası olan bir çoğaltma grubuna sahip olmak ve AOF kullanmak yerine Multi-AZ’yi etkinleştirmektir. Bu senaryoda AOF’ye gerek olmadığından ElastiCache, Multi-AZ çoğaltma gruplarında AOF’yi devre dışı bırakır.
- Redis, eski verileri temizlemek için altı ayrıntılı ilke uygularken Memcached, LRU (En Son Kullanılanlar) algoritmasını kullanır.
- Redis, 512 MB’a kadar anahtar adlarını ve değerlerini desteklerken Memcached yalnızca 1 MB’yi destekler.
- Redis, nesneleri depolamak için bir hashmap kullanırken Memcached serileştirilmiş dizeler kullanır.
- Redis bir kalıcılık katmanı sağlar.
- Redis, yerleşik pub/sub, işlemler ve Lua komut dosyası oluşturma için kullanılır.
- Redis 3.0, kümelemeyi destekler.

## [10 Tips for Developing an AWS Disaster Recovery Plan](https://vticloud.io/en/10-goi-y-trien-khai-aws-disaster-recovery/)

- Identify critical resources and assets: What resources compose the core of your business? A Business Impact Analysis (BIA) can help give you a picture of which areas can become more affected in the event of a threat. It also can guide you to preview the potential impact of a disaster in operations.
- Define your recovery time objective (RTO) and your recovery point objective (RPO): You should know how much system downtime your organization can afford before suffering irreparable monetary losses. Therefore, calculating your recovery time objective is critical for a successful recovery plan. Moreover, you need to calculate how much data loss your organization can absorb before incurring too much damage — that is the recovery point objective. For example, if losing 4 hours of data will cause too much damage, then you need to account for an RPO of much less than 4 hours.

- Choose a disaster recovery planning method: There are four main recovery methods you can choose according to your organization requirements and preferences:
  - Backup and restore — you can use a managed solution to backup and restore data on a need-to-do basis. However, the restoration can consume a lot of time and resources as the system does not keep data on standby.
  - Pilot light — keep a core of critical applications and data running to enable quick retrieving in the event of a disaster.
  - Warm standby — this involves duplicating the system’s core elements and keeping them running on standby at all times. In the event of a disaster, this duplicate can be promoted to primary to maintain operations.
  - Hot standby — make a full replica of the data and applications, deploying it in two or more active locations. You can then split the traffic between them, so in the event of a disaster, the system simply reroutes everything to an undamaged region.

- Test your plan before implementing it: Schedule testing while developing your DRP can help you catch flaws before you need to implement the plan. This can ensure your plan is well oiled before a disaster or threat occurs.
-  Schedule maintenance: You should update your plan on a regular basis, to catch up with system changes. In the aftermath of a threat, this forms part of lessons learned, refining the plan to prevent further attacks or failures.
- Backup your data
- Use cross-region backups: While developing your plan you need to decide where the critical data will be stored. To avoid getting your entire system knocked offline, you should distribute the data across different availability zones (AZ) around the world. For example, you can use cross-region replication for S3. S3’s duplicates the data to multiple locations within a region by default, creating high durability. However, this does not eliminate the risk of data loss in a given region. To prevent this, you can use the cross-region replication option, automating the copying of the data to a designated bucket in another region. You can also use global tables in DynamoDB to deploy a multi-region multi-master database. This spreads the changes across several tables. Since the data is distributed in different regions, minimizes the risk of data loss.
- Use multi-factor authentication

## [Aurora Performance Best Practices for Tuning and Optimization](https://www.dnsstuff.com/aurora-performance)

1. Database Instance RAM Recommendations
A key part of successful Aurora performance tuning is ensuring you have allocated enough RAM, so your working set resides almost entirely in memory. To determine if your working set is almost all in memory, use Amazon CloudWatch to monitor and examine the following metrics:
* BufferCacheHitRatio: This metric measures the percentage of requests served by the buffer cache of a database instance in your database cluster. This gives you an insight into the amount of data being served from memory. If the hit ratio is low, this may indicate your queries on this particular database instance are going to disk more often than they should. If this is the case, you should examine your workload to determine which queries are responsible.
* VolumeReadIOPS: This metric measures the average number of read I/O operations from a cluster volume, reported in five-minute intervals. The value of VolumeReadIOPS should be stable but small. If your read I/O is higher than usual, you should examine the database instances in your database cluster to determine which are responsible for the spiking I/O.

3. Tuning “Autocommit”
- When enabled, autocommit automatically commits transactions to disk. If disabled, multi-statement transactions must be explicitly started and committed, or rolled back. If a transaction isn’t explicitly started, each successful statement will be automatically committed. We advise setting the autocommit value to 1 or ON, which should be the default. This ensures every SQL statement is automatically committed as you run it, unless it’s part of a transaction opened by the user.
- Tuning autocommit correctly is important because a value of OFF could encourage incorrect usage patterns, such as transactions being held longer than required. This can impact the stability and performance of your database.

4. Tuning “Max_Connections”: set to default
- When using a custom value, configure only as many connections as the application actively requires to perform. If you configure a connection limit that’s too high, this can contribute to higher memory usage, even if those connections aren’t being used. An unnecessarily high connection limit can also cause high database connection spikes, affecting performance.

5. Tuning “Max_Allowed_Packet”
- This setting defines the maximum allowed packet size the server can receive. The default setting, which is 4,194,304 bytes, is suitable for this parameter. You should only use a custom value if it’s required by your database workload. You should tune this parameter when dealing with queries returning large elements, such as BLOBs or long strings.

6. Tuning “Group_Concat_Max_Len”
- For the group_concat_max_len parameter, the default of 1,024 bytes is appropriate. You should only use a custom value if required by your workload. This parameter should only need tuning when you want to modify the return of the group_concat statement and enable the engine to return longer column values. This value is best used in parallel with max_allowed_packet, as it defines the maximum size of a response.
- When improperly configured, this parameter can cause high memory use and out-of-memory conditions. If set too low, it can cause queries to fail completely.

7. Tuning “Max_Heap_Table_Size”
- This parameter limits the size of new user-defined memory tables, but does not apply a limit to existing tables. You can use the default setting of 16,777,216 bytes for this parameter. If this parameter is set too high, it can cause high memory utilization and out-of-memory conditions if in-memory tables expand.

8. Tuning “Binlog_Cache_Size”
- The binlog_cache_size parameter controls the amount of memory the binary log cache can utilize. The default setting is 32,768 bytes and is recommended. By increasing the binlog_cache_size parameter, you can improve performance on systems with large transactions by using buffers to avoid excessive disk writes. Cache is allocated on a per-connection basis. To avoid causing an out-of-memory condition, limit this value in environments with a large number of database connections.

9. Tuning “Join_Buffer_Size”
- The recommended setting for join_buffer_size is 262,144 bytes, which is the default. This parameter value is preallocated for various types of operations (i.e., joins), and a single query can allocate numerous instances of this buffer. If you hope to improve join performance, try adding indexes to the relevant tables. When you change this parameter, it can result in severe memory pressure in environments with a large number of concurrent queries. Increasing this value doesn’t offer faster join query performance, even if indexes are added.

10. Tuning “Query_Cache_Size”
- This parameter is pre-tuned in Aurora and, by default, the value is much higher than the MySQL default. We recommend setting this parameter value to default, which is “variable value.” The Aurora query cache won’t suffer from scalability issues, as the query cache does in MySQL, so it’s acceptable to modify this value to accommodate demanding workloads and ensure high throughput.

11. Tuning “Table_Open_Cache”
- Leave the settings for table_open_cache as they are, unless your workload requires access to a large number of tables simultaneously. The table cache is responsible for consuming a significant amount of memory, and the default value in Aurora is significantly higher than the MySQL defaults. This parameter will be adjusted automatically according to instance size.
- If your database has a large number of tables (i.e., in the hundreds of thousands), this will require a larger setting, because not all tables can fit in memory. If you set this value too high, however, it might contribute to the number of out-of-memory conditions. If the Performance Scheme is enabled, this setting also impacts Performance Schema memory use.

## [15 Top AWS RDS Misconfigurations To Avoid in 2022](https://www.cloudanix.com/blog/top-15-aws-rds-misconfigurations-to-avoid-in-2021)

- Public Snapshots: ensure that your RDS database snapshots are not publicly accessible. Having a public snapshot and the threats arising from them also violate compliance standards like the GDPR, NIST, PCI DSS, ARPA, and MAS.
- Automated Backups: enable automated backups of your RDS database instances to ensure point-in-time recovery. compliance standards like NIST and ARPA require you to follow this step.
- Encryption Disabled: should be encrypted to fulfill compliance requirements for data-at-rest encryption. Furthermore, the GDPR, HIPAA, PCI DSS, APRA, MAS, and NIST require encryption of data and charge hefty fines in the event of a violation.
- Storage Space: always free up storage space. Low space on disk drives can cause misconfigurations. You can also scale up RDS instances that run on low disk space.
- Publicly Accessible RDS Instance: RDS instances should be not accessible publicly. This violates the GDPR, HIPAA, APRA, PCI DSS, MAS, and  NIST compliance standards.
- Transport Encryption Feature Disabled: ensure that Microsoft SQL Server and PostgreSQL instances provisioned with AWS RDS have the Transport Encryption feature enabled.
- Use Customer-Managed Keys instead of AWS-Managed Keys: Ensure that your RDS database instances use KMS CMK customer-managed keys rather than AWS-managed keys to have more granular control over your data-at-rest encryption/decryption process. Doing this is one step towards achieving GDPR, APRA, MAS, and NIST compliance.
- RDS Instances Provisioned in VPC Public Subnets: ensure that no AWS RDS database instances are provisioned inside VPC public subnets to protect them from direct exposure to the Internet. Instead, provision them in private subnets to prevent inbound traffic from the public internet. This will also ensure the security of the AWS RDS database. 
- Not Renewing RDS Reserved Instances before the expiration 
- Failed RDS Reserved Instances 
- Pending RDS Reserved Instances Purchases