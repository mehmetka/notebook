- DevOps bir yazılım geliştirme ve dağıtım sürecidir. Ürün yönetimi, yazılım geliştirme ve operasyon uzmanları arasındaki işbirliği ve iletişimi vurgulayıp süreçlerin koordinasyon içinde en iyi şekilde sonuçlanmasını sağlar.  
#devops  
Source: https://medium.com/devopsturkiye/teknolojileri-ile-hayat-kurtaran-32-devops-arac%C4%B1-4eb35b234c88  

- Using getenv() and putenv() is strongly discouraged due to the fact that these functions are not thread safe, however it is still possible to instruct PHP dotenv to use these functions.

- Block anything except zip files in .htaccess file:
```conf
Deny from all

<FilesMatch "\.(zip)$">
Order Deny,Allow
   Allow from all
</FilesMatch>
```

- Build for linux on macos  
```
GOOS=linux GOARCH=amd64 go build -o notification
```