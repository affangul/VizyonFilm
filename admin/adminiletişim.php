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
    <div id="ortala">
    <h1>Hakkımızda</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <label for="metin1">Telefon:</label>
        <textarea> </textarea><br>
       
        <label for="metin2">Mail:</label>
        <textarea ></textarea><br>
       
        <label for="metin3">Adres:</label>
        <textarea ></textarea><br>

        <label for="metin3">Harita:</label>
        <textarea ></textarea><br>
       
        <input type="submit">
    </form>
    </div>
    </div>

    <script src="script.js"></script>
</body>
</html>