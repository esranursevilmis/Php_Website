<?php

$db_host = "sql213.epizy.com"; //127.0.0.1 //sql13.bilmemnehost.com
$db_user = "epiz_34269744";
$db_pass = "cIgLLOswg5gvL";
$db_name = "epiz_34269744_db_name";


$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno())
{
    echo "Bağlantı kurulamadı!";
    exit();
}

//echo "Bağlantı başarılı...";

// if(mysqli_errno($db))
