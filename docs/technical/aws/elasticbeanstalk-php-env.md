---
tags: [technical, aws]
---

# Elasticbeanstalk PHP Environment

Use exist security group:

```yaml  
option_settings:  
  - namespace: aws:autoscaling:launchconfiguration  
    option_name: SecurityGroups  
    value: securitygroup-name  
```

Customize PHP-FPM settings:

```yaml  
option_settings:  
  aws:elasticbeanstalk:environment:proxy:  
    ProxyServer: apache

files:  
  "/etc/php-fpm.d/z-99-custom.conf":  
    mode: "000755"  
    owner: root  
    group: root  
    content: |  
      [www]  
      pm=ondemand  
      pm.max_children=50  
      pm.start_servers=5  
      pm.min_spare_servers=5  
      pm.max_spare_servers=25

  "/tmp/calc-php-fpm.sh":  
    mode: "000755"  
    owner: root  
    group: root  
    content: |  
      #!/usr/bin/env bash

      MAX_CHILDREN=$(free -m | awk 'FNR == 2 {print int(($2-350)/18 / 5) * 5}')  
      MIN_SPARE=$(($MAX_CHILDREN/5*1))  
      MAX_SPARE=$(($MAX_CHILDREN/5*2))  
      START=$(($MIN_SPARE + ($MAX_SPARE - $MIN_SPARE) / 2))

      cat <<EOT > /etc/php-fpm.d/z-99-custom.conf  
      [www]  
      pm=dynamic  
      pm.max_children=$MAX_CHILDREN  
      pm.start_servers=$START  
      pm.min_spare_servers=$MIN_SPARE  
      pm.max_spare_servers=$MAX_SPARE  
      EOT

commands:  
  configure_www_conf:  
    command: bash /tmp/calc-php-fpm.sh  
```

Environment Variables:

```yaml  
option_settings:  
  aws:elasticbeanstalk:application:environment:  
    DB_WRITER_HOST: rds-host  
    DB_WRITER_USER: username  
    DB_WRITER_PASSWORD: password  
    DB_WRITER_DATABASE: database  
    DB_READER_HOST: rds-host  
    DB_READER_USER: username  
    DB_READER_PASSWORD: password  
    DB_READER_DATABASE: database  
```

Create custom folder:

```yaml  
container_commands:  
  01_create_tmp_folder:  
    command: "mkdir /var/tmp && chown -R webapp:webapp /var/tmp"  
    ignoreErrors: true  
```

Install custom packages:

```yaml  
packages:  
  yum:  
    packageName: [ ]  
```

Install PHP extensions with PECL:

```yaml  
commands:  
  install_mongo_driver_command:  
    command: pecl install mongodb  
    ignoreErrors: true  
```

Set Auto Scaling Rules:

```yaml  
option_settings:  
  aws:autoscaling:asg:  
    Availability Zones: Any  
    MaxSize: "4"  
    MinSize: "2"  
```

Set Deployment Type:

```yaml  
option_settings:  
  aws:elasticbeanstalk:command:  
    DeploymentPolicy: RollingWithAdditionalBatch  
    BatchSizeType: Fixed  
    BatchSize: 2  
    IgnoreHealthCheck: true  
```

Add HTTPs Listener to ALB

```yaml  
option_settings:  
  aws:elbv2:listener:443:  
    ListenerEnabled: 'true'  
    Protocol: HTTPS  
    SSLCertificateArns: certificate-arn  
```

Add Custom Health Path:

```yaml  
option_settings:  
  aws:elasticbeanstalk:environment:process:default:  
    HealthCheckPath: /health-check-route  
```

Cloudwatch Configurations:

```yaml  
option_settings:  
  - namespace: aws:elasticbeanstalk:cloudwatch:logs  
    option_name: StreamLogs  
    value: true  
  - namespace: aws:elasticbeanstalk:cloudwatch:logs:health  
    option_name: HealthStreamingEnabled  
    value: false  
  - namespace: aws:elasticbeanstalk:cloudwatch:logs:health  
    option_name: DeleteOnTerminate  
    value: true  
  - namespace: aws:elasticbeanstalk:cloudwatch:logs:health  
    option_name: RetentionInDays  
    value: 7  
```

Install New Relic APM Agent:

```yaml  
packages:  
  yum:  
    newrelic-php5: [ ]  
  rpm:  
    newrelic: http://yum.newrelic.com/pub/newrelic/el5/x86_64/newrelic-repo-5-3.noarch.rpm  
commands:  
  configure_new_relic:  
    command: newrelic-install install  
    env:  
      NR_INSTALL_SILENT: true  
      NR_INSTALL_KEY: newrelic-key  
```

Install New Relic Infrastructure Agent:

```yaml  
files:  
  "/etc/newrelic-infra.yml":  
    mode: "000644"  
    owner: root  
    group: root  
    content: |  
      license_key: licence_key

commands:  
  "01-agent-repository":  
    command: sudo curl -o /etc/yum.repos.d/newrelic-infra.repo https://download.newrelic.com/infrastructure_agent/linux/yum/amazonlinux/2/x86_64/newrelic-infra.repo

  "02-update-yum-cache":  
    command: yum -q makecache -y --disablerepo='*' --enablerepo='newrelic-infra'

  "03-run-installation-script":  
    command: sudo yum install newrelic-infra -y  
```

customizing apache conf  
.platform/httpd/conf.d/x.conf:  
```  
CustomLog logs/access_log "%{X-Forwarded-For}i %l %u %t \"%r\" %>s %b \"%{Referer}i\" \"%{User-Agent}i\" [%T/%D]"  
```

*>_ Unknown* (2022-08-13 20:54:16)

tags: technical, aws

