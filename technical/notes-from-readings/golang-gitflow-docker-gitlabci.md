# [Golang + Git Flow + Docker ve Gitlab CI](http://blog.oguzhan.info/?p=1589)

- https://github.com/c1982/md5go
- local SCM kullanırken aynı zamanda CI&D işlerini de aradan çıkartayım dediğinizde Gitlab güzel seçenek.
- Özellikle birden fazla kişi aynı projede çalışıyorsa Git kullanımında belirli bir model belirlemek işleri daha sistematik hale getiriyor. 

## [Semver](semver.org)
- v1.0.0 gibi bir versiyon adı kullandık. Burada v1 projenin büyük bir özelliği devreye alındıysa yada yazılım üzerinde büyük bir değişiklik olduysa Major sayılıp en baştaki bir arttırılır.
- İkinci basamak ise yazılıma yeni eklenen bir özellik veya iyileştirme ile alakalı ilerlemeyi temsil eder.
- Son basamak ise yazılımdaki hataların giderilmesi veya build edilmesi ile ilgili alandır. Örneğin her bir hotfix’de bir artar gibi.

## [Semantic Release](https://semantic-release.gitbook.io/semantic-release)
Semantic Release için otomatize araçlar mevcut yani direkt commit mesajlarınıza bakıp versionu bump edebiliyor. Bunun için commit mesajlarınızada bir sistematiğe oturtmanız gerekiyor. Aşağıda örnekleri ufaktan vereyim:
- feat: kullanıcı girişi için 2FA özelliği eklendi
- fix: 2FA özelliğindeki SMS hatası giderildi issue: #1233
- docs: README’yi günelledim
- style: kod üzerindeki uzun satırları düzenledim. Formatlarım vs.
- refactor: bazı değişkenlerin isimlerini büyük harfe çevrdim. Okunabilirliği arttırdım.
- test: eksik olan testleri ekledim.
- chore: Ansible scriptleri güncellendi. gitlab-ci üzerine docker build eklendi

### Additional Sources:
- https://seesparkbox.com/foundry/semantic_commit_messages
- http://karma-runner.github.io/1.0/dev/git-commit-msg.html

Dockerfile:
```
FROM golang:1.11.6 as builder

ARG VERSION
ENV CGO_ENABLED=0

WORKDIR $GOPATH/src/md5go

COPY . .

RUN go install -a --installsuffix cgo -ldflags "-X main.Version=${VERSION}" ./...

FROM iron/base

COPY --from=builder /go/bin/md5go /usr/local/bin
RUN chmod a+x /usr/local/bin/md5go

ENTRYPOINT ["/usr/local/bin/md5go"]
```

- iki tane FROM göreceksiniz. Birincisi Go uygulamamızı build etmek için kullandığımız golang:1.11.6 tag’ına sahip ve “builder” ismi verilmiş image.
- Diğeri ise iron/base tag’ına sahip. Uygulamayı çalıştıracak image. Buna container camiasında multi-stage diyorlar. İlk image ile derlenip oluşturulan binary dosyası COPY‘nin –from parametresi ile alınıp diğer image’a kopyalanıyor.

> Docker build’lerini daha iyi yönetebilmek ve kompleks işlemlere girişebilmek için özellikle CI üzerinde Habitus aracını kullanabilirsiniz. Diğer bir araç ise Buildah! Docker daemon’undan bağımsız bir araç yine CI süreçlerinde daha iyi seçenek olabiliyor.

- Öncelikle container bazlı bir çalışma ortamınız olacaksa image’ları tutacağınız ve versiyonlayabileceğiniz bir registry’nizin olması gerekiyor. Alternatif olarak aşağıda private registry olarak kullanabileceğiniz bir kaç araç var.
    - https://goharbor.io/
    - https://hub.docker.com/_/registry/
    - https://github.com/miguelmota/ipdr
    - Bunların yanında Gitlab ile gelen yerel Registry servisini veya Docker Hub‘ı kullanabilirsiniz.

- Gitlab üzerinde host ettiğimiz kaynak kodunu CI üzerinde yönetebilmek için yml dosyasını kullanıyoruz. Kısaca projenin root’una .gitlab-ci.yml isimli dosyayı ekleyip ilgili direktifleri yazarak tüm süreci yönetebilirsiniz.

