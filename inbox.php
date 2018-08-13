<?php
date_default_timezone_set("Africa/Nairobi");
session_start();
require_once 'dbconfig.php'; 
//get the logged in user credentials and validate
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
 $user_home->redirect('login.php');
}
$stmtt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmtt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmtt->fetch(PDO::FETCH_ASSOC);

//we can now access the users details from $row['appropriatedbfield']


  $stmtChatInbox = $DB_con->prepare("SELECT * FROM tbl_messages WHERE totalUniqueChatId=:uid");
    $stmtChatInbox->execute(array(":uid"=>$_SESSION['chatTotal']));
    if($stmtChatInbox->rowCount() > 0)
    {
        while($rowChat=$stmtChatInbox->fetch(PDO::FETCH_ASSOC))
        {
          
           
?>
<div class="chat chat-rounded">
<span class="author"><?php echo $rowChat['chatFrom'];?>:</span>
<span class="text"><?php echo $rowChat['message'];?></span>
<span class="time"><?php echo $rowChat['chatTime'];?></span>
</div>
<?php
        
     }
}
    
    
?>