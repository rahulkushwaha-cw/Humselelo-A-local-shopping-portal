<?php
include("./inc/header.php");
    $pid = mysql_real_escape_string($_GET['pid']);
    $userid = mysql_real_escape_string($_GET['uid']);
if (!isset($_SESSION['user_login'])) {
    header("Location: error");
}
elseif ($uid != $userid) {
    echo "<script>alert('You don't have rights to edit this product !!!')</script>";
    header("Location: error");
}else{
    $dquery = mysql_query("SELECT * FROM items WHERE seller_uid=$userid AND pid=$pid");
    while ($row=mysql_fetch_assoc($dquery)) {
$category = $row['category'];
$itemname = $row['name'];
$ccondition = $row['ccondition'];
$original_price = $row['original_price'];
$listed_price = $row['listed_price'];
$description = $row['description'];
$negotiable = $row['negotiable'];
$pimage = $row['image'];
$keywords = $row['keywords'];
$hits = $row['hits'];
$verified = "yes";
$pfimage = "userdata/item_pics/".$pimage;
date_default_timezone_set('Asia/Calcutta');
$date_listed = date('Y/m/d H:i:s');
    }
}
    


?>


<?php
include("./inc/connection.php");
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


$dcategory = mysql_real_escape_string($_POST['category']);
$ditemname = mysql_real_escape_string($_POST['itemname']);
$dccondition = mysql_real_escape_string($_POST['ccondition']);
$doriginal_price = mysql_real_escape_string($_POST['original_price']);
$dlisted_price = mysql_real_escape_string($_POST['listed_price']);
$ddescription = mysql_real_escape_string($_POST['description']);
$dnegotiable = mysql_real_escape_string($_POST['negotiable']);
$dkeywords = mysql_real_escape_string($_POST['keywords']);
//$dimagev = mysql_real_escape_string($_POST['itemimage']);
$dverified = "no";

date_default_timezone_set('Asia/Calcutta');
$ddate_listed = date('Y/m/d H:i:s');


$char = "cdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $rand_dir = substr(str_shuffle($char), 0, 15);
            $id = rand(1000, 9999);
            $strn = "MM16";
            $ppid = $strn.strtoupper( substr( $name,0,2 ) ).$id;
            //profile img upload script
