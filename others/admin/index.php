<?php
include("./inc/header.php");
?>

    
                 <?php
               include("inc/connection.php");
               
               if(!isset($_SESSION["admin_login"])){
                echo "<script>window.top.location.href = 'login';</script>";
              }
              else{
                          
                            echo '<div class="container">
    <center><h1>Welcome '.$name.' ('.$designation.') </h1></center>
    ';
    ?>
    
    <?php
                           $uquery = mysql_query("SELECT * FROM users");
                           $countu = mysql_num_rows($uquery);
                          $itquery = mysql_query("SELECT * FROM items ORDER BY date_listed");
                          
                          $count =0;
                          $count = mysql_num_rows($itquery);
                          ?>
<b>(Total <?php echo $count; ?> items uptil now.)&nbsp;&nbsp;(Total <?php echo $countu; ?> registrations uptil now.)&nbsp;&nbsp;<a target="_blank" href="all_users">See All Registrations</a></b><br><br>
<?php 
                          if($count>0){

                          ?>
                         
                          <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Product image</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Sold By</th>
                <th>Price</th>
                <th>Date Listed</th>
                <th>Verification</th>
                <th>Hits</th>
                
                <th>Remove Item</th>
                
            </tr>
        </thead>
        <tbody>
          <?php
        
       $i=0; 
            while($row = mysql_fetch_array($itquery)){
            $pid = $row['pid'];
            $seller_uid=$row['seller_uid'];
            $squery = mysql_query("SELECT * FROM users WHERE uid='$seller_uid'");
                     while ($urow=mysql_fetch_assoc($squery)) {
                         $uname = $urow['name'];
                         $uemail = $urow['email'];
                         $course = $urow['course'];
                         $branch = $urow['branch'];
                         $year = $urow['year'];
                         $phone = $urow['phone'];
                         $phone_display = $urow['phone_display'];
                         $hostel = $urow['hostel'];
                         $room = $urow['room'];
                         $fb_username = $urow['fb_username'];
                         
                     }
            $category = $row['category'];
            $pname = $row['name'];
            $ccondition = $row['ccondition'];
            $original_price = $row['original_price'];
            $listed_price = $row['listed_price'];
            
            $description = $row['description'];
            $negotiable = $row['negotiable'];
            $image = $row['image'];
            $verified = $row['verified'];
            $date_listed = $row['date_listed'];
            $keywords = $row['keywords'];
            $hits =  $row['hits'];
            
            
           $i++;
                                echo '
                <tr>
                <td>'.$i.'</td>
                <td><a target="_blank" href="../../product?ref=home_page&category='.$category.'&pid='.$pid.'&name='.$pname.'"><img src="../../userdata/item_pics/'.$image.'" width="100" height="100"></td>
                <td><a target="_blank" href="../../product?ref=home_page&category='.$category.'&pid='.$pid.'&name='.$pname.'">'.$pname.'</a></td>
                <td>'.$category.'</td>
                <td><a target="_blank" href="seller?uid='.$seller_uid.'">'.$uname.'</a></td>
                <td>'.$listed_price.'</td>
                <td>'.$date_listed.'</td>
                <td>'.$verified.' <a class="btn btn-primary btn-xs" href="changeverificationstatus?pid='.$pid.'&verified='.$verified.'">Change</a></td>
                <td>'.$hits.'</td>
                
                <td><a href="deleteproduct?pid='.$pid.'&uid='.$seller_uid.'" class="btn btn-danger "><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
            </tr>
                
                

                ';
              } ?>
</tbody></table>

<?php } 
 ?>

           <?php  }
 
                ?>
                

              
              
    <!-- Page Content -->
   

    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    

</body>

</html>

	