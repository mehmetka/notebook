## 000
- iCloud path: /Users/username/Library/Mobile Documents/com~apple~CloudDocs 
- Browser does not allow to use autocomplete on values which access by AJAX request
- ```<noscript>``` is for browsers which block javascript
- Practical basic auth usage: ```curl user:pass@host```

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
(Gitlab) You can create access key and use it while doing git operations:
```
git clone https://oauth2:access_key@gitlab.yourdomain.com/username/reponame.git
```
But instead of this, use deploy keys.