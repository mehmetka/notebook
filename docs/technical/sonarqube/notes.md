# notes

To solve sonarqube elasticsearch max memory: "max virtual memory areas vm.max_map_count [65530] is too low, increase to
at least [262144]" error:
```sysctl -w vm.max_map_count=262144```

Source: https://stackoverflow.com/questions/51445846/elasticsearch-max-virtual-memory-areas-vm-max-map-count-65530-is-too-low-inc