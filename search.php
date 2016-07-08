<?php
    $key=$_GET['key'];
    $array = array();
    include("./inc/connection.php");
    $con=mysql_connect("localhost","root","cAn1U2d03lT");
    $db=mysql_select_db("mnnitmarket",$con);
    $query=mysql_query("SELECT * FROM items WHERE name LIKE '%{$key}%' OR keywords LIKE '%{$key}%' ");
    //$query=mysql_query("select * from items where <coloumn_name> LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['name'];
    }
    echo json_encode($array);
?>