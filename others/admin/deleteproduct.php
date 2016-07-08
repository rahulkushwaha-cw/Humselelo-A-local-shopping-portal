<?php
include("./inc/header.php");
    $pid = mysql_real_escape_string($_GET['pid']);
    $userid = mysql_real_escape_string($_GET['uid']);
if (!isset($_SESSION['admin_login'])) {
    header("Location: login");
}
else{
	$query = mysql_query("DELETE FROM items WHERE pid='$pid'");
	if ($query) {
		echo "<script>alert('You have successfully removed this item !!!')</script>";
          echo "<script>window.top.location.href = 'index';</script>";

	}
}
?>
<?php
include("./inc/footer.php");
?>