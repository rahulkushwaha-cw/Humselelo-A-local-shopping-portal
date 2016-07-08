<?php 
session_start();
session_destroy();
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
                <a class="navbar-brand" href="./">HumSeLeLo.Online Admin Portal</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                        <?php 
                        if(!isset($_SESSION["admin_login"])){
                            //nothing
                            ?>
                            <li><a href="login">login</a></li>
                            <?php
              }
              else{
                        include("inc/connection.php");
                        $lquery = mysql_query("SELECT * From admin");
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
    <!-- Page Content -->
    <div class="container">
    
    <br>
        <div class="bs-example">
            <form class="form-horizontal" action="" method="POST">
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Username</label>
                    <div class="col-xs-10">
                        <input type="text" name="username" class="form-control" id="inputEmail" placeholder="username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="control-label col-xs-2">Password</label>
                    <div class="col-xs-10">
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="submit" name="submit" class="btn btn-primary">Login</button>&nbsp;<a href="#" onClick="alert('Contact Web Team!!!')">Forgot Password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    

</body>

</html>
<?php
include("inc/connection.php");
if (isset($_POST['submit'])) {
 // $redir = mysql_real_escape_string($_GET['redir']);
  $username = mysql_real_escape_string($_POST['username']);
  $pwd = mysql_real_escape_string($_POST['password']);
  //$pwd_hash = sha1($pwd);
  //$pwd_hash = substr( $pwd_hash,0,32 );
  $ttquery = mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$pwd'");
  $char = "cdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $rand_dir = substr(str_shuffle($char), 0, 15);
  /*while($row=mysql_fetch_assoc($query)){
    $uid = $row['uid'];
    
  }*/
  $count = mysql_num_rows($ttquery);
  
  if ($count == 1) {
    
    session_start();
    $_SESSION["admin_login"] = $username;
    
    echo "<script>alert('successfully logged in !!!')</script>";
    
      echo "<script>window.top.location.href = 'index';</script>";
    
    
  }
  else{
echo "<script>alert('username or password is incorrect !!!')</script>";
  }

}

?>

