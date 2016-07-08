<?php
include("./inc/header.php");
?>

    
                 <?php
               include("inc/connection.php");
               
               if(!isset($_SESSION["user_login"])){
                echo "<script>window.top.location.href = 'error';</script>";
              }
              else{
                          
                            echo '<div class="container">
    <center><h1>Welcome '.$name.' </h1></center>
    <h3>Your Campaign Status</h3>';
    ?>
    
    <?php
                          $itquery = mysql_query("SELECT * FROM items WHERE seller_uid='$uid'");
                          
                          $count =0;
                          $count = mysql_num_rows($itquery);
                          ?>
<b>(You have listed <?php echo $count; ?> items uptill now.)</b>
<?php 
                          if($count>0){

                          ?>
                         <br>
<b>Verification normal takes 1-2 hrs. If still not done yet do mail us at <a href="mailto:humselelo@gmail.com">humselelo@gmail.com</a> OR message us at our FB page <a target="_blank" href="https://www.facebook.com/humselelo.online/">https://www.facebook.com/humselelo.online</a></b><br><br>
                          <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Product image</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Date Listed</th>
                <th>Verified</th>
                <th>Hits</th>
                <th>Edit Details</th>
                <th>Remove(If Sold)</th>
                
            </tr>
        </thead>
        <tbody>
          <?php
        
       $i=0; 
            while($row = mysql_fetch_assoc($itquery)){
            $pid = $row['pid'];
            $category = $row['category'];
            $name = $row['name'];
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
            if ($verified == "no") {
              $disable = "disabled";
              $veristatus = "verification in process";
            }else{
              $veristatus = "yes";
            }
            
           $i++;
                                echo '
                <tr>
                <td>'.$i.'</td>
                <td><a class="'.$disable.'"  href="product?ref=home_page&category='.$category.'&pid='.$pid.'&name='.$name.'"><img src="userdata/item_pics/'.$image.'" width="100" height="100"></td>
                <td><a class="'.$disable.'"  href="product?ref=home_page&category='.$category.'&pid='.$pid.'&name='.$name.'">'.$name.'</a></td>
                <td>'.$category.'</td>
                <td>'.$date_listed.'</td>
                <td>'.$veristatus.'</td>
                <td>'.$hits.'</td>
                <td><a href="editproduct?pid='.$pid.'&uid='.$uid.'" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a></td>
                <td><a href="deleteproduct?pid='.$pid.'&uid='.$uid.'" class="btn btn-danger "><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
            </tr>
                
                

                ';
              } ?>
</tbody></table>

<?php } 
 ?>

           <?php  }
 
                ?>
                

               <a href="sell" class="btn btn-warning btn-lg btn-block"><span class="glyphicon glyphicon-flash"></span> Start Selling</a></span>
                
                  <br>
              <a href="index" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-shopping-cart"></span> Start Buying</a></span>
              <b>Note:</b><br>
              <p>
               
                1. In case you need help kindly write to us at <a href="mailto:humselelo@gmail.com">humselelo@gmail.com</a>.</p>
    <!-- Page Content -->
   

    </div>

<?php
include("./inc/footer.php");
?>

