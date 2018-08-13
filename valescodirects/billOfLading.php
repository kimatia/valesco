

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
  <title></title>
</head>
<body>
<div class="col-lg-12">
 <div class="panel panel-default">
 <center><h3><strong>Direct Transhipment Bill of Ladings.</strong></h3></center>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Manifest  Type</th>
                    <th>Manifest No.</th>
                    <th>Bill of L. Numbers</th>
                    <th>Arrival Vessel</th>
                    <th>Voyage Number</th>
                    <th>Date of Arrival</th>
                    <th>Container Number</th>
                    <th>Description</th>
                    <th>Seal Number</th>
                    <th></th>

                    <th></th>
                </tr>
                </thead>
                <tbody>
<?php
 $stmt = $DB_con->prepare('SELECT * FROM tbl_bol');
    $stmt->execute();



    if($stmt->rowCount() > 0)
    {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>

           <?php
                        
                 echo '<tr>';
                  echo '<td>'.$row['manifestName'].'</td>';
                  echo '<td>'.$row['manifestFileNumber'].'</td>';
                  echo '<td>'.$row['billOfLadingNumber'].'</td>';
                  echo '<td>'.$row['arrivalVesselName'].'</td>';
                  echo '<td>'.$row['voyageNumber'].'</td>';
                  echo '<td>'.$row['dateOfArrival'].'</td>';
                  echo '<td>'.$row['containerNumber'].'</td>';
                  echo '<td>'.$row['description'].'</td>';
                  echo '<td>'.$row['sealNumber'].'</td>';
                  echo '<td>'.$row['postDate'].'</td>';
                echo '<td>
                  <a class="btn btn-small btn-primary"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    data-whatever="'.$row['id'].' ">Edit</a>
                  </td>';
                 echo '</tr>';
                         
                    ?>
    
                <?php
        }
    }

?>  
  
            
                </tbody>
            </table>
        </div>
        </div>
</body>
</html>
 
              