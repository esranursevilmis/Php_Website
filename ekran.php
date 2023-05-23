<?php

session_start();
if (!isset($_SESSION['form_tc'])) {
    header("location: login.php");
    exit;
}

?>
<html>
<frameset cols="3,4">
    <frame src="randevual.php">Randevu tarihini seçin </frame>
        <frame src="doktorlar.php" ></frame>

    </frameset>
            
</html>