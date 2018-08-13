

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


 
  if(isset($_POST['btnUpdateBol']))
    {   
        $id = $_GET['bolRecordId'];
        $image_row = $DB_con->prepare('SELECT * FROM tbl_bol WHERE id =:uid');
        $image_row->execute(array(':uid'=>$id));
        $admin_row = $image_row->fetch(PDO::FETCH_ASSOC);
       
                
         
        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];

        if($imgFile)
        {
            $upload_dir = 'upload/'; // upload directory
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $userpic = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {
                if($imgSize < 5000000)
                {
                    unlink($upload_dir.$admin_row['bolFile']);
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                }
                else
                {
                    $errMSG = "Sorry, your file is too large.Select file with less than 5MB";
                }
            }
            else
            {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        }
        else
        {
            // if no image selected the old image remain as it is.
            $userpic = $admin_row['bolFile']; // old image from database
        }


    $manifesttype=$_POST['manifestType'];
    $billofladingname=$_POST['billOfLadingName'];
    $arrivalvessel=$_POST['arrivalVessel'];
    $voyagenumber=$_POST['voyageNumber'];
    $arrivaldate=$_POST['arrivalDate'];
    $containernumber=$_POST['containerNumber'];
    $description=$_POST['description'];
    $sealnumber=$_POST['sealNumber'];
    $posttime=date("h:i A.",time());
    $id=$_GET['bolRecordId'];
    $postUser=$row['userName'];
    $updated="YES";
$stmt = $DB_con->prepare('UPDATE tbl_bol SET bolNumber=:ubolnumber,manifestName=:umanifestName,arrivalVesselName=:uarrivalvesselname,voyageNumber=:uvoyagenumber, dateOfArrival=:udateofarrival,containerNumber=:ucontainernumber,description=:udescription,sealNumber=:usealnumber,bolFile=:ubolfile,updated=:uupdated,postUser=:upostuser,postDate=:upostdate WHERE id=:uid');

$stmt->bindParam(':ubolnumber',$billofladingname);
$stmt->bindParam(':umanifestName',$manifesttype);
$stmt->bindParam(':uarrivalvesselname',$arrivalvessel);
$stmt->bindParam(':uvoyagenumber',$voyagenumber);
$stmt->bindParam(':udateofarrival',$arrivaldate);
$stmt->bindParam(':ucontainernumber',$containernumber);
$stmt->bindParam(':udescription',$description);
$stmt->bindParam(':usealnumber',$sealnumber);
$stmt->bindParam(':ubolfile',$userpic);
$stmt->bindParam(':uupdated',$updated);
$stmt->bindParam(':upostuser',$postUser);
$stmt->bindParam(':upostdate',$posttime);
$stmt->bindParam(':uid',$id);

if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
                window.location.href='index.php';
                </script>
                <?php
            }
            else{
                ?>

                <script>
                alert('Sorry Data Could Not Updated !');
                window.location.href='index.php';
                </script>
                <?php
               
            }


    }
     if(isset($_POST['btnUpdateReExport']))
    {   
        $id = $_GET['bolRecordExport'];
        $image_row = $DB_con->prepare('SELECT * FROM tbl_reexportbols WHERE id =:uid');
        $image_row->execute(array(':uid'=>$id));
        $admin_row = $image_row->fetch(PDO::FETCH_ASSOC);
       
                
         
        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];

        if($imgFile)
        {
            $upload_dir = 'upload/'; // upload directory
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $userpic = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {
                if($imgSize < 5000000)
                {
                    unlink($upload_dir.$admin_row['bolFile']);
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                }
                else
                {
                    $errMSG = "Sorry, your file is too large.Select file with less than 5MB";
                }
            }
            else
            {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        }
        else
        {
            // if no image selected the old image remain as it is.
            $userpic = $admin_row['bolFile']; // old image from database
        }


    $manifesttype=$_POST['manifestType'];
    $billofladingname=$_POST['billOfLadingName'];
    $arrivalvessel=$_POST['arrivalVessel'];
    $voyagenumber=$_POST['voyageNumber'];
    $arrivaldate=$_POST['arrivalDate'];
    $containernumber=$_POST['containerNumber'];
    $description=$_POST['description'];
    $sealnumber=$_POST['sealNumber'];
    $posttime=date("h:i A.",time());
    $id=$_GET['bolRecordExport'];
    $postUser=$row['userName'];
    $updated="YES";
$stmt = $DB_con->prepare('UPDATE tbl_reexportbols SET bolNumber=:ubolnumber,manifestName=:umanifestName,arrivalVesselName=:uarrivalvesselname,voyageNumber=:uvoyagenumber, dateOfArrival=:udateofarrival,containerNumber=:ucontainernumber,description=:udescription,sealNumber=:usealnumber,bolFile=:ubolfile,updated=:uupdated,postUser=:upostuser,postDate=:upostdate WHERE id=:uid');

$stmt->bindParam(':ubolnumber',$billofladingname);
$stmt->bindParam(':umanifestName',$manifesttype);
$stmt->bindParam(':uarrivalvesselname',$arrivalvessel);
$stmt->bindParam(':uvoyagenumber',$voyagenumber);
$stmt->bindParam(':udateofarrival',$arrivaldate);
$stmt->bindParam(':ucontainernumber',$containernumber);
$stmt->bindParam(':udescription',$description);
$stmt->bindParam(':usealnumber',$sealnumber);
$stmt->bindParam(':ubolfile',$userpic);
$stmt->bindParam(':uupdated',$updated);
$stmt->bindParam(':upostuser',$postUser);
$stmt->bindParam(':upostdate',$posttime);
$stmt->bindParam(':uid',$id);


if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
                window.location.href='adhome.php?page=re-export';
                </script>
                <?php
            }
            else{
                ?>

                <script>
                alert('Sorry Data Could Not Updated !');
                window.location.href='adhome.php?page=re-export';
                </script>
                <?php
               
            }


    }
     if(isset($_POST['btnUpdateVerification']))
    {   
        $id = $_GET['bolRecordVerify'];
        $image_row = $DB_con->prepare('SELECT * FROM tbl_verificationbols WHERE id =:uid');
        $image_row->execute(array(':uid'=>$id));
        $admin_row = $image_row->fetch(PDO::FETCH_ASSOC);
       
                
         
        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];

        if($imgFile)
        {
            $upload_dir = 'upload/'; // upload directory
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $userpic = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {
                if($imgSize < 5000000)
                {
                    unlink($upload_dir.$admin_row['bolFile']);
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                }
                else
                {
                    $errMSG = "Sorry, your file is too large.Select file with less than 5MB";
                }
            }
            else
            {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        }
        else
        {
            // if no image selected the old image remain as it is.
            $userpic = $admin_row['bolFile']; // old image from database
        }


    $manifesttype=$_POST['manifestType'];
    $billofladingname=$_POST['billOfLadingName'];
    $arrivalvessel=$_POST['arrivalVessel'];
    $voyagenumber=$_POST['voyageNumber'];
    $arrivaldate=$_POST['arrivalDate'];
    $containernumber=$_POST['containerNumber'];
    $description=$_POST['description'];
    $sealnumber=$_POST['sealNumber'];
    $posttime=date("h:i A.",time());
    $id=$_GET['bolRecordVerify'];
    $postUser=$row['userName'];
    $updated="YES";

$stmt = $DB_con->prepare('UPDATE tbl_verificationbols SET bolNumber=:ubolnumber,manifestName=:umanifestName,arrivalVesselName=:uarrivalvesselname,voyageNumber=:uvoyagenumber, dateOfArrival=:udateofarrival,containerNumber=:ucontainernumber,description=:udescription,sealNumber=:usealnumber,bolFile=:ubolfile,updated=:uupdated,postUser=:upostuser,postDate=:upostdate WHERE id=:uid');

$stmt->bindParam(':ubolnumber',$billofladingname);
$stmt->bindParam(':umanifestName',$manifesttype);
$stmt->bindParam(':uarrivalvesselname',$arrivalvessel);
$stmt->bindParam(':uvoyagenumber',$voyagenumber);
$stmt->bindParam(':udateofarrival',$arrivaldate);
$stmt->bindParam(':ucontainernumber',$containernumber);
$stmt->bindParam(':udescription',$description);
$stmt->bindParam(':usealnumber',$sealnumber);
$stmt->bindParam(':ubolfile',$userpic);
$stmt->bindParam(':uupdated',$updated);
$stmt->bindParam(':upostuser',$postUser);
$stmt->bindParam(':upostdate',$posttime);
$stmt->bindParam(':uid',$id);

if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
                window.location.href='adhome.php?page=verification';
                </script>
                <?php
            }
            else{
                ?>

                <script>
                alert('Sorry Data Could Not Updated !');
                window.location.href='adhome.php?page=verification';
                </script>
                <?php
               
            }


    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Valesco | BOL</title>
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
<body  onload="startTime()" ng-app='myapp'>

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
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"> Logout</i></a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
            </ul>
            <!-- /.navbar-top-links -->
        </nav>
