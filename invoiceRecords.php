
     
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


$feet=$_GET['invoiceIdTranshipment'];
if(isset($_POST['btnsavevessel'])){
  $outgoingvessel=$_POST['outgoingVessel'];
  $bookingnumber=$_POST['bookingNumber'];
  $bookingdate=$_POST['bookingDate'];
  $stackidentity=$_POST['stackIdentity'];
  $postuser=$row['userName'];
  $posttime=date("h:i A.",time());
      
  $SQL = $DBcon->prepare("INSERT INTO tbl_vessel(stackID,vesselName,bookingNumber,bookingDate, postDate) VALUES(?,?,?,?,?)");

    if($SQL){
      $SQL->bind_param('issss', $stackidentity,$outgoingvessel,$bookingnumber,$bookingdate,$posttime);
      $SQL->execute();

     
      $stmt = $DB_con->prepare('UPDATE tbl_stackstranshipment SET tempVesselDisplay=:uvess WHERE id=:uid');
      $stmt->bindParam(':uvess',$vesselSet);
      $stmt->bindParam(':uid',$id);


  $idd = $stackidentity;
  $vesselSet=1;
           
$stmt = $DB_con->prepare('UPDATE tbl_stackstranshipment SET tempVesselDisplay=:uvessel WHERE id=:uid');
$stmt->bindParam(':uvessel',$vesselSet);
$stmt->bindParam(':uid',$idd);
$stmt->execute();
     
      echo "<div class='alert alert-success'>
              <button class='close' data-dismiss='alert'>&times;</button>
              <strong>Success!</strong>.Vessel saved.</div>";
    }
            else{
              echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Error while saving vessel
           </div>";
            }

}


