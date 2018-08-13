
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

//valesco Action
$result = $mysqli->query("SELECT * FROM tbl_action ORDER BY id ASC");
if(!$result){
  echo 'query failed';}
?>
<div class="form-group input-group">
  <span class="input-group-addon">Valesco Manifest Action</span>
    <select class="form-control" name="action" placeholder="Actions">
<?php while($row = mysqli_fetch_assoc($result)){?>
<option value="<?php echo $row['valescoAction']; ?>"> <?php echo $row['valescoAction']; ?>
</option>
<?php } ?>
</select>
</div>
