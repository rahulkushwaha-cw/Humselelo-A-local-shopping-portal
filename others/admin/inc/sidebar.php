<div class="col-md-3">
                <p class="lead">Shop by :</p>
                <div class="list-group">
                <center>
                    <?php
                    $params = array_merge($_GET, array("product_category" => "books"));
$new_query_string = http_build_query($params);
                    ?>
                    <a href="?<?php echo $new_query_string; ?>" class="list-group-item">Books</a>
                    
                    <?php
                    $params = array_merge($_GET, array("product_category" => "electronics"));
$new_query_string = http_build_query($params);
                    ?>
                    <a href="?<?php echo $new_query_string; ?>" class="list-group-item">Electronics</a>
                    
                    <?php
                    $params = array_merge($_GET, array("product_category" => "men"));
$new_query_string = http_build_query($params);
                    ?>
                    <a href="?<?php echo $new_query_string; ?>" class="list-group-item">Men</a>
                   
                    <?php
                    $params = array_merge($_GET, array("product_category" => "women"));
$new_query_string = http_build_query($params);
                    ?>
                    <a href="?<?php echo $new_query_string; ?>" class="list-group-item">Women</a>
                    
                    <?php
                    $params = array_merge($_GET, array("product_category" => "others"));
$new_query_string = http_build_query($params);
                    ?>
                    <a href="?<?php echo $new_query_string; ?>" class="list-group-item">Others</a>
                    </center>


                </div>
            
                <p class="lead">Sort by :</p>
                <div class="list-group">
                    <center>
                     <?php
                    $params = array_merge($_GET, array("sort_by" => "newest"));
$new_query_string = http_build_query($params);
                    ?>   
                    <a href="?<?php echo $new_query_string; ?>" class="list-group-item">Newest</a>
                    <?php
                    $params = array_merge($_GET, array("sort_by" => "oldest"));
$new_query_string = http_build_query($params);
                    ?>
                    <a href="?<?php echo $new_query_string; ?>" class="list-group-item">Oldest</a>
                    <?php
                    $params = array_merge($_GET, array("sort_by" => "price_low_to_high"));
$new_query_string = http_build_query($params);
                    ?>
                    <a href="?<?php echo $new_query_string; ?>" class="list-group-item">Price lowest to highest</a>
                    <?php
                    $params = array_merge($_GET, array("sort_by" => "price_high_to_low"));
$new_query_string = http_build_query($params);
                    ?>
                    <a href="?<?php echo $new_query_string; ?>" class="list-group-item">Price highest to lowest</a>
                    </center>
                </div>
                <div class="list-group">
                    <center>
                    <h4>Facebook Page:</h4>
                    </center>
                </div>
            </div>