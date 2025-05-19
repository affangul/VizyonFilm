<?php
session_start();
include("bağlan.php");
if($_POST) {
    $kullanici = $_POST['kullanici'];
    $sifre = $_POST['sifre'];

     $sorgu = $baglan->query("SELECT admin_isim, admin_şifre FROM admin WHERE (admin_isim ='$kullanici') AND (admin_şifre = '$sifre') ");
     $kontrol = $sorgu ->num_rows;

     if($kontrol>0){
        setcookie("kullanici","msb",time() + 3600);
        $_SESSION["giris"] = sha1(md5("var"));
         echo "<script> window.location.href='adminpaneli.php';</script>";
     }


}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Paneli Giriş</title>

    <link rel="stylesheet" href="../css/admingirisstyle.css">

    
</head>
<body>
    <div class="page-container"> 
        <div class="logo">
            <img src="../img/logo1.png" alt="">
        </div>

        <div class="form-container">
            <form action="" method="post">
                <b>Kullanıcı Adı:</b><br>
                <input type="text" name="kullanici" required><br>
                <b>Şifre:</b><br>
                <input type="password" name="sifre" required><br><br>
                <input type="submit" value="Giriş Yap">
            </form>
        </div>
    </div>
</body>

</html>
