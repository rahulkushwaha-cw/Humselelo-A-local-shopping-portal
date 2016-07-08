
<?php
include("./inc/header.php");

date_default_timezone_set('Asia/Calcutta');
$logout_date = date('Y/m/d H:i:s');
$insertq = mysql_query("UPDATE admin SET last_login='$logout_date' WHERE id='$id'");
session_start();
session_destroy();

header("location: login");
?>