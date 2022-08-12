# Elasticbeanstalk PHP Environment

```yaml
container_commands:
  01_execute_example_command:
    command: "mkdir /var/tmp && chown -R webapp:webapp /var/tmp"

packages:
  yum:
    ImageMagick: [ ]

option_settings:
  namespace: aws:autoscaling:launchconfiguration
    SecurityGroups: securitygroup-name
  aws:elasticbeanstalk:environment:proxy:
    ProxyServer: apache
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