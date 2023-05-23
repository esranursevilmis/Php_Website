<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Doktorlar</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    h1 {
      text-align: center;
      color: #333;
    }

    .doktorlar-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: flex-start;
      padding: 20px;
    }

    .doktor {
      background-color: #ffffff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
      padding: 20px;
      margin: 10px;
      width: 300px;
      text-align: center;
      transition: all 0.3s ease;
    }

    .doktor:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .doktor p {
      margin: 10px 0;
    }

    .doktor strong {
      color: #333;
    }

    .doktor .gender-icon {
      display: inline-block;
      margin-top: 10px;
      width: 2cm;
      height: 2cm;
    }
  </style>
</head>
<body>
  <h1>HEKİMLERİMİZ</h1>

  <div class="doktorlar-container">
    <?php
    include("config.php");

    $sql = "SELECT * FROM doktorlar";
    $cevap = mysqli_query($db,$sql);

    if(!$cevap) {
      echo '<br>Hata:' . mysqli_error($db);
    }

    while ($gelen = mysqli_fetch_array($cevap)) {
      echo "<div class='doktor'>";
      echo "<img class='gender-icon' src='" . ($gelen['cinsiyet'] == 'Erkek' ? 'man.jpg' : 'woman.jpg') . "' alt='Gender Icon'>";
      echo "<p><strong></strong> " . $gelen['cinsiyet'] . "</p>";
      echo "<p><strong>Ad-Soyad:</strong> " . $gelen['tam_ad'] . "</p>";
      echo "<p><strong>Tecrübesi:</strong> " . $gelen['tecrube'] . " yıl" . "</p>";
      echo "</div>";
    }

    mysqli_close($db);
    ?>
  </div>
</body>
</html>
