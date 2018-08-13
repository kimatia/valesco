

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
<center><strong><h5>DIRECT TRANSHIPMENT&nbsp;<a href="#" data-toggle="modal" data-target="#find"><span class="fa fa-2x fa-search"></span></a></h5></strong></center>
 <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    
                    <th>Manifest Pages</th>
                    <th>Manifest Type</th>
                    <th>Entry No.</th>
                    <th>BOLs No.</th>
                    <th>Manifest Status</th>
                    <th>Outgoing Vessel</th>
                    <th>Invoice</th>
                  
                </tr>
                </thead>
                <tbody>
<?php
 $stmt = $DB_con->prepare('SELECT * FROM tbl_stackstranshipment ORDER BY id DESC');
    $stmt->execute();
   


    if($stmt->rowCount() > 0)
    {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>

           <?php
           $activeDeactive=1;
           $deactiveActive=0;
           if ($row['activeDeactive']==$deactiveActive) {
               echo '<tr>';
                  echo '<td>'
                    ?>
                  <?php
   $manifestFileId=$row['id'];               
   $manifestFileOne=1;
   $manifestFileTwo=0;               
$manifestImageFile = $mysqli->query("SELECT * FROM tbl_manifest WHERE stackID= '$manifestFileId' ORDER BY id DESC ");
$manifestImageFileDisplay = $mysqli->query("SELECT * FROM tbl_stackstranshipment WHERE id= '$manifestFileId' ORDER BY id DESC ");
   $manifestFileImage = $manifestImageFile->fetch_assoc();
   $manifestFileImageDisplay = $manifestImageFileDisplay->fetch_assoc();
   if ($manifestFileImageDisplay['display']==$manifestFileOne) {
      ?>
     

      <a href="#" data-toggle="modal" data-target="#manifestModal" data-whatever2=<?php echo $manifestFileImageDisplay['id'];?> ><img src="upload/<?php echo $manifestFileImageDisplay['manifestFile']; ?>" class="img-rounded" width="70px" height="70px" /></a>
      <?php
   }elseif ($manifestFileImageDisplay['display']==$manifestFileTwo) {
      ?>
  <a href="#" data-toggle="modal" data-target="#manifestPage" data-whatever16=<?php echo $row['id']; ?> class="btn btn-large btn-primary"><i class="fa fa-file" style="color:red;font-size: 50px;"></i></a>    
<!-- <a href="manifestRecords.php?manifestInsertId=<?php echo $row['id']; ?>" class="btn btn-large btn-primary"><i class="fa fa-file" style="color:red;font-size: 50px;"></i> -->
        </a> 
    
      <?php
   }
                  ?>

                    <?php
                  '</td>';
                  echo '<td>'.$row['manifestName'].'</td>';
                  echo '<td>'.$row['manifestFileNumber'].'</td>';
                  echo '<td>'
?>
<center><h4><?php echo $row['billOfLadingNumber']; ?></h4></center>

<center><a href="#" data-toggle="modal" data-target="#bolModal" data-whatever1=<?php echo $row['id'];?> ><span class="badge badge-warning" style="background-color: green;">View</span></center>

</a>
<?php
                  '</td>';
                  echo '<td>'
?>
<?php
$stmt_logs = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt_logs->execute(array(":uid"=>$_SESSION['userSession']));
$userRow = $stmt_logs->fetch(PDO::FETCH_ASSOC);
?>
<ul class="list-unstyled user-info">  
                        <li>
                        <center><h4>
                             <a href="?getDeactive=<?php echo $row['id'] ?>" class="btn btn-success btn-xs btn-circle" style="width: 15px;height: 15px;"></a> <?php echo $row['manifestStatus']; ?></h4></center>
                        </li>
                    </ul>

<center><a href="company_servlet/36/E45j/pdf_fmanifest/logsPrintOut.php?manifestID=<?php echo $row['id']; ?>&userID=<?php echo $userRow['userID'];?>" ><span class="badge badge-warning" style="background-color: green;">Logs</span></center>

<?php

                  '</td>';
                 
                  
                echo '<td>'
?>
                  <?php
   $outgoingVessel=$row['id'];               
   $vesselNamePlaceholderOne=1;
   $vesselNamePlaceholderTwo=0;               
$manifestVessel = $mysqli->query("SELECT * FROM tbl_stackstranshipment WHERE id= '$outgoingVessel' ");
   $manifestVesselDisplay = $manifestVessel->fetch_assoc();
   if ($manifestVesselDisplay['tempVesselDisplay']==$vesselNamePlaceholderOne) {
      $vesselName = $mysqli->query("SELECT * FROM tbl_vessel WHERE stackID= '$outgoingVessel' ");
   $vesselDataInfo = $vesselName->fetch_assoc();
   ?>
   <h4><center><?php echo $vesselDataInfo['vesselName']; ?></center></h4>
   <center><a href="#" data-toggle="modal" data-target="#vesselMore" data-whatever5=<?php echo $row['id'];?> ><span class="badge badge-warning" style="background-color: green;">More</span></center>
</a>
<?php
   }elseif ($manifestVesselDisplay['tempVesselDisplay']==$vesselNamePlaceholderTwo) {
      ?>
      
<a class="btn btn-small btn-primary" data-toggle="modal" data-target="#vesselModal" data-whatever7="<?php echo $row['id']; ?>" ><i class="fa icon-pencil fa-2x sancolor-white" style="font-size: 45px;"></i></a>
        </a> 
    
      <?php
   }
                  ?>

                    <?php
                 
                  '</td>';
                  echo '<td>'
                  ?>
                  <?php
   $invoiceDisplay=$row['id'];               
   $invoiceDisplayOne=1;
   $invoiceDisplayTwo=0;               
$invoiceImageDisplay = $mysqli->query("SELECT * FROM tbl_stackstranshipment WHERE id= '$invoiceDisplay' ");
   $manifestVesselDisplay = $invoiceImageDisplay->fetch_assoc();
   if ($manifestVesselDisplay['invoiceDisplay']==$invoiceDisplayOne) {
      $vesselInvoiceFile = $mysqli->query("SELECT * FROM tbl_manifestinvoice WHERE stackID= '$invoiceDisplay' ");
   $invoiceDataDisplay = $vesselInvoiceFile->fetch_assoc();
   ?>
   
  <a href="#" data-toggle="modal" data-target="#invoiceMagnifyData" data-whatever8=<?php echo $row['id'];?> ><img src="upload/<?php echo $invoiceDataDisplay['invoiceFile']; ?>" class="img-rounded" width="70px" height="70px" /></a>
  
 
</a>
<?php
   }elseif ($manifestVesselDisplay['invoiceDisplay']==$invoiceDisplayTwo) {
      ?>
      
<a href="invoiceRecords.php?invoiceIdTranshipment=<?php echo $row['id']; ?>" class="btn btn-small btn-primary" ><i class="fa icon-folder-open-alt fa-2x sancolor-white" style="font-size: 40px;"></i></a>
        </a> 
    
      <?php
   }
                  ?>

                    <?php
                  
                  '</td>';
                 echo '</tr>';
        }
        elseif ($row['activeDeactive']==$activeDeactive) {
             echo '<tr style="background-color:#f2dede;">';
                  echo '<td>'
                    ?>
                  <?php
   $manifestFileId=$row['id'];               
   $manifestFileOne=1;
   $manifestFileTwo=0;               
$manifestImageFile = $mysqli->query("SELECT * FROM tbl_manifest WHERE stackID= '$manifestFileId' ORDER BY id DESC ");
$manifestImageFileDisplay = $mysqli->query("SELECT * FROM tbl_stackstranshipment WHERE id= '$manifestFileId' ORDER BY id DESC ");
   $manifestFileImage = $manifestImageFile->fetch_assoc();
   $manifestFileImageDisplay = $manifestImageFileDisplay->fetch_assoc();
   if ($manifestFileImageDisplay['display']==$manifestFileOne) {
      ?>
     

      <a href="#"><img src="upload/<?php echo $manifestFileImageDisplay['manifestFile']; ?>" class="img-rounded" width="70px" height="70px" /></a>
      <?php
   }elseif ($manifestFileImageDisplay['display']==$manifestFileTwo) {
      ?>
      
<a href="#" class="btn btn-large btn-primary"><i class="fa fa-file" style="color:red;font-size: 50px;"></i>
        </a> 
    
      <?php
   }
                  ?>

                    <?php
                  '</td>';
                  echo '<td>'.$row['manifestName'].'</td>';
                  echo '<td>'.$row['manifestFileNumber'].'</td>';
                  echo '<td>'
?>
<center><h4><?php echo $row['billOfLadingNumber']; ?></h4></center>

<center><a href="#" ><span class="badge badge-warning" style="background-color: green;">View</span></center>

</a>
<?php
                  '</td>';
                  echo '<td>'
?>
<?php
$stmt_logs = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt_logs->execute(array(":uid"=>$_SESSION['userSession']));
$userRow = $stmt_logs->fetch(PDO::FETCH_ASSOC);
?>
<ul class="list-unstyled user-info">  
                        <li>
                        <center><h4>
                             <a href="?getActive=<?php echo $row['id'] ?>" class="btn btn-danger btn-xs btn-circle" style="width: 15px;height: 15px; "></a> <?php echo $row['manifestStatus']; ?></h4></center>
                        </li>
                    </ul>

<center><a href="#"><span class="badge badge-warning" style="background-color: green;">Logs</span></center>

<?php

                  '</td>';
                 
                  
                echo '<td>'
?>
                  <?php
   $outgoingVessel=$row['id'];               
   $vesselNamePlaceholderOne=1;
   $vesselNamePlaceholderTwo=0;               
$manifestVessel = $mysqli->query("SELECT * FROM tbl_stackstranshipment WHERE id= '$outgoingVessel' ");
   $manifestVesselDisplay = $manifestVessel->fetch_assoc();
   if ($manifestVesselDisplay['tempVesselDisplay']==$vesselNamePlaceholderOne) {
      $vesselName = $mysqli->query("SELECT * FROM tbl_vessel WHERE stackID= '$outgoingVessel' ");
   $vesselDataInfo = $vesselName->fetch_assoc();
   ?>
   <h4><center><?php echo $vesselDataInfo['vesselName']; ?></center></h4>
   <center><a href="#"><span class="badge badge-warning" style="background-color: green;">More</span></center>
</a>
<?php
   }elseif ($manifestVesselDisplay['tempVesselDisplay']==$vesselNamePlaceholderTwo) {
      ?>
      
<a class="btn btn-small btn-primary" ><i class="fa icon-pencil fa-2x sancolor-white" style="font-size: 45px;"></i></a>
        </a> 
    
      <?php
   }
                  ?>

                    <?php
                 
                  '</td>';
                  echo '<td>'
                  ?>
                  <?php
   $invoiceDisplay=$row['id'];               
   $invoiceDisplayOne=1;
   $invoiceDisplayTwo=0;               
$invoiceImageDisplay = $mysqli->query("SELECT * FROM tbl_stackstranshipment WHERE id= '$invoiceDisplay' ");
   $manifestVesselDisplay = $invoiceImageDisplay->fetch_assoc();
   if ($manifestVesselDisplay['invoiceDisplay']==$invoiceDisplayOne) {
      $vesselInvoiceFile = $mysqli->query("SELECT * FROM tbl_manifestinvoice WHERE stackID= '$invoiceDisplay' ");
   $invoiceDataDisplay = $vesselInvoiceFile->fetch_assoc();
   ?>
   
  <a href="#" data-toggle="modal" ><img src="upload/<?php echo $invoiceDataDisplay['invoiceFile']; ?>" class="img-rounded" width="70px" height="70px" /></a>
  
 
</a>
<?php
   }elseif ($manifestVesselDisplay['invoiceDisplay']==$invoiceDisplayTwo) {
      ?>
      
<a href="#" class="btn btn-small btn-primary" ><i class="fa icon-folder-open-alt fa-2x sancolor-white" style="font-size: 40px;"></i></a>
        </a> 
    
      <?php
   }
                  ?>

                    <?php
                  
                  '</td>';
                 echo '</tr>';
        }             
                
                         
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
 
              