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
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1,
        h4 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:hover {
            background-color: #e1e1e1;
        }


        .buttons {
            margin-top: 20px;
            text-align: center;
        }

        .buttons a {
            display: inline-block;
            margin: 0 10px;
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .buttons a:hover {
            background-color: #45a049;
        }

        input[type="submit"] {
            display: inline-block;
            padding: 8px 16px;
            background-color: #337ab7;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #286090;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>RANDEVULARIM</h1>

        <?php

        include("config.php");

        if (isset($_POST['submit'])) {
            $randevu_id = $_POST['randevu_id'];

            $sql = "DELETE FROM randevular WHERE randevu_id = '$randevu_id'";

            $silme_cevap = mysqli_query($db, $sql);

            if (!$silme_cevap) {
                echo 'Hata:' . mysqli_error($db);
            } else {
                echo "<h4>Randevunuz iptal edildi.</h4>";
            }
        }

        $kaydeden_tc=$_SESSION['form_tc'];

        $sql = "SELECT * FROM randevular WHERE `tc`='$kaydeden_tc'";
        $cevap = mysqli_query($db, $sql);

        if (!$cevap) {
            echo '<br>Hata:' . mysqli_error($db);
        }

        echo "<form method='post' action=''>";
        echo "<table>";
        echo "<tr><th>Doktor Adı-Soyadı</th><th>Tarihi</th><th>Saati</th><th></th></tr>";

        while ($gelen = mysqli_fetch_array($cevap)) {
            echo "<tr><td>" . $gelen['tam_ad'] . "</td>";
            echo "<td>" . $gelen['tarih'] . "</td>";
            echo "<td>" . $gelen['saat'] . "</td>";
            echo "<td><input type='hidden' name='randevu_id' value='" . $gelen['randevu_id'] . "'><input type='submit' name='submit' value='Randevuyu iptal et'></td></tr>";
        }

        echo "</table>";

        echo "</form>";

        mysqli_close($db);
        ?>



        <div class="buttons">
            <a href="ekran.php">Randevu Ekranı</a>
            <a href="anasayfa.php">Anasayfa</a>


        </div>
    </div>
</body>

</html>