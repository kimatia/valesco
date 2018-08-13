

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="postscript.js"></script>
<script type="text/javascript" src="postscriptt.js"></script>
<script type="text/javascript" src="postscriptt1.js"></script>
<script type="text/javascript" src="postscriptt2.js"></script>
<script type="text/javascript" src="postscriptt3.js"></script>
<script type="text/javascript" src="postscriptt4.js"></script>
<script type="text/javascript" src="postscriptt5.js"></script>
<script type="text/javascript" src="postscripttt.js"></script>
<script type="text/javascript" src="postscriptttt.js"></script>


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
  var manuuu="";
  $(function (){
    function manTime(){
      setTimeout(manTime, 1000);
 
      if(manifestTimer==10){
  
       $.post("bol.php",{userload:manuuu},function(data){
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
 <script>
  var reExportTimer=10;
  var reExport="";
  $(function (){
    function reTime(){
      setTimeout(reTime, 1000);
 
      if(reExportTimer==10){
  
       $.post("reExportData.php",{ree:reExport},function(data){
        $(".reExport h5").html(data);
       })
       reExportTimer=11;
       clearTimeout(reTime); 
      }
      reExportTimer--;
    }

    reTime(); 
  });

</script>
<!-- Script --> 
<!-- Script -->
 <script>
  var verificationTimer=10;
  var verification="";
  $(function (){
    function veTime(){
      setTimeout(veTime, 1000);
 
      if(verificationTimer==10){
  
       $.post("verificationData.php",{vee:verification},function(data){
        $(".verification h5").html(data);
       })
       verificationTimer=11;
       clearTimeout(veTime); 
      }
      verificationTimer--;
    }

    veTime(); 
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

 
  //number of users
$users=0;
$sql="SELECT * FROM tbl_users";
$resultusers=mysqli_query($mysqli, $sql);
$users=mysqli_num_rows($resultusers);
//bill of ladings file display
if(isset($_GET['data-whatever1'])){
  $stmt_bill_of_lading = $DB_con->prepare('SELECT * FROM tbl_bol WHERE bolID =:uid');
  $stmt_bill_of_lading->execute(array(':uid'=>$id));
  $bolDisplayId = $stmt_bill_of_lading->fetch(PDO::FETCH_ASSOC);
}

//valesco Action
$result = $mysqli->query("SELECT * FROM tbl_action ORDER BY id ASC");
if(!$result){
  echo 'query failed';}

   if(isset($_POST['btnSaveDirectTranshipment'])){
    $rowUniqueRandomCode=rand(1000, 9999);
    $uniqueHashManifestCode=md5($rowUniqueRandomCode);
     $manifestaction=$_POST['manifestType'];
    $manifestfinenumber=$_POST['manifestNumber'];
    $billofladingnumber=$_POST['billOfLadingNumber'];
  $posttime=date("h:i A.",time());
  //tbl stacks
   $MySQL = $DBcon->prepare("INSERT INTO tbl_stackstranshipment(uniqueManifestCode,manifestName,manifestFileNumber,billOfLadingNumber, postDate) VALUES(?,?,?,?,?)");
    if($MySQL){
      $MySQL->bind_param('sssis', $uniqueHashManifestCode,$manifestaction,$manifestfinenumber,$billofladingnumber,$posttime);
      $MySQL->execute();

     //logs and select stacks id for pdf purposes
$pdfid = $mysqli->query("SELECT * FROM tbl_stackstranshipment ORDER BY id DESC limit 1");
$rowPdf = $pdfid->fetch_assoc();
$getid=$rowPdf['id'];

$uniqueHashManifestCode=md5($rowUniqueRandomCode);
$manifestaction=$_POST['manifestType'];
$manifestfinenumber=$_POST['manifestNumber'];
$billofladingnumber=$_POST['billOfLadingNumber'];
$postuser=$row['userName'];
$postuserID=$row['userID'];
$posttime=date("h:i A.",time());
$txt1="User";
$txt2="created a manifest of file";
$txt3="containing";
$txt5="bill of lading files";
$txt4="at";
$actions= $txt1 . " " . $postuser." ".$txt2." ".$manifestfinenumber." ".$txt3." ".$billofladingnumber." ".$txt5." ".$txt4." ".$posttime;
$SQL1 = $DBcon->prepare("INSERT INTO tbl_manifestLogs(stackID,userID,postUser,action, postDate) VALUES(?,?,?,?,?)");
$SQL1->bind_param('iisss',$getid,$postuserID,$postuser,$actions,$posttime);
$SQL1->execute();
      // echo "<div class='alert alert-success'>
      //         <button class='close' data-dismiss='alert'>&times;</button>
      //         <strong>Success!</strong>.Manifest Created.</div>";
       
    }else{
       echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Error while creating manifest
           </div>";
  }

  //tbl bill of ladings
  

   $stackIdRow = $mysqli->query("SELECT * FROM tbl_stackstranshipment ORDER BY id DESC limit 1");
   $rowStack = $stackIdRow->fetch_assoc();
    $stackId=$rowStack['id'];
    $_SESSION['stackId']=$stackId;
    //tittle of respective bill of ladings
$iterateNameOfBillOfLading=1;
while($iterateNameOfBillOfLading<$billofladingnumber)
{
  $iterateNameOfBillOfLading++;
}
  //sql statement for entry of manifest containing assigned bill of lading number variable $i
$i=$SQL = $DBcon->prepare("INSERT INTO tbl_manifest(uniqueManifestCode,stackID,iterateTittle,manifestName,manifestFileNumber,billOfLadingNumber, postDate) VALUES(?,?,?,?,?,?,?)");

  $i=1;
  for ($i=1; $i<=$billofladingnumber; $i++)
    if($SQL){

      $SQL->bind_param('siissis',$uniqueHashManifestCode,$_SESSION['stackId'],$iterateNameOfBillOfLading, $manifestaction,$manifestfinenumber,$billofladingnumber,$posttime);
      $SQL->execute();

//to create table in sql run......to be worked on
// $t=1;
// $hee="test"."".$t;
// while ( $t<=4){
// for ($i=1; $i<=5; $i++){
// $i=$SQL = $DBcon->query("CREATE TABLE $hee(id INT, label CHAR(1))");
// }
// $t++;
// }

    }else{
       echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Error while saving bill of ladings
           </div>";
  }
  }


//lock
     if(isset($_GET['lock_id'])&& !empty($_GET['lock_id']))
  {
   $id = $_GET['lock_id'];
        $stmt_lock = $DB_con->prepare('SELECT display FROM tbl_action WHERE id =:uid');
        $stmt_lock->execute(array(':uid'=>$id));
        $lock_row = $stmt_lock->fetch(PDO::FETCH_ASSOC);
        extract($lock_row);
       $actionlock = 1;// user login type
            if(!isset($errMSG))
            {
            $stmt = $DB_con->prepare('UPDATE tbl_action SET display=:ulock WHERE id=:uid');
            $stmt->bindParam(':ulock',$actionlock);
            $stmt->bindParam(':uid',$id);

            if($stmt->execute()){
        echo "<script>window.location.assign('adhome.php')</script>";
               ?>

         <script type="text/javascript">
  


$(document).ready(function(){
  
    $("#div2").show();
 
});
          </script>
               <?php 
            }
            else{
                $errMSG = "Sorry, could not lock!";
            }

        }
    
  }
  //unlock
     if(isset($_GET['unlock_id'])&& !empty($_GET['unlock_id']))
  {
   $id = $_GET['unlock_id'];
        $stmt_lock = $DB_con->prepare('SELECT display FROM tbl_action WHERE id =:uid');
        $stmt_lock->execute(array(':uid'=>$id));
        $lock_row = $stmt_lock->fetch(PDO::FETCH_ASSOC);
        extract($lock_row);
       $actionunlock = 0;// user login type
            if(!isset($errMSG))
            {
            $stmt = $DB_con->prepare('UPDATE tbl_action SET display=:ulock WHERE id=:uid');
            $stmt->bindParam(':ulock',$actionunlock);
            $stmt->bindParam(':uid',$id);

            if($stmt->execute()){
        echo "<script>window.location.assign('adhome.php')</script>";
               ?>

         <script type="text/javascript">
  


$(document).ready(function(){
  
    $("#div2").show();
 
});
          </script>
               <?php 
            }
            else{
                $errMSG = "Sorry, could not lock!";
            }

        }
    
  }

    //delete actions
  if(isset($_GET['delete_action']))
  {
   
 // it will delete an actual record from db
    $stmt_delete = $DB_con->prepare('DELETE FROM tbl_action WHERE id =:uid');
    $stmt_delete->bindParam(':uid',$_GET['delete_action']);
    $stmt_delete->execute();

    header("Location: adhome.php");
  }
  if (isset($_POST['btnsavebol'])) {


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
          echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Please Enter bill of lading name.
           </div>";
            
        }
        if(empty($arrivalvessel)){
          echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Please Enter arrival vessel.
           </div>";
          
        }
        else if(empty($voyagenumber)){
          echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Please Enter voyage number.
           </div>";
          
        }
        else if(empty($arrivaldate)){
          echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Please Enter Your arrival date.
           </div>";
            
        }
        else if(empty($containernumber)){
          echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Please Enter Your More container number.
           </div>";
          
        }
        else if(empty($description)){
          echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Please Enter Your Hover description.
           </div>";
            
        }
        else if(empty($sealnumber)){
          echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Please Enter Your Hover sealnumber.
           </div>";
          
        }
        else if(empty($imgFile)){
          echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Please Select Image File.
           </div>";
        
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

     
      echo "<div class='alert alert-success'>
              <button class='close' data-dismiss='alert'>&times;</button>
              <strong>Success!</strong>.Bill of lading file saved!.</div>";

            $id = $billofladingid;
            $display=1;
           
            $stmt = $DB_con->prepare('UPDATE tbl_manifest SET display=:udisplay WHERE id=:uid');
            $stmt->bindParam(':udisplay',$display);
            $stmt->bindParam(':uid',$id);

            $stmt->execute();
  

  

    }else{
       echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Error while saving bol record
           </div>";
  }

}


if(isset($_POST['btnsavevessel'])){
  $outgoingvessel=$_POST['outgoingVessel'];
  $bookingnumber=$_POST['bookingNumber'];
  $bookingdate=$_POST['bookingDate'];
  $stackidentity=$_POST['stackIdentity'];
  $postuser=$row['userName'];
  $posttime=date("h:i A.",time());
  $postdate=date("d:m:y",time());
  
        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];

        if(empty($outgoingvessel)){
          echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Please Enter outgoing vessel.
           </div>";
            
        }
        if(empty($bookingnumber)){
          echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Please Enter booking number.
           </div>";
            
        }
     
        else if(empty($imgFile)){
          echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Please Select Image File.
           </div>";
        
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
  $SQL = $DBcon->prepare("INSERT INTO tbl_vessel(stackID,vesselName,bookingNumber,bookingCopy,bookingDate,postTime, postDate) VALUES(?,?,?,?,?,?,?)");

    if($SQL){
      $SQL->bind_param('issssss', $stackidentity,$outgoingvessel,$bookingnumber,$userpic,$bookingdate,$posttime,$postdate);
      $SQL->execute();

     
      $stmt = $DB_con->prepare('UPDATE tbl_stackstranshipment SET tempVesselDisplay=:uvess WHERE id=:uid');
      $stmt->bindParam(':uvess',$vesselSet);
      $stmt->bindParam(':uid',$id);
    //logs
$outgoingvessel=$_POST['outgoingVessel'];
$bookingnumber=$_POST['bookingNumber'];
$bookingdate=$_POST['bookingDate'];
$stackidentity=$_POST['stackIdentity'];
$postuser=$row['userName'];
$postuserID=$row['userID'];
$posttime=date("h:i A.",time());
$txt1="User";
$txt2="created an outgoing vessel";
$txt3="with booking number";
$txt4="and";
$txt4="on";
$actions= $txt1 . " " . $postuser." ".$txt2." ".$outgoingvessel." ".$txt3." ".$bookingnumber." ".$txt4." ".$bookingdate." ".$posttime;
$SQL1 = $DBcon->prepare("INSERT INTO tbl_manifestLogs(stackID,userID,postUser,action, postDate) VALUES(?,?,?,?,?)");
$SQL1->bind_param('iisss',$stackidentity,$postuserID,$postuser,$actions,$posttime);
$SQL1->execute();

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

if(isset($_GET['userIDd'])){
require('WriteHTML.php');

$pdf=new PDF_HTML();

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
$pdf->Image('logo.gif',15,13,20);
$pdf->SetFont('Arial','B',14);
$pdf->WriteHTML('<para><h1>KIMS PROGRAMMING</h1><br>
Website: <u>www.kimsprogramming.com</u></para><br>');

$pdf->SetFont('Arial','B',7); 
$htmlTable='<TABLE>
<TR>
<TD>Name:</TD>
<TD>'.$_POST['name'].'</TD>
</TR>
<TR>
<TD>Number:</TD>
<TD>'.$_POST['number'].'</TD>
</TR>
<TR>
<TD>Email:</TD>
<TD>'.$_POST['email'].'</TD>
</TR>
<TR>
<TD>URl:</TD>
<TD>'.$_POST['url'].'</TD>
</TR>
<TR>
<TD>Comment:</TD>
<TD>'.$_POST['comment'].'</TD>
</TR>
</TABLE>';

$pdf->WriteHTML2("<br><br><br>$htmlTable");
$pdf->SetFont('Arial','B',6);

$pdf->SetFont('Arial','B',14);
$pdf->WriteHTML('<para><h1>KIMS PROGRAMMING</h1><br>
Website: <u>www.kimsprogramming.com</u></para><br>');

$pdf->Output();
}


//verification
 if(isset($_POST['btnSaveVerification'])){
    $verificationaction=$_POST['manifestType'];
    $containernumber=$_POST['containerNumber'];
    $billofladingnumber=$_POST['billOfLadingNumber'];
    $dateofreceipt=$_POST['dateOfReceipt'];
    $dateofverification=$_POST['dateOfVerification'];
    $oldsealnumber=$_POST['oldSealNumber'];
    $newsealnumber=$_POST['newSealNumber'];
    $dateofsubmission=$_POST['dateOfSubmission'];
    $postuser=$row['userName'];
    $posttime=date("h:i A.",time());
  //tbl stacks
   $MySQL = $DBcon->prepare("INSERT INTO tbl_stacksverification(valescoAction,containerNumber,billOfLadingNumber,dateOfReceipt,dateOfVerification,oldSealNumber,newSealNumber,dateOfSubmission,postUser,postTime) VALUES(?,?,?,?,?,?,?,?,?,?)");
    if($MySQL){
      $MySQL->bind_param('ssisssssss', $verificationaction,$containernumber,$billofladingnumber,$dateofreceipt,$dateofverification,$oldsealnumber,$newsealnumber,$dateofsubmission,$postuser,$posttime);
      $MySQL->execute();

     //logs

$rowUniqueRandomCode=rand(1000, 9999);
$uniqueHashVerificationCode=md5($rowUniqueRandomCode);
$verificationaction=$_POST['manifestType'];
$containernumber=$_POST['containerNumber'];
$billofladingnumber=$_POST['billOfLadingNumber'];
$dateofreceipt=$_POST['dateOfReceipt'];
$dateofverification=$_POST['dateOfVerification'];
$oldsealnumber=$_POST['oldSealNumber'];
$newsealnumber=$_POST['newSealNumber'];
$dateofsubmission=$_POST['dateOfSubmission'];
$postuser=$row['userName'];
$postuserid=$row['userID'];
$posttime=date("h:i A.",time());
$txt1="User";
$txt2="created a verification file of container number";
$txt3="containing";
$txt5="bill of lading file(s).";
$txt4="Its date of receipt was on";
$txt6="and verification date on";
$txt7=".";
$txt8="It has old seal number";
$txt9="and new seal number";
$txt10=".It was posted on";
$actions= $txt1." ".$postuser." ".$txt2." ".$containernumber." ".$txt3." ".$billofladingnumber." ".$txt5." ".$txt4." ".$dateofreceipt." ".$txt6." ".$dateofverification." ".$txt7." ".$txt8." ".$oldsealnumber." ".$txt9." ".$newsealnumber." ".$txt10." ".$posttime;
$SQL1 = $DBcon->prepare("INSERT INTO tbl_verificationlogs(userIdentity,postUser,action, postDate) VALUES(?,?,?,?)");
$SQL1->bind_param('ssss',$postuserid,$postuser,$actions,$posttime);
$SQL1->execute();
      
    }else{
       echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Error while inserting verification 
           </div>";
  }

//tbl bill of ladings
  
 $stackIdRow = $mysqli->query("SELECT * FROM tbl_stacksverification ORDER BY id DESC limit 1");
   $rowStack = $stackIdRow->fetch_assoc();
    $stackId=$rowStack['id'];
    $_SESSION['stackId']=$stackId;
    //tittle of respective bill of ladings
$iterateNameOfBillOfLading=1;
while($iterateNameOfBillOfLading<$billofladingnumber)
{
  $iterateNameOfBillOfLading++;
}
  //sql statement for entry of manifest containing assigned bill of lading number variable $i
$i=$SQL = $DBcon->prepare("INSERT INTO tbl_verification(uniqueManifestCode,stackID,iterateTittle,manifestName,billOfLadingNumber,postDate) VALUES(?,?,?,?,?,?)");

  $i=1;
  for ($i=1; $i<=$billofladingnumber; $i++)
    if($SQL){

      $SQL->bind_param('ssssss',$uniqueHashVerificationCode,$_SESSION['stackId'],$iterateNameOfBillOfLading,$verificationaction,$billofladingnumber,$posttime);
      $SQL->execute();



    }else{
       echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Error while saving bill of ladings
           </div>";
  }
  }
if(isset($_POST['btnSaveReExport'])){
  $manifesttype=$_POST['manifestType'];
  $containernumber=$_POST['containerNumber'];
  $billofladingnumber=$_POST['billOfLadingNumber'];
  $cfsname=$_POST['cfsName'];
  $outgoingvessel=$_POST['outgoingVessel'];
  $transportcharges=$_POST['transportCharges'];
  $cfscharges=$_POST['cfsCharges'];
  $customwarehouse=$_POST['customWarehouse'];
  $kpaexport=$_POST['kpaExport'];
  $postuser=$row['userName'];
  $posttime=date("h:i A.",time());
      
  $SQL = $DBcon->prepare("INSERT INTO tbl_stacksexport(manifestType,containerNumber,numberOfBillOfLading,cfsName,outgoingVessel,transportCharges, cfsCharges,customWarehouseCharges,kpaExportCharges,postUser,postDate) VALUES(?,?,?,?,?,?,?,?,?,?,?)");

    if($SQL){
      $SQL->bind_param('ssissssssss',$manifesttype,$containernumber,$billofladingnumber,$cfsname,$outgoingvessel,$transportcharges,$cfscharges,$customwarehouse,$kpaexport,$postuser,$posttime);
      $SQL->execute();

$rowUniqueRandomCode=rand(1000, 9999);
$uniqueHashVerificationCode=md5($rowUniqueRandomCode);
$verificationaction=$_POST['manifestType'];
$containernumber=$_POST['containerNumber'];
$billofladingnumber=$_POST['billOfLadingNumber'];
$dateofreceipt=$_POST['dateOfReceipt'];
$dateofverification=$_POST['dateOfVerification'];
$oldsealnumber=$_POST['oldSealNumber'];
$newsealnumber=$_POST['newSealNumber'];
$dateofsubmission=$_POST['dateOfSubmission'];
$postuser=$row['userName'];
$postuserid=$row['userID'];
$posttime=date("h:i A.",time());
$txt1="User";
$txt2="created a verification file of container number";
$txt3="containing";
$txt5="bill of lading file(s).";
$txt4="Its date of receipt was on";
$txt6="and verification date on";
$txt7=".";
$txt8="It has old seal number";
$txt9="and new seal number";
$txt10=".It was posted on";
$actions= $txt1." ".$postuser." ".$txt2." ".$containernumber." ".$txt3." ".$billofladingnumber." ".$txt5." ".$txt4." ".$dateofreceipt." ".$txt6." ".$dateofverification." ".$txt7." ".$txt8." ".$oldsealnumber." ".$txt9." ".$newsealnumber." ".$txt10." ".$posttime;
$SQL1 = $DBcon->prepare("INSERT INTO tbl_reexportlogs(userIdentity,postUser,action, postDate) VALUES(?,?,?,?)");
$SQL1->bind_param('ssss',$postuserid,$postuser,$actions,$posttime);
$SQL1->execute();
    }
            else{
              echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Error while saving re-export file
           </div>";
            }

//tbl bill of ladings
  
 $stackIdRow = $mysqli->query("SELECT * FROM tbl_stacksexport ORDER BY id DESC limit 1");
   $rowStack = $stackIdRow->fetch_assoc();
    $stackId=$rowStack['id'];
    $_SESSION['stackId']=$stackId;
    //tittle of respective bill of ladings
$iterateNameOfBillOfLading=1;
while($iterateNameOfBillOfLading<$billofladingnumber)
{
  $iterateNameOfBillOfLading++;
}
  //sql statement for entry of manifest containing assigned bill of lading number variable $i
$i=$SQL = $DBcon->prepare("INSERT INTO tbl_reexport(uniqueManifestCode,stackID,iterateTittle,manifestName,billOfLadingNumber,postDate) VALUES(?,?,?,?,?,?)");

  $i=1;
  for ($i=1; $i<=$billofladingnumber; $i++)
    if($SQL){

      $SQL->bind_param('ssssss',$uniqueHashVerificationCode,$_SESSION['stackId'],$iterateNameOfBillOfLading,$verificationaction,$billofladingnumber,$posttime);
      $SQL->execute();



    }else{
       echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Error while saving bill of ladings
           </div>";
  }
}
//check out a particular file stack
if (isset($_GET['view'])){
  $_SESSION['view'] = $_GET['view'];
  header("location: stack.php");
}

if(isset($_POST['btn-add-stack'])){

 $sNumber = $_POST['stackNumber'];

 $SQL = $con->prepare("INSERT INTO tbl_stacks(stackNumber, postDate) VALUES(?,now())");
 if(!$SQL){
  echo $con->error;
  $msgCreateStack = "<div class='alert alert-danger'>
    <button class='close' data-dismiss='alert'>&times;</button>
     <strong>Sorry!</strong>  Create failed.
     </div>
     ";
  ?>
  <script>
  window.location.href='adhome.php?page=clearingAndFowarding';
  </script>
  <?php
}else{

  $SQL->bind_param('s',$sNumber);
  $SQL->execute();
   ?>
  <script>
  window.location.href='adhome.php?page=clearingAndFowarding';
  </script>
  <?php
  $msgCreateStack = "<div class='alert alert-success'>
    <button class='close' data-dismiss='alert'>&times;</button>
     <strong>Success !</strong>  Post success.
     </div>
     ";
}

}


//edit file  in that stack
if (isset($_GET['editbol'])){
  $_SESSION['editbol'] = $_GET['editbol'];
  $_SESSION['editfile'] = "bol";
  header("location: editFile.php");
}

if (isset($_GET['editidf'])){
  $_SESSION['editidf'] = $_GET['editidf'];
  $_SESSION['editfile'] = "idf";
  header("location: editFile.php");
}

if (isset($_GET['editkbs'])){
  $_SESSION['editkbs'] = $_GET['editkbs'];
  $_SESSION['editfile'] = "kbs";
  header("location: editFile.php");
}

if (isset($_GET['editecert'])){
  $_SESSION['editecert'] = $_GET['editecert'];
  $_SESSION['editfile'] = "ecert";
  header("location: editFile.php");
}

if (isset($_GET['editinvoice'])){
  $_SESSION['editinvoice'] = $_GET['editinvoice'];
  $_SESSION['editfile'] = "invoice";
  header("location: editFile.php");
}

if (isset($_GET['edittreciept'])){
  $_SESSION['edittreciept'] = $_GET['edittreciept'];
  $_SESSION['editfile'] = "treciept";
  header("location: editFile.php");
}

if (isset($_GET['editquadruplicate'])){
  $_SESSION['editquadruplicate'] = $_GET['editquadruplicate'];
  $_SESSION['editfile'] = "quadruplicate";
  header("location: editFile.php");
}

if (isset($_GET['editlbook'])){
  $_SESSION['editlbook'] = $_GET['editlbook'];
  $_SESSION['editfile'] = "lbook";
  header("location: editFile.php");
}



//check stack number to direct input of files in that stack
if (isset($_GET['addBOL'])){
  $_SESSION['stackNumber'] = $_GET['addBOL'];
  $_SESSION['file'] = "BOL";
  $page="addBOL";
  ?>
  <script>
  window.location.href='addFile.php';
  </script>
  <?php
}

if (isset($_GET['addIDF'])){
  $_SESSION['stackNumber'] = $_GET['addIDF'];
  $_SESSION['file'] = "IDF";
  header("location: addFile.php");
}

if (isset($_GET['addKBS'])){
  $_SESSION['stackNumber'] = $_GET['addKBS'];
  $_SESSION['file'] = "KBS";
  header("location: addFile.php");
}

if (isset($_GET['addECert'])){
  $_SESSION['stackNumber'] = $_GET['addECert'];
  $_SESSION['file'] = "ECert";
  header("location: addFile.php");
}

if (isset($_GET['addInvoice'])){
  $_SESSION['stackNumber'] = $_GET['addInvoice'];
  $_SESSION['file'] = "Invoice";
  header("location: addFile.php");
}

if (isset($_GET['addTReciept'])){
  $_SESSION['stackNumber'] = $_GET['addTReciept'];
  $_SESSION['file'] = "TReciept";
  header("location: addFile.php");
}

if (isset($_GET['addQuadruplicate'])){
  $_SESSION['stackNumber'] = $_GET['addQuadruplicate'];
  $_SESSION['file'] = "Quadruplicate";
  header("location: addFile.php");
}

if (isset($_GET['addLBook'])){
  $_SESSION['stackNumber'] = $_GET['addLBook'];
  $_SESSION['file'] = "LBook";
  header("location: addFile.php");
}

/* code for data delete */
if(isset($_GET['deleteStack']))
{
 $SQL = $con->prepare("DELETE FROM tbl_stacks WHERE id=".$_GET['deleteStack']);
 $SQL->bind_param("i",$_GET['deleteStack']);
 $SQL->execute();
  ?>
  <script>
  window.location.href='adhome.php?page=clearingAndFowarding';
  </script>
  <?php
}
/* code for data delete */

// lock stack
if(isset($_GET['lockStack']))
{

 $positive = "Yes";
 $sql = $con->prepare("UPDATE tbl_stacks SET finalDate=now(), status=? WHERE id=?");
 $sql->bind_param("ss",$positive,$_GET['lockStack']);
 $sql->execute();

  ?>
  <script>
  window.location.href='adhome.php?page=clearingAndFowarding';
  </script>
  <?php
}

// unlock stack
if(isset($_GET['unlockStack']))
{
  $negative = "No";
  $open = "pending";
  $sql = $con->prepare("UPDATE tbl_stacks SET finalDate=?, status=? WHERE id=?");
  $sql->bind_param("sss",$open,$negative,$_GET['unlockStack']);
  $sql->execute();
  ?>
  <script>
  window.location.href='adhome.php?page=clearingAndFowarding';
  </script>
  <?php
}
 if(isset($_GET['getActive'])&& !empty($_GET['getActive']))
  {
       $id = $_GET['getActive'];
        $stmt_activate = $DB_con->prepare('SELECT activeDeactive FROM  tbl_stackstranshipment WHERE id =:uid');
        $stmt_activate->execute(array(':uid'=>$id));
        $activate_row = $stmt_activate->fetch(PDO::FETCH_ASSOC);
        extract($activate_row);
        $status = "active";// status
        $activeDeactive = 0;// value
            if(!isset($errMSG))
            {
            $stmt = $DB_con->prepare('UPDATE  tbl_stackstranshipment SET manifestStatus=:ustatus, activeDeactive=:uactivate  WHERE id=:uid');
            $stmt->bindParam(':ustatus',$status);
             $stmt->bindParam(':uactivate',$activeDeactive);
            $stmt->bindParam(':uid',$id);

            if($stmt->execute()){
             ?>
  <script>
  window.location.href='adhome.php?page=main';
  </script>
  <?php   
            }
            else{
                $errMSG = "Sorry, could activate entry!";
            }

        }
    
  }
  if(isset($_GET['getDeactive'])&& !empty($_GET['getDeactive']))
  {
       $id = $_GET['getDeactive'];
        $stmt_deactive = $DB_con->prepare('SELECT activeDeactive FROM  tbl_stackstranshipment WHERE id =:uid');
        $stmt_deactive->execute(array(':uid'=>$id));
        $deactivate_row = $stmt_deactive->fetch(PDO::FETCH_ASSOC);
        extract($deactivate_row);
        $status = "closed";// status
        $deactiveActive = 1;// value
            if(!isset($errMSG))
            {
            $stmt = $DB_con->prepare('UPDATE  tbl_stackstranshipment SET manifestStatus=:ustatus, activeDeactive=:uactivate  WHERE id=:uid');
            $stmt->bindParam(':ustatus',$status);
             $stmt->bindParam(':uactivate',$deactiveActive);
            $stmt->bindParam(':uid',$id);

            if($stmt->execute()){
             ?>
  <script>
  window.location.href='adhome.php?page=main';
  </script>
  <?php   
            }
            else{
                $errMSG = "Sorry, could deactivate entry!";
            }

        }
    
  }
   if(isset($_POST['btnSaveManifestFile'])){

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

 $insertImageId=$_POST['manifestid'];
  $manifestFile=$_FILES["file"]["name"];

  $SQL = $con->prepare("UPDATE tbl_stackstranshipment set manifestFile=? where id=? ");

    if($SQL){
      $SQL->bind_param('si',$manifestFile,$insertImageId);
      $SQL->execute();
      if(!$SQL)
      {
       echo $con->error;
      }
      move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
      echo "<div class='alert alert-success'>
              <button class='close' data-dismiss='alert'>&times;</button>
              <strong>Success!</strong>.File Inserted</div>";

            $id = $insertImageId;
            $display=1;
           
            $stmt_display = $DB_con->prepare('UPDATE tbl_stackstranshipment SET display=:udisplay WHERE id=:uid');
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
$idd=$_GET['id'];
if(isset($_POST['btnSavePages'])){
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

  $manifestPages=$_FILES["file"]["name"];
  $postuser=$row['userName'];
  $posttime=date("h:i A.",time());
  $SQL = $con->prepare("INSERT INTO tbl_manifestview(stackID,manifestImage, postUser, postDate) VALUES(?,?,?,?)");

    if($SQL){
      $SQL->bind_param('isss',$stackidentity,$manifestPages,$postuser,$posttime);
      $SQL->execute();

//logs
$idd = $_POST['manifestid'];
$stmt_select = $DB_con->prepare('SELECT * FROM tbl_manifest WHERE stackID =:uid');
$stmt_select->execute(array(':uid'=>$idd));
$selected_data = $stmt_select->fetch(PDO::FETCH_ASSOC);
$manifestfilenumberumber=$selected_data['manifestFileNumber'];
$stackidentity=$_POST['stackIdentity'];
$postuser=$row['userName'];
$postuserID=$row['userID'];
$posttime=date("h:i A.",time());
$manifestPages=$_FILES["file"]["name"];
$txt1="User";
$txt2="Inserted another page";
$txt3="of file";
$txt4="at";
$actions= $txt1 . " " . $postuser." ".$txt2." ".$manifestPages." ".$txt3." ".$manifestfilenumberumber." ".$txt4." ".$posttime;
$SQL1 = $DBcon->prepare("INSERT INTO tbl_manifestLogs(stackID,userID,postUser,action, postDate) VALUES(?,?,?,?,?)");
$SQL1->bind_param('iisss',$idd,$postuserID,$postuser,$actions,$posttime);
$SQL1->execute();
      if(!$SQL)
      {
       echo $con->error;
      }
      move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
      echo "<div class='alert alert-success'>
              <button class='close' data-dismiss='alert'>&times;</button>
              <strong>Success!</strong>.Page Inserted</div>";
      ?>
  <script>
  window.location.href='adhome.php';
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
    include('main.php');
    break; 
     case($page=='re-export'):
     include('reExport.php');
    break;
    case($page=='verification'):
    include('verification.php');
    break;
    case($page=='clearingAndFowarding'):
    include('clearingAndFowarding.php');
    break;
    case($page=='billOfLading'):
    include('billOfLading.php');
    break;
    case($page=='info'):
    include('janja/info.php');
    break;
    case($page=='profile'):
    include('janja/profile.php');
    break;
    case($page=='addBOL'):
    include('addFile.php');
    break;
    case($page=='addIDF'):
    include('addFile.php');
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
 

  
 <script>
    $('#exampleModalDirectTranshipment').on('show.bs.modal', function (event) {
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
    
    $('#exampleModalVerification').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever9') // Extract info from data-* attributes
          var modal9 = $(this);
          var dataString9 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "createManifest.php",
                data: dataString9,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal9.find('.verify').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>
<script type="text/javascript">
    
    $('#exampleModalReExport').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever9') // Extract info from data-* attributes
          var modal9 = $(this);
          var dataString9 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "createManifest.php",
                data: dataString9,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal9.find('.dashRe-Export').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>
<script type="text/javascript">
    
    $('#exampleModalClearingAndFowarding').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever9') // Extract info from data-* attributes
          var modal9 = $(this);
          var dataString9 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "createManifest.php",
                data: dataString9,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal9.find('.clearingFowarding').html(data);
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
    
    $('#bolModalVerification').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever11') // Extract info from data-* attributes
          var modal11 = $(this);
          var dataString11 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "verificationBillOfLadings.php",
                data: dataString11,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal11.find('.bolVerification').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>
<script type="text/javascript">
    
    $('#bolModalRe-export').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever12') // Extract info from data-* attributes
          var modal12 = $(this);
          var dataString12 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "reExportBillOfLadings.php",
                data: dataString12,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal12.find('.re-export').html(data);
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
                    modal2.find('.manifest1').html(data);
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
          var dataString6 = 'userID=' + recipient;

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
<script type="text/javascript">
    
    $('#invoiceMagnifyReExport').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever13') // Extract info from data-* attributes
          var modal13 = $(this);
          var dataString13 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "invoiceReExport.php",
                data: dataString13,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal13.find('.invoiceDataReExport').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>
<script type="text/javascript">
    
    $('#invoiceMagnifyVerification').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever14') // Extract info from data-* attributes
          var modal14 = $(this);
          var dataString14 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "invoiceVerification.php",
                data: dataString14,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal14.find('.invoiceDataVerification').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>
<script type="text/javascript">
    
    $('#bookingCopyShow').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever15') // Extract info from data-* attributes
          var modal15 = $(this);
          var dataString15 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "bookingCopy.php",
                data: dataString15,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal15.find('.bookingCopy').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>
<script type="text/javascript">
    
    $('#manifestPage').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever16') // Extract info from data-* attributes
          var modal16 = $(this);
          var dataString16 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "manifestRecords.php",
                data: dataString16,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal16.find('.manifestRecords').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>
<script type="text/javascript">
    
    $('#manifestPages').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal17
          var recipient = button.data('whatever17') // Extract info from data-* attributes
          var modal17 = $(this);
          var dataString17 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "manifestPages.php",
                data: dataString17,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal17.find('.manifestPagesRecord').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>
<script type="text/javascript">
    
    $('#billOFLadingFileAdd').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal17
          var recipient = button.data('whatever18') // Extract info from data-* attributes
          var modal18 = $(this);
          var dataString18 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "billOfLadingRecords.php",
                data: dataString18,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal18.find('.billOfLadingAdd').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>
<script type="text/javascript">
    
    $('#invoiceAdd').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal17
          var recipient = button.data('whatever19') // Extract info from data-* attributes
          var modal19 = $(this);
          var dataString19 = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "invoiceRecords.php",
                data: dataString19,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal19.find('.invoiceDisplay').html(data);
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
     <script>
    function mySearchExport() {

      // Declare variables
      var input, filter, table, tr, td, i;
      input = document.getElementById("formsExport");
      filter = input.value.toUpperCase();
      table = document.getElementById("formsTableExport");
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
<script>
    function mySearchVerify() {

      // Declare variables
      var input, filter, table, tr, td, i;
      input = document.getElementById("formsVerify");
      filter = input.value.toUpperCase();
      table = document.getElementById("formsTableVerify");
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
   
<script>
    function mySearchClear() {

      // Declare variables
      var input, filter, table, tr, td, i;
      input = document.getElementById("formsClear");
      filter = input.value.toUpperCase();
      table = document.getElementById("formsTableClear");
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

