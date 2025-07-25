# VizyonFilm  

VizyonFilm, PHP ve MySQL ile geliştirilmiş dinamik bir film bilgi ve yorum sitesidir. Kullanıcıların filmleri gezip arayabileceği, detaylı bilgiler edinebileceği bir platform sunar. Site, filmler, kullanıcı yorumları ve site bilgileri dahil olmak üzere tüm içeriğin yönetilebildiği kapsamlı bir yönetici paneline sahiptir.

## Özellikler

### Kullanıcı Arayüzü

- **Ana Sayfa:** Yönetici tarafından seçilen öne çıkan filmleri gösterir.
- **Film Listeleme:** Tüm filmleri gezebilir, türlerine göre filtreleyebilirsiniz.
- **Film Arama:** Üst menüdeki arama çubuğu ile belirli bir filmi arayabilirsiniz.
- **Detaylı Film Sayfaları:** Her film için özel sayfa:
  - Başlık, afiş ve açıklama.
  - Gömülü YouTube fragmanı.
  - VizyonFilm ve IMDb puanı, yönetmen, senarist, oyuncular ve vizyon tarihi.
  - Film türleri ve süresi.
- **Yorum Sistemi:** Kullanıcılar filmlere yorum yapabilir. Yorumlar yönetici onayından sonra yayınlanır.
- **Hakkımızda & İletişim Sayfaları:** Site hakkında bilgi ve iletişim detayları, Google Haritalar görünümü ve iletişim formu içerir.

### Yönetici Paneli

- **Güvenli Giriş:** Oturum ve çerez tabanlı kimlik doğrulama ile korunan yönetici alanı.
- **Yönetim Paneli:** Tüm yönetim işlemleri için merkezi kontrol alanı.
- **Film Yönetimi:**
  - **Ekle:** Film adı, fragman URL’si, açıklama, puanlar, oyuncular, türler ve afiş görseli gibi bilgilerle film ekleme.
  - **Düzenle:** Var olan film bilgilerini güncelleme.
  - **Sil:** Filmleri sistemden kaldırma.
  - **Görünürlük Kontrolü:** Filmin ana sayfada gösterilip gösterilmeyeceğini ayarlama.
- **Yorum Yönetimi:**
  - Tüm kullanıcı yorumlarını görüntüleme.
  - Yorumları onaylayarak ya da gizleyerek kontrol etme.
  - Uygunsuz yorumları silme.
- **İçerik Yönetimi:**
  - "Hakkımızda" sayfası içeriğini düzenleme.
  - "İletişim" sayfasındaki telefon, e-posta, adres ve harita bağlantısını güncelleme.
- **Mesaj Görüntüleme:** İletişim formu aracılığıyla gelen mesajları görüntüleme ve silme.

## Kullanılan Teknolojiler

- **Backend:** PHP  
- **Veritabanı:** MySQL  
- **Frontend:** HTML, CSS, JavaScript

## Kurulum

Projeyi yerel bilgisayarınızda çalıştırmak için şu adımları takip edin:

### Gereksinimler

PHP ve MySQL destekleyen bir yerel sunucu ortamına ihtiyacınız olacak. [XAMPP](https://www.apachefriends.org/index.html) veya [WAMP](https://www.wampserver.com/en/) gibi bir paket kullanmanız önerilir.

### Yükleme

## Kurulum

Projeyi yerel bilgisayarınızda çalıştırmak için aşağıdaki adımları takip edebilirsiniz:

1. **Depoyu Klonlayın**
   ```sh
   git clone https://github.com/affangul/VizyonFilm.git
   ```

2. **Dosyaları Sunucu Kök Dizininize Taşıyın**  
   Klonladığınız `VizyonFilm` klasörünü yerel sunucunuzun kök dizinine taşıyın.  
   Örneğin XAMPP kullanıyorsanız:  
   `C:/xampp/htdocs/VizyonFilm/`

3. **Veritabanını Oluşturun**  
   - Tarayıcınızda `phpMyAdmin`i açın.  
   - Yeni bir veritabanı oluşturun ve adını **vizyonfilm** olarak belirleyin.  
   - Oluşturduğunuz veritabanını seçin.  
   - Proje klasöründe yer alan `vizyonfilm.sql` dosyasını içe aktararak tabloları oluşturun.

4. **Veritabanı Bağlantı Ayarlarını Yapın**  
   `admin/bağlan.php` dosyasını açarak aşağıdaki bilgileri kendi yapılandırmanıza göre güncelleyin:  
   ```php
   <?php
   $baglan = new mysqli("localhost", "root", "1234", "vizyonfilm");
   $baglan->set_charset("utf8");
   ?>
   ```  
   - `"localhost"`: Genellikle değiştirmenize gerek yoktur.  
   - `"root"`: MySQL kullanıcı adınız.  
   - `"1234"`: MySQL şifreniz.  
   - `"vizyonfilm"`: Veritabanı adınız (önceki adımlarda oluşturduğunuz).  
   Bu bilgileri kendi yerel ayarlarınıza göre değiştirmeniz gerekir.

5. **Görsel Yükleme Yolunu Güncelleyin**  
   Proje, film afişlerini sabit bir sunucu yoluna kaydeder. Bu nedenle sisteminize uygun yolu belirtmeniz gerekir.  
   - `admin/adminfilmekle.php` ve `admin/adminfilmdüzenle.php` dosyalarını açın.  
   - Aşağıdaki satırı bulun:
     ```php
     $dosyaYolu = 'C:/xampp/htdocs/img/' . $dosyaAdi;
     ```
   - `C:/xampp/htdocs/img/` kısmını, kendi bilgisayarınızda `img` klasörünün tam yolu ile değiştirin.  
   Örnek:
   ```php
   $dosyaYolu = 'D:/projeler/VizyonFilm/img/' . $dosyaAdi;
   ```

