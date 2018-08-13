 
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
   

?>

<body>
   <div class="row">
        
        <?php
        $id = $_GET['id'];
        $stmt_select = $DB_con->prepare('SELECT * FROM tbl_manifest WHERE stackID =:uid');
        $stmt_select->execute(array(':uid'=>$id));
        
    
    if($stmt_select->rowCount() > 0)
    {
        while($row=$stmt_select->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
<?php 
if ($row['display']==1) {
   ?>
   
<div class="col-md-3">
  <div class="panel-heading">

    <?php
 
   $stmt_select_image = $DB_con->prepare('SELECT * FROM tbl_bol WHERE bolID= :uid');
    $stmt_select_image->execute(array(':uid'=>$id));
    $stmt_select_image->execute();
  
  if($stmt_select_image->rowCount() > 0)
  {
    while($rowImage=$stmt_select_image->fetch(PDO::FETCH_ASSOC))
    {
      extract($rowImage);
      ?>
      <section>
    <div>
    <div id="<?php echo $rowImage['id']?>"> 
      <div class="panel-heading">
    <h5><center><?php echo "BL ".$rowImage['id'];?></center></h5>
  </div>
        <a href="billOfLading.php?bolRecordId=<?php echo $rowImage['id'];?>"><img src="upload/<?php echo $rowImage['bolFile']; ?>" class="img-rounded" width="90px" height="90px" /></a></br>
        <input type="button" onclick="printDiv('<?php echo $rowImage['id']?>')" class="btn btn-sm btn-default" value="print!" />
     </div> 
     </div>
     </section>  
      <?php
    }
  }
    ?>
    
  </div>
   </div>


   <?php
}elseif($row['display']==0){
  ?>
  <div class="col-md-3">
   <section>
    <div>
    <div id="<?php echo $rowImage['id']?>"> 
  <div class="panel-heading">
    <h5><center><?php echo "BL ".$row['id'];?></center></h5>
  </div>
    <div class="panel-body">
<a href="billOfLadingRecords.php?bolInsertId=<?php echo $row['id']; ?>&manifestId=<?php echo $row['stackID'];?>" class="btn btn-large btn-primary"><i class="fa fa-file fa-5x" style="color:green"></i>
        </a> 
        <input type="button" onclick="printDiv('<?php echo $rowImage['id']?>')" class="btn btn-sm btn-default" value="print!" />
     </div> 
     </div>
     </div>
     </section>  
    </div>

  <?php  
}

?>
  
    
                <?php
        }
    }

?>  
    
 
 </div>