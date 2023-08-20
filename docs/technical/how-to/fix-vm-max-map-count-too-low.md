---
tags: [how-to, technical]
---

# Fix "vm.max_map_count is too low"

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

*>_ Unknown* (2022-08-13 21:06:39)

tags: how-to, technical

