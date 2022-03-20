## Ziyahan Albeniz - Internette Hayatta Kalmak

- kullanmiyorsan devre disi birak
- https://medium.com/@ziyahanalbeniz/akl%C4%B1mda-deli-sorular-gelecek-ku%C5%9Faklar-da-g%C3%BCvenli-ba%C4%9Flant%C4%B1y%C4%B1-g%C3%B6rebilecek-mi-7da77a488347
- dehashed
- Buyuk ve kucuk harf caseleri ile giris yapilabiliyorsa muhtemelen hashli tutulmuyordur.
- Password Reuse Attack. Bir tane password bulunca diger butun hesaplarda ayni password'un denenmesi.
- Alenilestirme - Eğer kişisel verilerinizi herkese açık şekilde paylaşırsanız; artık o kişisel veri olmaktan çıkar. (?)
  - https://www.kvkk.gov.tr/Icerik/6843/-ALENILESTIRME-HAKKINDA-KAMUOYU-DUYURUSU
- Pope ipad cover - Papanin ipad'inin kamerasinin kapali oldugu gorsel.
- Bir Siteyi Ziyaret Etmek Hayatınızı Mahvedebilir mi? Evet! 
  - Cozum? PrivacyBadger Browser Plugin (3rd party sitelere istek yapilmasini engelliyor.)
- Mark Zuckerberg, birçok serviste aynı parolayı kullanıyordu. Linkedin ifşası ile parolası açığa çıkan Mark'ın, aynı parolaları kullandığı Twitter ve Pinterest hesapları da ele geçirildi. Parola, dadada gibi 25 saniye içerisinde kırılabilecek basit bir parola idi. [bu muhtemelen ajansin belirledigi bir parola idi.]
- MAT(Metadata Anonymisation Toolkit) mat.boum.org -> metadata: bilgiyi tanimlayan bilgi
- https://www.flashpoint-intel.com/blog/linguistic-analysis-wannacry-ransomware/

- Stilometre
  - Una Bomber'ın yakalanması. (MANHUNT) https://www.fbi.gov/history/famous-cases/unabomber
  - http://www.haksozhaber.net/fuatavni-kendi-kendini-desifre-etti-46564h.htm
  - https://github.com/DavidJacobson/SafeText
  - Tekrarlanan noktalama/imla yanlışları.
  - Kelime dağarcığı
  - Bir rumuz arkasında olsanız dahi, sizi ifşa edebilir.
  - En cok kullanilan 200 kelime # kullanilan kelimelerden egitim profilimiz cikarilabiliyor. egitimli/egitimsiz vs.
  - Çözüm olarak en sık kullanılan 200 kelime ile metinleri yazmak önerilmektedir.

Parolalar:
- Tahmin edilmesi kolay olmayan ya da deneme yanılma yolu ile ele geçirilmesi oldukça zor olan parolalara güçlü parola denir.
  - https://www.bilgimikoruyorum.org.tr/?b222_guclu_parola_olusturma 

```
8 Character Passwords Are Dead
New benchmark means that the entire keyspace, or every possible combination of:
- Upper
- Lower
- Number
- Symbol
...of an 8 character password can be guessed in:
~2.5 hours
(8x 2080 GPUs against NTLM Windows hash)

If you have a perfectly random eight character password with upper, lower, number and symbol, it will be cracked in (on average), 1 hour and 15 minutes.
If you choose a common schema, such as word or name, capitalize the first letter, followed number, it’ll be cracked instantly.
Edit: *2080Ti
```

Çözüm: Password Manager & 2FA -- Önerilen Kaynak: https://arkakapidergi.com/imparatorlugun-anahtari-parolalar/
- KeePassX, 1Password, etc.
- İki aşamalı doğrulama (2FA)
- Haveibeenpwned.com
- Leakedsource.com
- Hacked-emails.com

Veri Sizintilarinda Türkiye'de risk altında: (.com.tr, .org.tr,.edu.tr,.gov.tr)
- 446 bin kayıt: “com.tr” alan adına sahip e-posta adresi sayısı 336 bin.
- Üniversitelerin kullandığı 'edu.tr' uzantısına sahip adres sayısı 24 bin.
- Devlet kurumlarına ait 'gov.tr' uzantılı e-posta adreslerinin sayısının ise 4 bin olduğu gözlemlenmiştir.

Sensörlerdeki Tehlike
- Ortalama bir cep telefonu GPS, kamera, mikrofon, pedometer, NFC vb pek çok sensöre sahip. Uygulama ve web sitelerinin bu sensör kullanımlarının hepsi izne bağlı. Arama zamanları, fiziksel aktiviteler ve touch gibi pek çok dataya erişebiliyorlar. Bu sensörler yardımı ile 4 haneli bir şifre yüzde 74 kesinlikte ilk denemede bulundu. 5. denemede bu oran yüzde 100'e ulaştı. https://thehackernews.com/2017/04/phone-sensor-password-hacking.html

- https://medium.com/@ziyahanalbeniz/hassas-verilerin-i%CC%87letiminde-do%C4%9Frulanmas%C4%B1nda-a%C3%A7%C4%B1k-anahtarl%C4%B1-%C5%9Fifreleme-teknolojisi-gpg4win-dac078098894
- https://emailselfdefense.fsf.org/en/
    
