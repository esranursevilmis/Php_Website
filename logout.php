<?php

include "config.php";

session_start();
session_destroy();

// Yönlendirme işlemi
header("location: login.php");
exit;
?>