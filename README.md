# Php_Website - Diş Hekimi Randevu Sistemi

## Genel Bakış
**Php_Website**, bir diş kliniği için randevu almayı kolaylaştırmak amacıyla geliştirilmiş web tabanlı bir uygulamadır. PHP, MySQL ve HTML kullanılarak geliştirilen bu proje, hem hastaların hem de diş hekimi personelinin randevu yönetimini kolaylaştırmayı hedeflemektedir.

## Özellikler
- **Kullanıcı Kimlik Doğrulama**: Hem hastalar hem de yöneticiler için güvenli giriş ve çıkış işlevselliği.
- **Randevu Alma**: Hastaların kolay ve sezgisel bir arayüz ile randevu almaları.
- **Randevu Yönetimi**: Yöneticilerin randevuları verimli bir şekilde görüntüleyip yönetmesi.
- **Doktor Bilgileri**: Klinik bünyesinde bulunan doktorların detaylı profilleri.
- **Duyarlı Tasarım**: Çeşitli cihazlarda erişilebilirlik için duyarlı tasarım.

## Kurulum
1. **Projeyi Klonlayın**:
   ```bash
   git clone https://github.com/esranursevilmis/Php_Website.git

2. **Veritabanını Ayarlayın**:
randevu.sql dosyasını phpMyAdmin üzerinden içe aktararak MySQL veritabanını kurun.
3. **Uygulamayı Yapılandırın**:
config.php ve config_local.php dosyalarındaki veritabanı yapılandırmasını kendi veritabanı kimlik bilgilerinize göre güncelleyin.
4. **Uygulamayı Çalıştırın**:
Uygulamayı yerel bir sunucuda (örneğin XAMPP veya WAMP) barındırın ve web tarayıcınızda index.php dosyasına gidin.
5. **Kullanım**
Anasayfa (anasayfa.php): Klinik hakkında genel bilgi görüntüleme.
Giriş Yap (login.php): Sisteme giriş yapma.
Randevu Al (randevual.php): Yeni bir randevu planlama.
Randevuları Görüntüle (randevu_goruntule.php): Yöneticilerin tüm randevuları görmesi.
Doktor Profilleri (doktorlar.php): Diş hekimleri hakkında bilgi.

## Demonstrasyon
Uygulamanın işlevselliği hakkında detaylı bilgi için lütfen demonstrasyon videosunu izleyin -> https://www.youtube.com/watch?v=MjCby2Uo-I8&ab_channel=EsranurSevilmi%C5%9F
Site linki(AKTİF DEĞİL): http://hekim-randevu.great-site.net/
## Lisans
Bu proje MIT Lisansı altında lisanslanmıştır.
