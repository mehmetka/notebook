---
tags: [amazonlinux, linux, xfce, xrdp]
---

# Installing xRDP and xfce Desktop on Amazon Linux

## Install xRDP

```  
sudo yum update -y
# amazon-linux-extras removed on Amazon Linux 2023  
sudo amazon-linux-extras install epel  
sudo yum install -y xrdp  
sudo systemctl enable xrdp  
```

### Configure xRDP

Disable copy-paste bidirectional: /etc/xrdp/xrdp.ini has cliprdr setting. Just set it to false

## Install xfce Desktop

```  
sudo yum groupinstall -y xfce  
sudo reboot  
echo "xfce4-session" > ~/.Xclients  
chmod a+x .Xclients  
```  

> Unknown (2023-09-25 15:18:26)  
> #amazonlinux #linux #xfce #xrdp

