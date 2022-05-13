# AWS

- gitlab s3 backup'i notlarini buraya tasi
  Asagidaki bilgiler /etc/gitlab/gitlab.rb dosyasina ekleniyor

```
gitlab_rails['backup_upload_connection'] = {
'provider' => 'AWS',
'region' => 'eu-central-1',
'aws_access_key_id' => 'access',
'aws_secret_access_key' => 'secret'
}

gitlab_rails['backup_upload_remote_directory'] = 'bucket name'

gitlab_rails['backup_upload_storage_options'] = {
'server_side_encryption' => 'AES256'
}
```

Ve cron job'lar eklendi
```
32 8 * * * /opt/gitlab/bin/gitlab-backup create CRON=1
8 9 * * * zip --password password ~/gitlab.zip /etc/gitlab/gitlab.rb /etc/gitlab/gitlab-secrets.json
9 9 * * * aws s3 cp gitlab.zip s3://e502d306897866262e634f294a5d7b8e/config/gitlab-`date +\%d-\%m-\%Y`.zip
```

- s3 cors cozumunu buraya tasi
  https://docs.aws.amazon.com/AmazonS3/latest/userguide/ManageCorsUsing.html

```json
[
  {
    "AllowedHeaders": [
      "*"
    ],
    "AllowedMethods": [
      "GET"
    ],
    "AllowedOrigins": [
      "https://staging.testshopier.com"
    ],
    "ExposeHeaders": [],
    "MaxAgeSeconds": 3000
  }
]
```

- [INFO] install aws eb cli -> brew install awsebcli

- lambda container image ile ilgili calisma notlarini da ekle

- health'te 300'lu status kodlarindan dolayi sorun var gibi dusunup, gerek olmadigi halde fazladan instance ekliyor. health check endpoint'i ekleyerek cozuluyor
- healthcheck ile surekli instance'larin health'i kontrol edildigi icin yeni session baslatabiliyor, bu da surekli dynamodb'ye write yapmasina sebep oluyor. mainpage'de session olmadigi icin sorun degil ama boyle bir durum var. --- 302'yi ignore edecegiz ya da health endpoint'i yazacagiz.