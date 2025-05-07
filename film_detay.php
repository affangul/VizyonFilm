<?php
 include("admin/bağlan.php");

if (isset($_GET['id'])) {
    $film_id = intval($_GET['id']);
    $sql = "SELECT * FROM film WHERE film_ID = $film_id";
    $sonuc = $baglan->query($sql);

    if ($sonuc->num_rows > 0) {
        $satir = $sonuc->fetch_assoc();

        echo "<h1>" . $satir["film_isim"] . "</h1>";
        echo "<img src='" . $satir["film_resim"] . "' alt='Film Resmi'><br>";
        echo "<strong>Vizyon Film Puanı:</strong> " . $satir["film_VFpuan"] . " / 10<br>";
        echo "<strong>IMDb Puanı:</strong> " . $satir["film_IMDbpuan"] . " / 10<br>";
        echo "<strong>Yönetmen:</strong> " . $satir["film_Yönetmen"] . "<br>";
        echo "<strong>Senarist:</strong> " . $satir["film_Senarist"] . "<br>";
        echo "<strong>Süre:</strong> " . $satir["film_Süre"] . "<br>";

        // Türleri yine ayıkla
        $turler = [];
        if ($satir['film_aksiyon']) $turler[] = "Aksiyon";
        if ($satir['film_aile']) $turler[] = "Aile";
        if ($satir['film_bilimKurgu']) $turler[] = "Bilim Kurgu";
        if ($satir['film_biyografi']) $turler[] = "Biyografi";
        if ($satir['film_komedi']) $turler[] = "Komedi";
        if ($satir['film_dram']) $turler[] = "Dram";
        if ($satir['film_korku']) $turler[] = "Korku";
        if ($satir['film_romantik']) $turler[] = "Romantik";
        if ($satir['film_macera']) $turler[] = "Macera";
        if ($satir['film_gerilim']) $turler[] = "Gerilim";
        if ($satir['film_animasyon']) $turler[] = "Animasyon";
        if ($satir['film_belgesel']) $turler[] = "Belgesel";
        if ($satir['film_suç']) $turler[] = "Suç";
        if ($satir['film_tarih']) $turler[] = "Tarih";
        if ($satir['film_fantezi']) $turler[] = "Fantezi";
        if ($satir['film_müzikal']) $turler[] = "Müzikal";

        echo "<strong>Türler:</strong> " . implode(", ", $turler) . "<br><br>";
        echo "<p>" . $satir["film_Açıklama"] . "</p>";
    } else {
        echo "Film bulunamadı.";
    }
} else {
    echo "Geçersiz istek.";
}

$baglan->close();
?>
