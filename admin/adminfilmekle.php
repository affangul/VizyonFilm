<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../css/admingenelstyle.css">
    <link rel="stylesheet" href="../css/adminfilmlerstyle.css">

    <title>Admin Paneli</title>
    <style>


    </style>
</head>
<body>
<button id="menuButton" onclick="toggleMenu()">☰ Menü</button>
    <div id="menu" class="menu">
        <ul>
            <li><a href="adminfilmler.php">Filmler</a></li>
            <li><a href="adminhakkımızda.php">Hakkımızda</a></li>
            <li><a href="adminiletişim.php">İletişim</a></li>
            <li><a href="adminmesaj.php">Mesajlar</a></li>
            <li><a id="cıkıs" href="cikis.php" onclick="return confirm('Çıkış yapmak istediğinize emin misiniz?');">ÇIKIŞ</a></li>
        </ul>
    </div>
    <div id="content">

   
    <form action="">
    <div id="ortala">
    <h1>Film Ekle</h1>
        <label for="">İsim:</label>
        <input type="text">

        <label for="resimDosyası">Resim Yükle:</label>
        <input type="file" name="resimDosyası" id="resimDosyası"> <br> <br>

        <label for="">Vizyon Film puanı:</label>
        <input type="text">
        
        <label for="">IMDb puanı:</label>
        <input type="text">

        <label for="">Yönetmen</label>
        <input type="text">

        <label for="">Senarist</label>
        <input type="text">

        <label for="">Türler</label>
        <input type="text">

        <label for="">Süre</label>
        <input type="text">

        <label for="">Açıklama</label>
        <input type="text">

        <label for="">Oyuncular</label>
        <input type="text">

        <label for="">Vizyonda mı?</label>
        <input type="text">
        <br> <br>
        <input type="submit">
    </form>

    </div>

    <script src="script.js"></script>
</body>
</html>