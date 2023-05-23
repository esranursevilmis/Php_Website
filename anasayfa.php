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
  <title>Anasayfa</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    h1 {
      text-align: center;
      color: #333;
    }

    ul {
      list-style-type: none;
      margin: 20px auto;
      padding: 0;
      width: 300px;
    }

    li {
      margin-bottom: 10px;
    }

    a {
      display: block;
      padding: 15px;
      background-color: #4caf50;
      border-radius: 5px;
      text-decoration: none;
      color: #fff;
      text-align: center;
      transition: background-color 0.3s ease;
    }

    a:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Diş Hekimi Randevu Sistemi</h1>
    <ul>
      <li><a href="ekran.php">Randevu Ekranı</a></li>
      <li><a href="randevu_goruntule.php">Randevularımı Görüntüle</a></li>
      <li><a href="logout.php">Çıkış yap</a></li>
    </ul>
  </div>
</body>
</html>
