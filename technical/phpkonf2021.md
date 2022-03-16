## flo/volkan-ozyildirim
yazilim yasam dongusu:

[Loop]
New feature > Test > Bug fix > Test 

Preprod

[Loop]
Test > Production > Test > Hotfix

Optimize  
Load test

## teknasyon/ali-ozkan
Agenda:
- Canli ortamda karsiniza cikabilecek sorunlar ve cozumleri
- RedisCluster ile Redis'i yatayda genisletme
- Yerel Redis kullanarak network kullaniminin azaltilmasi
- Redis uzerinden performansli olarak fraud kontrolu
- Raporlama - Veriyi akarken sayma
- Raporlama - HyperLogLog ile essiz sayma pratikleri

### Brute Force engelleme 
- Token kontrolünden önce ip adresi engellenip engellenmediğini kontrol et. Eğer zaten yasaklı ise token kontrolüne geçmeden hata dönüşü yap.  
```GET bruteForceBannedIp:xxx.xxx.xxx.xxx```

- Yasaklı değilse, token kontrolunu gerçekleştir. Eğer daha önce sistemde hiç var olmamış bir token ise, token'ı listeye ekle ve Redis anahtarına uygun bir sonlanma süresi ver:  
```
SADD invalidTokens:xxx.xxxxxx.xxx 6d0989f7d5888985f625ea11d32ca8ff645f47ce
EXPIRE invalidTokens:xxx.xxx.xxx.xxx 1800
```

- Listeye token ekleme sonrası listenin boyutunu kontrol et. Eşik limiti geçtiyse, ip adresini yasaklamak için Redis anahtarını işaretle ve yasak anahtarina ip adresinin yasaklı kalacağı süre kadar geçerlilik süresi ver: 

```
invalidUniqueTokenCount = SCARD InvalidTokensixxx.xxx.xxx.xxx 
if invalidUniqueTokenCount >= 20 
SET bruteForceBannedIpixxx.xxx.x..xxıitimestamp 
EXPIRE bruteForceBannedlpixxx.xxx.xxx.xxx 3600 
```

### Raporlama - Veriyi Akarken Sayma 
Raporlama için veriyi satır satır bir yere yazıp sonrasında üzerinden sorgular çalıştırmak yüksek trafik alan projeler için maliyetli bir işlem olabilir. Eğer rapor ihtiyaçları ileride daha fazla özellesmeyecekse ya da t anından sonra özelleşmesinde bir sakınca yoksa, veriyi doğrudan Redis servisi üzerinde saygı saatlik zamanlanmış görev ile veritabanında özet tablolara aktarım yapılabilir  

Bir metodun hangi ülke, hangi işletim sistemi ve hangi uygulama versiyonu üzerinden ça§rılma sayısı örneği:  

Sema: "methodCounter:{Y-m-d H}:{METHOD}:{COUNTRY_CODE}:{OS}:{APP_VERSION}" 

Sayma işlemi (Istek geldiği an, counter):
```
HINCRBY "methodCounter:2021-09-02 16" "methodCounter:2021-09-02 16:init:TR:IOS:5.4.9" 1
SADD "methodCounterKeys."ınethodCounter:2021-09-02 16"
```

özet tabloya aktarma işlemi (Rapor görevinin çalıştığı an, collector):
- keyList= SMEMBERS "methodCounterKeys" 
- keyList içerisinden sadece şimdiki saatten eski anahtarları al, her bir anahtar için: 
- uniqueKeylistWithCount = HGETALL "methodCounter:2021-09-02 16" 

### Raporlama - Eşsiz Sayma Problemine Redis Çözümü 
Eğer bir tabloda çok fazla veri varsa, COUNT(DISTINCT(column_name)) sorgusu çok maliyetli hale gelir (Count-Distinct problem). 

Bu işlemi performansiı ve çok daha az maliyetli bir şekilde çözmek için Redis içerisindeki HyperLogLog özelliğini kullanabiliriz. 

Avantajları: 
- Çok hızlı çalışması 
- Çok az bellek kullanmasi

Dezavantajları: 
- Belirli bir hata oranı ile sonuç alınması. 