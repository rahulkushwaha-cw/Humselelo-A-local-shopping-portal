<?php
include("./inc/header.php");
?>
<?php
include("./inclu/connection.php");
if(isset($_POST['submit'])){
 
?>

                            

                            <?php

 function captcha_validation($num1, $num2, $total)
    {
        global $error;
        //Captcha check - $num1 + $num = $total
        if( intval($num1) + intval($num2) == intval($total) ) {
            $error = "null";
        }
        else {
            $error = "Captcha value is wrong.<br>";
        }
        return $error;
    }  
     
       $n1= $_POST['num1'];
       $n2= $_POST['num2'];
       $capta= $_POST['captcha'];

       $err = captcha_validation($n1, $n2, $capta);
                        
        if ($err=="null") {
            // great success!        


$name = mysql_real_escape_string($_POST['name']);
$email = mysql_real_escape_string($_POST['email']);
$password = mysql_real_escape_string($_POST['password']);
$cpassword = mysql_real_escape_string($_POST['cpassword']);
$course = mysql_real_escape_string($_POST['course']);
$branch = mysql_real_escape_string($_POST['branch']);
$year = mysql_real_escape_string($_POST['year']);
$phone = mysql_real_escape_string($_POST['phone']);
$phone_display = mysql_real_escape_string($_POST['phone_display']);
$hostel = mysql_real_escape_string($_POST['hostel']);
$room = mysql_real_escape_string($_POST['room']);
$fb_username = mysql_real_escape_string($_POST['fb_username']);

date_default_timezone_set('Asia/Calcutta');
$reg_date = date('Y/m/d H:i:s');
$verified = "yes";
$otp = 12345;

$char = "cdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $rand_dir = substr(str_shuffle($char), 0, 15);
            $id = rand(1000, 9999);
            $strn = "MM16";
            $uid = $strn.strtoupper( substr( $name,0,2 ) ).$id;
            echo $uid;

           

if ($password == $cpassword) {
    
                $pass_length = strlen($password);
                $query = mysql_query("SELECT * FROM users WHERE email ='$email'");
                $count = mysql_num_rows($query);

                if ($count>=1) {
                  echo "<script>alert('email already taken!!!');</script>";
                }
                else{

                    if ($pass_length >= 8) {
                            
                            $pwd = $password;
                            $pwd = sha1($pwd);
                            $query = mysql_query("INSERT INTO users (name,email,password,course,branch,year,phone,phone_display,hostel,room,fb_username,reg_date,verified,otp)VALUES('$name','$email','$password','$course','$branch','$year','$phone','$phone_display','$hostel','$room','$fb_username','$reg_date','$verified','$otp')");
                                    if($query){
                                        //mail script starts here
                                        // echo $email;
            $messageHTML = '

            <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>MNNIT Marketplace</title>
</head>
<body>

<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">
<p>Hi,</p>
<p><b>'.$name.'</b></p>
<p><b>Thank you for registering on Humselelo Marketplace. <br>
we are pleased to have you on the board.</b></p>

  
<p>To get started<br>
you can now browse any time <a href="http://humselelo.online/">HERE</a> <br>
you can now start selling  your stuff <a href="http://humselelo.online/sell">HERE</a> <br>
 <br>

</p>
  
  <div align="center">
    <a href="http://humselelo.online/">
      <img src="https://scontent.fdel1-2.fna.fbcdn.net/hphotos-xaf1/v/t1.0-9/1689622_1692710034330963_1508820026977420376_n.jpg?oh=07b3e5691de4f3bdc717db2e135bf60e&oe=578CAD3F"  alt="Humselelo Marketplace"></a>
  <br>
  
  <h3>Follow us on:</h3>
    <a href="https://www.facebook.com/Humselelo-1692653957669904/">
      <img src="mailer/images/1432827150_facebook.png"  alt="Humselelo Facebook"></a>
      <a href="https://twitter.com/">
      <img src="mailer/images/1432827318_twitter_letter.png"  alt="Humselelo Twitter"></a>
      <a href="https://plus.google.com/">
      <img src="mailer/images/1432827125_google.png"  alt="Humselelo Google"></a>
      <a href="https://www.youtube.com/">
      <img src="mailer/images/1432827362_youtube.png"  alt="Humselelo Youtube"></a>
  </div>
  <p><b>NOTE:</b> If you are seeing this by mistake. Please contact our team immediately
   at <a href="mailto:humselelo@gmail.com">humselelo@gmail.com</a>.</p><hr>
  <p><b>Regards,<br>Team Humselelo.Online</b></p>
  
</div>
</body>
</html>

';
            
  ?>
<?php include("online-registration-mail.php"); 
//mail script ends here...
?>
<?php

                                        session_start();
                                        $_SESSION["user_login"] = $email;
                                       // echo "<script>alert('you have successfully registered !!!')</script>";
header("Location: thanking-you?ref=mnnit_marketplace_16&key=$uid&personType=web_user&ref_id=$rand_dir&processType=reg_for_marketplace&script=allow");
                                        //echo "<script>window.top.location.href = 'thanking-you?ref=mnnit_marketplace_16&key=$uid&personType=web_user&ref_id=$rand_dir&processType=reg_for_marketplace&script=allow';</script>";
                                    }
                                    else{
                                        echo "<script>alert('An error occurred please try again !!!')</script>";
                                        header("location: signup");
                                    }
                        }
                        else{
                             echo "<script>alert('password should be atleast 8 character long !!!');</script>";
                        }
            }
}
else{
    echo "<script>alert('Passwords doesn't match !!!)</script>";
}

}
else {
   // echo $err;
       echo "<script>alert('CAPTCHA entries are incorrect')</script>";
        header("location:signup");
            // CAPTCHA entries are incorrect
        }

}
?>



    <!-- Page Content -->
    <div class="container">
    
    <center><h2>You are just one step away from your market.</h2></center>
    <p>(* Marked fields are required one)</p>
        <div class="bs-example">
            <form class="form-horizontal" name="myform" action="" method="POST" onsubmit="DoSubmit();">
            <h4>Login Details</h4>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Full Name*</label>
                    <div class="col-xs-10">
                        <input type="text" name="name" class="form-control"  placeholder="Enter your fullname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Email Address*</label>
                    <div class="col-xs-10">
                        <input type="email" name="email" class="form-control"  placeholder="Enter your email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="control-label col-xs-2">Password*</label>
                    <div class="col-xs-10">
                        <input type="password" name="password" class="form-control"  placeholder="Atleast 8 characters long..." required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="control-label col-xs-2">Re-type Password*</label>
                    <div class="col-xs-10">
                        <input type="password" name="cpassword" class="form-control"  placeholder="Retype your password..." required>
                    </div>
                </div>
                <h4>Academic Details</h4>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Course*</label>
                    <div class="col-xs-10">
                        <select class="form-control" name="course" required>
                        
                            <option value="Btech">BTech</option>
                            <option  value="Mtech">MTech</option>
                            <option  value="MCA">MCA</option>
                            <option  value="MBA">MBA</option>
                            <option  value="MSW">MSW</option>
                            <option  value="PHD">PHD</option>
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Branch*</label>
                    <div class="col-xs-10">
                        <select class="form-control" name="branch" required>
                        
                            <option  value="NA">NA</option>
                            <option  value="BT">BT</option>
                            <option  value="CHE">CHE</option>
                            <option  value="ME">ME</option>
                            <option  value="CSE">CSE</option>
                            <option  value="ECE">ECE</option>
                            <option  value="EE">EE</option>
                            <option  value="CE">CE</option>
                            <option  value="PIE">PIE</option>
                            

                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Year*</label>
                    <div class="col-xs-10">
                        <select class="form-control" name="year" required>
                        
                            <option  value="1st">1st</option>
                            <option  value="2nd">2nd</option>
                            <option  value="3rd">3rd</option>
                            <option  value="Final">Final</option>
                          </select>
                    </div>
                </div>
                <h4>Contact Details</h4>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Phone</label>
                    <div class="col-xs-10">
                        <input type="tel" name="phone" class="form-control" placeholder="Giving your phone no makes it easy for the buyer to contact you">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Display your Phone no.</label>
                    <div class="col-xs-10">
                       <div class="radio">
                          <label><input type="radio" value="yes" name="phone_display" checked>yes</label>
                        
                          <label><input type="radio" value="no" name="phone_display">no</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Hostel*</label>
                    <div class="col-xs-10">
                        <select class="form-control" name="hostel" required>
                        
                            <option  value="SVBH">SVBH</option>
                            <option  value="MALVIYA">MALVIYA</option>
                            <option  value="TANDON">TANDON</option>
                            <option  value="TILAK">TILAK</option>
                            <option  value="PATEL">PATEL</option>
                            <option  value="TAGORE">TAGORE</option>
                            <option  value="RAMAN">RAMAN</option>
                            <option  value="PG">PG</option>
                            <option  value="IH">IH</option>
                            
                            <option  value="KNGH">KNGH</option>
                            <option  value="SNGH">SNGH</option>
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Room No.*</label>
                    <div class="col-xs-10">
                        <input type="text" name="room" class="form-control"  placeholder="Enter your room no." required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword" class="control-label col-xs-2">Facebook username</label>
                    <div class="col-xs-10">
                        <input type="text" name="fb_username" class="form-control"  placeholder="Enter yout facebook username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="control-label col-xs-2"></label>
                    <div class="col-xs-10">
                        <div style="clear:both;">
                                <p>Prove to me that you are not a spambot!<span class="required"> * </span></p>

                            <div>
                       <input id="num1" class="sum" type="text" name="num1" value="<?php echo rand(1,4) ?>" readonly="readonly" /> +
                        <input id="num2" class="sum" type="text" name="num2" value="<?php echo rand(5,9) ?>" readonly="readonly" /> =
                        <input id="captcha" class="captcha" type="text" name="captcha" maxlength="2" />
                        </div>
                        <br>
                        </div>
                    </div>
                </div>
<div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <p>By Signing up you agree our terms & condition and privacy policy.</p>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php
include("./inc/footer.php");
?>
<script type="text/javascript">
        function DoSubmit(){
  document.myform.submit.value = 'Processing...';
  return true;
}
        </script>

