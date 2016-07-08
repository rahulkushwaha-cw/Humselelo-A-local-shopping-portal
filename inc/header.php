<?php 
    session_start(); 
    error_reporting(0);
    ?>
<!DOCTYPE html>
<html lang="en">
    
<head>

    
<title>Online Shopping MNNIT: Shop Online for Books, Notes, Mobiles, Apparel, Cycles and More - Humselelo.Online</title>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Humselelo.Online: Online Shopping MNNIT - Buy mobiles, laptops, cameras, books, notes, watches, apparel, shoes, cycles, coolers and many more."/>
<meta name="keywords" content="humselelo.online, humselelo, Online Shopping, online shopping india, india shopping online, humselelo mnnit, mnnit,MNNIT Allahabad, NIT allahabad, sell,Motilal Nehru National Institute of Technology,Allahabad,  buy online, buy mobiles online, buy books online, buy notes online, cycles, coolers, used books, ebooks, computers, laptop, toys, trimmers, watches, fashion jewellery, home, kitchen, small appliances, beauty, Sports, Fitness &amp; Outdoors"/>
<link rel="canonical" href="http://www.humselelo.online/" />
<meta http-equiv="content-type" content="text/html; charset=iso-8859-15" />


<meta property="fb:app_id" content="1122210984466134" />
<meta property="og:image" content="https://lh3.googleusercontent.com/-RUf3DDgWRU0/Vvt5_1mVdzI/AAAAAAAAAAw/NTfJ-DmcIe8Maz4FWMCFYSy8bkfjBfW-g/w140-h140-p/11920379-vector-shopping-cart-item--buy-buttons.jpg" />
<meta property="og:description" content="Humselelo.Online: Online Shopping MNNIT - Buy books, mobiles, laptops, cameras, tshirts, notes, watches, apparel, shoes, cycles, coolers and many more." />
<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
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
.imgindex{
height: 320px !important;
width: 240px !important;
}
    </style>
    
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1122210984466134";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
                <a class="navbar-brand" href="./">HumSeLeLo.Online</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a>
                            <span class="glyphicon glyphicon-map-marker">
                            </span> MNNIT Allahabad</a>
                    </li>
                    <li>
                        <a href="how_it_works">How it works?</a>
                    </li>
                    <li>
                        <a href="sell">sell</a>
                    </li>
                    <?php
               include("inc/connection.php");
               
               if(!isset($_SESSION["user_login"])){
                ?>
                
                <li>
                        <a href="login">Login</a>
                    </li>
                    
                    <li>
                        <a href="signup">Sign up</a>
                    </li>
                    
                    <?php
              }
              else{
                $email = $_SESSION["user_login"];
                          $query = mysql_query("SELECT * FROM users WHERE email='$email'");
            while($row = mysql_fetch_assoc($query)){
            $uid = $row['uid'];
            
            $name = $row['name'];
            $email = $row['email'];
        }
            ?>
            <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $name; ?> <b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="dashboard">Dashboard</a></li>
                        <li><a href="editprofile">Edit Profile</a></li>
                        
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