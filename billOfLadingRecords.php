

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="postscriptt.js"></script>

<script>
function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
  
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}


</script>
<script>
  var timeruser=10;
  var user="";
  $(function (){
    function inTime(){
      setTimeout(inTime, 1000);
 
      if(timeruser==10){
  
       $.post("userFetch.php",{userload:user},function(data){
        $(".userfetch h5").html(data);
       })
       timeruser=11;
       clearTimeout(inTime); 
      }
      timeruser--;
    }

    inTime(); 
  });

</script>
<script>
  var timerpic=10;
  var pic="";
  $(function (){
    function picTime(){
      setTimeout(picTime, 1000);
 
      if(timerpic==10){
  
       $.post("picFetch.php",{picload:pic},function(data){
        $(".picFetch h5").html(data);
       })
       timerpic=11;
       clearTimeout(picTime); 
      }
      timerpic--;
    }

    picTime(); 
  });

</script>
<script>
  var action=10;
  var acts="";
  $(function (){
    function actionTime(){
      setTimeout(actionTime, 1000);
 
      if(action==10){
  
       $.post("actionFetch.php",{acting:acts},function(data){
        $(".actionFetch h5").html(data);
       })
       action=11;
       clearTimeout(actionTime); 
      }
      action--;
    }

    actionTime(); 
  });

</script>
<script>
  var manifestTimer=10;
  var manifest="";
  $(function (){
    function manTime(){
      setTimeout(manTime, 1000);
 
      if(manifestTimer==10){
  
       $.post("bol.php",{userload:manifest},function(data){
        $(".billOfLading h5").html(data);
       })
       manifestTimer=11;
       clearTimeout(manTime); 
      }
      manifestTimer--;
    }

    manTime(); 
  });