</header>



<div class="row" style="margin-top: 80px;">
 <div class="panel panel-default">
 <div class="panel-body">
 
 <?php
if(isset($errMSG)){
        ?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
    }
    if(isset($successMSG)){
        ?>
        <div class="alert alert-primary">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $successMSG; ?>
        </div>
        <?php
    }
 ?>
 
          <?php
if (isset($_GET['bolRecordId'])) {
  ?>
  <center><h3><strong>Direct Transhipment Bill of Ladings Update.</strong></h3></center>
  <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Manifest  Type</th>
                    <th>Manifest No.</th>
                     <th>BL Number</th>
                    <th>Arrival Vessel</th>
                    <th>Voyage Number</th>
                    <th>Date of Arrival</th>
                    <th>Container Number</th>
                    <th>Description</th>
                    <th>Seal Number</th>
                    <th>Post Date</th>
                    <th>Action</th>
                   
                </tr>
                </thead>
                <tbody>
<?php
$id=$_GET['bolRecordId'];
 $stmt_select = $DB_con->prepare('SELECT * FROM tbl_bol WHERE id= :uid');
    $stmt_select->execute(array(':uid'=>$id));
    $stmt_select->execute();
    
    if($stmt_select->rowCount() > 0)
    {
        while($row=$stmt_select->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>

           <?php
                        
                 echo '<tr>';
                  echo '<td>'.$row['manifestName'].'</td>';
                  echo '<td>'.$row['manifestFileNumber'].'</td>';
                  echo '<td>'.$row['bolNumber'].'</td>';
                  echo '<td>'.$row['arrivalVesselName'].'</td>';
                  echo '<td>'.$row['voyageNumber'].'</td>';
                  echo '<td>'.$row['dateOfArrival'].'</td>';
                  echo '<td>'.$row['containerNumber'].'</td>';
                  echo '<td>'.$row['description'].'</td>';
                  echo '<td>'.$row['sealNumber'].'</td>';
                  echo '<td>'.$row['postDate'].'</td>';
                echo '<td>
                  <a  class="btn btn-small btn-primary"
                    data-toggle="modal" id="email" value="2"
                    data-whatever="'.$row['id'].' ">Edit</a>
                  </td>';
                 echo '</tr>';
                         
                    ?>
    
                <?php
        }
    }

?>  
  
            
                </tbody>
            </table>
  <?php
}elseif (isset($_GET['bolRecordExport'])) {
 ?>
 <center><h3><strong>Re-Export Bill of Ladings Update.</strong></h3></center>
  <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Manifest  Type</th>
                    <th>Manifest No.</th>
                     <th>BL Number</th>
                    <th>Arrival Vessel</th>
                    <th>Voyage Number</th>
                    <th>Date of Arrival</th>
                    <th>Container Number</th>
                    <th>Description</th>
                    <th>Seal Number</th>
                    <th>Post Date</th>
                    <th>Action</th>
                   
                </tr>
                </thead>
                <tbody>
<?php
$id=$_GET['bolRecordExport'];
 $stmt_select = $DB_con->prepare('SELECT * FROM tbl_reexportbols WHERE id= :uid');
    $stmt_select->execute(array(':uid'=>$id));
    $stmt_select->execute();
    
    if($stmt_select->rowCount() > 0)
    {
        while($row=$stmt_select->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>

           <?php
                        
                 echo '<tr>';
                  echo '<td>'.$row['manifestName'].'</td>';
                  echo '<td>'.$row['manifestFileNumber'].'</td>';
                  echo '<td>'.$row['bolNumber'].'</td>';
                  echo '<td>'.$row['arrivalVesselName'].'</td>';
                  echo '<td>'.$row['voyageNumber'].'</td>';
                  echo '<td>'.$row['dateOfArrival'].'</td>';
                  echo '<td>'.$row['containerNumber'].'</td>';
                  echo '<td>'.$row['description'].'</td>';
                  echo '<td>'.$row['sealNumber'].'</td>';
                  echo '<td>'.$row['postDate'].'</td>';
                echo '<td>
                  <a  class="btn btn-small btn-primary"
                    data-toggle="modal" id="email1" value="2"
                    data-whatever="'.$row['id'].' ">Edit</a>
                  </td>';
                 echo '</tr>';
                         
                    ?>
    
                <?php
        }
    }

?>  
  
            
                </tbody>
            </table>
 <?php
}elseif (isset($_GET['bolRecordVerify'])) {
 ?>
 <center><h3><strong>Verification Bill of Ladings Update.</strong></h3></center>
  <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Manifest  Type</th>
                    <th>Manifest No.</th>
                     <th>BL Number</th>
                    <th>Arrival Vessel</th>
                    <th>Voyage Number</th>
                    <th>Date of Arrival</th>
                    <th>Container Number</th>
                    <th>Description</th>
                    <th>Seal Number</th>
                    <th>Post Date</th>
                    <th>Action</th>
                   
                </tr>
                </thead>
                <tbody>
<?php
$id=$_GET['bolRecordVerify'];
 $stmt_select = $DB_con->prepare('SELECT * FROM tbl_verificationbols WHERE id= :uid');
    $stmt_select->execute(array(':uid'=>$id));
    $stmt_select->execute();
    
    if($stmt_select->rowCount() > 0)
    {
        while($row=$stmt_select->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>

           <?php
                        
                 echo '<tr>';
                  echo '<td>'.$row['manifestName'].'</td>';
                  echo '<td>'.$row['manifestFileNumber'].'</td>';
                  echo '<td>'.$row['bolNumber'].'</td>';
                  echo '<td>'.$row['arrivalVesselName'].'</td>';
                  echo '<td>'.$row['voyageNumber'].'</td>';
                  echo '<td>'.$row['dateOfArrival'].'</td>';
                  echo '<td>'.$row['containerNumber'].'</td>';
                  echo '<td>'.$row['description'].'</td>';
                  echo '<td>'.$row['sealNumber'].'</td>';
                  echo '<td>'.$row['postDate'].'</td>';
                echo '<td>
                  <a  class="btn btn-small btn-primary"
                    data-toggle="modal" id="email2" value="2"
                    data-whatever="'.$row['id'].' ">Edit</a>
                  </td>';
                 echo '</tr>';
                         
                    ?>
    
                <?php
        }
    }

?>  
  
            
                </tbody>
            </table>
 <?php
}
          ?>
            <div id="div1" style="display:none;">
                     <center><strong><h3>Edit Direct Transhipment bill of lading details</h3></strong></center>
