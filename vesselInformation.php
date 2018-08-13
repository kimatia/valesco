 
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
<body style="background-image: url(images/8.jpg); opacity: 0.9; " onload="startTime()" ng-app='myapp'>

   <div class="row">
       
        <?php
        $id = $_GET['id'];
        $stmt_select = $DB_con->prepare('SELECT * FROM tbl_vessel WHERE stackID =:uid');
        $stmt_select->execute(array(':uid'=>$id));
        
    ?>
   <table  width="85%"  border='2' align="center" style="margin-left: 40px;">
                <thead>
                <tr>
                    <th width="20%">Vessel Name</th>
                    <th width="20%">Booking No.</th>
                    <th width="20%">Booking Copy.</th>
                    <th width="20%">Post Date.</th>
                    <th width="20%">Post Time.</th>
                                    
       
                </tr>
                </thead>
                <tbody>
                <?php
    if($stmt_select->rowCount() > 0)
    {
        while($row=$stmt_select->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
<?php
           echo '<tr>';
          echo '<td width="20%">'.$row['vesselName'].'</td>';
          echo '<td width="20%">'.$row['bookingNumber'].'</td>';
           echo '<td width="20%">'
            ?>
<a href="#" data-toggle="modal" data-target="#bookingCopyShow" data-whatever15=<?php echo $row['id'];?> ><img src="upload/<?php echo $row['bookingCopy']; ?>" class="img-rounded" width="96px" height="70px" /></a>
            <?php
           '</td>';
           echo '<td width="20%">'.$row['postDate'].'</td>';
          echo '<td width="20%">'.$row['postTime'].'</td>';
          echo '</tr>';
           
?>
  
    
                <?php
        }
    }

?>  
 </tbody>
 </table>
    </div>
</body>
</html>
 