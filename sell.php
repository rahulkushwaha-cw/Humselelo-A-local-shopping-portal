<?php
include("./inc/header.php");
if (!isset($_SESSION['user_login'])) {
    header("Location: login?ref=navbar&redir=sell");
}
?>

<?php
if(isset($_POST['submit'])){
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


$category = mysql_real_escape_string($_POST['category']);
$itemname = mysql_real_escape_string($_POST['itemname']);
$ccondition = mysql_real_escape_string($_POST['ccondition']);
$original_price = mysql_real_escape_string($_POST['original_price']);
$listed_price = mysql_real_escape_string($_POST['listed_price']);
$description = mysql_real_escape_string($_POST['description']);
$negotiable = mysql_real_escape_string($_POST['negotiable']);
$keywords = mysql_real_escape_string($_POST['keywords']);

$verified = "no";

date_default_timezone_set('Asia/Calcutta');
$date_listed = date('Y/m/d H:i:s');


$char = "cdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $rand_dir = substr(str_shuffle($char), 0, 15);
            $id = rand(1000, 9999);
            $strn = "MM16";
            $pid = $strn.strtoupper( substr( $name,0,2 ) ).$id;
            //profile img upload script
if (isset($_FILES['itemimage'])){
if(((@$_FILES["itemimage"]["type"]=="image/jpeg") || (@$_FILES["itemimage"]["type"]=="image/png") || (@$_FILES["itemimage"]["type"]=="image/gif"))&&(@$_FILES["itemimage"] ["size"] <= 1048576)) //1megabyte
{
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$rand_dir_name = substr(str_shuffle($chars), 0, 15);
mkdir("userdata/item_pics/$rand_dir_name");
if (file_exists("userdata/item_pics/$rand_dir_name/".@$_FILES["itemimage"]["name"]))
{
echo @$_FILES["itemimage"] ["name"]." Aready exists";

}
else{
move_uploaded_file(@$_FILES["itemimage"]["tmp_name"], "userdata/item_pics/$rand_dir_name/".@$_FILES["itemimage"]["name"]);
//echo "Uploaded and stored in: userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"];
$itemimage = @$_FILES["itemimage"]["name"];
$query = mysql_query("INSERT INTO items (seller_uid,category,name,ccondition,original_price,listed_price,description,negotiable,image,verified,date_listed,keywords)VALUES('$uid','$category','$itemname','$ccondition','$original_price','$listed_price','$description','$negotiable','$rand_dir_name/$itemimage','$verified','$date_listed','$keywords')");

//echo"profile pic uploaded successfully!!!";
//header("Location: account_settings.php");

if($query){
                                        //mail script starts here
                                        // echo $email;
            $messageHTML = '

            <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Humselelo.Online Marketplace</title>
</head>
<body>

<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">
<p>Hi,</p>
<p><b>Admin</b></p>
<p><b>Somebody recently listed an item on Humselelo.Online <br>
</b></p>
<h3>Details are given below:</h3>
<p><b>Sold By:'.$name.'</b>
<b>Seller Email:'.$email.'</b>
<b>Item Category:'.$category.'</b>
<b>Item Name:'.$itemname.'</b>
<a href="http://humselelo.online/product"><img src="userdata/item_pics/'.$rand_dir_name.'/'.$itemimage.'" height="400" width="400" alt="'.$itemname.'"></a>
<b>Price:'.$listed_price.'</b>
<b>Condition:'.$ccondition.'</b>



</p>
  

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

<?php
$email="humselelo@gmail.com";
$name = "Admin";
 include("sell-mail.php"); 
//mail script ends here...
?>
<?php

                                        
                                        //echo "<script>alert('you have Listed your product!!!')</script>";
header("Location: dashboard?ref=mnnit_marketplace_16&key=$uid&personType=web_user&ref_id=$rand_dir&processType=reg_for_marketplace&script=allow");
                                        //echo "<script>window.top.location.href = 'dashboard?ref=mnnit_marketplace_16&key=$uid&personType=web_user&ref_id=$rand_dir&processType=reg_for_marketplace&script=allow';</script>";
                                    }
                                    else{
                                        echo "<script>alert('An error occurred please try again !!!')</script>";
                                        header("location: sell");
                                    }






}
}
else{
    
    
    echo "<script>alert('Invalid File! Your image must be no larger than 1Mb and it must be either a .jpg, .jpeg, .gif or .png')</script>";
    }
}

           

    
            

}
else {
   // echo $err;
       echo "<script>alert('CAPTCHA entries are incorrect')</script>";
        header("location:sell");
            // CAPTCHA entries are incorrect
        }

}
?>