- Apparently, hacker reused an old password to access Coinhive's CloudFlare account that was leaked in the Kickstarter data breach in 2014. https://thehackernews.com/2017/10/coinhive-cryptocurrency-miner.html

Maillerinizi sadece siz mi okuyorsunuz? 
- https://variety.com/2017/digital/news/google-gmail-ads-emails-1202477321/ (Burada bir yerden bir yere ucak bileti alimi sonrasi gidilecek yer icin otel reklamlarinin cikmasindan bahsetmisti. - Yandex mail)
- PGP Kullanmak
- Protonmail, TutaNotaMail, Riseup.net vb.
- https://emailselfdefense.fsf.org/en/
- E-Posta adresimi nereden biliyorlar? https://freedom-to-tinker.com/2017/09/28/i-never-signed-up-for-this-privacy-implications-of-email-tracking/

- IP address, geo-location, telelefon numarası, Android ID, IMEI, MAC addresin gönderildiği tespit edildi.
- GSM'de kurulu olan bir uygulama, ultrasonik ses ile tetikleniyor. Sinyali alan mobil uygulama uzak sunucuya bir takım bilgiler (telefon numarası vb) gönderiyor. https://c3subtitles.de/talk/746/
- TOR Network'ü dahi kullansanız, bağlandığınız sitelerden birinde arkaplanda çalan bir ultrasonik ses, kimliğinizin ifşa olmasını sağlayabilir.
- Wikileaks'ın Vault 7 ifşaatında yer alan iddialara göre geliştirilen Weeping Angel kod sayesinde Samsung'a ait Smart TV modeli fake-off durmuna getirilerek, kapalı olduğu sanılan durumda dahi ortam dinlemesi yapabiliyor.
- İzlemek için casus ekipmanlarına ihtiyaç yok. Hoparlör ve mikrofonu olan basit bir cep telefonu sonar cihazı gibi kullanılabilir.
- Washington Üniversitesi Paul G. Allen Bilgisayar Bilimleri ve Mühendislik okulu araştırma takımı, müzik kullanarak vücut hareketlerinin nasıl izlenebileceğine dair araştırmalarını tamamladı. http://musicattacks.cs.washington.edu/#songs
- Mobil uygulamaların mikrofon izinleri kontrol edilebilir.
- Anonim gezinimler için kullanılan tarayıcılarda multimedya özellikleri devredışı bırakılabilir.

- Batarya Durumunuz Sizi Ele Veriyor! 
  - Batarya Durumunu kontrol etmek izinler arasında yer almıyor.
  - Farklı browserlardan yaptığınız ziyaretlerden batarya durumu korelasyonu ile kimliğiniz ifşa olabilir.
  - Lokasyon tespiti yapılabilir. (%90 başarı oranı ile.)
  - Uber örneğinde olduğu gibi daha fazla ücret ödemeye mahkum olabilirsiniz.
    - https://thehackernews.com/2015/02/track-smartphone-location.html
    - https://crypto.stanford.edu/powerspy/

- https://m417z.com/images/De-anonymization-via-Clickjacking-in-2019/Attack-demonstration.mp4

- Guvenli mi guvensiz mi? HTTPs
  - Bağlantı şifreli bir biçimde gönderilir.
  - Gelen datanın trafik seyri boyunca, herhangi bir saldırgan kimseler tarafından değiştirilmemesini sağlayabilirsiniz.
    HTTPsEverywhere

- https://medium.com/@roselisker/illuminating-the-dark-web-d088a9c80240
- https://thehackernews.com/2016/09/dark-web-drug-weapon.html
- https://www.linkedin.com/pulse/iphone-6m-%C3%A7al%C4%B1nd%C4%B1-h%C4%B1rs%C4%B1z%C4%B1-nas%C4%B1l-buldum-bahar-anahmias/?originalSubdomain=tr

- MAT: Metadata Anonymisation Toolkit vb programlar ile fotoğrafların içerisindeki EXIF dataları paylaşılmadan önce kaldırılabilir. https://mat.boum.org/

- "I have read and agree to the Terms" is the biggest lie on the web. We aim to fix that. -> tosdr.org
  - https://www2.karar.com/yazarlar/ziyahan-albeniz/internetin-en-buyuk-yalani-hizmet-sozlesmesini-okudum-ve-kabul-ediyorum-7479
 
- ADINT: Reklam İstihbaratı
  - Mobil reklamlar, demografik özellikler,
  - Cihaz tipi ve lokasyon olarak daraltılabiliyor.
  - Yaklaşık 1.000 Dolarlık bir bütçe ile, mobil reklamlar kullanılarak adım adım izlenmeniz mümkün.
  - Dini, siyasi ya da cinsel tercihlerinizi öğrenebiliyorlar.
  - Washington Üniversitesi, 2017 Ekim https://adint.cs.washington.edu/

- Placebo buttons
  - Input kutularını doldurmaya başladığınızda, submit butonuna basmamış bile olsanız datalarınız alınabiliyor.
  - Browserların auto-fill özellikleri, password managerler, Session Replay Scriptleri https://gizmodo.com/before-you-hit-submit-this-company-has-already-logge-1795906081