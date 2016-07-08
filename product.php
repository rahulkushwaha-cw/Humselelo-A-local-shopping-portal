<?php
include("./inc/header.php");
?>

    
    <div class="container">

        <div class="row">

           <?php
                if (!isset($_GET['pid'])) {
                    header("Location: error");
                }else{

                $urlpid = mysql_real_escape_string($_GET['pid']);
                $urlcategory = mysql_real_escape_string($_GET['category']);
                $urlname = mysql_real_escape_string($_GET['name']);
                $dquery = mysql_query("SELECT * FROM items WHERE pid='$urlpid'");
                $avi = mysql_num_rows($dquery);
                if (!$avi) {
                    echo "<script>window.top.location.href = 'error';</script>";
                }
                ?>
            <div class="col-md-3">
                <center><h4>Discussion Forum:</h4></center>
                <div id="disqus_thread"></div>
<script>
/**
* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
*/

var disqus_config = function () {
this.page.url = '<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>'; 
this.page.identifier = '<?php echo $_SERVER['REQUEST_URI']; ?>'; 
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');

s.src = '//humselelo.disqus.com/embed.js';

s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
            </div>
        <!--<form action="index" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for items here&hellip;">
                    <span class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-default">Search</button>
                    </span>
                </div>
                </form>
                <br>-->
                <?php
                while ($drow = mysql_fetch_assoc($dquery)) {
                     $pid = $drow['pid'];
                     
                     $seller_uid = $drow['seller_uid'];
                     $uquery = mysql_query("SELECT * FROM users WHERE uid='$seller_uid'");
                     while ($urow=mysql_fetch_assoc($uquery)) {
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
                     $category = $drow['category'];
                     $pname = $drow['name'];
                     $ccondition = $drow['ccondition'];
                     $original_price = $drow['original_price'];
                     $listed_price = $drow['listed_price'];
                     $description = $drow['description'];
                     $negotiable = $drow['negotiable'];
                     $image = $drow['image'];
                     $verified = $drow['verified'];
                     $date_listed = $drow['date_listed'];
                     $keywords = $drow['keywords'];
                     $hits = $drow['hits'];
                     $hits++;
                     $updatehits = mysql_query("UPDATE items SET hits='$hits' WHERE pid='$pid'");
                     $hits = $drow['hits'];

                 }
                 
                ?>
            <div class="col-md-9">
                <?php
                if ($verified == "no") {
                     ?> <h4>This product has not been verified yet!!!</h4><?php
                 }else{
                ?>
                <div class="thumbnail">
                    <img class="img-responsive" src="userdata/item_pics/<?php echo $image; ?>" style="width:800px;height:400px" alt="<?php echo $pname; ?>" >
                    <div class="caption-full">
                        <h4 class="pull-right">
                            
                                    <span class=""><b>Rs&nbsp;<?php echo $listed_price; ?></b></span>
                                    <span class=""><strike>Rs&nbsp;<?php echo $original_price; ?></strike></span>

                                    
                                
                        </h4>
                        <h4><a href="product?ref=product_page&category=<?php echo $category; ?>&pid=<?php echo $pid; ?>&name=<?php echo $pname; ?>">
                            <b><?php echo $pname; ?></b></a>

                        </h4>
                        <p>
                            <span class=""><b>Condition:&nbsp;&nbsp;</b><?php echo $ccondition; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class=""><b>Negotiable:&nbsp;&nbsp;</b><?php echo $negotiable; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class=""><b>Views:&nbsp;&nbsp;</b><?php echo $hits; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <span class=""><div class="fb-like" data-href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div></span>
                        </p>    
                        <h4>Description:</h4><p><?php echo $description; ?></p>
                        
                    </div>
                    <hr>
                   <div class="caption-full">
                        
                        <h4>Seller Details:
                        </h4>
                      
                                
                                <b>Sold by:&nbsp;&nbsp;</b><?php echo $uname; ?></p>
                                <b>Email:&nbsp;&nbsp;</b><a href="mailto:<?php echo $uemail; ?>"><?php echo $uemail; ?></a><br>
                                <span><b>Course:&nbsp;&nbsp;</b><?php echo $course; ?></span>&nbsp;&nbsp;
                                <span><b>Year:&nbsp;&nbsp;</b><?php echo $year; ?></span>&nbsp;&nbsp;
                                <span><b>Branch:&nbsp;&nbsp;</b><?php echo $branch; ?></span><br>
                                <?php if ($phone_display=="yes") {
                                   ?>
                                   <b>Phone:&nbsp;&nbsp;</b><?php echo $phone; ?><br>
                                   <?php
                                }else{
                                    //nothing
                                }
                                ?>
                                
                                <span><b>Hostel:&nbsp;&nbsp;</b><?php echo $hostel; ?></span>&nbsp;&nbsp;
                                <span><b>Room no.:&nbsp;&nbsp;</b><?php echo $room; ?></span><br>
                                <?php
                                if ($fb_username != "") {
                                   ?>
                                   <b>Other Contacts:&nbsp;&nbsp;</b>
                                   <a target="_blank" href="https://www.facebook.com/<?php echo $fb_username; ?>">
                                    facebook</a>                            
                                   <?php
                                }
                                ?>
                                
                    </div>
                    <?php } ?>
                </div>

                

            </div>
            <?php } ?>

        </div>

    </div>

<?php
include("./inc/footer.php");
?>
