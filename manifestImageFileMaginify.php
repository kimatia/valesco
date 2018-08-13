 
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
//we can now access the users details from $row['appropriatedbfield']
  

$id = $_GET['id'];
$manifestImageView = $mysqli->query("SELECT * FROM `tbl_manifestview` WHERE `stackID`='$id'");


    

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
<div id="particles-js" class="gradient"></div>
 <div class="count-particles">
              <span class="js-count-particles"></span>
            </div>

<div class="row">
  <?php
        $id = $_GET['id'];
        $stmt_select = $DB_con->prepare('SELECT * FROM tbl_manifestview WHERE stackID =:uid');
        $stmt_select->execute(array(':uid'=>$id));
        
    
    if($stmt_select->rowCount() > 0)
    {
        while($row=$stmt_select->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            

<center><h4><strong>Page <?php echo $row['id']; ?></strong></h4></center> 
   <a href="#" data-toggle="modal" data-target="#manifestModalImageMagnify" data-whatever2=<?php echo $row['id'];?> ><img src="upload/<?php echo $row['manifestImage']; ?>" class="img-rounded" width="350px" height="350px" /></a><hr>
   
   <?php
        }
    }

?>  
 </div> 
</body>
</html>
 