<form method="post" id="uploadimage"  enctype="multipart/form-data" class="form-horizontal">
                     <div class="row">
                         <div class="col-md-4">
  <div class="panel-body">
         

<!-- TYPE OF MANIFEST -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Manifest Type.</span>
    <input class="form-control " readonly="" type="text" name="manifestType" value="<?php echo $manifestName; ?>" id="manifest"  placeholder="Enter Manifest Type" >

</div>
<!-- NAME OF BL FILE -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;BOL Number&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " readonly="" type="text" value="<?php echo $manifestFileNumber; ?>" name="billOfLadingName" id="number"  placeholder="Enter Bill of Lading Number" >

</div>
<!-- ARRIVAL VESSEL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Arrival Vessel&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" value="<?php echo $arrivalVesselName; ?>" name="arrivalVessel" id="number"  placeholder="Enter Arrival Vessel" >

</div>                            
                         </div>
                         </div>
                         <div class="col-md-4">
                          <div class="panel-body">
  <!-- VOYAGE NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;Voyage Number&nbsp;</span>
<input class="form-control " type="text" value="<?php echo $arrivalVesselName; ?>" name="voyageNumber" id="number"  placeholder="Enter Voyage Number" >

</div>
<!-- DATE OF ARRIVAL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;Date Of Arrival&nbsp;&nbsp;</span>
<input class="form-control " type="date" value="<?php echo $dateOfArrival; ?>" name="arrivalDate" id="number"  placeholder="Enter Date of Arrival" >