<style type="text/css">
    .image-preview-input {
    position: relative;
    overflow: hidden;
    margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
</style>
    <!-- Page Content -->
    <div class="container">
    
    <center><h2>Sell with us in just few clicks.</h2></center>
        <div class="bs-example">
            <form class="form-horizontal" name="myform" action="" method="POST" enctype="multipart/form-data" onsubmit="DoSubmit();">
            <h4>Item Details</h4>
            <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Category</label>
                    <div class="col-xs-10">
                        <select class="form-control" name="category" required>
                        
                            <option value="books and notes">Books and Notes</option>
                            <option value="electronics">Electronics</option>
<option value="cycles_study_tables">Cycles and Study Tables</option>
                            <option value="coolers_fans_cfls">Coolers,Fans,CFLs</option>
                            <option value="mattresses_pillows_table_lamp">Mattresses,Pillows,Table Lamp</option>
                            <option value="lan_wires_spiltters_routers">Lan wires,Splitters,Routers</option>
<option value="others">Others</option>

                            
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Item Name</label>
                    <div class="col-xs-10">
                        <input type="text" name="itemname" class="form-control" maxlength="60"  placeholder="Enter your item name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="control-label col-xs-2">Upload Image</label>
                    <div class="col-xs-10">
                        <div class="input-group image-preview">
                            <input type="text" class="form-control image-preview-filename" placeholder="only .jpg and .png format are allowed with filesize less than equal to 1Mb"  disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                            <span class="input-group-btn">
                                <!-- image-preview-clear button -->
                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                </button>
                                <!-- image-preview-input -->
                                <div class="btn btn-default image-preview-input">
                                    <span class="glyphicon glyphicon-folder-open"></span>
                                    <span class="image-preview-input-title">Browse</span>
                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="itemimage" required/> <!-- rename it -->
                                </div>
                            </span>
                        </div>
                                            <p>(To reduce size of your image go to <a target="_blank" href="https://tinypng.com/">https://tinypng.com/</a>)</p>

                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Condition</label>
                    <div class="col-xs-10">
                        <label class="radio-inline"><input type="radio" value="nearly new" name="ccondition" checked>Nearly New</label>
                        <label class="radio-inline"><input type="radio" value="moderate" name="ccondition">Moderate</label>
                        <label class="radio-inline"><input type="radio" value="old" name="ccondition">Old</label>
                        <label class="radio-inline"><input type="radio" value="very old" name="ccondition">Very old</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Original price(INR)</label>
                    <div class="col-xs-10">
                        <input type="text" name="original_price" class="form-control"  placeholder="Enter original/new price in rs." required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Your price(INR)</label>
                    <div class="col-xs-10">
                        <input type="text" name="listed_price" class="form-control"  placeholder="Enter your price in rs." required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Description</label>
                    <div class="col-xs-10">
                        <textarea class="form-control" name="description" placeholder="Describe your item here For e.g. you can tell about the semester or branch in which the book is being used etc..." rows="5" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Keywords(separated by comma)</label>
                    <div class="col-xs-10">
                        <input type="text" name="keywords" class="form-control"  placeholder="keywords separated by comma which help in locating your product easily and search it easily For e.g. enter name of branch, semester applicable etc..." required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Negotiable</label>
                    <div class="col-xs-10">
                       <div class="radio">
                          <label><input type="radio" value="yes" name="negotiable" checked>yes</label>
                        
                          <label><input type="radio" value="no" name="negotiable">no</label>
                        </div>
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
                        <button type="submit" name="submit" class="btn btn-primary">Publish</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<script type="text/javascript">
    $(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
</script>
<?php
include("./inc/footer.php");
?>
<script type="text/javascript">
        function DoSubmit(){
  document.myform.submit.value = 'Processing...';
  return true;
}
        </script>
