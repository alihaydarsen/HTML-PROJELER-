<?php
session_start();
if (!isset($_SESSION['YoneticiAdi'], $_SESSION['Parola'])) {
    header("Location: profil.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Paneli</title>
    <link rel="icon" href="fotolar/logomuz.ico">
    <link rel="stylesheet" href="sayfalar.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 25px;
        }
        table, th, td {
            border: 1px solid rgb(32, 5, 120);
        }
        th, td {
            padding: 10px;
            text-align: left;
            color:rgb(32, 5, 120);
        }
        tr{
            color:rgb(32, 5, 120);
        }
        h2{
            color:rgb(32, 5, 120);
            margin-left:470px; 
        }
        a{ 
            color:rgb(32, 5, 120);
            margin-left:570px;  
            text-decoration:none;
            font-size: 20px;
        }
    </style>
</head>
<body style="background-color:rgb(206, 206, 206);">
<header>
    <div class="logo">
    <img src="fotolar/logo.svg" alt="Medipol Sağlık Grubu"><h2>Yönetici Paneli</h2><a href="cikis.php">Çıkış Yap</a>
    </div>
   </header>
   <br>
<div style="text-align: center;">
        <table>
            <tr>
                <th>Adı</th>
                <th>Soyadı</th>
                <th>TC Kimlik Numarası</th>
                <th>Tarih</th>
                <th>Doktor</th>
            </tr>
<div style="text-align: center;">
    <b style="font-size:30px;color:rgb(32, 5, 120);">Hoş Geldiniz Sayın <?php echo $_SESSION['YoneticiAdi']; ?></b> <br><br><br>
    <b style="font-size:30px;color:rgb(32, 5, 120);">Alınan Randevular</b>
    <?php
            $baglan = mysqli_connect("localhost", "root", "", "hastane");
            if (!$baglan) {
                die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
            }

            $sorgu = "SELECT * FROM randevu";
            $sonuc = mysqli_query($baglan, $sorgu);

            if (mysqli_num_rows($sonuc) > 0) {
                
                while ($satir = mysqli_fetch_assoc($sonuc)) {
                    echo "<tr>";
                    echo "<td>" .($satir['Adı']). "</td>";
                    echo "<td>" .($satir['Soyadı']). "</td>";
                    echo "<td>" .($satir['Kimlikno']). "</td>";
                    echo "<td>" .($satir['Tarih']). "</td>";
                    echo "<td>" .($satir['Doktor']). "</td>";
                    echo "</tr>";
                }
            } 
            mysqli_close($baglan);
            ?>
        </table>
    </div>
    <div style="background-color: rgb(166, 167, 166); height: 130px; text-align: center;">
    <img src="fotolar/logo.svg" alt="" height="130" width="150">
    <img src="fotolar/arama.svg" alt="" height="130" width="150" style="text-align: right;">
</div>
</body>
</html>