</script>
<!-- Script -->


     
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
  

    if (isset($_POST['btnSaveBolTranshipment'])) {


    $billofladingid=$_POST['billofladingid'];
    $manifestfilenumber=$_POST['manifestfilenumber'];
    $manifesttype=$_POST['manifestType'];
    $billofladingnumbertotal=$_POST['billofladingnumbertotal'];
    $billofladingname=$_POST['billOfLadingName'];
    $arrivalvessel=$_POST['arrivalVessel'];
    $voyagenumber=$_POST['voyageNumber'];
    $arrivaldate=$_POST['arrivalDate'];
    $containernumber=$_POST['containerNumber'];
    $description=$_POST['description'];
    $sealnumber=$_POST['sealNumber'];
    $postuser=$_POST['postUser'];
    $posttime=date("h:i A.",time());
        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];

        if(empty($billOfLadingName)){
            $errMSG = "Please Enter bill of lading name.";
        }
        if(empty($arrivalvessel)){
            $errMSG = "Please Enter arrival vessel.";
        }
        else if(empty($voyagenumber)){
            $errMSG = "Please Enter voyage number.";
        }
        else if(empty($arrivaldate)){
            $errMSG = "Please Enter Your arrival date.";
        }
        else if(empty($containernumber)){
            $errMSG = "Please Enter Your More container number.";
        }
        else if(empty($description)){
            $errMSG = "Please Enter Your Hover description.";
        }
        else if(empty($sealnumber)){
            $errMSG = "Please Enter Your Hover sealnumber.";
        }
        else if(empty($imgFile)){
            $errMSG = "Please Select Image File.";
        }
        else
        {
            $upload_dir = 'upload/'; // upload directory

            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

            // rename uploading image
            $userpic = rand(1000,1000000).".".$imgExt;

            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){
                // Check file size '20MB'
                if($imgSize < 20000000)             {
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                }
                else{
                    $errMSG = "Sorry, your file is too large.";
                }
            }
            else{
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        }

  $SQL = $DBcon->prepare("INSERT INTO tbl_bol(bolID,manifestName,manifestFileNumber,bolNumber,relatedBolTotalNumber,arrivalVesselName,voyageNumber,dateOfArrival,containerNumber,description,sealNumber,bolFile,postUser,postDate) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

  
    if($SQL){
      $SQL->bind_param('ssssssssssssss', $billofladingid,$manifesttype,$manifestfilenumber,$billofladingname,$billofladingnumbertotal,$arrivalvessel,$voyagenumber,$arrivaldate,$containernumber,$description,$sealnumber,$userpic,$postuser,$posttime);
      $SQL->execute();
     //logs

$billofladingid=$_POST['billofladingid'];
$manifestfilenumber=$_POST['manifestfilenumber'];
$manifesttype=$_POST['manifestType'];
$billofladingnumbertotal=$_POST['billofladingnumbertotal'];
$billofladingname=$_POST['billOfLadingName'];
$arrivalvessel=$_POST['arrivalVessel'];
$voyagenumber=$_POST['voyageNumber'];
$arrivaldate=$_POST['arrivalDate'];
$containernumber=$_POST['containerNumber'];
$description=$_POST['description'];
$sealnumber=$_POST['sealNumber'];
$postuser=$row['userName'];
$postuserID=$row['userID'];
$posttime=date("h:i A.",time());
$txt1="User";
$txt2="Inserted bill of lading file";
$txt3="of";
$txt5="which arrived on vessel";
$txt4="with";
$txt6="voyage number and";
$txt7="seal number on";
$manifestId=$_GET['manifestId'];
$actions= $txt1 . " " . $postuser." ".$txt2." ".$billofladingname." ".$txt3." ".$manifestfilenumber." ".$txt5." ".$arrivalvessel." ".$txt4." ".$voyagenumber." ".$txt6." ".$sealnumber." ".$txt7." ".$posttime;
$SQL1 = $DBcon->prepare("INSERT INTO tbl_manifestLogs(stackID,userID,postUser,action, postDate) VALUES(?,?,?,?,?)");
$SQL1->bind_param('iisss',$manifestId,$postuserID,$postuser,$actions,$posttime);
$SQL1->execute();
   header("location: adhome.php");  
      echo "<div class='alert alert-success'>
              <button class='close' data-dismiss='alert'>&times;</button>
              <strong>Success!</strong>.BOL saved!.</div>";

            $id = $billofladingid;
            $display=1;
           
            $stmt = $DB_con->prepare('UPDATE tbl_manifest SET display=:udisplay WHERE id=:uid');
            $stmt->bindParam(':udisplay',$display);
            $stmt->bindParam(':uid',$id);

            $stmt->execute();
  

    }else{
       echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Error while saving bol
           </div>";
  }

}

 if (isset($_POST['btnSaveBolVerify'])) {


    $billofladingid=$_POST['billofladingid'];
    $manifestfilenumber=$_POST['manifestfilenumber'];
    $manifesttype=$_POST['manifestType'];
    $billofladingnumbertotal=$_POST['billofladingnumbertotal'];
    $billofladingname=$_POST['billOfLadingName'];
    $arrivalvessel=$_POST['arrivalVessel'];
    $voyagenumber=$_POST['voyageNumber'];
    $arrivaldate=$_POST['arrivalDate'];
    $containernumber=$_POST['containerNumber'];
    $description=$_POST['description'];
    $sealnumber=$_POST['sealNumber'];
    $postuser=$_POST['postUser'];
    $posttime=date("h:i A.",time());
        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];

        if(empty($billOfLadingName)){
            $errMSG = "Please Enter bill of lading name.";
        }
        if(empty($arrivalvessel)){
            $errMSG = "Please Enter arrival vessel.";
        }
        else if(empty($voyagenumber)){
            $errMSG = "Please Enter voyage number.";
        }
        else if(empty($arrivaldate)){
            $errMSG = "Please Enter Your arrival date.";
        }
        else if(empty($containernumber)){
            $errMSG = "Please Enter Your More container number.";
        }
        else if(empty($description)){
            $errMSG = "Please Enter Your Hover description.";
        }
        else if(empty($sealnumber)){
            $errMSG = "Please Enter Your Hover sealnumber.";
        }
        else if(empty($imgFile)){
            $errMSG = "Please Select Image File.";
        }
        else
        {
            $upload_dir = 'upload/'; // upload directory

            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

            // rename uploading image
            $userpic = rand(1000,1000000).".".$imgExt;

            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){
                // Check file size '20MB'
                if($imgSize < 20000000)             {
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                }
                else{
                    $errMSG = "Sorry, your file is too large.";
                }
            }
            else{
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        }

  $SQL = $DBcon->prepare("INSERT INTO tbl_verificationbols(bolID,manifestName,bolNumber,relatedBolTotalNumber,arrivalVesselName,voyageNumber,dateOfArrival,containerNumber,description,sealNumber,bolFile,postUser,postDate) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");

  
    if($SQL){
      $SQL->bind_param('sssssssssssss', $billofladingid,$manifesttype,$billofladingname,$billofladingnumbertotal,$arrivalvessel,$voyagenumber,$arrivaldate,$containernumber,$description,$sealnumber,$userpic,$postuser,$posttime);
      $SQL->execute();
     //logs

$billofladingid=$_POST['billofladingid'];
$manifestfilenumber=$_POST['manifestfilenumber'];
$manifesttype=$_POST['manifestType'];
$billofladingnumbertotal=$_POST['billofladingnumbertotal'];
$billofladingname=$_POST['billOfLadingName'];
$arrivalvessel=$_POST['arrivalVessel'];
$voyagenumber=$_POST['voyageNumber'];
$arrivaldate=$_POST['arrivalDate'];
$containernumber=$_POST['containerNumber'];
$description=$_POST['description'];
$sealnumber=$_POST['sealNumber'];
$postuser=$row['userName'];
$postuserID=$row['userID'];
$posttime=date("h:i A.",time());
$txt1="User";
$txt2="Inserted bill of lading file";
$txt3="of";
$txt5="which arrived on vessel";
$txt4="with";
$txt6="voyage number and";
$txt7="seal number on";
$actions= $txt1 . " " . $postuser." ".$txt2." ".$billofladingname." ".$txt3." ".$manifestfilenumber." ".$txt5." ".$arrivalvessel." ".$txt4." ".$voyagenumber." ".$txt6." ".$sealnumber." ".$txt7." ".$posttime;
$SQL1 = $DBcon->prepare("INSERT INTO tbl_verificationlogs(userIdentity,postUser,action, postDate) VALUES(?,?,?,?)");
$SQL1->bind_param('isss',$postuserID,$postuser,$actions,$posttime);
$SQL1->execute();
   header("location:adhome.php?page=verification");  
      echo "<div class='alert alert-success'>
              <button class='close' data-dismiss='alert'>&times;</button>
              <strong>Success!</strong>.BOL saved!.</div>";

            $id = $billofladingid;
            $display=1;
           
            $stmt = $DB_con->prepare('UPDATE tbl_verification SET display=:udisplay WHERE id=:uid');
            $stmt->bindParam(':udisplay',$display);
            $stmt->bindParam(':uid',$id);

            $stmt->execute();
  

    }else{
       echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Error while saving bol
           </div>";
  }

}
if (isset($_POST['btnSaveBolReexport'])) {


    $billofladingid=$_POST['billofladingid'];
    $manifestfilenumber=$_POST['manifestfilenumber'];
    $manifesttype=$_POST['manifestType'];
    $billofladingnumbertotal=$_POST['billofladingnumbertotal'];
    $billofladingname=$_POST['billOfLadingName'];
    $arrivalvessel=$_POST['arrivalVessel'];
    $voyagenumber=$_POST['voyageNumber'];
    $arrivaldate=$_POST['arrivalDate'];
    $containernumber=$_POST['containerNumber'];
    $description=$_POST['description'];
    $sealnumber=$_POST['sealNumber'];
    $postuser=$_POST['postUser'];
    $posttime=date("h:i A.",time());
        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];

        if(empty($billOfLadingName)){
            $errMSG = "Please Enter bill of lading name.";
        }
        if(empty($arrivalvessel)){
            $errMSG = "Please Enter arrival vessel.";
        }
        else if(empty($voyagenumber)){
            $errMSG = "Please Enter voyage number.";
        }
        else if(empty($arrivaldate)){
            $errMSG = "Please Enter Your arrival date.";
        }
        else if(empty($containernumber)){
            $errMSG = "Please Enter Your More container number.";
        }
        else if(empty($description)){
            $errMSG = "Please Enter Your Hover description.";
        }
        else if(empty($sealnumber)){
            $errMSG = "Please Enter Your Hover sealnumber.";
        }
        else if(empty($imgFile)){
            $errMSG = "Please Select Image File.";
        }
        else
        {
            $upload_dir = 'upload/'; // upload directory

            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

            // rename uploading image
            $userpic = rand(1000,1000000).".".$imgExt;

            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){
                // Check file size '20MB'
                if($imgSize < 20000000)             {
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                }
                else{
                    $errMSG = "Sorry, your file is too large.";
                }
            }
            else{
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        }

  $SQL = $DBcon->prepare("INSERT INTO tbl_reexportbols(bolID,manifestName,bolNumber,relatedBolTotalNumber,arrivalVesselName,voyageNumber,dateOfArrival,containerNumber,description,sealNumber,bolFile,postUser,postDate) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");

  
    if($SQL){
      $SQL->bind_param('sssssssssssss', $billofladingid,$manifesttype,$billofladingname,$billofladingnumbertotal,$arrivalvessel,$voyagenumber,$arrivaldate,$containernumber,$description,$sealnumber,$userpic,$postuser,$posttime);
      $SQL->execute();
     //logs

$billofladingid=$_POST['billofladingid'];
$manifestfilenumber=$_POST['manifestfilenumber'];
$manifesttype=$_POST['manifestType'];
$billofladingnumbertotal=$_POST['billofladingnumbertotal'];
$billofladingname=$_POST['billOfLadingName'];
$arrivalvessel=$_POST['arrivalVessel'];
$voyagenumber=$_POST['voyageNumber'];
$arrivaldate=$_POST['arrivalDate'];
$containernumber=$_POST['containerNumber'];
$description=$_POST['description'];
$sealnumber=$_POST['sealNumber'];
$postuser=$row['userName'];
$postuserID=$row['userID'];
$posttime=date("h:i A.",time());
$txt1="User";
$txt2="Inserted bill of lading file";
$txt3="of";
$txt5="which arrived on vessel";
$txt4="with";
$txt6="voyage number and";
$txt7="seal number on";
$actions= $txt1 . " " . $postuser." ".$txt2." ".$billofladingname." ".$txt3." ".$manifestfilenumber." ".$txt5." ".$arrivalvessel." ".$txt4." ".$voyagenumber." ".$txt6." ".$sealnumber." ".$txt7." ".$posttime;
$SQL1 = $DBcon->prepare("INSERT INTO tbl_reexportlogs(userIdentity,postUser,action, postDate) VALUES(?,?,?,?)");
$SQL1->bind_param('isss',$postuserID,$postuser,$actions,$posttime);
$SQL1->execute();
   header("location:adhome.php?page=re-export");  
      echo "<div class='alert alert-success'>
              <button class='close' data-dismiss='alert'>&times;</button>
              <strong>Success!</strong>.BOL saved!.</div>";

            $id = $billofladingid;
            $display=1;
           
            $stmt = $DB_con->prepare('UPDATE tbl_reexport SET display=:udisplay WHERE id=:uid');
            $stmt->bindParam(':udisplay',$display);
            $stmt->bindParam(':uid',$id);

            $stmt->execute();
  

    }else{
       echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Error while saving bol
           </div>";
  }

}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Valesco | Admin</title>
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
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="css/style3.css" />
    <script src="js/app.js"></script>
    <script src="js/reveal.js"></script>
