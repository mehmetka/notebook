---
tags: [elasticsearch, technical]
---

# uncategorized

Error Message:

```  
... es no alive nodes found in your cluster elasticsearch ...  
```

Solution:

```  
$ setsebool httpd_can_network_connect 1  
```

*>_ Unknown* (2022-08-13 21:11:25)

tags: elasticsearch, technical