</div>
<!-- CONTAINER NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">Container Number</span>
<input class="form-control " type="text" value="<?php echo $containerNumber; ?>" name="containerNumber" id="number"  placeholder="Enter Container Number" >

</div>                           
                         </div>
                         </div>
                         <div class="col-md-4">
                         <div class="panel-body">
                         <!-- DESCRIPTION OF PARTICULARS IN BL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
<input class="form-control " type="text" value="<?php echo $description; ?>" name="description" id="number"  placeholder="Enter Description of bill of lading particulars" >

</div>
<!-- SEAL NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Seal Number&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" value="<?php echo $sealNumber; ?>" name="sealNumber" id="number"  placeholder="Enter Seal Number" >

</div>
<!-- IMAGE OF BILL OF LADING FILE -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;BOL File&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input  type="file" name="user_image" class="btn btn-default form-control" accept="image/*" />

</div>

<button type="submit" name="btnUpdateBol" value="send" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>Update
        </button>
        </div> 
        </div>   
        </div>
               
        </form>
        </div>
        <!-- div 2 -->
                    <div id="div2" style="display:none;">
                     <center><strong><h3>Edit Verification bill of lading details</h3></strong></center>
<form method="post" id="uploadimage"  enctype="multipart/form-data" class="form-horizontal">
                     <div class="row">
                         <div class="col-md-4">
  <div class="panel-body">
         