```
image: docker

services:
- docker:dind

stages:
- gosec
- build

variables:
VERSION: $CI_COMMIT_TAG
APP_NAME: md5go
REG_USERNAME: $REG_USR_SECRET
REG_PASSWORD: $REG_PASSWD_SECRET

security_check:
stage: gosec
allow_failure: true
script:
- docker run --name gosec -v $CI_PROJECT_DIR:$HOME/go/src/$APP_NAME --workdir $HOME/go/src/$APP_NAME c1982/gs -exclude=G104 -quiet -no-fail -fmt=html -out=report.html ./...
- docker inspect gosec --format='gosec exit code --> {{.State.ExitCode}}'
- docker cp gosec:$HOME/go/src/$APP_NAME/report.html .
artifacts:
when: always
paths:
- report.html
expire_in: 5 day
only:
- /^v[0-9|\.]+/
except:
- branches
tags:
- docker-runner

build:
stage: build
script:
- echo $VERSION
- docker build --build-arg VERSION=$VERSION -t $APP_NAME:$VERSION .
- docker tag $APP_NAME:$VERSION $REG_USERNAME/$APP_NAME:$VERSION
- docker login -u $REG_USERNAME -p $REG_PASSWORD
- docker push $REG_USERNAME/$APP_NAME:$VERSIONN
only:
- /^v[0-9|\.]+/
except:
- branches
tags:
- docker-runner
```

- Executor: CI ortamı bash üzerinde mi çalışacak yoksa docker container’ının içinde mi çalışacak diye register ederken söylüyorsunuz. Bizim senaryomuzda Executor docker. Yani tüm süreç Docker container’ının içinde işleyecek ve kaybolacak.
- image ve services direktifleri bütün sürecin docker isimli bir image üzerinden ayaklandırılan container içinde gerçekleşeceğini söylüyor.
- image: direktifini sadece kendi süreciniz için oluşturduğunuz image’ı da verebilirsiniz. Hatta öyle yapsanız daha hızlı olur.
- services: altındaki docker:dind aslında gitlab’ın image’ı. İçinde docker, docker-compose ve docker-machine gibi araçlar hazır geliyor.
- Stages alanı gitlab pipeline’ının tüm bölümlerini belirlemenizi sağlıyor. Bizim senaryoda statik kod analizi job’ı var. Arkasından build edilip push edildiği için iki bölüm belirledik. Genelde test, build, deploy, run diye olur. Sonra oluşturulacak job’ları buna bağlıyoruz.
- Variables direktifi aslında bir çeşit Environment Variables. Hem CI direktifleri içinde değişkenmiş gibi davranıyor hem de Executor dediğimiz pipeline’ın çalışma ortamına system environment değişkeni olarak aktarılıyor.
- Burada VERSION değişkenine direkt Gitlab’ın ön tanımlı variable‘larından $CI_COMMIT_TAG’ı atadık ki versiyonu alalım.
- stage: build ise bu iş parçasının hangi stage’e ait olduğu. Yukarıda tanımladığımız stages direktifinde tanımladığımız build aşamasına ait olduğunu belirtiyoruz.
- Only direktifi Job’ları tetiklenmesi için kullanılan bir mekanizma. Bu alan bir regex’e göre tetiklendiği gibi branch bazlı, commit mesajı bazlı da tetiklenebiliyor. Biz burada regex’i seçtik. -- only direktifindeki regex sadece yeni bir tag push edildiğinde ve bu tag’ın v1.0.0 gibi bir formata tekabul ettiğinde tetikleniyor.
- Except direktifine branches dediğimizde ise branch’lara gelen herhangi bir commit’i dikkate alma anlamına geliyor. Böylece git’in çeşitli olaylarında bu job’ları çalıştırıp çalıştırmamayı bu iki direktif ile yönetebiliyorsunuz.
- Gitlab Runner açık kaynak olarak edinebildiğiniz Gitlab’ın üzerindeki kaynak kodu alıp belirli işlemler yaptırıp tekrar sonucunu Gitlab’a gönderen bir servis.

```
[[runners]]
name = "docker-runner"
url = "https://enter-yor-gitlab-hostname.com/"
token = "..."
executor = "docker"
[runners.docker]
tls_verify = false
image = "docker"
privileged = true
disable_entrypoint_overwrite = false
volumes = ["/var/run/docker.sock:/var/run/docker.sock", "/cache"]
shm_size = 0
dns = ["8.8.8.8", "4.2.2.1"]
pull_policy = if-not-present
```
- name direktifindeki değeri, gitlab-ci dosyamızın içinde tag olarak kullanmıştık ki istediğimiz runner’ı çalıştırabilelim. 
- runner’ın kullanacağı DNS sunucularını da elle vermek daha stabil hale getiriyor. 
- Release’i sonlandırıp push ettikten sonra aşağıdaki komut ile tag’larıda push ettiğiniz anda CI tetiklenecektir. ```git push origin --tags```