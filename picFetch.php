
<?php
session_start();
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
<section>
<div>
 <a class="example-image-link" href="upload/<?php echo $row['userPic']; ?>" data-lightbox="example-set" ><img src="upload/<?php echo $row['userPic']; ?>" width="264" height="184" class="round-img" alt="User Image"/></a>
      
    </div>
  </section>
