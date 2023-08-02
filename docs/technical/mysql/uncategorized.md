---
tags: [technical, mysql]
---

# notes

# Copy with indexes and triggers

```sql  
CREATE TABLE newtable LIKE oldtable;  
INSERT INTO newtable SELECT * FROM oldtable;  
```

*>_ Unknown* (2022-08-13 21:04:50)

tags: technical, mysql

---

# Fulltext Search with "WHERE MATCH ... AGAINST ..."  
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

*>_ Unknown* (2022-08-13 21:05:01)

tags: technical, mysql

