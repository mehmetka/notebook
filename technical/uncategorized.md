## 000
- iCloud path: /Users/username/Library/Mobile Documents/com~apple~CloudDocs 
- Browser does not allow to use autocomplete on values which access by AJAX request
- ```<noscript>``` is for browsers which block javascript
- Practical basic auth usage: ```curl user:pass@host```

## 001
- Using getenv() and putenv() is strongly discouraged due to the fact that these functions are not thread safe, however it is still possible to instruct PHP dotenv to use these functions.

## 002
- Block anything except zip files in .htaccess file:
```conf
Deny from all

<FilesMatch "\.(zip)$">
Order Deny,Allow
   Allow from all
</FilesMatch>
```

## 003
- Build for linux on macos  
```
GOOS=linux GOARCH=amd64 go build -o notification
```

## 004
(Gitlab) You can create access key and use it while doing git operations:
```
git clone https://oauth2:access_key@gitlab.yourdomain.com/username/reponame.git
```
But instead of this, use deploy keys.

## 005
Using more than one ssh key, add below lines to this file: ~/.ssh/config
```
IdentityFile ~/Desktop/.ssh/id_rsa
IdentityFile ~/.ssh/id_rsa
```

## 006
Change SSH port:
- Find "# Listen 22" line and remove sharp in this file: /etc/ssh/sshd_config
- Then change port number
- Restart sshd service, logout, login
### Source
- https://www.howtoforge.com/how-to-install-gitlab-server-with-docker-on-ubuntu-1804/