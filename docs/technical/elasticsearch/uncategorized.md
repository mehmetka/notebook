---
tags: [elasticsearch]
---

Error Message:

```  
... es no alive nodes found in your cluster elasticsearch ...  
```

Solution:

```  
$ setsebool httpd_can_network_connect 1  
```  

> Unknown (2022-08-13 21:11:25)  
> #elasticsearch

