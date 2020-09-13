## [Goto Example](https://www.php.net/manual/en/control-structures.goto.php)

```php
<?php
for($i=0; $i<100; $i++) {
  if($i==17) goto end;
}
echo "Skip this line";
end:
echo 'i=17';
```