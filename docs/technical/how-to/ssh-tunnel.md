---
tags: [how-to]
---

# SSH Tunnel on Windows 10 w/PuTTY and Burp Suite

0. Open PuTTY, on "Session" section, write your Host Name or IP Address    
![putty-entrance](/img/putty-entrance.png)

1. Go to Connection > SSH > Tunnels. "Add new forwarded port" write a port. Mine is 4567. Leave "Destination" blank. Choose "Dynamic" and "Auto". Click "Add".  
![putty-connection-ssh-tunnels](/img/putty-connection-ssh-tunnels.png)

1.1. As a result you will see  
![putty-ssh-tunnel-conf-result](/img/putty-ssh-tunnel-conf-result.png)

1.2. Click "Open"

2. Open Burp Suite > Temporary Project > Start Burp 

2.1- Proxy > Intercept > Intercept is off

2.2. Proxy > Options > Proxy Listeners > Choose a listener > Edit > Bind to port:8081  
![burp-suite-proxy-options](/img/burp-suite-proxy-options.png)

2.3. Project Options > Click "Override User Options" > Write "Socks Proxy host":127.0.0.1, "Socks Proxy port":4567, Click "Use SOCKS Proxy", Click "Do DNS lookups over SOCKS proxy"  
![burp-suite-project-options-socks-proxy-conf](/img/burp-suite-project-options-socks-proxy-conf.png)

3. Done \m/  

> Unknown (2022-08-13 21:03:58)  
> #how-to

