<?php

//error_reporting(0);
?>
<?php
include("./inc/header.php");
?>
    <div class="container">
      
     
      

      
      <!-- Section -->
      <section class="section full-width-bg gray-bg">
        <div class="row">
        
          <div class="col-lg-2 col-md-2 col-sm-2">

            </div>
            
            <div class="col-lg-8 col-md-8 col-sm-8">
              
              <?php
               include("inc/connection.php");
               
               if(!isset($_SESSION["user_login"])){
  echo "<script>window.top.location.href = 'error';</script>";
}
else{
            $email = $_SESSION["user_login"];
            $query = mysql_query("SELECT * FROM users WHERE email='$email'");
            $row = mysql_fetch_assoc($query);
            $reg_id = $row['uid'];
            
            $name = $row['name'];
            
            $email = $row['email'];
            ?>
           
          
                <h3 style="color:green;" class="animate-onscroll no-margin-top">Success</h3>
                <h2>Thank you <?php echo $name ;?> for registering with us !!!</h2>
                <div class="sidebar-box white animate-onscroll">
              <h2>Your Registration ID for HumSeLeLo.Online Marketplace is:</h2>
              <ul class="upcoming-events">
              
               
          <?php
          echo '<h1>HSLL2016'.$reg_id.'</h1>';

            ?>
            <p><b>Important:</b> Note down this ID for all the future reference. An email has already been sent to your registered email address for the same.</p>
            
            <h2>Login <a href="login" >HERE</a> to reach your dashboard.</h2>
            <br>
            <p>For any issues or complain regarding registration you can directly write to us at <a href="mailto:humselelo@gmail.com">humselelo@gmail.com</a></p>
                
                
                
                
              </ul>
              
            </div>
       
                
                
                <?php } ?>
              
             </div>
              <div class="col-lg-2 col-md-2 col-sm-2">
      
            
            </div>
          </div>
            <br class="clearfix">
              <br class="clearfix">
            
          
            
          
            
            
         
          
          
          
          
          
        
        
      </section>
      <!-- /Section -->
    
    </div>



      
      
      
      <?php
      include("inc/footer.php");
      ?>
      
     