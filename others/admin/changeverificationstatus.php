<?php
include("./inc/header.php");
    $pid = mysql_real_escape_string($_GET['pid']);
   $verified = mysql_real_escape_string($_GET['verified']);
   if ($verified=="no") {
       $changev = "yes";
   }else{
    $changev = "no";
   }
if (!isset($_SESSION['admin_login'])) {
    header("Location: login");
}
else{
	$query = mysql_query("UPDATE  items SET verified='$changev' WHERE pid='$pid'");
	if ($query) {
		//echo "<script>alert('You have successfully change verification status for this item !!!')</script>";
          echo "<script>window.top.location.href = 'index';</script>";

	}
}
?>
<?php
include("./inc/footer.php");
?>