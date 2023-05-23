<?php

session_start();
if (!isset($_SESSION['form_tc'])) {
  header("location: login.php");
  exit;
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Randevu Formu</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    form {
      max-width: 400px;
      margin: 40px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    h1 {
      text-align: center;
      color: #333;
    }

    label {
      display: block;
      margin-bottom: 10px;
      color: #333;
      font-weight: bold;
    }

    select,
    input[type="date"],
    input[type="time"] {
      width: 100%;
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    input[type="submit"],
    input[type="reset"] {
      display: block;
      width: 100%;
      margin-top: 20px;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #4caf50;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
      background-color: #45a049;
    }

    .anasayfa {
      font-size: 25px;
      text-align: center;
    }
  </style>

</head>

<body>
  <?php
  require_once "config.php";
  if (isset($_POST["tam_ad"])) {
    $label_ad = $_POST["tam_ad"];
    $label_tarih = $_POST["tarih"];
    $label_saat = $_POST["saat"];

    $kaydeden_tc = $_SESSION['form_tc'];


    $rt = mysqli_query($db, "INSERT INTO `randevular` (`tc`,`tam_ad`, `tarih`, `saat`)
    VALUES ('" . $kaydeden_tc . "','" . $label_ad . "', '" . $label_tarih . "', '" . $label_saat . "')");

    if (mysqli_errno($db) != 0) {
      echo "Bir hata meydana geldi!";
      exit;
    }

    echo "<h1>Randevunuz oluşturuldu.</h1><br>";
    // echo "<a href='anasayfa.php' target='_top'>Anasayfa</a>";
  } else {
  }
  ?>
  <form action="randevual.php" method="POST">
    <h1>Randevu Formu</h1>
    <label for="tam_ad">Doktorunuzu seçiniz:</label>
    <select name="tam_ad" id="tam_ad">
      <option selected disabled>Seçiniz</option>
      <option>Dt.Ahmet Çelik</option>
      <option>Dt.Ali Yıldırım</option>
      <option>Dt.Ayşe Yılmaz</option>
      <option>Dt.Elif Özdemir</option>
      <option>Dt.Emine Kaya</option>
      <option>Dt.Fatma Demir</option>
      <option>Dt.Mustafa Şahin</option>
      <option>Dt.Ömer Öztürk</option>
      <option>Dt.Yusuf Yıldız</option>
      <option>Dt.Zeynep Aydın</option>
    </select>

    <label for="tarih">Tarihi seçiniz:</label>
    <input type="date" id="tarih" name="tarih" min="2023-05-23" max="2023-08-30" oninput="validateDate()">

    <label for="saat">Saati seçiniz:</label>
    <input type="time" id="saat" name="saat" min="08:00" max="16:00" step="3600">

    <input type="submit" value="Randevu Onayla">
    <input type="reset" value="Seçilenleri Temizle">
  </form>
  <div class="anasayfa">
    <a href='anasayfa.php' target='_top'>Anasayfa</a>
  </div>
  <script>
    function validateDate() {
      var selectedDate = new Date(document.getElementById("tarih").value);
      var day = selectedDate.getDay(); // Haftanın günü (0-6 arası, 0 Pazar, 6 Cumartesi)

      if (day === 0 || day === 6) {
        alert("Lütfen hafta içi bir tarih seçin.");
        document.getElementById("tarih").value = ""; // Tarih seçimini temizle
      }
    }
  </script>
</body>

</html>