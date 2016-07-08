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
    
   
                         
                          <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>UID</th>
                <th>Name</th>
                <th>Products</th>
                <th>Email</th>
                <th>Password</th>
                <th>Course</th>
                <th>Branch</th>
                <th>Year</th>
                <th>Phone</th>
                <th>Hostel</th>
                <th>Room</th>
                <th>Fb_username</th>
                <th>Reg_Date</th>
                <th>Remove</th>
                
                
            </tr>
        </thead>
        <tbody>
          <?php
        $uid = mysql_real_escape_string($_GET['uid']);
       $i=0; 
       $uquery = mysql_query("SELECT * FROM users WHERE uid='$uid'");
            while($urow = mysql_fetch_assoc($uquery)){
                         $uname = $urow['name'];
                         $uemail = $urow['email'];
                         $upasswd = $urow['password'];
                         $course = $urow['course'];
                         $branch = $urow['branch'];
                         $year = $urow['year'];
                         $phone = $urow['phone'];
                         $fb_username = $urow['fb_username'];
                         $hostel = $urow['hostel'];
                         $room = $urow['room'];
                         $reg_date = $urow['reg_date'];
                         
            $squery = mysql_query("SELECT * FROM items WHERE seller_uid='$uid'");
            $totalp = mysql_num_rows($squery);
            }
            
           $i++;
                                echo '
                <tr>
                <td>'.$uid.'</td>
                <td>'.$uname.'</td>
                <td>'.$totalp.'</td>
                <td>'.$uemail.'</td>
                <td>'.$upasswd.'</td>
                <td>'.$course.'</td>
                <td>'.$branch.'</td>
                <td>'.$year.'</td>
                <td>'.$phone.'</td>
                <td>'.$hostel.'</td>
                <td>'.$room.'</td>
                
                <td>'.$fb_username.'</td>
                <td>'.$reg_date.'</td>
                <td><a href="deleteseller?uid='.$uid.'" class="btn btn-danger "><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
            </tr>
                
                

                ';
              ?>
</tbody></table>



                

              
              
    <!-- Page Content -->
   

    </div>
    <?php } 
 ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    

</body>

</html>