<!-- TYPE OF MANIFEST -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Manifest Type.</span>
    <input class="form-control " readonly="" type="text" name="manifestType" value="<?php echo $manifestName; ?>" id="manifest"  placeholder="Enter Manifest Type" >

</div>
<!-- NAME OF BL FILE -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;BOL Number&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " readonly="" type="text" value="<?php echo $manifestFileNumber; ?>" name="billOfLadingName" id="number"  placeholder="Enter Bill of Lading Number" >

</div>
<!-- ARRIVAL VESSEL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Arrival Vessel&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" value="<?php echo $arrivalVesselName; ?>" name="arrivalVessel" id="number"  placeholder="Enter Arrival Vessel" >

</div>                            
                         </div>
                         </div>
                         <div class="col-md-4">
                          <div class="panel-body">
  <!-- VOYAGE NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;Voyage Number&nbsp;</span>
<input class="form-control " type="text" value="<?php echo $arrivalVesselName; ?>" name="voyageNumber" id="number"  placeholder="Enter Voyage Number" >

</div>
<!-- DATE OF ARRIVAL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;Date Of Arrival&nbsp;&nbsp;</span>
<input class="form-control " type="date" value="<?php echo $dateOfArrival; ?>" name="arrivalDate" id="number"  placeholder="Enter Date of Arrival" >

</div>
<!-- CONTAINER NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">Container Number</span>
<input class="form-control " type="text" value="<?php echo $containerNumber; ?>" name="containerNumber" id="number"  placeholder="Enter Container Number" >

