 
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

<div class="row">
  <?php
        $idd = $_GET['id'];

        $stmt_select = $DB_con->prepare('SELECT * FROM tbl_manifestview WHERE stackID =:uid');
        $stmt_select->execute(array(':uid'=>$idd));
        
    
    if($stmt_select->rowCount() > 0)
    {
        while($row=$stmt_select->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            
<div class="col-md-3">
<center><h4><strong>Page <?php echo $row['id']; ?></strong></h4></center>

<section>
    <div>
      <a class="example-image-link" href="upload/<?php echo $row['manifestImage']; ?>" data-lightbox="example-1"><img src="upload/<?php echo $row['manifestImage']; ?>" class="img-rounded" width="100px" height="100px" /></a>

</div>
</section>
  
   </div>

   <?php
        }
    }

?> 
 
 </div> 
<br>
<?php
$row['id']=$idd;
?>
<a href="#" data-toggle="modal" data-target="#manifestPages" data-whatever17=<?php echo $row['id']; ?> class="btn btn-large btn-primary" style="background-color: blue; color: white;">Add More Pages To This Manifest</a>
 <!-- <center><a href="manifestPages.php?addManifest=<?php echo $idd; ?>" ><span class="badge badge-warning" style="background-color: blue;">Add More Pages To This Manifest</span></center> -->

 