## [Devops‘a nasıl başladık](https://medium.com/hesapkurdu-development/devops-a-nas%C4%B1l-ba%C5%9Flad%C4%B1k-analiz-5651ba277be1)

- Jenkins ile webhook’ları yakaladık, master ve dev branch’lerimize gelen her push’u yakaladık ve sonarqube’den geçirdik.
- CLI üzerinden Debug ve Release olarak kodumuzu build etmeye başladık.
- Master ve dev branch’ine herkesin check-in yapabilme yetkisini kaldırdık. Developerlar kendi branch’lerinde çalışacak,işini bitirecek, teste yollayacak, testler başarılı olursa, Pull Request’i atılacaktı. Bu akışı kullanarak code review yapılmasını da zorunlu kıldık. 
- Her pull request’in 2 tane reviewer’ı olmak zorunda. Bu kişiler yapılan değişikliğe hızlıca bakıp bariz gözden kaçan bir şey varsa yakalayabiliyor ve iyileştirmeler için tavsiyede bulunabiliyor. 
- Code review’larla kod içerisindeki hatalı mimari aksiyonların, bariz sorunların ve test ortamlarındaki problemlerin önüne geçtik.

## [Devops yaptık da n’oldu?](https://medium.com/hesapkurdu-development/devops-yapt%C4%B1k-da-noldu-fd3226d5eba4)

- En önemli bilinmesi gereken şeylerden biri bana göre Continuous Delivery/Integration devops değil, bunu ben de zamanla daha iyi kavradım diyebilirim. CI/CD yapıları devops’un sadece parçaları. Evet, çok önemliler ama sadece onları kurunca biz çok iyi devops yaptık diyemeyiz. 
- Size herkesin anlattığı gibi çok hızlı, temiz deployment’lar vs. diye anlatmak istemiyorum. Gerçekte olan şey bu değil! İlk olarak devops nedir bunu anlamak lazım. Devops bir kültürdür ve tamamen şirketin buna kayması ve ayak uydurması gerekiyor. Bu olduktan sonra hepsi arkasından geliyor yoksa bir adım bile ilerleyemiyorsunuz.
- Elle deployment çıkmaktan kendi kendine canlıya çıkan commit’ler seviyesine gelinmesi o kadar zor değil ama şirkete göre zorluk gösterebilir. Zorluğun çıkmasının tek sebebi şirketin buna ayak uydurmamasıdır bundan emin olabilirsiniz.
- Burada işimizi en çok kolaylaştıran, belki de en önemli konu yönetimin devops’un değerini biliyor ve en az bizim kadar benimsiyor olmasıydı. Eğer sizin firmanızdaki yönetim kadrosu devops’un önemini yeterli şekilde anlamıyorsa önce bu sorunu çözmeniz gerekli.
- Herkes sanki çok basitmiş gibi birşeyleri anlatıp biz yaptık çok güzel oldu diyor. Bu ölçüde bir geçiş kesinlikle çok basit veya kolay olmuyor. Hatalar oluyor, geri alınan adımlar oluyor. Yönetim ve teknik ekip olarak hataları sürekli olarak çözmeye ve verimliliği arttırmaya odaklanmış olmak gerekiyor.
- Continuous Improvement yolunu seçtik. Olay çok basit, o an canımızı en çok sıkan sorun ne ise ona çözüm bulduk ve devops kültürü kendiliğinden yayıldı. Çünkü sorunlar çözüm buluyordu!
- Bunu aşmanın tek yolunun test olduğunu sonunda takım olarak anlamıştık. Ufak tefek başlayan testler hız kazandı. Bazı yapıları tamamen silip testi yazılmış haliyle yazmaya başladık. Sadece %30 coverage oranında bile yakaladığımız hataların inanılmaz yüksek olduğunu gördük. Bunun üzerine o kadar çok yoğunlaştık ki işimiz gücümüz test edilebilir bir yapı kurmak oldu diyebilirim. Smoke testler, integration testleri vs vs vs…
- Her sabah herkes masasına oturduğunda artık biliyorduk ki dün merge yapılan tüm kodlar pre-prod ve test ortamlarında aktif durumda ve testi bekliyordu.
- Bu işin herkesin çok dikkat ettiği ama işin %40lık kısmı olan otomasyon kısmıydı. Devops bu değil!
- Dev ekibi artık sadece geliştirme yapıyor. Ürün ekipleri her sabah test ortamlarında testlerini yapıyor tamam derse issue’yu code review’a yolluyor ve ilgili arkadaşlar code review yapıyor herşey tamamsa merge yapılıyor. Testler çalışıyor her şey tamamsa bir sonraki publish günü yayındayız! Değilse hatalar bulunuyor ve pipeline bizi uyarıyor bu uyarılar sonucunda hedef kimse testleri o düzeltiyor. Kimsenin işi bozulmuyor kimse sıkıntı çekmiyor. Daha fazla odak daha fazla iş olarak ilerliyoruz.
- Test yazmak her zaman en önemli öncelik olmalı devops olsun olmasın, zaten olmadan olmuyormuş. Pair programming yapmadan kaliteden söz edilmiyormuş. Test olmadan mimari değiştirilmiyormuş. Mimari hatalı olunca test de yazılmıyormuş. Devops kelimesi tek başına anlam ifade etmiyormuş. Doğru araçlar olmadan hiç birşey yapılamıyormuş.

