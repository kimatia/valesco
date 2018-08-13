
<script type="text/javascript" src="js/jquery.js"></script>

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
  var timerinfo=10;
  var info="";
  $(function (){
    function infoEdit(){
      setTimeout(infoEdit, 1000);
 
      if(timerinfo==10){
  
       $.post("userFetchEdit.php",{infoEditing:info},function(data){
        $(".userFetchEdit h5").html(data);
       })
       timerinfo=11;
       clearTimeout(infoEdit); 
      }
      timerinfo--;
    }

    infoEdit(); 
  });

</script> 
<?php
date_default_timezone_set("Africa/Nairobi");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);
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
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
//we can now access the users details from $row['appropriatedbfield']
  

     if(isset($_GET['admin_id'])&& !empty($_GET['admin_id']))
  {
        $id = $_GET['admin_id'];
        $stmt_admin = $DB_con->prepare('SELECT loginType FROM tbl_users WHERE userID =:uid');
        $stmt_admin->execute(array(':uid'=>$id));
        $admin_row = $stmt_admin->fetch(PDO::FETCH_ASSOC);
        extract($admin_row);
$userLogin = "admin";// user login type
            if(!isset($errMSG))
            {
            $stmt = $DB_con->prepare('UPDATE tbl_users SET loginType=:ulogtype WHERE userID=:uid');
            $stmt->bindParam(':ulogtype',$userLogin);
            $stmt->bindParam(':uid',$id);

            if($stmt->execute()){
                
            }
            else{
                $errMSG = "Sorry, could not provide admin priviledges!";
            }

        }
    
  }
  
  if(isset($_GET['removeadmin_id'])&& !empty($_GET['removeadmin_id']))
  {
       $id = $_GET['removeadmin_id'];
        $stmt_admin = $DB_con->prepare('SELECT loginType FROM tbl_users WHERE userID =:uid');
        $stmt_admin->execute(array(':uid'=>$id));
        $admin_row = $stmt_admin->fetch(PDO::FETCH_ASSOC);
        extract($admin_row);
$userLogin = "worker";// user login type
            if(!isset($errMSG))
            {
            $stmt = $DB_con->prepare('UPDATE tbl_users SET loginType=:ulogtype WHERE userID=:uid');
            $stmt->bindParam(':ulogtype',$userLogin);
            $stmt->bindParam(':uid',$id);

            if($stmt->execute()){
                
            }
            else{
                $errMSG = "Sorry, could demote admin priviledges!";
            }

        }
    
  }
  //delete users
  if(isset($_GET['delete_id']))
  {
   
 // it will delete an actual record from db
    $stmt_delete = $DB_con->prepare('DELETE FROM tbl_users WHERE userID =:uid');
    $stmt_delete->bindParam(':uid',$_GET['delete_id']);
    $stmt_delete->execute();

    header("Location: adhome.php");
  }

