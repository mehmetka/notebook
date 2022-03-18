## 000
- iCloud path: /Users/username/Library/Mobile Documents/com~apple~CloudDocs 

## 001
- DevOps bir yazılım geliştirme ve dağıtım sürecidir. Ürün yönetimi, yazılım geliştirme ve operasyon uzmanları arasındaki işbirliği ve iletişimi vurgulayıp süreçlerin koordinasyon içinde en iyi şekilde sonuçlanmasını sağlar.  
#devops  
Source: https://medium.com/devopsturkiye/teknolojileri-ile-hayat-kurtaran-32-devops-arac%C4%B1-4eb35b234c88  

## 002
- Using getenv() and putenv() is strongly discouraged due to the fact that these functions are not thread safe, however it is still possible to instruct PHP dotenv to use these functions.

## 003
- Block anything except zip files in .htaccess file:
```conf
Deny from all

<FilesMatch "\.(zip)$">
Order Deny,Allow
   Allow from all
</FilesMatch>
```

## 004
- Build for linux on macos  
```
GOOS=linux GOARCH=amd64 go build -o notification
```

## 005
- Dis dunyaya actigim bu API'yi kimler cagirabiliyor?
- Kullanici bu parametreyi kullanarak baskasina ait varliklara erisebilir mi?
- Bu parametreye beyaz liste denetimi uyguladim mi?
- Burada kod ve veriyi guvensiz bir sekilde birbiriyle karistiriyor muyum?
- Kullandigim kutuphjaneler yeni mi ve guvenlik sayfalarini okudum mu
- Kullandigim bu API metodunun argumanlarinin guvenli versiyonlari var mi
- Bu parametreyi kullanicidan almama gercekten gerek var mi?  
#securecoding  
Source: Bedirhan Urgun @ Linkedin

## 006 
Browser does not allow to use autocomplete on values which access by AJAX request