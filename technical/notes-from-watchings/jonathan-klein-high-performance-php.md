# [High Performance PHP](https://app.pluralsight.com/library/courses/php-highly-performant)

- PHP version - use latest. PHP 7, 5.*'a gore iki kat daha hizli.
- Micro optimizations # mikro iyilestirmeler iyidir ancak buyuk farklar yaratmaz. "Avoid focusing on micro optimizations"
- Profiling PHP code xhprof
```
$ pecl install xhprof-2.3.2
$ docker-php-ext-enable xhprof
```

- Cache with redis
- Yeni basliyorsan nginx kullan ama apache'de bir uzmanligin varsa apache ile devam et. Nginx dynamic requestlerde %1 daha iyi. Nginx static requestlerde %40 daha iyi(nginx 3ms, apache 5ms).
- nginx -> ease of configuration, optimized for static content, flecibility, knowledge applies across many stack.
- PHP FPM - recommended process manager
- Percona -> no rds support
- InnoDB -> Row level locking, FK +, Transaction + vs MyISAM -> Table level locking, FK X, Transaction X

- my.cnf:
```
max_connections = pm.max_children* # of app servers
pm.max_children* -> for every PHP-FPM process that is running
```

- innodb_buffer_pool_size: isleri hizlandirmak icin memory'de cache yapiyor. Buradaki deger bu cache icin ne kadar memory ayiracagimizi soyler. safe value to use here is %90 of sarver memory -> sunucuda yalnizca mysql'in oldugu varsayiliyor.

- innodb_io_capacity -> maximum number of IOPS(input output operation per second) bunun icin dogru degeri fio toolari ile bulabiliriz. read ve write icin bu ornekte 16xx bir deger cikti 1500 yazdi.

- ikisini de 0 yapip, redis kullan
```
query_cache_limit
query_cache_size
```
- query_cache sikintisi: yazma yuku fazla ise kullanmak anlamsiz cunku cache'i guncellemek icin ilgili tablonun tum cache'ini silip yeniden ekliyormus.

## The MySQL Slow Query Log

- slow_query_log = 1 bolumundekileri ac.
- log_output'u da ac
- belirli bir sureden fazla suren, ornekte 1 saniye, queryleri goruntuleriz
- queryleri explain ile calistir.
- dogru indexleri eklemek
- Bir kaydin db'de olup olmadigini kontrol etmeden ve "insert ignore into" kullanmadan tek sorguda insert yapmak icin ya da ilgili kayit varsa ignore etmek icin: "ON DUPLICATE KEY UPDATE"

## APM Overview

- Metrics gathering -> listener -> storage -> visualizer
- TraceView 

## Summary

- Use the latest PHP and profile your code to find out where it's going to be slow
- Configure PHP, Nginx, and MySQL properly --- getting these settings right is half the battle to a fast application
- Monitor, optimize, and cache sql queries - the database is often the bottleneck for web applications - olcekleme data layer'da gorece daha zordur.
- load and performance test your app # production'da yap - what gets measured get managed
- don't stress about frameworks. use what makes it easiest for you to get work done. ship great products and if you do everythong else right oerformance will sort itself out