<script src="js/angular.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!--chat-->
<link rel="stylesheet" type="text/css" href="js/jScrollPane/jScrollPane.css" />
<link rel="stylesheet" type="text/css" href="css/page.css" />
<link rel="stylesheet" type="text/css" href="css/chat.css" />

<script src="js/jScrollPane/jquery.mousewheel.js"></script>
<script src="js/jScrollPane/jScrollPane.min.js"></script>



</head>

<body style="background-image: url(images/8.jpg); " onload="startTime()" ng-app='myapp'>

<header>
 <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Valesco</a>
                
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
             
                <li class="dropdown get_tooltip" data-toggle="tooltip" data-placement="bottom" title="logout">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo "Admin ". $row['userName'];?> <i class="fa fa-caret-down"></i>
                    </a>
                    
                    <!-- /.dropdown-user -->
                </li>
            </ul>
            <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"> Logout</i></a>
                        </li>
                    </ul>
            <!-- /.navbar-top-links -->
        </nav>
</header>



<div class="row" style="margin-top: 60px;">
  <div class="col-md-3">
    <div class="panel panel-default">
      <div class="panel-body">
      <div class="row">
        <div class="picFetch"><h5>Loading Your Image...</h5></div>
        </div>
        <div class="row">
        <div class="col-md-3">
        <div id="content">
          <dl class="accordion text-center">
 <dd>
    <a href="dashboard.php?page=pic" style="background:#3EB05B;"  title="Profile Picture">
  <i class="fa fa-user fa-2x sancolor-white"></i></a>
  </dd>
  
  
  <dd>
    <a href="dashboard.php?page=password" style="background:#E94B3B"  title="Change Password"><i class="fa fa-lock fa-2x sancolor-white"></i></a>
  </dd>
  <dd>
    <a href="dashboard.php?page=profile"  style="background:#0099D3;"  title="profile"><i class="fa icon-cog fa-2x sancolor-white"></i></a>
  </dd>
  <dd id="email1" >
    <a  style="background:#F7990D;"  title="Actions"><i class="fa icon-pencil fa-2x sancolor-white"></i></a>
  </dd>
  <dd id="email" >
    <a style="background:#5bc0de;"  title="Manifest"><i class="fa icon-book fa-2x sancolor-white"></i>
  </dd>
  

       
  </dl>
  </div>
        </div>
        
        <div class="col-md-9">
        <div id="div3" style="display:none;">
        <span id="message"></span> 
    
  <form method="post" id="uploadimage"  enctype="multipart/form-data" class="form-horizontal">
    
    <div class="text-center">