$id = $row['userID'];
    $stmt_edit = $DB_con->prepare('SELECT userPic FROM tbl_users WHERE userID =:uidd');
    $stmt_edit->execute(array(':uidd'=>$id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);

 if(isset($_POST['btnsave'])){

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

  $userId = 1;
  $profile_pic=$_FILES["file"]["name"];

  $SQL = $con->prepare("UPDATE tbl_users set  userPic=? where userID=? ");

    if($SQL){
      $SQL->bind_param('si',$profile_pic, $userId);
      $SQL->execute();

      move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
      echo "<div class='alert alert-success'>
              <button class='close' data-dismiss='alert'>&times;</button>
              <strong>Success!</strong>.File updated</div>";
              ?>
  <script>
  window.location.href='dashboard.php?page=pic';
  </script>
  <?php
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
if(isset($_POST['btnsavepwd'])):
  
   extract($_POST);
   if($old_password!="" && $password!="" && $confirm_pwd!="") :
    $user_id = $row['userID'];
    $old_pwd=md5(mysqli_real_escape_string($mysqli,$_POST['old_password']));
    $pwd=md5(mysqli_real_escape_string($mysqli,$_POST['password']));
    $c_pwd=md5(mysqli_real_escape_string($mysqli,$_POST['confirm_pwd']));
    if($pwd == $c_pwd) :
       if($pwd!=$old_pwd) :
         $db_check=$mysqli->query("SELECT * FROM `tbl_users` WHERE `userID`='$user_id' AND `userPass` ='$old_pwd'");
         $count=mysqli_num_rows($db_check);
         if($count==1) :
             $fetch=$mysqli->query("UPDATE `tbl_users` SET `userPass` = '$pwd' WHERE `userID`='$user_id'");
             $old_password=''; $password =''; $confirm_pwd = '';
             $successMSG = "Your new password update successfully.";
          else:
            $errMSG = "The password you gave is incorrect.";
          endif;
        else :
          $errMSG = "Old password new password same Please try again.";
        endif;
    else:
      $errMSG = "New password and confirm password do not matched";
    endif;
   else :
     $errMSG = "Please fill all the fields";
   endif;   
 endif;
if(isset($_POST['btnsaveprofile']))
    {
        
        $username = $_POST['user_name'];// user name
         $usercity = $_POST['user_city'];// user city
         $usercountry = $_POST['user_country'];// user country
         $useremail = $_POST['user_email'];// user email
         

        // if no error occured, continue ....
        if(!isset($errMSG))
        {

          $id = $row['userID'];
            $stmt = $DB_con->prepare('UPDATE tbl_users SET  userName=:uname,userCity=:ucity, userCountry=:ucountry, userEmail=:uemail WHERE userID=:uid');
            
            $stmt->bindParam(':uname',$username);
             $stmt->bindParam(':ucity',$usercity);
             $stmt->bindParam(':ucountry',$usercountry);
             $stmt->bindParam(':uemail',$useremail);
           
            $stmt->bindParam(':uid',$id);

            if($stmt->execute()){
                ?>
                <script>
                alert('Profile successfully Updated ...');
                window.location.href='dashboard.php?page=profile';
                </script>
                <?php
            }
            else{
                $errMSG = "Sorry, profile Could Not Updated !";
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
 <link rel="stylesheet" href="css/lightbox.min.css">
<link rel="stylesheet" type="text/css" href="css/component.css" />
<script src="js/modernizr.custom.js"></script>
</head>

<body onload="startTime()" ng-app='myapp'>

<div id="particles-js"></div>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

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
           
            <!-- /.navbar-top-links -->
        </nav>
</header>



<div class="row" style="margin-top: 80px;">
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
  <!-- <button class="md-trigger" data-modal="modal-13">Action</button> -->
<button class="md-trigger btn btn-sm btn-default" data-modal="modal-13"><h4 style="color: red">!Help</h4></button>
  <div class="md-modal md-effect-13" id="modal-13">
      <div class="md-content">
        <h3>About Valesco System</h3>
        <div>
         
          <p>This is a multi-usable software composed of five systems used internally. </p>
          <p>1.Direct Transhipment is one of the system forming the majour operations.</p>
          <p>2.Re-Export is another system which works same as Direct Transhipment.</p>
          <p>3.Verification is another third system that is fully dependent on its own operations.</p>
         <p>4.Clearing and Fowarding is the fourth and last system that works based on the nine documents of clearing and fowarding.</p>
         <p>5.Inbox realtime chat system for company employees.</p>
         <p>6.The actions button is the creator of the four systems.</p>
         <p>7.To create a manifest file simply click the button with book icon.</p>
         <p>8.A user can only view his/her logs in transactions he/she has committed!.</p>
          <button class="btn btn-primary md-close"><span class="glyphicon glyphicon-remove"></span></button>
        </div>
      </div>
    </div>     
  </dl>
  </div>
        </div>
        
        <div class="col-md-9">
        <div id="div3" style="display:none;">
        <span id="message"></span> 
    
  <form method="post" id="uploadimage"  enctype="multipart/form-data" class="form-horizontal">
    
    <div class="text-center">
<input class="form-control " type="text" name="action" id="action"  placeholder="Enter action" >
<button type="submit" name="btnSaveAction" value="send" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>save action
        </button>

       

</div>
</form> 
</div>
        

 <div class="well well-small">
                <a href="adhome.php?page=main"><button class="btn btn-inverse btn-block" style="color: black"><strong>Direct Transhipment</strong> </button></a><br>
                <a href="adhome.php?page=re-export"><button class="btn btn-inverse btn-block" style="color: black"><strong>Re-Export</strong> </button></a><br>
                <a href="adhome.php?page=verification"><button class="btn btn-inverse btn-block" style="color: black"><strong>Verification</strong> </button></a><br>
                <a href="adhome.php?page=clearingAndFowarding"><button class="btn btn-inverse btn-block" style="color: black"><strong>Clearing &amp; Fowarding</strong> </button></a><br>
 <input id="email1ss" value="2" type="radio"><i class="icon-remove icon-white"></i>Action
<input id="email1sss" value="2" type="radio"><i class="icon-remove icon-white"></i>Manifest
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
    include('janja/main.php');
    break; 
    
    case($page=='password'):
    include('janja/password.php');
    break;
    case($page=='pic'):
    include('janja/pic.php');
    break;
    case($page=='logout'):
    include('janja/logout.php');
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


   
</div>
        

     <div class="md-overlay"></div><!-- the overlay element -->
     <div class="col-md-3  " >
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="userfetch"><h5>Loading users...</h5></div>

      </div>
    </div>
  </div>
  </div>
   


<!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

<script src="js/lightbox-plus-jquery.min.js"></script>
  <!-- 

      <script src="js/jquery.js"></script> -->
<!-- particles.js container -->


<script src="js/particles.js"></script>
<script src="js/app.js"></script>
<div class="md-overlay"></div><!-- the overlay element -->

    <!-- classie.js by @desandro: https://github.com/desandro/classie -->
    <script src="js/classie.js"></script>
    <script src="js/modalEffects.js"></script>


</body>
</html>

