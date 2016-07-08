<?php
include("./inc/header.php");
?>
<?php
if (!isset($_SESSION['user_login'])) {
    header("Location: error");
}

include("./inc/connection.php");
$dquery = mysql_query("SELECT * FROM users WHERE uid='$uid' AND email='$email'");
while ($row=mysql_fetch_assoc($dquery)) {

   
    $dname = $row['name'];
    $demail =$row['email'];
    $dpassword =$row['password'];
    $dcourse =$row['course'];
    $dbranch =$row['branch'];
    $dyear =$row['year'];
    $dphone =$row['phone'];
    $dphone_display =$row['phone_display'];
    $dhostel =$row['hostel'];
    $droom =$row['room'];
    $dfb_username =$row['fb_username'];
    $dreg_date =$row['reg_date'];
    $dverified = "yes";
}

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

/*$char = "cdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $rand_dir = substr(str_shuffle($char), 0, 15);
            $id = rand(1000, 9999);
            $strn = "MM16";
            $uid = $strn.strtoupper( substr( $name,0,2 ) ).$id;
            echo $uid; */

           

if ($password == $cpassword) {
    
                $pass_length = strlen($password);
                /*$query = mysql_query("SELECT * FROM users WHERE email ='$email'");
                $count = mysql_num_rows($query);

                if ($count>=1) {
                  echo "<script>alert('email already taken!!!');</script>";
                }
                else{*/

                    if ($pass_length >= 8) {
                            
                            $pwd = $password;
                            $pwd = sha1($pwd);
                            $query = mysql_query("UPDATE users set name='$name',password='$password',course='$course',branch='$branch',year='$year',phone='$phone',phone_display='$phone_display',hostel='$hostel',room='$room',fb_username='$fb_username',verified='$verified' WHERE uid='$uid'");
                                    if($query){
                                        
?>
<?php

                                        /*session_start();
                                        $_SESSION["user_login"] = $email;*/
                                        echo "<script>alert('you have successfully updated your profile !!!')</script>";
                                        echo "<script>window.top.location.href = 'dashboard?ref=edit_profile';</script>";
                                    }
                                    else{
                                        echo "<script>alert('An error occurred please try again !!!')</script>";
                                        header("location: editprofile");
                                    }
                        }
                        else{
                             echo "<script>alert('password should be atleast 8 character long !!!');</script>";
                        }
            /*}*/
}
else{
    echo "<script>alert('Passwords doesn't match !!!)</script>";
}

}
else {
   // echo $err;
       echo "<script>alert('CAPTCHA entries are incorrect')</script>";
        header("location: editprofile");
            // CAPTCHA entries are incorrect
        }

}
?>



    <!-- Page Content -->
    <div class="container">
    
    <center><h2>Update your profile here. It just takes few seconds !!!</h2></center>
    <p>(* Marked fields are required one)</p>
        <div class="bs-example">
            <form class="form-horizontal" name="myform" action="" method="POST" onsubmit="DoSubmit();">
            <h4>Login Details</h4>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Full Name*</label>
                    <div class="col-xs-10">
                        <input type="text" name="name" class="form-control" value="<?php echo $dname; ?>" placeholder="Enter your fullname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Email Address*</label>
                    <div class="col-xs-10">
                        <input type="email" name="email" class="form-control" value="<?php echo $demail; ?>" disabled placeholder="Enter your email" required>
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
                        
                            <option value="Btech" <?php if ($dcourse=="Btech") {
                            echo "selected";
                        } ?> >BTech</option>
                            <option  value="Mtech" <?php if ($dcourse=="Mtech") {
                            echo "selected";
                        } ?> >MTech</option>
                            <option  value="MCA" <?php if ($dcourse=="MCA") {
                            echo "selected";
                        } ?> >MCA</option>
                            <option  value="MBA" <?php if ($dcourse=="MBA") {
                            echo "selected";
                        } ?> >MBA</option>
                            <option  value="MSW" <?php if ($dcourse=="MSW") {
                            echo "selected";
                        } ?> >MSW</option>
                            <option  value="PHD" <?php if ($dcourse=="PHD") {
                            echo "selected";
                        } ?> >PHD</option>
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Branch*</label>
                    <div class="col-xs-10">
                        <select class="form-control" name="branch" required>
                        
                            <option  value="NA"  <?php if ($dbranch=="NA") {
                            echo "selected";
                        } ?>  >NA</option>
                            <option  value="BT"  <?php if ($dbranch=="BT") {
                            echo "selected";
                        } ?> >BT</option>
                            <option  value="CHE" <?php if ($dbranch=="CHE") {
                            echo "selected";
                        } ?> >CHE</option>
                            <option  value="ME" <?php if ($dbranch=="ME") {
                            echo "selected";
                        } ?> >ME</option>
                            <option  value="CSE" <?php if ($dbranch=="CSE") {
                            echo "selected";
                        } ?> >CSE</option>
                            <option  value="ECE" <?php if ($dbranch=="ECE") {
                            echo "selected";
                        } ?> >ECE</option>
                            <option  value="EE" <?php if ($dbranch=="EE") {
                            echo "selected";
                        } ?> >EE</option>
                            <option  value="CE" <?php if ($dbranch=="CE") {
                            echo "selected";
                        } ?> >CE</option>
                            <option  value="PIE" <?php if ($dbranch=="PIE") {
                            echo "selected";
                        } ?> >PIE</option>
                            

                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Year*</label>
                    <div class="col-xs-10">
                        <select class="form-control" name="year" required>
                        
                            <option  value="1st"  <?php if ($dyear=="1st") {
                            echo "selected";
                        } ?> >1st</option>
                            <option  value="2nd"  <?php if ($dyear=="2nd") {
                            echo "selected";
                        } ?> >2nd</option>
                            <option  value="3rd"  <?php if ($dyear=="3rd") {
                            echo "selected";
                        } ?> >3rd</option>
                            <option  value="Final"  <?php if ($dyear=="Final") {
                            echo "selected";
                        } ?> >Final</option>
                          </select>
                    </div>
                </div>
                <h4>Contact Details</h4>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Phone</label>
                    <div class="col-xs-10">
                        <input type="tel" name="phone" class="form-control" value="<?php echo $dphone; ?>" placeholder="Giving your phone no makes it easy for the buyer to contact you">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Display your Phone no.</label>
                    <div class="col-xs-10">
                       <div class="radio">
                          <label><input type="radio" value="yes"  <?php if ($dphone_display=="yes") {
                            echo "checked";
                        } ?>  name="phone_display" >yes</label>
                        
                          <label><input type="radio" value="no"  <?php if ($dphone_display=="no") {
                            echo "checked";
                        } ?>  name="phone_display">no</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Hostel*</label>
                    <div class="col-xs-10">
                        <select class="form-control" name="hostel" required>
                        
                            <option  value="SVBH"  <?php if ($dhostel=="SVBH") {
                            echo "selected";
                        } ?> >SVBH</option>
                            <option  value="MALVIYA"  <?php if ($dhostel=="MALVIYA") {
                            echo "selected";
                        } ?> >MALVIYA</option>
                            <option  value="TANDON"  <?php if ($dhostel=="TANDON") {
                            echo "selected";
                        } ?> >TANDON</option>
                            <option  value="TILAK"  <?php if ($dhostel=="TILAK") {
                            echo "selected";
                        } ?> >TILAK</option>
                            <option  value="PATEL"  <?php if ($dhostel=="PATEL") {
                            echo "selected";
                        } ?> >PATEL</option>
                            <option  value="TAGORE"  <?php if ($dhostel=="TAGORE") {
                            echo "selected";
                        } ?> >TAGORE</option>
                            <option  value="RAMAN"  <?php if ($dhostel=="RAMAN") {
                            echo "selected";
                        } ?> >RAMAN</option>
                            <option  value="PG"  <?php if ($dhostel=="PG") {
                            echo "selected";
                        } ?> >PG</option>
                            <option  value="IH"  <?php if ($dhostel=="IH") {
                            echo "selected";
                        } ?> >IH</option>
                            
                            <option  value="KNGH"  <?php if ($dhostel=="KNGH") {
                            echo "selected";
                        } ?> >KNGH</option>
                            <option  value="SNGH"  <?php if ($dhostel=="SNGH") {
                            echo "selected";
                        } ?> >SNGH</option>
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Room No.*</label>
                    <div class="col-xs-10">
                        <input type="text" name="room" class="form-control" value="<?php echo $droom; ?>"  placeholder="Enter your room no." required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword" class="control-label col-xs-2">Facebook username</label>
                    <div class="col-xs-10">
                        <input type="text" name="fb_username" class="form-control" value="<?php echo $dfb_username; ?>"  placeholder="Enter yout facebook username">
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
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
            <script type="text/javascript">
        function DoSubmit(){
  document.myform.submit.value = 'Processing...';
  return true;
}
        </script>
        </div>
    </div>

<?php
include("./inc/footer.php");
?>


