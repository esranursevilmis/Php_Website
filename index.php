<!DOCTYPE html>
<html>

<head>
  <title>Kayıt Ol</title>
  <style>
    
    body {
      font-family: Arial, sans-serif;
      background-image: url(bg.jpg);
      background-size: contain;
      background-repeat: no-repeat;

     
    }

    .container {
      max-width: 400px;
      margin-left: 60%; margin-right: 0px;
      
      padding: 30px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
    }

    form {
      margin-top: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
    }

    button[type="submit"] {
      display: block;
      width: 100%;
      padding: 10px;
      margin-top: 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    p {
      text-align: center;
      margin-top: 10px;
    }

    a {
      color: #4CAF50;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="container">
    <?php
    require_once "config.php";

    if (isset($_POST["sifre"])) {
      $form_tc = $_POST["tc"];
      $form_sifre = $_POST["sifre"];
      $form_email = $_POST["email"];
      $form_ad = $_POST["ad"];
      $form_soyad = $_POST["soyad"];
      $form_yas = $_POST["yas"];
      $tclen = strlen($form_tc);
      if ($tclen != 11) {
        echo "<script>
		         alert('T.C. kimlik numarası 11 karakterden oluşmalıdır!');
		         window.location.href='index.php';
	          </script>";
        exit;
      }
      $passlen = strlen($form_sifre);
      if ($passlen < 6 || $passlen > 15) {
        echo "Şifre en az 6, en fazla 15 karakterden oluşmalıdır!";
        exit;
      }

      $form_sifre_hash = hash("sha256", $form_sifre);

      $rt = mysqli_query($db, "INSERT INTO `uyeler` (`tc`, `sifre`, `email`,`ad`,`soyad`,`yas`)
    VALUES ('" . $form_tc . "', '" . $form_sifre_hash . "', '" . $form_email . "','" . $form_ad . "','" . $form_soyad . "','" . $form_yas . "')");

      if (mysqli_errno($db) != 0) {
        echo "Bir hata meydana geldi!";
        exit;
      }

      echo "Kullanıcı kaydınız başarılı!<br>";
      echo "Giriş yapmak için <a href='login.php'>tıklayınız</a>";
    } else {
    ?>
      <form action="index.php" method="POST">
        <h1>Kayıt Ol</h1>
        <label for="ad">Adınızı girin:</label>
        <input type="text" name="ad" required>

        <label for="soyad">Soyadınızı girin:</label>
        <input type="text" name="soyad" required>

        <label for="tc">T.C. Kimlik Numaranızı girin:</label>
        <input type="text" name="tc" required>

        <label for="yas">Yaşınızı girin:</label>
        <input type="text" name="yas" required>

        <label for="sifre">Şifrenizi belirleyin:</label>
        <input type="password" name="sifre" required>

        <label for="email">E-mail adresinizi girin:</label>
        <input type="email" name="email" required>

        <button type="submit">Sisteme kayıt ol</button>
        <p>Zaten hesabınız var mı? <a href="login.php">Giriş yap</a></p>
      </form>
    <?php
    }
    ?> <p>Kaynak koda ulaşmak için<br> <a href="https://github.com/esranursevilmis/Php_Website" >
      <img src="gh.png" width="71" height="40"></a></p> 
  </div>

</body>

</html>
