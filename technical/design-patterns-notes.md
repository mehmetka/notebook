## aykut-tasdelen-design-patterns
- Sunum sirasinda kullanilan app: Enterprise Architect: https://sparxsystems.com/
Paternlere Giris & Temel Kavramlar:
- Pattern Cluster
- Idiom

[Java Idiom'u]:
- Prototype: Cloneable interface'i
- Iterator: iterator, iterable interface'ler ve foreach dongusu

### Meshur bazi anti-pattern'ler:
- MagicPushButton
- DB as IPC
- Spagetti Coding and Lasagne Coding
- Soft Coding
- Busy Wait
- DesignByCommitee
- SwissKnife
- GodObject
- CargoCultProgramming
- ErrorHiding
- GoldenHammer, SilverBullet
- BoatAnchor
- CopyPasteProgramming

UML: Yazilimin gelistirme surecinin tamaminin dokumantasyonu, gorsellestirilmesi ve spesifikasyonu amaciyla gelistirilmis genel amacli ve standart bir modelleme dilidir.

- Dinamik(Behavioral) Modelleme
- Sequence Diyagramlari
- Communication(Collaboration) Diyagramlari
- State Diyragramlari
- Activity Diyagramlari
- Static(Structural) Modelleme
- Class Diyagramlari
- Object Diyagramlari
- Deployment Diyagramlari
- Component Structure Diyagramlari
- Islevsel(Functional) Modelleme
- Use Case Diyagramlari

### Memento Patern
- Kullanıcı eylemleri nedeniyle ya da farklı sebeplerle nesnenin durum bilgisi değişebilir veya tümüyle kaybolabilir. Bu noktada nesneyi önceki durumuna geri döndürmek bir ihtiyaç haline gelmektedir. Memento patern'i bu ihtiyaca cevap verır. 
- Android'de cihaz döndürüldüğünde Activity nesnesi destroy olup tekrar create olur ve bu nedenle state'ini kaybeder. Bu noktada çözüm; state bir memento nesneye (yani Bundle isimli nesneye) yazılır ve sonra geri kurtarılır. [onSaveInstanceState() onRestoreState()]

### Factory Method Patern
- Yaratım süreci karmaşık olan birtakım nesnelere ilişkin yaratım sürecini onu kullanacak olan programcıdan soyutlamaya yarar. 
    - Context:getSystemServicer 
    - getLayoutlnflater()

### Builder Pattern ve AlertDialog Sinifi
- Farklı alt parçaları bir araya getirerek ortaya çıkan ürünü değiştirme temalı paterndir. Ex: AlertDialog

### Observer Pattern
- Bu patern'de durumu değiştiğinde kendisini izleyen (observe eden) nesnelere otomatik olarak uyarı gönderen reaktif nesnelerin davranışları ele alınmıştır. Ex: event handling

### WhiteBox Reusability AntiPattern
- Salt türetmeye dayalı tasarımlar nedeniyle ortaya çıkar. 
- Örneğin Android'de ToggleButton sınıfında böylesi yanlış bir tasarım söz konusudur (Text, TextOn TextOff). Çözümü Visitor, Decorator gibi paternlerin kullanımıdır. 

### Iterator Pattern
- Yapılandırılış seçeneklerinden bağımsız şekilde bir nesne container'ının elemanlarını iteratif olarak dolaşmayı tematize eden patern'dir. Ex: Android'te Adapter turevi nesneler

### Proxy Pattern
- Adı sıkça web servis konusuyla birlikte anılan ama daha geniş manada, kullanıldığı yerden uzaktaki bir lokasyonda bulunan nesnenin kullanıldığı tarafta bir vekilinin oluşturulması ve onun üzerinden kullanılarak gerek yetkilendirme gerek haberleşme gibi detayların kullanıcıdan gizlenmesini tematize eden paterndir. Ex: Android'te ContentProvider-ContentResolver sınıflarıdır. (IPC)