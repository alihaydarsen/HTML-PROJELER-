<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hastane Yönetimi</title>
    <link rel="icon" href="fotolar/logomuz.ico">
    <link rel="stylesheet" href="sayfalar.css">
    <style>
        a{color:rgb(32, 5, 120);
            margin-left:500px;
            text-decoration: none;
            
        }
    </style>
</head>
<body style="background-color:rgb(206, 206, 206);">
<header>
    <div class="logo">
    <img src="fotolar/logo.svg" alt="Medipol Sağlık Grubu"><h2 style="color:rgb(32, 5, 120);margin-left:430px;">Hastane Yönetimi</h2><h2><a href="anasayfa.html">Anasayfaya Git</a></h2>
    </div>
   </header>
   <br>
   <br><br>
<div style="text-align: center;background-image: url(fotolar/hak2.jpeg); height: 400px;padding-top: 200px;border-radius: 50px;border-style: double;">
    <form action="giris.php" method="POST" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" autocomplete="off">
        <label for="YoneticiAdi" style="font-size: x-large;color:rgb(32, 5, 120);background-color: antiquewhite;">Yönetici Adı:</label>
        <input type="text" id="yAdi" name="YoneticiAdi" required ><br><br>

        <label for="Parola" style="font-size: x-large;color:rgb(32, 5, 120);background-color: antiquewhite;margin-left:70px">Parola:</label>
        <input type="password" id="Parola" name="Parola" required><br><br>

        <input type="submit" style="font-size: x-large;background-color: antiquewhite; border-radius: 15px;" value="Giriş Yap" name="Giris"><br><br>
    </form>

<?php
if (isset($_POST['Giris'])) {
    $YoneticiAdi = $_POST["YoneticiAdi"];
    $Parola = md5($_POST['Parola']);
    $baglan = mysqli_connect("localhost","root","","hastane");
    if (!$baglan) {
        die(mysqli_connect_error());
    }else{
      $sorgu ="select * from yonetici where YoneticiAdi='".$YoneticiAdi."' and Parola='".$Parola."'";
      $sonuc=mysqli_query($baglan, $sorgu);
      if(mysqli_num_rows($sonuc)>0)
      {
       session_start();
       $_SESSION["YoneticiAdi"]=$YoneticiAdi;
       $_SESSION["Parola"]=$Parola;
       header("Location:profil.php");

      }else {
        echo "<b style=color:navy;font-size:x-large;background-color:antiquewhite;>Kullanıcı adı veya parola hatalı.</b>";
    }
    }
    $baglan->close();
}
?>

<div style="background-color: rgb(166, 167, 166); height: 130px; text-align: center;margin-top:280px">
    <img src="fotolar/logo.svg" alt="" height="130" width="150">
    <img src="fotolar/arama.svg" alt="" height="130" width="150" style="text-align: right;">
</div>
</body>
</html>