## [DevOps Eğitiminden Aklımda Kalanlar](https://medium.com/devopsturkiye/devops-e%C4%9Fitiminden-akl%C4%B1mda-kalanlar-6853070d89d6)

- DevOps bir süreç değildir, süreç ve araçlardan yararlanan bir felsefedir. 
- DevOps’da amaç geliştiriciler ile operasyon arasındaki bariyerleri kaldırmaktır. Bu nedenle iletişim(Communication) ve işbirliği(Collaboration) çok önemlidir.  
- Genel olarak ürün geliştirmede şöyle bir akış vardır; Business bir fikir(idea) tanımlar ve bunun üretilmesi için geliştirme ekiplerine verir. Development safhasında kodlanan ürün operasyon birimleri tarafından ürün olmak üzere ilgili ortamlara taşınır. Son adımda ürün müşteri ile buluşmuş olur. Dolayısıyla iş biriminden gelen fikirlerin müşteriye ulaştırılması en önemli amaçtır. DevOps soldan sağa doğru ilerleyen bu hattı iyileştirmeye ve hızlandırmaya çalışılır.
- Yapılan her şeyle ilgili geri bildirim almak, sonraki iterasyonlarda yanlış giden bir şeyleri düzeltmek anlamına gelir. Bu da iyileştirmek demektir.
- Highlander Deployment: Bir uygulamanın versiyonu doğrudan yeni versiyona çekilir. Klasik bir yöntemdir. Riskleri fazladır. Deployment sırasında sistem kapalı kalır
- Rolling Deployment: Versiyonlar kademeli olarak geçirilir. Bir ortam geçtikten sonra diğeri, sonra diğeri gibi. Gelişmiş deployment araçları gerektirir. Bankaların kullandığı tekniklerdendir.
- Blue/Green Deployment: Downtime ve riski düşürmek için Blue ve Green isimli ortamlar söz konusudur. T anında bunlardan sadece birisine deployment yapılır. Dolayısıyla ortamlardan birinde canlı test gerçekleşir. Ortamlardan biri aktifken diğeri idle pozisyonda kalır. Eğer aktif ortamda sorunlar varsa trafik diğer ortama yönlendirilir.
- Phoenix Deployment: ?
- Canary Release Deployment: ... Örneğin Facebook kullanıyor. Bir Release çıkarken kullanıcılarının sadece %2’sine bunu çıkıp geri bildirimleri takip ediyormuş. Eğer bir problem varsa yapılan değişiklikler otomatik olarak geri alınıyormuş(Şunu bir düşünün. Production’a yeni bir sürüm aldınız ve beklemediğiniz bir sorunla karşılaştınız. Geri alma planınız var mı? Peki ya manuel mi yürüyor? Otomatikleştirebilir misiniz? Nasıl? Çözüm DevOps felsefesinde var)
- Continuous Deployment, Continuous Delivery’nin Push düğmesi kaldırılmış versiyonudur.
- Continuous Integration = Automated Build+Validated by Unit, Integration and Acceptance Tests+Code Standards
- Continuous Delivery’de manuel olarak yürüyen dağıtım adımları Continuous Deployment’ta otomatik olarak gerçekleşir.

### DevOps’un hedefleri
- Data Driven Decision: Verilere göre karar verebilmek, veri odaklı otomatize işler planlayabilmek.
- Intelligent Risk Taking: Riskleri akıllıca karşılayabilmek
- Collaboration: Özellikle takım olarak iş birliğinde olmak. Operasyon ve geliştirme arasındaki kalın duvarları yıkmak.
- Open honest two way communication: İletişimin dürüst ve güvenilir olmasını iki taraflı sağlayabilmek.
- Learning & Practicining: Öğrenmek ve pratiğe dökebilmek
- Trust: Güvenilir bir hat oluşturabilmek
- Transparency: Sistemin her noktasında, takımların yaptığı her işte açık olabilmek, şeffaflığı sağlamak.
- Shared Vision: Ortak bir vizyonda buluşmak.
- Continuous Improvements: Sürekli iyileştirmek
- Continuous Experimentation: Sürekli deneyimlemek.

> Amazon, firması günde 23 bin Deployment yapabiliyormuş. Neredeyse her 4 saniyede bir. Bu, başarılı bir şekilde oturttukları DevOps kültürünün bir sonucu. Özellikle Push butonunu ortadan kaldırıp Continuous Delivery’den, Continuous Deployment’a geçmiş olmaları bunun bir sebebi olarak ifade ediliyor.

