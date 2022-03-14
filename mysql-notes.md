## To copy with indexes and triggers
```
> CREATE TABLE newtable LIKE oldtable;
> INSERT INTO newtable SELECT * FROM oldtable;
```