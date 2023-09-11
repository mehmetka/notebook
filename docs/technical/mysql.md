---
tags: [docker, mysql]
---

Using custom my.cnf in MySQL Container

my.cnf:

```  
[mysqld]  
key=val  
```

Bind this path (```/etc/mysql/conf.d```) to your host directory that includes custom my.cnf file  

> Unknown (2023-08-29 17:47:16)  
> #docker #mysql

--

### Fulltext Search with "WHERE MATCH ... AGAINST ..."

Add fulltext search index that you want to search columns:  
```sql  
FULLTEXT KEY `fti_product` (`product`)  
```

```sql  
SELECT * FROM cves c  
INNER JOIN cve_configurations cc  
ON c.id = cc.cve_id  
WHERE MATCH(cc.product) AGAINST(:libraryName)  
```  

> Unknown (2022-08-13 21:05:01)  
> #mysql

--

### Copy with indexes and triggers

```sql  
CREATE TABLE newtable LIKE oldtable;  
INSERT INTO newtable SELECT * FROM oldtable;  
```  

> Unknown (2022-08-13 21:04:50)  
> #mysql

