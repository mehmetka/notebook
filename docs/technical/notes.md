# notes

- instance'in SG'sine yalnizca CF ip'lerini tanimlarsak, "Proxy" acik olmasa bile yalnizca CF uzerinden erisilebilir.
- Sonarqube makinesi bu ayari yapmadan calismiyor: sudo sysctl -w vm.max_map_count=262144
- gitlab'in 2fa'i sapitti. surekli invalid code hatasi veriyordu. Makinenin saati kaymis. Duzeltince duzeldi.
- gitlab branch commitlerinde test joblari calisiyor.
- bucket name best practices: images.aposto.com -> s3 bucket ismi images.shopier.com

## 000

- iCloud path: /Users/username/Library/Mobile Documents/com~apple~CloudDocs
- Browser does not allow to use autocomplete on values which access by AJAX request
- ```<noscript>``` is for browsers which block javascript
- Practical basic auth usage: ```curl user:pass@host```
- Remove EXIF Metadata with exiftool: ```exiftool -all= FileName```

## 001

- Using getenv() and putenv() is strongly discouraged due to the fact that these functions are not thread safe, however
  it is still possible to instruct PHP dotenv to use these functions.

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

## 007

Udemy API:

- Unarchived:
  https://www.udemy.com/api-2.0/users/me/subscribed-courses/?fields%5Bcourse%5D=%40min%2Cvisible_instructors%2Cimage_240x135%2Cfavorite_time%2Carchive_time%2Ccompletion_ratio%2Clast_accessed_time%2Cenrollment_time%2Cis_practice_test_course%2Cfeatures%2Cnum_collections%2Cpublished_title%2Cis_private%2Cis_published%2Cbuyable_object_type&fields%5Buser%5D=%40min%2Cjob_title&is_archived=false&ordering=-last_accessed&page_size=32

- All
  https://www.udemy.com/api-2.0/users/me/subscribed-courses/?page_size=132

## 008 - Extend EC2 Instance Volume

- Extending OS file system. After you finish modifying volume, you need to extend OS file system in order to see your
  increased volume size. The example below is the command I used for Ubuntu OS.
- SSH into your instance.
- Type "lsblk" -> Your increased volume will be shown just above your current volume, e.g. xvda1 is your current volume
  with 30GB size and xvda with 40GB size.
- Extend the partition by typing "sudo growpart /dev/xvda1" (Note that dev/xvda is the partition name and 1 is the
  partition number.)
- Extend the volume by typing -> sudo resize2fs /dev/xvda1

Source: https://medium.com/@m.yunan.helmy/increase-the-size-of-ebs-volume-in-your-ec2-instance-3859e4be6cb7

## 009 Difference of AWS Public-Private Subnet

- https://serverfault.com/questions/556363/what-is-the-difference-between-a-public-and-private-subnet-in-a-amazon-vpc
- PUBLIC SUBNET: If a subnet's traffic is routed to an internet gateway, the subnet is known as a public subnet.
- PRIVATE SUBNET: If a subnet doesn't have a route to the internet gateway, the subnet is known as a private subnet.

## 010

- When you get "sh: Operation not permitted" error while trying to run shell script on
  cron https://osxdaily.com/2020/04/27/fix-cron-permissions-macos-full-disk-access/
- sonarqube elasticsearch max memory: "max virtual memory areas vm.max_map_count [65530] is too low, increase to at
  least [262144]"
  error: https://stackoverflow.com/questions/51445846/elasticsearch-max-virtual-memory-areas-vm-max-map-count-65530-is-too-low-inc
  ```sysctl -w vm.max_map_count=262144```

## 011

Error Message:

```
configure: error: Unable to detect ICU prefix or no failed. Please verify ICU install prefix and make sure icu-config works
```

Solution:  
Install ```libicu-dev``` package for "php:5.6.40-apache-jessie" image.

## 013

Error Message:

```
... es no alive nodes found in your cluster elasticsearch ...
```

Solution:

```
$ setsebool httpd_can_network_connect 1
```

## 014

Keyword: ERR_OSSL_EVP_UNSUPPORTED  
Solution:

```shell
NODE_OPTIONS=--openssl-legacy-provider next build && next export
```

## 016 - Using mkdocs

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

## 017 - Create Profile on iTerm2 to automate ops
iterm'de profil olusturmak
https://iterm2.com/

Profiles > Open Profiles > Edit profiles > +'ya basip yeni profil ekle > Name'i yaz or: "Testshopier SSH" > "Applications in terminal may change the title" kutucugu deselect > Title dropdown list'inde "Profile Name" sec > "send text at start" input'ina ssh yapilacak komutu yaz. or: "ssh -i shopiertestOpenssh ubuntu@18.195.102.98" (key file'in full path'i verilmeli) > done

Bu islemler yapildiktan sonra en yukaridaki "Profiles" butonuna tiklandiginda olusturdugumuz profili gorecegiz ve tikladigimizda direkt ilgili makineye restart yapabilecek.\n---\nOOP muhabbeti sonrasi boyle bir diyalog gecti: