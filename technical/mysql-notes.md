## To copy with indexes and triggers
```
> CREATE TABLE newtable LIKE oldtable;
> INSERT INTO newtable SELECT * FROM oldtable;
```

## Fulltext Search with "WHERE MATCH ... AGAINST ..."
- Add fulltext search index that you want to search columns:
```sql
FULLTEXT KEY `fti_product` (`product`)
```

```sql
SELECT * FROM cves c
INNER JOIN cve_configurations cc
ON c.id = cc.cve_id
WHERE MATCH(cc.product) AGAINST(:libraryName)
```