<input class="form-control " type="text" name="action" id="action"  placeholder="Enter action" >
<button type="submit" name="btnsave" value="send" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>save action
        </button>

       

</div>
</div>
        
        
</form> 
<script type="text/javascript">
 $(document).ready(function(){
  $("#email1sss").click(function(){
    $("#div1").fadeIn(0);
 $("#div2").fadeOut(0);
 $("#div4").fadeOut(0);
  });
});
        </script>
   <script type="text/javascript">
 $(document).ready(function(){
  $("#email1").click(function(){
    $("#div3").fadeIn(0);
 $("#div2").fadeOut(0);
 $("#div4").fadeOut(0);
  });
});
        </script>
 <script type="text/javascript">
 $(document).ready(function(){
  $("#email1ss").click(function(){
    $("#div1").fadeIn(0);
 $("#div3").fadeOut(0);
 $("#div4").fadeOut(0);
  });
});
        </script>

<script type="text/javascript">

$(document).ready(function(){
  $("#email").click(function(){
    $("#div2").fadeIn(0);
 $("#div3").fadeOut(0);
 $("#div1").fadeOut(0);
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function){
  setTimeout(function(){
    $(".content").fadeOut(1500)
  },3000);
  });
</script>
 <div class="well well-small">
                <a href="adhome.php?page=manifest"><button class="btn btn-inverse btn-block" style="color: black"><strong>Manifest</strong> </button></a><br>
                <a href="billOfLading.php"><button class="btn btn-inverse btn-block" style="color: black"><strong>Bill of lading</strong> </button></a><br>
                <a href="adhome.php?page=manifest"><button class="btn btn-inverse btn-block" style="color: black"><strong>Verification</strong> </button></a><br>
                <a href="adhome.php?page=manifest"><button class="btn btn-inverse btn-block" style="color: black"><strong>C.Fowarding</strong> </button></a><br>
 <input id="email1ss" value="2" type="checkbox"><i class="icon-remove icon-white"></i>Action
<input id="email1sss" value="2" type="checkbox"><i class="icon-remove icon-white"></i>Manifest
            </div>

        </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
  <?php
    $page=@$_REQUEST['page'];
    
    switch($page){
    
    case($page=='main'):
    
    break; 
     case($page=='manifest'):
     include('valescodirects/manifest.php');
    break;
    case($page=='country'):
    include('janja/country.php');
    break;
    case($page=='billOfLading'):
    include('billOfLadingRecords.php');
    break;
    case($page=='booking'):
    include('booking/booking.php');
    break;
    
    case($page=='info'):
    include('janja/info.php');
    break;
    
    case($page=='profile'):
    include('janja/profile.php');
    break;
    
    default:
    include('janja/main.php');
    break;  
      
      
    }
    
    ?> 
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-body">
         <?php
if(isset($_GET['bolInsertId'])){
?>
 <?php
$feet=$_GET['bolInsertId'];
$id = $_GET['bolInsertId'];
$stmt_select_name = $DB_con->prepare('SELECT * FROM tbl_manifest WHERE id =:uid');
$stmt_select_name->execute(array(':uid'=>$id));
$rowName=$stmt_select_name->fetch(PDO::FETCH_ASSOC);
$name=$rowName['manifestFileNumber'];
$filename=$rowName['manifestName'];
        ?>

         <center><strong><h3>Bill of Lading Record of <?php echo $name; ?> Manifest.</h3></strong></center>
         <form method="post" id="uploadForm"  enctype="multipart/form-data" class="form-horizontal">
         <div class="Bill-body">
         <!-- ID OF BILL OF LADING UNDER MANIFEST -->
 <div class="form-group input-group">       
<input class="form-control " type="hidden" name="billofladingid" id="number"  placeholder="ID" value="<?php echo $rowName['id'];?>">
</div>
<!-- NAME OF MANIFEST FILE/ENTRY -->
<div class="form-group input-group">       
<input class="form-control " type="hidden" name="manifestfilenumber" id="number"  placeholder="manifestFileNumber" value="<?php echo $rowName['manifestFileNumber'];?>">
</div>
<!-- TOTAL NUMBER OF BILL OF LADING UNDER MANIFEST -->
<div class="form-group input-group">       
<input class="form-control " type="hidden" name="billofladingnumbertotal" id="number"  placeholder="manifestFileNumber" value="<?php echo $rowName['billOfLadingNumber'];?>">
</div>
<!-- TYPE OF MANIFEST -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Manifest Type.</span>
    <input class="form-control " readonly="" type="text" name="manifestType" value="<?php echo $filename; ?>" id="manifest"  placeholder="Enter Manifest Type" >

</div>
<!-- NAME OF BL FILE -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;BOL Number&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="billOfLadingName" id="number"  placeholder="Enter Bill of Lading Number" >

</div>
<!-- ARRIVAL VESSEL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Arrival Vessel&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="arrivalVessel" id="number"  placeholder="Enter Arrival Vessel" >

</div>
<!-- VOYAGE NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;Voyage Number&nbsp;</span>
<input class="form-control " type="text" name="voyageNumber" id="number"  placeholder="Enter Voyage Number" >

</div>
<!-- DATE OF ARRIVAL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;Date Of Arrival&nbsp;&nbsp;</span>
<input class="form-control " type="date" name="arrivalDate" id="number"  placeholder="Enter Date of Arrival" >

</div>
<!-- CONTAINER NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">Container Number</span>
<input class="form-control " type="text" name="containerNumber" id="number"  placeholder="Enter Container Number" >

</div>
<!-- DESCRIPTION OF PARTICULARS IN BL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
<input class="form-control " type="text" name="description" id="number"  placeholder="Enter Description of bill of lading particulars" >

</div>
<!-- SEAL NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Seal Number&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="sealNumber" id="number"  placeholder="Enter Seal Number" >

</div>
<!-- IMAGE OF BILL OF LADING FILE -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;BOL File&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input  type="file" id="file" name="user_image" class="btn btn-default form-control" accept="image/*" />

</div>
<div class="form-group input-group">
  
<input class="form-control " type="hidden" name="postUser" id="number"  placeholder="name" value="<?php echo $row['userName'];?>">

</div>
<button type="submit" name="btnSaveBolTranshipment" value="send" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>save action
        </button>
        </div>
        </form>
<?php
}elseif (isset($_GET['bolInsertVerify'])) {
 ?>
 <?php
$feet=$_GET['bolInsertVerify'];
$id = $_GET['bolInsertVerify'];
$stmt_select_name = $DB_con->prepare('SELECT * FROM tbl_verification WHERE id =:uid');
$stmt_select_name->execute(array(':uid'=>$id));
$rowName=$stmt_select_name->fetch(PDO::FETCH_ASSOC);
//$name=$rowName['manifestFileNumber'];
$filename=$rowName['manifestName'];
        ?>
 <center><strong><h3>Verification Bill Of Lading file Image</h3></strong></center>
 <form method="post" id="uploadForm"  enctype="multipart/form-data" class="form-horizontal">
         <div class="Bill-body">
   <!-- ID OF BILL OF LADING UNDER MANIFEST -->
 <div class="form-group input-group">       
<input class="form-control " type="hidden" name="billofladingid" id="number"  placeholder="ID" value="<?php echo $rowName['id'];?>">
</div>
<!-- NAME OF MANIFEST FILE/ENTRY -->
<div class="form-group input-group">       
<input class="form-control " type="hidden" name="manifestfilenumber" id="number"  placeholder="manifestFileNumber" value="<?php echo $rowName['manifestFileNumber'];?>">
</div>
<!-- TOTAL NUMBER OF BILL OF LADING UNDER MANIFEST -->
<div class="form-group input-group">       
<input class="form-control " type="hidden" name="billofladingnumbertotal" id="number"  placeholder="manifestFileNumber" value="<?php echo $rowName['billOfLadingNumber'];?>">
</div>
<!-- TYPE OF MANIFEST -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Manifest Type.</span>
    <input class="form-control " readonly="" type="text" name="manifestType" value="<?php echo $filename; ?>" id="manifest"  placeholder="Enter Manifest Type" >

</div>
<!-- NAME OF BL FILE -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;BOL Number&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="billOfLadingName" id="number"  placeholder="Enter Bill of Lading Number" >

</div>
<!-- ARRIVAL VESSEL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Arrival Vessel&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="arrivalVessel" id="number"  placeholder="Enter Arrival Vessel" >

</div>
<!-- VOYAGE NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;Voyage Number&nbsp;</span>
<input class="form-control " type="text" name="voyageNumber" id="number"  placeholder="Enter Voyage Number" >

</div>
<!-- DATE OF ARRIVAL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;Date Of Arrival&nbsp;&nbsp;</span>
<input class="form-control " type="date" name="arrivalDate" id="number"  placeholder="Enter Date of Arrival" >

</div>
<!-- CONTAINER NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">Container Number</span>
<input class="form-control " type="text" name="containerNumber" id="number"  placeholder="Enter Container Number" >

</div>
<!-- DESCRIPTION OF PARTICULARS IN BL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
<input class="form-control " type="text" name="description" id="number"  placeholder="Enter Description of bill of lading particulars" >

</div>
<!-- SEAL NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Seal Number&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="sealNumber" id="number"  placeholder="Enter Seal Number" >

</div>
<!-- IMAGE OF BILL OF LADING FILE -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;BOL File&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input  type="file" id="file" name="user_image" class="btn btn-default form-control" accept="image/*" />

</div>
<div class="form-group input-group">
  
<input class="form-control " type="hidden" name="postUser" id="number"  placeholder="name" value="<?php echo $row['userName'];?>">

</div>
<button type="submit" name="btnSaveBolVerify" value="send" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>save action
        </button>
        </div>
        </form>
 <?php
}elseif (isset($_GET['bolInsertReexport'])) {
 ?>
 <?php
$feet=$_GET['bolInsertReexport'];
$id = $_GET['bolInsertReexport'];
$stmt_select_name = $DB_con->prepare('SELECT * FROM tbl_reexport WHERE id =:uid');
$stmt_select_name->execute(array(':uid'=>$id));
$rowName=$stmt_select_name->fetch(PDO::FETCH_ASSOC);
//$name=$rowName['manifestFileNumber'];
$filename=$rowName['manifestName'];
        ?>
 <center><strong><h3>Re-export Bill Of Lading file Image</h3></strong></center>
 <form method="post" id="uploadForm"  enctype="multipart/form-data" class="form-horizontal">
         <div class="Bill-body">
   <!-- ID OF BILL OF LADING UNDER MANIFEST -->
 <div class="form-group input-group">       
<input class="form-control " type="hidden" name="billofladingid" id="number"  placeholder="ID" value="<?php echo $rowName['id'];?>">
</div>
<!-- NAME OF MANIFEST FILE/ENTRY -->
<div class="form-group input-group">       
<input class="form-control " type="hidden" name="manifestfilenumber" id="number"  placeholder="manifestFileNumber" value="<?php echo $rowName['manifestFileNumber'];?>">
</div>
<!-- TOTAL NUMBER OF BILL OF LADING UNDER MANIFEST -->
<div class="form-group input-group">       
<input class="form-control " type="hidden" name="billofladingnumbertotal" id="number"  placeholder="manifestFileNumber" value="<?php echo $rowName['billOfLadingNumber'];?>">
</div>
<!-- TYPE OF MANIFEST -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Manifest Type.</span>
    <input class="form-control " readonly="" type="text" name="manifestType" value="<?php echo $filename; ?>" id="manifest"  placeholder="Enter Manifest Type" >

</div>
<!-- NAME OF BL FILE -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;BOL Number&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="billOfLadingName" id="number"  placeholder="Enter Bill of Lading Number" >

</div>
<!-- ARRIVAL VESSEL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Arrival Vessel&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="arrivalVessel" id="number"  placeholder="Enter Arrival Vessel" >

</div>
<!-- VOYAGE NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;Voyage Number&nbsp;</span>
<input class="form-control " type="text" name="voyageNumber" id="number"  placeholder="Enter Voyage Number" >

</div>
<!-- DATE OF ARRIVAL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;Date Of Arrival&nbsp;&nbsp;</span>
<input class="form-control " type="date" name="arrivalDate" id="number"  placeholder="Enter Date of Arrival" >

</div>
<!-- CONTAINER NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">Container Number</span>
<input class="form-control " type="text" name="containerNumber" id="number"  placeholder="Enter Container Number" >

</div>
<!-- DESCRIPTION OF PARTICULARS IN BL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
<input class="form-control " type="text" name="description" id="number"  placeholder="Enter Description of bill of lading particulars" >

</div>
<!-- SEAL NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Seal Number&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="sealNumber" id="number"  placeholder="Enter Seal Number" >

</div>
<!-- IMAGE OF BILL OF LADING FILE -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;BOL File&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input  type="file" id="file" name="user_image" class="btn btn-default form-control" accept="image/*" />

</div>
<div class="form-group input-group">
  
<input class="form-control " type="hidden" name="postUser" id="number"  placeholder="name" value="<?php echo $row['userName'];?>">

</div>
<button type="submit" name="btnSaveBolReexport" value="send" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>save action
        </button>
        </div>
        </form>
  <?php
}
         ?>
        </div>
        
        <script src="js/jquery.min.js"></script>
<script>
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            //$('#uploadForm + img').remove();
            //$('#uploadForm').after('<img src="'+e.target.result+'" width="450" height="300"/>');
            $('#uploadForm + embed').remove();
            $('#uploadForm').after('<embed src="'+e.target.result+'" width="200" height="200">');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#file").change(function () {
    filePreview(this);
});
</script>
      </div>
    </div>

 
   
</div>
 <div class="col-md-3  " >
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="userfetch"><h5>Loading users...</h5></div>

      </div>
    </div>
  </div>
  </div>
  </div>

  
 <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "createManifest.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>
    
 <script type="text/javascript">
    
    $('#bolModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever1') // Extract info from data-* attributes
          var modal1 = $(this);
          var dataString1 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "billOfLadingFile.php",
                data: dataString1,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal1.find('.bol').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>

                                         

   

<!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>



    <script src="js/jquery.js"></script>

   
    
</body>
</html>

