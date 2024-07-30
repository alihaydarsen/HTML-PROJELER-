<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Adi = $_POST["Adı"];
    $Soyadi = $_POST["Soyadı"];
    $Kimlikno = $_POST["Kimlikno"];
    $Tarih = $_POST["Tarih"];
    $Doktor = $_POST["Doktor"];

    $baglan = mysqli_connect("localhost", "root", "", "hastane");

    if (!$baglan) {
        die("Bağlantı hatası: " . mysqli_connect_error());
    }

    $sorgu = "INSERT INTO Randevu (Adı, Soyadı, Kimlikno, Tarih, Doktor) VALUES ('$Adi', '$Soyadi', '$Kimlikno', '$Tarih', '$Doktor')";

    if (mysqli_query($baglan, $sorgu)) {
        echo "";
    } else {
        echo "Hata: " . $sorgu . "<br>" . mysqli_error($baglan);
    }

    mysqli_close($baglan);
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randevu Kayıt</title>
    <link rel="icon" href="fotolar/logomuz.ico">
</head>
<body style="background-image: url(fotolar/medipol.jpg);background-position:top;">
<a style="text-decoration:none;color:navy;font-size:large;" href="anasayfa.html"><b style="">Anasayfaya Git</b></a><br>
    <img src="fotolar/Kontrol.png" width="150px" height="150px" style="position:relative;left: 700px; right: 400px; top:300px; bottom:400px;"><br>
    <h1 style="color: black;text-align: center;position: relative;top: 300px; background-color: white;">Randevunuz Başarıyla Alınmıştır.</h1>
</body>
</html>