if(isset($_POST['btnSaveInvoiceTranshipment'])){
  $idd=$_GET['invoiceIdTranshipment'];
   $invoiceNumber=$_POST['invoiceNumber'];
   $stackidentity=$_POST['stackIdentity'];
   $postuser=$_POST['postUser'];
     if(isset($_FILES["file"]["type"]))
  {
  $validextensions = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");
  $temporary = explode(".", $_FILES["file"]["name"]);
  $file_extension = end($temporary);
  if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/JPG") || ($_FILES["file"]["type"] == "image/jpeg")
  ) && ($_FILES["file"]["size"] < 10000000)//Approx. 100000=100kb files can be uploaded.
  && in_array($file_extension, $validextensions)) {
  if ($_FILES["file"]["error"] > 0)
  {
  echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
  }
  else
  {
  $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
  $targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored

  $invoiceFile=$_FILES["file"]["name"];
  $postuser=$row['userName'];
  $posttime=date("h:i A.",time());
  $SQL = $con->prepare("INSERT INTO tbl_manifestinvoice(stackID,invoiceNumber,invoiceFile, postUser, postDate) VALUES(?,?,?,?,?)");
   //logs
$invoiceNumber=$_POST['invoiceNumber'];
$stackidentity=$_POST['stackIdentity'];
$invoiceFile=$_FILES["file"]["name"];
$postuser=$row['userName'];
$postuserID=$row['userID'];
$posttime=date("h:i A.",time());
$txt1="User";
$txt2="inserted an invoice of number";
$txt3="and its image";
$txt4="on";
$manifestID=$_GET['id'];
$actions= $txt1 . " " . $postuser." ".$txt2." ".$invoiceNumber." ".$txt3." ".$invoiceFile." ".$txt4." ".$posttime;
$SQL1 = $DBcon->prepare("INSERT INTO tbl_manifestLogs(stackID,userID,postUser,action, postDate) VALUES(?,?,?,?,?)");
$SQL1->bind_param('iisss',$stackidentity,$postuserID,$postuser,$actions,$posttime);
$SQL1->execute();
    if($SQL){
      $SQL->bind_param('issss',$stackidentity,$invoiceNumber,$invoiceFile,$postuser,$posttime);
      $SQL->execute();
      if(!$SQL)
      {
       echo $con->error;
      }
      move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
      echo "<div class='alert alert-success'>
              <button class='close' data-dismiss='alert'>&times;</button>
              <strong>Success!</strong>.Record Inserted</div>";

            $id = $idd;
            $display=1;
           
            $stmt_display = $DB_con->prepare('UPDATE tbl_stackstranshipment SET invoiceDisplay=:udisplay WHERE id=:uid');
            $stmt_display->bindParam(':udisplay',$display);
            $stmt_display->bindParam(':uid',$id);

            $stmt_display->execute();
             header("location: adhome.php");
    }else{
      echo $con->error;
    }

  }
  }
  else
  {
  echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Invalid file Size or Type
           </div>";
  }
  }

}
if(isset($_POST['btnSaveInvoiceRe-export'])){
   $idd=$_GET['btnSaveInvoiceRe-export'];
   $invoiceNumber=$_POST['invoiceNumber'];
   $stackidentity=$_POST['stackIdentity'];
   $postuser=$_POST['postUser'];
     if(isset($_FILES["file"]["type"]))
  {
  $validextensions = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");
  $temporary = explode(".", $_FILES["file"]["name"]);
  $file_extension = end($temporary);
  if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/JPG") || ($_FILES["file"]["type"] == "image/jpeg")
  ) && ($_FILES["file"]["size"] < 10000000)//Approx. 100000=100kb files can be uploaded.
  && in_array($file_extension, $validextensions)) {
  if ($_FILES["file"]["error"] > 0)
  {
  echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
  }
  else
  {
  $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
  $targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored

  $invoiceFile=$_FILES["file"]["name"];
  $postuser=$row['userName'];
  $posttime=date("h:i A.",time());
  $SQL = $con->prepare("INSERT INTO tbl_invoiceexport(stackID,invoiceNumber,invoiceFile, postUser, postDate) VALUES(?,?,?,?,?)");
   //logs
$invoiceNumber=$_POST['invoiceNumber'];
$stackidentity=$_POST['stackIdentity'];
$invoiceFile=$_FILES["file"]["name"];
$postuser=$row['userName'];
$postuserID=$row['userID'];
$posttime=date("h:i A.",time());
$txt1="User";
$txt2="inserted an invoice of number";
$txt3="and its image";
$txt4="on";
$actions= $txt1 . " " . $postuser." ".$txt2." ".$invoiceNumber." ".$txt3." ".$invoiceFile." ".$txt4." ".$posttime;
$SQL1 = $DBcon->prepare("INSERT INTO tbl_exportlogs(userID,postUser,action, postDate) VALUES(?,?,?,?)");
$SQL1->bind_param('isss',$postuserID,$postuser,$actions,$posttime);
$SQL1->execute();
    if($SQL){
      $SQL->bind_param('issss',$stackidentity,$invoiceNumber,$invoiceFile,$postuser,$posttime);
      $SQL->execute();
      if(!$SQL)
      {
       echo $con->error;
      }
      move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
      echo "<div class='alert alert-success'>
              <button class='close' data-dismiss='alert'>&times;</button>
              <strong>Success!</strong>.Record Inserted</div>";

            $iddd = $stackidentity;
            $display=1;
           
            $stmt_display = $DB_con->prepare('UPDATE tbl_stacksexport SET invoiceDisplay=:udisplay WHERE id=:uid');
            $stmt_display->bindParam(':udisplay',$display);
            $stmt_display->bindParam(':uid',$iddd);

            $stmt_display->execute();
             header("location: adhome.php?page=re-export");
    }else{
      echo $con->error;
    }

  }
  }
  else
  {
  echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Invalid file Size or Type
           </div>";
  }
  }

}
if(isset($_POST['btnSaveInvoiceVerification'])){
   $idd=$_GET['invoiceIdVerify'];
   $invoiceNumber=$_POST['invoiceNumber'];
   $stackidentity=$_POST['stackIdentity'];
   $postuser=$_POST['postUser'];
     if(isset($_FILES["file"]["type"]))
  {
  $validextensions = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");
  $temporary = explode(".", $_FILES["file"]["name"]);
  $file_extension = end($temporary);
  if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/JPG") || ($_FILES["file"]["type"] == "image/jpeg")
  ) && ($_FILES["file"]["size"] < 10000000)//Approx. 100000=100kb files can be uploaded.
  && in_array($file_extension, $validextensions)) {
  if ($_FILES["file"]["error"] > 0)
  {
  echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
  }
  else
  {
  $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
  $targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored

  $invoiceFile=$_FILES["file"]["name"];
  $postuser=$row['userName'];
  $posttime=date("h:i A.",time());
  $SQL = $con->prepare("INSERT INTO tbl_invoiceverify(stackID,invoiceNumber,invoiceFile, postUser, postDate) VALUES(?,?,?,?,?)");
   //logs
$invoiceNumber=$_POST['invoiceNumber'];
$stackidentity=$_POST['stackIdentity'];
$invoiceFile=$_FILES["file"]["name"];
$postuser=$row['userName'];
$postuserID=$row['userID'];
$posttime=date("h:i A.",time());
$txt1="User";
$txt2="inserted an invoice of number";
$txt3="and its image";
$txt4="on";
$actions= $txt1 . " " . $postuser." ".$txt2." ".$invoiceNumber." ".$txt3." ".$invoiceFile." ".$txt4." ".$posttime;
$SQL1 = $DBcon->prepare("INSERT INTO tbl_verifylogs(userID,postUser,action, postDate) VALUES(?,?,?,?)");
$SQL1->bind_param('isss',$postuserID,$postuser,$actions,$posttime);
$SQL1->execute();
    if($SQL){
      $SQL->bind_param('issss',$stackidentity,$invoiceNumber,$invoiceFile,$postuser,$posttime);
      $SQL->execute();
      if(!$SQL)
      {
       echo $con->error;
      }
      move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
      echo "<div class='alert alert-success'>
              <button class='close' data-dismiss='alert'>&times;</button>
              <strong>Success!</strong>.Record Inserted</div>";

            $iddd = $stackidentity;
            $display=1;
           
            $stmt_display = $DB_con->prepare('UPDATE tbl_stacksverification SET invoiceDisplay=:udisplay WHERE id=:uid');
            $stmt_display->bindParam(':udisplay',$display);
            $stmt_display->bindParam(':uid',$iddd);

            $stmt_display->execute();
             header("location: adhome.php?page=verification");
    }else{
      echo $con->error;
    }

  }
  }
  else
  {
  echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Invalid file Size or Type
           </div>";
  }
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

