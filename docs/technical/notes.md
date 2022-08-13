# notes

- iCloud path: /Users/username/Library/Mobile Documents/com~apple~CloudDocs
- Browser does not allow to use autocomplete on values which access by AJAX request
- ```<noscript>``` is for browsers which block javascript
- Practical basic auth usage: ```curl user:pass@host```
- Remove EXIF Metadata with exiftool: ```exiftool -all= FileName```

---

- Using getenv() and putenv() is strongly discouraged due to the fact that these functions are not thread safe, however
  it is still possible to instruct PHP dotenv to use these functions.

---

- Block anything except zip files in .htaccess file:

```conf
Deny from all

<FilesMatch "\.(zip)$">
Order Deny,Allow
   Allow from all
</FilesMatch>
```

---

- Build for linux on macos

```
GOOS=linux GOARCH=amd64 go build -o notification
```

---

(Gitlab) You can create access key and use it while doing git operations:

```
git clone https://oauth2:access_key@gitlab.yourdomain.com/username/reponame.git
```

But instead of this, use deploy keys.

---

Using more than one ssh key, add below lines to this file: ~/.ssh/config

```
IdentityFile ~/Desktop/.ssh/id_rsa
IdentityFile ~/.ssh/id_rsa
```

---

Change SSH port:

- Find "# Listen 22" line and remove sharp in this file: /etc/ssh/sshd_config
- Then change port number
- Restart sshd service, logout, login

### Source

- https://www.howtoforge.com/how-to-install-gitlab-server-with-docker-on-ubuntu-1804/

---

Udemy API:

- Unarchived:
  https://www.udemy.com/api-2.0/users/me/subscribed-courses/?fields%5Bcourse%5D=%40min%2Cvisible_instructors%2Cimage_240x135%2Cfavorite_time%2Carchive_time%2Ccompletion_ratio%2Clast_accessed_time%2Cenrollment_time%2Cis_practice_test_course%2Cfeatures%2Cnum_collections%2Cpublished_title%2Cis_private%2Cis_published%2Cbuyable_object_type&fields%5Buser%5D=%40min%2Cjob_title&is_archived=false&ordering=-last_accessed&page_size=32

- All
  https://www.udemy.com/api-2.0/users/me/subscribed-courses/?page_size=132

---

- When you get "sh: Operation not permitted" error while trying to run shell script on
  cron https://osxdaily.com/2020/04/27/fix-cron-permissions-macos-full-disk-access/

---

Error Message:

```
configure: error: Unable to detect ICU prefix or no failed. Please verify ICU install prefix and make sure icu-config works
```

Solution:  
Install ```libicu-dev``` package for "php:5.6.40-apache-jessie" image.

---

Error Message:

```
... es no alive nodes found in your cluster elasticsearch ...
```

Solution:

```
$ setsebool httpd_can_network_connect 1
```

---

Keyword: ERR_OSSL_EVP_UNSUPPORTED  
Solution:

```shell
NODE_OPTIONS=--openssl-legacy-provider next build && next export
```

---

## Using mkdocs

```shell
pip3 install mkdocs
mkdocs build
mkdocs serve
```

mkdocs.yml

```yaml
docs_dir: mdfiles # documents
site_dir: docs # build output
site_name: sitename
site_url: https://example.com
nav:
  - Home: 'index.md'
theme: readthedocs
```

---

## Create Profile on iTerm2 to automate ops

- Profiles > Open Profiles > Edit profiles > +'ya basip yeni profil ekle > Name'i yaz or: "Server A SSH" > "
  Applications in terminal may change the title" kutucugu deselect > Title dropdown list'inde "Profile Name" sec > "send
  text at start" input'ina ssh yapilacak komutu yaz. or: "ssh -i private-key username@ip" (key file'in
  full path'i verilmeli) > done
- Bu islemler yapildiktan sonra en yukaridaki "Profiles" butonuna tiklandiginda olusturdugumuz profili gorecegiz ve
  tikladigimizda direkt ilgili makineye ssh yapabilecek.