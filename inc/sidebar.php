<div class="col-md-3">
                <p class="lead">Shop by :</p>
                <div class="list-group">
                <center>
                    <?php
                    $params = array_merge($_GET, array("product_category" => "books and notes"));
$new_query_string = http_build_query($params);
                    ?>
                    <a href="?<?php echo $new_query_string; ?>" class="list-group-item">Books and Notes</a>
                    
                    <?php
                    $params = array_merge($_GET, array("product_category" => "electronics"));
$new_query_string = http_build_query($params);
                    ?>
                    <a href="?<?php echo $new_query_string; ?>" class="list-group-item">Electronics</a>
<?php
                    $params = array_merge($_GET, array("product_category" => "cycles_study_tables"));
$new_query_string = http_build_query($params);
                    ?>
                    <a href="?<?php echo $new_query_string; ?>" class="list-group-item">Cycles and Study Tables</a>
                    
                    <?php
                    $params = array_merge($_GET, array("product_category" => "coolers_fans_cfls"));
$new_query_string = http_build_query($params);
                    ?>
                    <a href="?<?php echo $new_query_string; ?>" class="list-group-item">Coolers, Fans, CFLs</a>
<?php
                    $params = array_merge($_GET, array("product_category" => "mattresses_pillows_table_lamp"));
$new_query_string = http_build_query($params);
                    ?>
                    <a href="?<?php echo $new_query_string; ?>" class="list-group-item">Mattresses, Pillows, Table Lamp</a>
                    
                    <?php
                    $params = array_merge($_GET, array("product_category" => "lan_wires_splitters_routers"));
$new_query_string = http_build_query($params);
                    ?>
                    <a href="?<?php echo $new_query_string; ?>" class="list-group-item">Lan wires, Splitters, Routers</a>
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
                   <div class="fb-page" data-href="https://www.facebook.com/humselelo.online" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/humselelo.online"><a href="https://www.facebook.com/humselelo.online">Humselelo</a></blockquote></div></div>
                </div>
            </div>
