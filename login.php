<?php
require_once "config.php";
session_start();


if (isset($_POST["tc"])) {
    $form_tc = $_POST["tc"];
    $form_sifre = $_POST["sifre"];

    $form_sifre_hash = hash("sha256", $form_sifre);

    $q = mysqli_query($db, "SELECT * FROM uyeler WHERE `tc`='$form_tc' AND `sifre`='$form_sifre_hash'");
    $num = mysqli_num_rows($q);
    

    if ($num == 0) {
        echo "<script>
        alert('Böyle bir kullanıcı bulunamadı!T.C. Kimlik numaranız veya şifrenizi kontrol ediniz!');
        window.location.href='login.php';
        </script>";
        exit;
    } else if ($num == 1) {
        $user = mysqli_fetch_assoc($q);


        echo "Giriş başarılı! Hoş geldiniz, Sayın " . $user["ad"] . " " . $user["soyad"];
        $_SESSION['form_tc']=$form_tc;
        

        // Yönlendirme işlemi
        header("location: anasayfa.php");
        exit;
    }
} else {

?>

    <html>

    <head>
        <title>Giriş Yap</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                margin: 0;
                padding: 0;
            }

            .container {
                width: 300px;
                margin: 0 auto;
                margin-top: 100px;
                background-color: #fff;
                border-radius: 5px;
                padding: 20px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            }

            h2 {
                text-align: center;
                color: #333;
            }

            .input-group {
                margin-bottom: 15px;
            }

            .input-group label {
                display: block;
                font-size: 14px;
                color: #666;
                margin-bottom: 5px;
            }

            .input-group input {
                width: 100%;
                padding: 8px;
                font-size: 16px;
                border-radius: 5px;
                border: 1px solid #ccc;
            }

            .input-group input[type="submit"] {
                background-color: #4caf50;
                color: #fff;
                cursor: pointer;
            }

            .input-group input[type="submit"]:hover {
                background-color: #45a049;
            }

            .error {
                color: red;
                font-size: 14px;
                margin-top: 5px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h2>Giriş Yap</h2>
            <form action="login.php" method="POST">
                


                <div class="input-group">
                    <label>T.C. Kimlik No:</label>
                    <input type="text" name="tc" required>
                </div>
                <div class="input-group">
                    <label>Şifre</label>
                    <input type="password" name="sifre" required>
                </div>
                <div class="input-group">
                    <input type="submit" value="Giriş Yap">
                </div>
                <p>Hesabınız yok mu?<a href="index.php">Kayıt Olun</a></p>
            </form>
            <div class="error">
                <?php
                if (isset($error_message)) {
                    echo $error_message;
                }
                ?>
            </div>
        </div>
    </body>

    </html>


<?php
}
?>