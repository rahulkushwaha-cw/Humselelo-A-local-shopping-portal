<?php 
session_start();
    error_reporting(0);

    
    ?>
<!DOCTYPE html>
<html lang="en">
    
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MNNIT">
    <meta name="author" content="MNNIT">

    <title>HumSeLeLo.Online Admin Portal</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script src="js/jquery.js" type="text/javascript"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style type="text/css">
  a.disabled {
   pointer-events: none;
   cursor: default;
}
        .sum{
            display: inline-block !important;
    font-weight: bolder !important;
    font-size: 20px !important;
    width: 50px !important;
    text-align: center !important;
}
.captcha{
    font-weight: bolder !important;
    font-size: 20px !important;
    width: 50px !important;
    text-align: center !important;
}
            .no-fouc {display:none;}

    </style>
    
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index">HumSeLeLo.Online Admin Portal</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                        <?php 
                        if(!isset($_SESSION["admin_login"])){
                            echo "<script>window.top.location.href = 'login';</script>";
              }
              else{
                        include("inc/connection.php");
                        $lquery = mysql_query("SELECT * From admin ORDER BY last_login ASC");
                        while ($lrow = mysql_fetch_assoc($lquery)) {
                            $last_login = $lrow['last_login'];
                            $lname = $lrow['name'];
                        }
                        ?>
                        <li>
                        <a href="">Last Login:&nbsp;&nbsp;<?php echo $lname;?>&nbsp;@&nbsp;<?php echo $last_login;?></a>
                    </li>
                    <?php
                    
                $username = mysql_real_escape_string($_SESSION["admin_login"]);
                          $query = mysql_query("SELECT * FROM admin WHERE username='$username'");
            while($row = mysql_fetch_assoc($query)){
            $id = $row['id'];
            
            $name = $row['name'];
            $designation = $row['designation'];
        }
            ?>
            <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $name; ?> <b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="change_password">Change Password</a></li>
                        
                        <li class="divider"></li>
                        <li><a href="logout">Logout</a></li>
                    </ul>
                </li>
            <?php
            
                    }
?>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>