</div>                           
                         </div>
                         </div>
                         <div class="col-md-4">
                         <div class="panel-body">
                         <!-- DESCRIPTION OF PARTICULARS IN BL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
<input class="form-control " type="text" value="<?php echo $description; ?>" name="description" id="number"  placeholder="Enter Description of bill of lading particulars" >

</div>
<!-- SEAL NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Seal Number&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" value="<?php echo $sealNumber; ?>" name="sealNumber" id="number"  placeholder="Enter Seal Number" >

</div>
<!-- IMAGE OF BILL OF LADING FILE -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;BOL File&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input  type="file" name="user_image" class="btn btn-default form-control" accept="image/*" />

</div>

<button type="submit" name="btnUpdateReExport" value="send" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>Update
        </button>
        </div> 
        </div>   
        </div>
               
        </form>
        </div>
        <!-- div 3 -->
                    <div id="div3" style="display:none;">
                     <center><strong><h3>Edit Verification bill of lading details</h3></strong></center>
<form method="post" id="uploadimage"  enctype="multipart/form-data" class="form-horizontal">
                     <div class="row">
                         <div class="col-md-4">
  <div class="panel-body">
         

<!-- TYPE OF MANIFEST -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Manifest Type.</span>
    <input class="form-control " readonly="" type="text" name="manifestType" value="<?php echo $manifestName; ?>" id="manifest"  placeholder="Enter Manifest Type" >

</div>
<!-- NAME OF BL FILE -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;BOL Number&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " readonly="" type="text" value="<?php echo $manifestFileNumber; ?>" name="billOfLadingName" id="number"  placeholder="Enter Bill of Lading Number" >

</div>
<!-- ARRIVAL VESSEL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Arrival Vessel&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" value="<?php echo $arrivalVesselName; ?>" name="arrivalVessel" id="number"  placeholder="Enter Arrival Vessel" >

</div>                            
                         </div>
                         </div>
                         <div class="col-md-4">
                          <div class="panel-body">
  <!-- VOYAGE NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;Voyage Number&nbsp;</span>
<input class="form-control " type="text" value="<?php echo $arrivalVesselName; ?>" name="voyageNumber" id="number"  placeholder="Enter Voyage Number" >

</div>
<!-- DATE OF ARRIVAL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;Date Of Arrival&nbsp;&nbsp;</span>
<input class="form-control " type="date" value="<?php echo $dateOfArrival; ?>" name="arrivalDate" id="number"  placeholder="Enter Date of Arrival" >

</div>
<!-- CONTAINER NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">Container Number</span>
<input class="form-control " type="text" value="<?php echo $containerNumber; ?>" name="containerNumber" id="number"  placeholder="Enter Container Number" >

</div>                           
                         </div>
                         </div>
                         <div class="col-md-4">
                         <div class="panel-body">
                         <!-- DESCRIPTION OF PARTICULARS IN BL -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
<input class="form-control " type="text" value="<?php echo $description; ?>" name="description" id="number"  placeholder="Enter Description of bill of lading particulars" >

</div>
<!-- SEAL NUMBER -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Seal Number&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" value="<?php echo $sealNumber; ?>" name="sealNumber" id="number"  placeholder="Enter Seal Number" >

</div>
<!-- IMAGE OF BILL OF LADING FILE -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;BOL File&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input  type="file" name="user_image" class="btn btn-default form-control" accept="image/*" />

</div>

<button type="submit" name="btnUpdateVerification" value="send" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>Update
        </button>
        </div> 
        </div>   
        </div>
               
        </form>
        </div>
        </div>
         </div>


        </div>
         
         <script type="text/javascript">
 $(document).ready(function(){
  $("#email").click(function(){
    $("#div1").fadeIn(0);
  });
});
        </script>
        <script type="text/javascript">
 $(document).ready(function(){
  $("#email1").click(function(){
    $("#div2").fadeIn(0);
  });
});
        </script>
        <script type="text/javascript">
 $(document).ready(function(){
  $("#email2").click(function(){
    $("#div3").fadeIn(0);
  });
});
        </script>
</body>
</html>
 
              