> Netflix’in başarısının arkasında Uptime süreleri vardır. Lakin bunu gerçekleştirmek için önemli bir DevOps kültürünü benimsemişlerdir. Netflix vakti zamanında Simian Army isimli bir yapı kurgulamış. Simian Army içerisinde çeşitli botlar barındıran bir çatı gibi düşünülebilir. Örneğin Chaos Monkey isimli bot, yerel sunucularda rastgele ateş açarak sorunlar oluşturur. Network’ü engeller, sanal makineleri uçurur, veritabanında bozukluklar yapar(Burada deneyimlemek istenen şey Chaos Engineering) vb. Ya da Chaos Kong, bölgesel zararlar verir. Örneğin bölgesel olarak ağı çökertip videoların oynatılmasını engeller. Janitor Monkey, sistemde kullanılmayan ne varsa kaldıran bir robot yazılımdır. Bunlara ek olarak Chaos Gorilla, Docker Monkey, Compliance Monkey, Letency Monkey, Security Monkey gibi diğer maymun botların yaptığı sorunları engellemeye çalışan bot’lar da varmış. Burada amaç sistemin Uptime sürelerini mümkün olduğunca yukarı çıkartabilecek iyileştirmeleri yapmak ve müşterinin hizmetinin aksamasını engellemek. Öğrendiğimiz kadarıyla Simian Army bir süre önce emekli edilmiş.

## [Your Startup’s Guide to Getting Started with DevOps](https://programminginsider.com/your-startups-guide-to-getting-started-with-devops)

- In the conventional siloed application development methodologies, the development team builds a package and throws it to the operational teams. In this system, the application is developed by one group, and a separate team uses it. There is no ownership. Also, it gives a hard time for the operational staff because most of the software bugs arise in the live environment. DevOps is a perfect solution to come out of these problems created by conventional development methodologies. DevOps is a set of concepts, tools, and practices to combine development and operational efforts with cross-functional teams for high-quality software application developments. It gets its several aspects from Agile methodology. 

- Improved customer focus
- Combine teams for faster deployments
- Simplifies the development process: With DevOps, the development team does not release complex packages at a time. The DevOps approach enables the development team to release smaller releases at a time. This approach simplifies your work, prioritizing and applying changes to each release.
- Enables automation in the development process
- Maintain the security
- Minimize the cost of production

- Phase 01: Plan
The project team organizes and schedules the project tasks. The project manager sets up the project management tools.

- Phase 02: Code
The development team writes codes, and System administrators review using code management tools. They merge the code once reviewed.

- Phase 03: Build
Engineer teams build artifacts and source codes in the target format. Then they use CI/CD tools to verify source codes.

- Phase 04: Test
Testing teams ensure high quality by implementing the testing tools in the workflow. They receive feedback on the business risks, and they determine the performance.

- Phase 05: Release
The project team implements the package tools to adhere to the business requirements and goals, validate the packages and critical practices. Then the project team does the change management, approves the software releases, and releases automation and application deliveries.

- Phase 06: Deploy
The final version of the build is deployed once the production environment is created and configured correctly.

- Phase 07: Operate
The operation team monitors and troubleshoots the applications. The security team ensures software security and manages backups and logs.

- Phase 08: Monitor
Operational teams monitor the system performance, user experience and maintain logs.

## [Neden DevOps?](https://www.linkedin.com/pulse/neden-devops-orhan-kalayci-itil-expert-pmp-cbap-devops-scrum)
- Okuma önerisi: Antikırılganlık, Deming'in 14 noktası ve Toyota Kata
- DevOps'un amacı AntiKırılgan - ANTIFRAGILE şirketler oluşturmak.
- DevOps'u hayata geçirmek için şirketin:
    - organizasyon yapısı (ürün bazlı takımlar), 
    - yazılım mimarisi (mikro servisler, containers, CD/CI), 
    - teknik alt yapısının (bulut) değişmesi gerekiyor.
- DevOps'un temelinde Servis Bakış açısı ile gelen uçtan uça sorumluluk sahibi takımlar ve mikroservisler var.
- Şirketten kaldırılması gerekenler var: Bölümler arası duvarlar, korku ve aşırı bürokrasi gibi. 
- Şirkete getirilmesi gerekenler var: Cesaret, sayılarla konuşmak ve düşünmek, mühendislik (problem çözme) bakış açısı, yöneticilerin sürekli koçluk yapması gibi.
- Deming'in 14 noktası: Şirketinizi sayılarla yönetin, insanları insanlarla yönetin
- Altyapı : Bulut
- Mimari: Mikroservis tabanlı mimari
- Süreçler: Agile, Lean
- Organizasyon: Ürün bazlı yatay
- Kültür: Cesur, lean start-up takımlar, çözüm odaklı, mühendislik bakış açısı, deneysel öğrenme, kaliteden taviz vermeyen, servis bakış açısı, otomasyon fanatiği!
- Otomasyon: Elle bir kaç defa tekrar tekrar yaptığımız herşeyin otomasyona geçirilmesi: CD/CI.