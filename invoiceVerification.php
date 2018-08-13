 
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


$idd=$_GET['id'];
?>
<div id="printableArea17">
   <div id="form">
       
<?php
        $id = $_GET['id'];
    
        $stmt_select = $DB_con->prepare('SELECT * FROM tbl_invoiceverify WHERE stackID =:uid');
        $stmt_select->execute(array(':uid'=>$id));
        
    
    if($stmt_select->rowCount() > 0)
    {
        while($row=$stmt_select->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>

        <center><h4><strong><?php echo "Invoice Number- " .$row['invoiceNumber']; ?></strong></h4></center> 

   <a href="#" data-toggle="modal" data-target="#invoiceMagnifyData" data-whatever8=<?php echo $row['id'];?> ><img src="upload/<?php echo $row['invoiceFile']; ?>" class="img-rounded" width="550px" height="480px" /></a>
         
      <?php
    }
  }
    ?>
    </div>

<input type="button" onclick="printDiv('printableArea17')" class="btn btn-lg btn-default" value="print!" />
</body>
</html>
 