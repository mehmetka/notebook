---
tags: [htaccess, technical]
---

Block anything except zip files in .htaccess file:

```  
Deny from all

<FilesMatch "\.(zip)$">  
Order Deny,Allow  
   Allow from all  
</FilesMatch>  
```

*>_ Unknown* (2022-08-13 21:08:42)

tags: htaccess, technical

