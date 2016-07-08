<?php
include("./inc/header.php");
?>

    <!-- Page Content -->
    <div class="container">
    
    <br>
        <div class="bs-example">
            <form class="form-horizontal" action="" method="POST">
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Email</label>
                    <div class="col-xs-10">
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" required>
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
                        <button type="submit" name="submit" class="btn btn-primary">Login</button>&nbsp;<a href="#" onClick="alert('Send an email at humselelo@gmail.com from your registered email address specifying the query!!!')">Forgot Password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php
include("./inc/footer.php");
?>
<?php
include("inc/connection.php");
if (isset($_POST['submit'])) {
  $redir = mysql_real_escape_string($_GET['redir']);
  $email = mysql_real_escape_string($_POST['email']);
  $pwd = mysql_real_escape_string($_POST['password']);
  //$pwd_hash = sha1($pwd);
  //$pwd_hash = substr( $pwd_hash,0,32 );
  $ttquery = mysql_query("SELECT * FROM users WHERE email='$email' AND password='$pwd'");
  $char = "cdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $rand_dir = substr(str_shuffle($char), 0, 15);
  /*while($row=mysql_fetch_assoc($query)){
    $uid = $row['uid'];
    
  }*/
  $count = mysql_num_rows($ttquery);
  
  if ($count == 1) {
    
    session_start();
    $_SESSION["user_login"] = $email;
    
    //echo "<script>alert('successfully logged in !!!')</script>";
    if ($redir) {
      echo "<script>window.top.location.href = 'sell?ref=mnnit_market_16_login&key=$uid&personType=web_user&login_id=$rand_dir&processType=login_2016&script=allow';</script>";
    }
    else
    {
      echo "<script>window.top.location.href = 'dashboard?ref=mnnit_market_16_login&key=$uid&personType=web_user&login_id=$rand_dir&processType=login_2016&script=allow';</script>";
    }
    
  }
  else{
echo "<script>alert('email or password is incorrect !!!')</script>";
  }

}

?>

