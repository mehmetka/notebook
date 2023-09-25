---
tags: [linux, systemd]
---

# Create a Systemd Service

## Create .service File

- Set "User" and "Group"
- Set executable's path to "ExecStart"
- Change your executable's ownership to "User" and "Group" you set.

```  
sudo vi /etc/systemd/system/servicename.service

[Unit]  
Description=Service Name Description  
Wants=network-online.target  
After=network-online.target

[Service]  
User=user  
Group=group  
Type=simple  
ExecStart=exec-path

[Install]  
WantedBy=multi-user.target  
```

## Service Actions

### Start/Stop/Restart

```  
systemctl start/stop/restart servicename  
```

### Automatically start on boot

```  
systemctl enable servicename  
```

## Directives

### After

"After" directive means that your service must be started after the given-keyword is ready. [1]

After= ensures that the listed unit is fully started up before the configured unit is started. [1]

### Restart

By default, systemd does not restart your service if the program exits for whatever reason

```  
Restart=always  
Restart=on-failure  
```

You could also use on-failure to only restart if the exit status is not 0.

By default, systemd attempts a restart after 100ms. You can specify the number of seconds to wait before attempting a restart, using:

```  
RestartSec=1  
```

By default, when you configure `Restart=always` as we did, systemd gives up restarting your service if it fails to start more than 5 times within a 10 seconds interval. Forever.

If you set it to restart after 3 seconds, then you can never reach 5 failed retries within 10 seconds.

The simple fix that always works is to set `StartLimitIntervalSec=0`. This way, systemd will attempt to restart your service forever. [2]

## Source

- [1] https://systemd.io
- [2] https://medium.com/@benmorel/creating-a-linux-service-with-systemd-611b5c8b91d6
- [3] https://medium.com/@mehmetodabashi/how-to-install-prometheus-node-exporter-on-a-aws-ec2-instance-ce1bf8a72160
- [4] https://www.freedesktop.org/software/systemd/man/systemd.unit.html  

> Unknown (2023-09-13 14:01:18)  
> #linux #systemd