<body onload="startTime()" ng-app='myapp'>
<!-- <div id="particles-js" class="gradient"></div>
 <div class="count-particles">
              <span class="js-count-particles"></span>
            </div> -->
            <div id="particles-js"></div>
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
                <li><a href="logout.php"><i class="fa fa-sign-out"> Logout</i></a>
                        </li>
                <li class="dropdown get_tooltip" data-toggle="tooltip" data-placement="bottom" title="logout">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo "Admin ". $row['userName'];?> 
                    </a>
                    
                    <!-- /.dropdown-user -->
                </li>
            </ul>
            
        </nav>
</header>



<div class="row" style="margin-top: 110px;">
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
</form> 
</div>
        

 <div class="well well-small">
                <a href="adhome.php?page=manifest"><button class="btn btn-inverse btn-block" style="color: black"><strong>Manifest</strong> </button></a><br>
                <a href="billOfLading.php"><button class="btn btn-inverse btn-block" style="color: black"><strong>Bill of lading</strong> </button></a><br>
                <a href="view.php"><button class="btn btn-inverse btn-block" style="color: black"><strong>Verification</strong> </button></a><br>
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
  
 <div class="row">
      <div class="panel panel-default">
        <div class="panel-body">
         
         <?php
if(isset($_GET['invoiceIdTranshipment'])){
  ?>
<center><strong><h3>Invoice Image Upload Of Direct Transhipment File.</h3></strong></center>
         <form method="post" id="uploadForm"  enctype="multipart/form-data" class="form-horizontal">
         <div class="Bill-body">
         


<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Invoice Number&nbsp;</span>
<input class="form-control " type="text" name="invoiceNumber" id="action"  placeholder="Enter invoice number" >
</div>

<input class="form-control " type="hidden" name="stackIdentity" value="<?php echo $feet; ?>" id="action"  placeholder="Enter action" >
<input class="form-control " type="hidden" name="postUser" value="<?php echo $row['userName']; ?>" id="action"  placeholder="Enter action" >
<!-- IMAGE OF MANIFEST FILE ENTRY -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Invoice File&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input  type="file" name="file" id="file" class="btn btn-default form-control" accept="image/*" />

</div>

<button type="submit" name="btnSaveInvoiceTranshipment" value="send" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>Save
        </button>
        </div>
        </form>
  <?php
}elseif (isset($_GET['invoiceIdRe-export'])) {
  $feet=$_GET['invoiceIdRe-export'];
  ?>
<center><strong><h3>Invoice Image Upload of Re-Export File.</h3></strong></center>
         <form method="post" id="uploadForm"  enctype="multipart/form-data" class="form-horizontal">
         <div class="Bill-body">
         


<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Invoice Number&nbsp;</span>
<input class="form-control " type="text" name="invoiceNumber" id="action"  placeholder="Enter invoice number" >
</div>

<input class="form-control " type="hidden" name="stackIdentity" value="<?php echo $feet; ?>" id="action"  placeholder="Enter action" >
<input class="form-control " type="hidden" name="postUser" value="<?php echo $row['userName']; ?>" id="action"  placeholder="Enter action" >
<!-- IMAGE OF MANIFEST FILE ENTRY -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Invoice File&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input  type="file" name="file" id="file" class="btn btn-default form-control" accept="image/*" />

</div>

<button type="submit" name="btnSaveInvoiceRe-export" value="send" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>Save
        </button>
        </div>
        </form>
  <?php
}elseif (isset($_GET['invoiceIdVerify'])) {
  $feet=$_GET['invoiceIdVerify'];
 ?>
<center><strong><h3>Invoice Image Upload Of Verification File.</h3></strong></center>
         <form method="post" id="uploadForm"  enctype="multipart/form-data" class="form-horizontal">
         <div class="Bill-body">
         


<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Invoice Number&nbsp;</span>
<input class="form-control " type="text" name="invoiceNumber" id="action"  placeholder="Enter invoice number" >
</div>

<input class="form-control " type="hidden" name="stackIdentity" value="<?php echo $feet; ?>" id="action"  placeholder="Enter action" >
<input class="form-control " type="hidden" name="postUser" value="<?php echo $row['userName']; ?>" id="action"  placeholder="Enter action" >
<!-- IMAGE OF MANIFEST FILE ENTRY -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Invoice File&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input  type="file" name="file" id="file" class="btn btn-default form-control" accept="image/*" />

</div>

<button type="submit" name="btnSaveInvoiceVerification" value="send" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>Save
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
<script type="text/javascript">
    
    $('#manifestModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever2') // Extract info from data-* attributes
          var modal2 = $(this);
          var dataString2 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "manifestImageFile.php",
                data: dataString2,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal2.find('.manifest').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>
<script type="text/javascript">
    
    $('#manifestModalImageMagnify').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever3') // Extract info from data-* attributes
          var modal3 = $(this);
          var dataString3 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "manifestImageFileMaginify.php",
                data: dataString3,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal3.find('.magnify').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>
<script type="text/javascript">
    
    $('#invoiceModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever4') // Extract info from data-* attributes
          var modal4 = $(this);
          var dataString4 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "manifestImageFileMaginify.php",
                data: dataString4,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal4.find('.magnify').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>


<script type="text/javascript">
    
    $('#vesselMore').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever5') // Extract info from data-* attributes
          var modal5 = $(this);
          var dataString5 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "vesselInformation.php",
                data: dataString5,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal5.find('.vessel').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>
<script type="text/javascript">
    
    $('#bolLogs').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever6') // Extract info from data-* attributes
          var modal6 = $(this);
          var dataString6 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "bollogs.php",
                data: dataString6,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal6.find('.logs').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>
<script type="text/javascript">
    
    $('#vesselModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever7') // Extract info from data-* attributes
          var modal7 = $(this);
          var dataString7 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "outgoingVessel.php",
                data: dataString7,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal7.find('.vesselModal').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>


<script type="text/javascript">
    
    $('#invoiceMagnifyData').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever8') // Extract info from data-* attributes
          var modal8 = $(this);
          var dataString8 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "invoiceData.php",
                data: dataString8,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal8.find('.invoiceData').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>
<script>
    function mySearch() {

      // Declare variables
      var input, filter, table, tr, td, i;
      input = document.getElementById("forms");
      filter = input.value.toUpperCase();
      table = document.getElementById("formsTable");
      tr = table.getElementsByTagName("tr");
      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>
                                         

   

<!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>



    <script src="js/jquery.js"></script>
<!-- particles.js container -->
<

<script src="js/particles.js"></script>
<script src="js/app.js"></script>


   
    
</body>
</html>

