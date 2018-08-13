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



// if no error occured, continue ....
        if(!isset($errMSG))
        {
        $action=$_POST['action'];
        $name = $row['userName'];
        $_SESSION['name'] = $name;//name
        $username = $_SESSION['name'];// user name
        
  $posttime=date("h:i A.",time());
  $SQL = $DBcon->prepare("INSERT INTO tbl_action(valescoAction, postTime) VALUES(?,?)");
//   $i=$SQL = $DBcon->prepare("INSERT INTO tbl_action(valescoAction, postTime) VALUES(?,?)");
// for ($i=1; $i<=5; $i++)
  
    if($SQL){
      $SQL->bind_param('ss', $action,$posttime);
      $SQL->execute();
       //logs
$action=$_POST['action'];
$postuser=$row['userName'];
$postuserID=$row['userID'];
$posttime=date("h:i A.",time());
$txt1="User";
$txt2="created a new manifest action";
$txt3="on";
$actions= $txt1 . " " . $postuser." ".$txt2." ".$action." ".$txt3." ".$posttime;
$SQL1 = $DBcon->prepare("INSERT INTO tbl_manifestLogs(userID,postUser,action, postDate) VALUES(?,?,?,?)");
$SQL1->bind_param('isss',$postuserID,$postuser,$actions,$posttime);
$SQL1->execute();
     
      echo "<div class='alert alert-success'>
              <button class='close' data-dismiss='alert'>&times;</button>
              <strong>Success!</strong>.Action made.</div>";


  

    }else{
       echo "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Error while saving action
           </div>";
  }
    
}
 
  

?>