if (isset($_FILES['itemimage']) && $_FILES['itemimage']['error'] != UPLOAD_ERR_NO_FILE){
    //echo "<script>alert('with img great!!!')</script>";
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
$ditemimage = @$_FILES["itemimage"]["name"];
//$query = mysql_query("UPDATE  items SET (name,ccondition,original_price,listed_price,description,negotiable,image,verified,date_listed,keywords)VALUES($itemname','$ccondition','$original_price','$listed_price','$description','$negotiable','$rand_dir_name/$itemimage','$verified','$date_listed','$keywords') WHERE seller_uid='$uid' AND pid='$pid' ");
$query = mysql_query(" UPDATE  items SET name='$ditemname', ccondition='$dccondition', original_price='$doriginal_price', listed_price='$dlisted_price', description='$ddescription', negotiable='$dnegotiable',image='$rand_dir_name/$ditemimage', verified='$dverified', date_listed='$ddate_listed', keywords='$dkeywords' WHERE pid='$pid'");

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
<p><b>Somebody recently updated an item on mnnit market. <br>
</b></p>
<h3>Details are given below:</h3>
<p><b>Seller Name:'.$name.'</b>
<b>Seller Email:'.$email.'</b>
<b>Item Category:'.$dcategory.'</b>
<b>Item Name:'.$ditemname.'</b>
<a href="http://humselelo.online/product?ref=email&category='.$dcategory.'&pid='.$pid.'&name='.$ditemname.'"><img src="http://humselelo.online/userdata/item_pics/'.$rand_dir_name.'/'.$ditemimage.'" height="150" width="340" alt="'.$ditemname.'"></a>
<b>Price:'.$dlisted_price.'</b>
<b>Condition:'.$dccondition.'</b>



</p>
  

 <br>

</p>
  
   <div align="center">
    <a href="http://humselelo.online/">
      <img src="https://scontent.fdel1-2.fna.fbcdn.net/hphotos-xaf1/v/t1.0-9/1689622_1692710034330963_1508820026977420376_n.jpg?oh=07b3e5691de4f3bdc717db2e135bf60e&oe=578CAD3F"  alt="Humselelo Marketplace"></a>
  <br>
  
  <h3>Follow us on:</h3>
    <a href="https://www.facebook.com/humselelo.online/">
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
 include("edititem-mail.php"); 
//mail script ends here...
?>
<?php

                                        
                                        //echo "<script>alert('you have successfully updated your product!!!')</script>";
    header("Location: dashboard?ref=mnnit_marketplace_16&key=$uid&personType=web_user&ref_id=$rand_dir&processType=reg_for_marketplace&script=allow");
                                        //echo "<script>window.top.location.href = 'dashboard?ref=mnnit_marketplace_16&key=$uid&personType=web_user&ref_id=$rand_dir&processType=reg_for_marketplace&script=allow';</script>";
                                    }
                                    else{
                                        echo "<script>alert('An error occurred please try again !!!')</script>";
                                        header("location: dashboard");
                                    }







}

}
else{
    
    echo "<script>alert('Invalid File! Your image must be no larger than 1Mb and it must be either a .jpg, .jpeg, .gif or .png')</script>";
    }


}
else{

//echo "<script>alert('without img great $original_price !!!')</script>";
$itemimage = $pimage;
$query = mysql_query(" UPDATE  items SET name='$ditemname', ccondition='$dccondition', original_price='$doriginal_price', listed_price='$dlisted_price', description='$ddescription', negotiable='$dnegotiable', verified='$dverified', date_listed='$ddate_listed', keywords='$dkeywords' WHERE pid='$pid'");
//echo "<script>alert('success going $pid!!!')</script>";
//echo"profile pic uploaded successfully!!!";
//header("Location: account_settings.php");

if($query){
                                        //mail script starts here
            //echo "<script>alert('query success!!!')</script>";                            // echo $email;
            $messageHTML = '

            <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>MNNIT Marketplace</title>
</head>
<body>

<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">
<p>Hi,</p>
<p><b>Admin</b></p>
<p><b>Somebody recently updated an item on mnnit market. <br>
</b></p>
<h3>Details are given below:</h3>
<p><b>Seller Name:'.$name.'</b>
<b>Seller Email:'.$email.'</b>
<b>Item Category:'.$dcategory.'</b>
<b>Item Name:'.$ditemname.'</b>
<a href="http://humselelo.online/product?ref=email&category='.$dcategory.'&pid='.$pid.'&name='.$ditemname.'"><img src="http://humselelo.online/'.$pfimage.'" height="150" width="340" alt="'.$ditemname.'"></a>
<b>Price:'.$dlisted_price.'</b>
<b>Condition:'.$dccondition.'</b>


</p>
  

 <br>

</p>
  
   <div align="center">
    <a href="http://humselelo.online/">
      <img src="https://scontent.fdel1-2.fna.fbcdn.net/hphotos-xaf1/v/t1.0-9/1689622_1692710034330963_1508820026977420376_n.jpg?oh=07b3e5691de4f3bdc717db2e135bf60e&oe=578CAD3F"  alt="Humselelo Marketplace"></a>
  <br>
  
  <h3>Follow us on:</h3>
    <a href="https://www.facebook.com/humselelo.online/">
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
 include("edititem-mail.php"); 
//mail script ends here...
?>
<?php

                                        
                                        //echo "<script>alert('you have successfully updated your product!!!')</script>";
              header("Location: dashboard?ref=mnnit_marketplace_16&key=$uid&personType=web_user&ref_id=$rand_dir&processType=reg_for_marketplace&script=allow");
                                        //echo "<script>window.top.location.href = 'dashboard?ref=mnnit_marketplace_16&key=$uid&personType=web_user&ref_id=$rand_dir&processType=reg_for_marketplace&script=allow';</script>";
                                    }
                                    else{
                                        echo "<script>alert('An error occurred please try again !!!')</script>";
                                        header("location: dashboard");
                                    }














}

           

    
            

}
else {
   // echo $err;
       echo "<script>alert('CAPTCHA entries are incorrect')</script>";
        header("location:dashboard");
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
   
    <center><h2>Edit your product here. Its easy and simple.</h2></center>
        <div class="bs-example">
            <form class="form-horizontal" name="myform" action="" method="POST" enctype="multipart/form-data" onsubmit="DoSubmit();">
            <h4>Item Details</h4>
            <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Category</label>
                    <div class="col-xs-10">
                        <input type="text" name="category" class="form-control" value="<?php echo $category; ?>" disabled  required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Item Name</label>
                    <div class="col-xs-10">
                        <input type="text" name="itemname" class="form-control" value="<?php echo $itemname; ?>" maxlength="60" placeholder="Enter your item name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Current Image</label>
                    <div class="col-xs-10">
                        <img src="<?php echo $pfimage; ?>" height="250" width="250">
                    </div>
                </div>
                <div class="form-group">
                    

                    <label for="inputPassword" class="control-label col-xs-2">Upload New Image(else leave it to show old image)</label>
                    <div class="col-xs-10">
                        <div class="input-group image-preview">
                            <input type="text" class="form-control image-preview-filename"  placeholder="only .jpg and .png format are allowed with filesize less than equal to 1Mb"  disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                            <span class="input-group-btn">
                                <!-- image-preview-clear button -->
                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                </button>
                                <!-- image-preview-input -->
                                <div class="btn btn-default image-preview-input">
                                    <span class="glyphicon glyphicon-folder-open"></span>
                                    <span class="image-preview-input-title">Browse</span>
                                    <input type="file" accept="image/png, image/jpeg, image/gif"  name="itemimage" /> <!-- rename it -->
                                </div>
                            </span>
                        </div>
                                            <p>(To reduce size of your image go to <a target="_blank" href="https://tinypng.com/">https://tinypng.com/</a>)</p>

                       <!-- <div class="popover fade bottom in" role="tooltip" id="popover600564" style="top: 34px; left: 349.5px; display: block;"><div class="arrow" style="left: 50%;"></div><h3 class="popover-title"><strong>Preview</strong><button type="button" id="close-preview" style="font-size: initial;" class="close pull-right">x</button></h3><div class="popover-content"><img id="dynamic" src="" style="width: 250px; height: 200px;"></div></div>-->
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Condition</label>
                    <div class="col-xs-10">
                        <label class="radio-inline"><input type="radio" value="nearly new" <?php if ($ccondition=="nearly new") {
                            echo "checked";
                        } ?> name="ccondition">Nearly New</label>
                        <label class="radio-inline"><input type="radio" value="moderate" <?php if ($ccondition=="moderate") {
                            echo "checked";
                        } ?> name="ccondition">Moderate</label>
                        <label class="radio-inline"><input type="radio" value="old" <?php if ($ccondition=="old") {
                            echo "checked";
                        } ?> name="ccondition">Old</label>
                        <label class="radio-inline"><input type="radio" value="very old" <?php if ($ccondition=="very old") {
                            echo "checked";
                        } ?> name="ccondition">Very old</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Original price(INR)</label>
                    <div class="col-xs-10">
                        <input type="text" name="original_price" class="form-control" value="<?php echo $original_price; ?>"  placeholder="Enter original/new price in rs." required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Your price(INR)</label>
                    <div class="col-xs-10">
                        <input type="text" name="listed_price" class="form-control" value="<?php echo $listed_price; ?>"  placeholder="Enter your price in rs." required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Description</label>
                    <div class="col-xs-10">
                        <textarea class="form-control" name="description"  placeholder="Describe your item here..." rows="5" required><?php echo $description; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Keywords(separated by comma)</label>
                    <div class="col-xs-10">
                        <input type="text" name="keywords" class="form-control" value="<?php echo $keywords; ?>" placeholder="keywords separated by comma which help in locating your product easily and search it easily..." required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-2">Negotiable</label>
                    <div class="col-xs-10">
                       <div class="radio">
                          <label><input type="radio" value="yes" <?php if ($negotiable=="yes") {
                            echo "checked";
                        } ?> name="negotiable" >yes</label>
                        
                          <label><input type="radio" value="no"  <?php if ($negotiable=="no") {
                            echo "checked";
                        } ?> name="negotiable">no</label>
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
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
	