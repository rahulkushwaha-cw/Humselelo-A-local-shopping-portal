<?php
include("./inc/header.php");
    $pid = mysql_real_escape_string($_GET['pid']);
    $userid = mysql_real_escape_string($_GET['uid']);
if (!isset($_SESSION['user_login'])) {
    header("Location: error");
}
elseif ($uid != $userid) {
    echo "<script>alert('You don't have rights to edit this product !!!')</script>";
    header("Location: error");
}else{
	$query = mysql_query("DELETE FROM items WHERE pid='$pid'");
	if ($query) {
		echo "<script>alert('You have successfully removed your item !!!')</script>";
          echo "<script>window.top.location.href = 'dashboard?ref=delete_product';</script>";

	}
}
?>
<?php
include("./inc/footer.php");
?>