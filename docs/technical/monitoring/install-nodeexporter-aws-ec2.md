---
tags: [amazonlinux, aws, ec2, monitoring, nodeexporter, prometheus]
---

# Install node_exporter on Amazon Linux

## Install node_exporter

```shell
# for graviton  
sudo wget https://github.com/prometheus/node_exporter/releases/download/v1.6.1/node_exporter-1.6.1.linux-arm64.tar.gz  
sudo tar xf node_exporter-1.6.1.linux-arm64.tar.gz  
sudo mv node_exporter-1.6.1.linux-arm64 node_exporter  
cd node_exporter  
sudo cp node_exporter /usr/local/bin  
```

## Create a Service

```shell  
sudo useradd node_exporter --no-create-home --shell /bin/false  
sudo chown node_exporter:node_exporter /usr/local/bin/node_exporter  
sudo vi /etc/systemd/system/node_exporter.service  
```

Add following to `/etc/systemd/system/node_exporter.service`

```editorconfig  
[Unit]  
Description = Node Exporter  
Wants = network-online.target  
After = network-online.target

[Service]  
User = node_exporter  
Group = node_exporter  
Type = simple  
ExecStart = /usr/local/bin/node_exporter

[Install]  
WantedBy = multi-user.target  
```

```shell  
sudo systemctl daemon-reload  
sudo systemctl start node_exporter  
sudo systemctl enable node_exporter  
```  

> Unknown (2023-09-19 21:37:13)  
> #amazonlinux #aws #ec2 #monitoring #nodeexporter #prometheus

