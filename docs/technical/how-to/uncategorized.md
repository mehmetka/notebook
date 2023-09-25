---
tags: [aws, basicauth, cron, curl, elasticsearch, exif, foxyproxy, how-to, linux, socksproxy, sonarqube, sysctl]
---

## Remove EXIF Metadata with exiftool

```  
exiftool -all= FileName  
```  

> Unknown (2023-07-31 21:58:59)  
> #exif #how-to

--

## FoxyProxy SOCKS Proxy Configurations

![foxy-proxy-socks-proxy-conf](/img/foxy-proxy-socks-proxy-conf.png)  

> Unknown (2022-08-13 21:02:59)  
> #foxyproxy #how-to #socksproxy

--

## Fix "vm.max_map_count is too low"

To solve #sonarqube #elasticsearch max memory: "max virtual memory areas vm.max_map_count [65530] is too low, increase to at least [262144]" error:

Temporary solution:

```  
sysctl -w vm.max_map_count=262144  
```

Permanent solution:

Add this line to /etc/sysctl.conf file  
```  
vm.max_map_count=262144  
```

Source: https://stackoverflow.com/questions/51445846/elasticsearch-max-virtual-memory-areas-vm-max-map-count-65530-is-too-low-inc  

> Unknown (2022-08-13 21:06:39)  
> #elasticsearch #how-to #sonarqube #sysctl

--

## Basic Auth with cURL

```  
curl user:pass@host ...  
curl -u user:pass ...  
```  

> Unknown (2023-07-31 22:00:14)  
> #basicauth #curl #how-to

--

## Install cron Amazon Linux 2023

```  
sudo yum install cronie -y  
sudo systemctl enable crond.service  
sudo systemctl start crond.service  
```  

> Unknown (2023-08-31 17:45:56)  
> #aws #cron #linux

