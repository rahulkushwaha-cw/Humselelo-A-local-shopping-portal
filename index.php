<?php
include("./inc/header.php");
?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <?php
include("./inc/sidebar.php");
?>

            <div class="col-md-9">
                <?php
                if (isset($_GET['submit'])) {
                   $sliderdisplay = "no";
                }else{
                    $sliderdisplay = "yes";
                    ?>
                    <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="img/1.jpg" width="800" height="300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/4.png" width="800" height="300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/5.jpg" width="800" height="300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/3.png" width="800" height="300" alt="">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                    <?php
                }
                ?>
               <!-- <input type="text" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Type your Query">-->
                <form action="" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for items here&hellip;" required>
                    <span class="input-group-btn">
                        <button type="submit" name="submit" value="submit" class="btn btn-default">Search</button>
                    </span>
                </div>
                </form>
                
                <br>
                <div class="row">
                <?php
                if (isset($_GET['product_category']) ) {
                    $product_category = mysql_real_escape_string($_GET['product_category']);
                    if ($product_category == "books and notes") {
                        $category = "books and notes";
                    }
                    if ($product_category == "electronics") {
                        $category = "electronics";
                    }
                    if ($product_category == "cycles_study_tables") {
                        $category = "cycles_study_tables";
                    }
                    if ($product_category == "coolers_fans_cfls") {
                        $category = "coolers_fans_cfls";
                    }
                    if ($product_category == "mattresses_pillows_table_lamp") {
                        $category = "mattresses_pillows_table_lamp";
                    }
if ($product_category == "lan_wires_splitters_routers") {
                        $category = "lan_wires_splitters_routers";
                    }
if ($product_category == "others") {
                        $category = "others";
                    }
                }else{
                    $category = "";
                }
                if (isset($_GET['sort_by']) ) {
                    $sort_by = mysql_real_escape_string($_GET['sort_by']);
                    if ($sort_by == "newest") {
                        $ordertype = "date_listed";
                        $srt = "DESC";
                    }
                    if ($sort_by == "oldest") {
                        $ordertype = "date_listed";
                        $srt = "ASC";
                    }
                    if ($sort_by == "price_low_to_high") {
                        $ordertype = "listed_price";
                        $srt = "ASC";
                    }
                    if ($sort_by == "price_high_to_low") {
                        $ordertype = "listed_price";
                        $srt = "DESC";
                    }
                }else{
                    $ordertype = "RAND()";
                    $srt = "DESC";
                }
                if (isset($_GET['submit'])) {
                   $searchquery = mysql_real_escape_string($_GET['search']);
                   if ($category==""){
                     $dquery = mysql_query("SELECT * FROM items WHERE name LIKE '%$searchquery%' OR keywords LIKE '%$searchquery%' OR category LIKE '%$searchquery%'  ORDER BY $ordertype $srt" );
                   }else{
                   $dquery = mysql_query("SELECT * FROM items WHERE category='$category' AND name LIKE '%$searchquery%' OR keywords LIKE '%$searchquery%' OR category LIKE '%$searchquery%'  ORDER BY $ordertype $srt" );
               }
                   $searchnum = mysql_num_rows($dquery);
                }else{
                    $searchnum=1;
                    if ($category=="") {
                       $dquery = mysql_query("SELECT * FROM items ORDER BY $ordertype $srt");
                    }else{
                    $dquery = mysql_query("SELECT * FROM items WHERE category='$category' ORDER BY $ordertype $srt");
                }
                }
                
                if (!$searchnum) {
                    ?>
                    <center>
                    <h1>Sorry !!!</h1>
                    <h4>NO result Found. Try searching with different string.</h4>
                    </center>
                    <?php
                }else{
                while ($drow = mysql_fetch_array($dquery)) {
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
                     if ($verified=="yes") {
                      

                     ?>
                     
                     <div class="col-sm-4 col-lg-4 col-md-4">
                        <a href="product?ref=home_page&category=<?php echo $category; ?>&pid=<?php echo $pid; ?>&name=<?php echo $pname; ?>">
                        <div class="thumbnail">
                            <img class="imgindex" src="userdata/item_pics/<?php echo $image; ?>" alt="<?php echo $pname; ?>">
                            <div class="caption">
                                
                                <p><a href="product?ref=home_page&category=<?php echo $category; ?>&pid=<?php echo $pid; ?>&name=<?php echo $pname; ?>"><b><?php echo $pname; ?></b></a>
                                </p>
                                <p><b>Condition:&nbsp;&nbsp;</b><?php echo $ccondition; ?><br>
                                <b>Negotiable:&nbsp;&nbsp;</b><?php echo $negotiable; ?><br>
                                <b>Sold by:&nbsp;&nbsp;</b><?php echo $uname; ?></p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><a href="product?ref=home_page&category=<?php echo $category; ?>&pid=<?php echo $pid; ?>&name=<?php echo $pname; ?>"><b>Buy</b></a></p>
                                <p>
                                    <span class=""><b>Rs&nbsp;<?php echo $listed_price; ?></b></span>
                                    <span class=""><strike>Rs&nbsp;<?php echo $original_price; ?></strike></span>
                                    
                                </p>
                            </div>
                            
                        </div></a>
                    </div>
                     <?php }

                }}
                ?>
                
                   
                   
                    


                    

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

<?php
include("./inc/footer.php");
?>