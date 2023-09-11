---
tags: [docker]
---

# Renaming Docker Volume

## Create New Volume  

```  
docker volume create --name new_volume  
```

## Copy everything from old volume to new volume

```  
docker container run --rm -it \  
	    -v old_volume:/from \  
	    -v new_volume:/to \  
	    alpine ash -c "cd /from ; cp -av . /to"     
```

Source: https://stackoverflow.com/a/67568671  

> Unknown (2022-08-13 20:57:49)  
> #docker

