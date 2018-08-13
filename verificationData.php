

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
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
//we can now access the users details from $row['appropriatedbfield']
  
?>


<div class="row">
<center><strong><h5>Verification&nbsp;<a href="#" data-toggle="modal" data-target="#findVerify"><span class="fa fa-2x fa-search"></span></a></h5></strong></center>
 <table  width="100%"  border='2' align="center">
                <thead>
                <tr>
                    <th width="11%">Manifest Type</th>
                    <th width="11%">Container No.</th>
                    <th width="11%">BOLs No.</th>
                    <th width="11%">Date of Receipt</th>
                    <th width="11%">Verification Date</th>
                    <th width="11%">Old Seal No.</th>
                    <th width="11%">New Seal No.</th>
                    <th width="11%">Submission Date</th>
                    <th width="11%">Invoice</th>                 
       
                </tr>
                </thead>
                <tbody>
<?php
    $stmt = $DB_con->prepare('SELECT * FROM tbl_stacksVerification ORDER BY id DESC');
    $stmt->execute();

    if($stmt->rowCount() > 0)
    {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>

           <?php
                        
                 echo '<tr>';
                 //action
                  echo '<td width="11%">';
                    echo $row['valescoAction'];
                 echo '</td>';
                  //Container number
                  echo '<td width="11%">';
                  echo $row['containerNumber'];
                 echo '</td>';
                 //BOL number
                  echo '<td width="11%">';
                   ?>
<center><h4><?php echo $row['billOfLadingNumber']; ?></h4></center>
<center><a href="#" data-toggle="modal" data-target="#bolModalVerification" data-whatever11=<?php echo $row['id'];?> ><span class="badge badge-warning" style="background-color: green;">View</span></center>

</a>
<?php
                 echo '</td>';
                  //date of receipt
                  echo '<td width="11%">';
                     echo $row['dateOfReceipt'];
                 echo '</td>';
                 //date of verification
                 echo '<td width="11%">';
                     echo $row['dateOfVerification'];
                 echo '</td>';
                 //old seal number
                 echo '<td width="11%">';
                     echo $row['oldSealNumber'];
                 echo '</td>';
                 //new seal number
                 echo '<td width="11%">';
                     echo $row['newSealNumber'];
                 echo '</td>';
                 //date of submission
                 echo '<td width="11%">';
                     echo $row['dateOfSubmission'];
                 echo '</td>';
                  //invoice image file
                  echo '<td width="11%">';
                  if($row['invoiceDisplay']==0){
?>
<a href="invoiceRecords.php?invoiceIdVerify=<?php echo $row['id']; ?>" class="btn btn-small btn-primary" ><i class="fa icon-folder-open-alt fa-2x sancolor-white" style="font-size: 40px;"></i></a>
<?php
                  }elseif($row['invoiceDisplay']==1){
        $idd = $row['id'];
        $invoice_img = $DB_con->prepare('SELECT * FROM tbl_invoiceverify WHERE stackID =:uid');
        $invoice_img->execute(array(':uid'=>$idd));
        $invoiceFileRecord = $invoice_img->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <section>
   <div>
   <a href="#" data-toggle="modal" data-target="#invoiceMagnifyVerification" data-whatever14=<?php echo $row['id'];?> ><img src="upload/<?php echo $invoiceFileRecord['invoiceFile']; ?>" class="img-rounded" width="60px" height="50px" /></a>
    </div>
  </section>
  <?php
                  }
             
                 echo '</td>';
               
                 echo '</tr>';
                         
                    ?>
    
                <?php
        }
    }

?>  
  
  
             
                </tbody>
            </table>           

  
            
                
        
        </div>
        <hr>

</body>
</html>
 
              