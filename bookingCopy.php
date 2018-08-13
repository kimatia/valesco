 
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
<!DOCTYPE html>
<html>
<head>

</head>
<body  onload="startTime()" ng-app='myapp'>

   <div class="row">
     
        <?php
        $id = $_GET['id'];
        $stmt_select = $DB_con->prepare('SELECT * FROM tbl_vessel WHERE id =:uid');
        $stmt_select->execute(array(':uid'=>$id));
        
    if($stmt_select->rowCount() > 0)
    {
        while($row=$stmt_select->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
  
<a href="#" ><img src="upload/<?php echo $row['bookingCopy']; ?>" class="img-rounded" width="500px" height="430px" /></a>
  
    
                <?php
        }
    }

?>  

 
    </div>
</body>
</html>
 