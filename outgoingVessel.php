 
<?php
date_default_timezone_set("Africa/Nairobi");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'dbconfig.php'; 
//get the logged in user credentials and validate
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
 $user_home->redirect('login.php');
}
$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$id=$_GET['id'];
//we can now access the users details from $row['appropriatedbfield']
$posttime=date("h:i A.",time());
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

     <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Begin emoji-picker Stylesheets -->
    <link href="lib/css/emoji.css" rel="stylesheet">
    <!-- End emoji-picker Stylesheets -->
    <!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<link rel="stylesheet" href="css/lightbox.min.css">
  <script src="js/lightbox-plus-jquery.min.js"></script>

  <link rel="shortcut icon" href="favicon.ico"> 
    <link rel="stylesheet" type="text/css" href="css/component1.css" />
    <script src="js/modernizr.custom.js"></script>
 
</head>
<body style="background-image: url(images/8.jpg); opacity: 0.9; " onload="startTime()" ng-app='myapp'>

   <div id="form">
       
         <form method="post" id="uploadForm"  enctype="multipart/form-data" class="form-horizontal">
         <div class="modal-body">
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;Outgoing Vessel</span>
    <input class="form-control "  type="text" name="outgoingVessel"  id="manifest"  placeholder="Enter Outgoing Vessel" >

</div>
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;Booking Number</span>
<input class="form-control " type="text" name="bookingNumber" id="number"  placeholder="Enter booking Number" >

</div>
<div class="form-group input-group" >
<span class="input-group-addon">&nbsp;&nbsp;&nbsp;Booking Copy&nbsp;&nbsp;</span>
<input  type="file" name="user_image" id="file" class="btn btn-default form-control" accept="image/*" />
</div>
 <?
$posttime=date("h:i A.",time());
 ?>
<input class="form-control " type="hidden" value="<?php echo $posttime; ?>" name="bookingDate" id="number"  placeholder="Enter Booking Date" >
</div>
<input class="form-control " type="hidden" name="stackIdentity" id="number" value="<?php echo $id; ?>" placeholder="Enter stack Number" >
<div class="row">
  <div class="col-md-5">
     <script src="js/jquery.min.js"></script>
<script>
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            //$('#uploadForm + img').remove();
            //$('#uploadForm').after('<img src="'+e.target.result+'" width="450" height="300"/>');
            $('#uploadForm + embed').remove();
            $('#uploadForm').after('<embed src="'+e.target.result+'" width="100" height="100">');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#file").change(function () {
    filePreview(this);
});
</script>
  </div>
  <div class="col-md-7">
    <button type="submit" name="btnsavevessel" value="send" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>save
        </button>
  </div>
</div>

        </div>
        </form>
       
    </div>
</body>
</html>
 