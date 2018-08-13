

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
<center><strong><h5>RE-EXPORT&nbsp;<a href="#" data-toggle="modal" data-target="#findExport"><span class="fa fa-2x fa-search"></span></a></h5></strong></center>
 <table  width="100%"  border='2' align="center">
                <thead>
                <tr>
                    
                    <th width="11%" style="color: #0099D3;">Container Number</th>
                    <th width="11%" style="color: #0099D3;">Number of BLs</th>
                    <th width="11%" style="color: #0099D3;">C.F.S Name</th>
                    <th width="11%" style="color: #0099D3;">Outgoing Vessel</th>
                     <th width="45%">
                      <table  width="100%"  border='2' align="center" >
                <thead>
                <tr>
                    <center><strong style="color: #0099D3;">Invoice Charges</strong></center>
                    <th width="25%" style="color: #F7990D;">Trans</th>
                    <th width="25%" style="color: #F7990D;">C.F.S </th>
                    <th width="25%" style="color: #F7990D;">Custom</th>
                    <th width="25%" style="color: #F7990D;">K.P.A</th>
                         
                </tr>
                </thead>
                    </table>
                     </th>
                   <th width="11%" style="color: #0099D3;">Invoice Image</th>      
                </tr>
                </thead>
                <tbody>
<?php
 $stmt = $DB_con->prepare('SELECT * FROM tbl_stacksExport ORDER BY id DESC');
    $stmt->execute();

    if($stmt->rowCount() > 0)
    {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>

           <?php
                        
                 echo '<tr>';
                 //container number
                  echo '<td width="13%">';
                    echo $row['containerNumber'];
                 echo '</td>';
                  echo '<td width="13%">';
                    ?>
    <center><h4><?php echo $row['numberOfBillOfLading']; ?></h4></center>
    <center><a href="#" data-toggle="modal" data-target="#bolModalRe-export" data-whatever12=<?php echo $row['id'];?> ><span class="badge badge-warning" style="background-color: green;">View</span></center>
                    <?php
                 echo '</td>';
                  //CFS Name
                  echo '<td width="13%">';
                  echo $row['cfsName'];
                 echo '</td>';
                 //Outgoing Vessel
                  echo '<td width="13%">';
                    echo $row['outgoingVessel'];
                 echo '</td>';
                  //charges
                  echo '<td width="48%">';
                    //individual data of invoice file
                     echo '<table width="100%"  border="1" align="center"';
                      echo '<thead>';
                        echo '<tr height="100%">';
                            echo '<th width="25%">';
                               echo $row['transportCharges'];
                            echo '</th>';
                            echo '<th width="25%">';
                               echo $row['cfsCharges'];
                            echo '</th>';
                            echo '<th width="25%">';
                               echo $row['customWarehouseCharges'];
                            echo '</th>';
                            echo '<th width="25%">';
                               echo $row['kpaExportCharges'];
                            echo '</th>';
                        echo '</tr>';
                      echo '<thead>';
                     echo '</table>';
                 echo '</td>';
                  //invoice image file
                  echo '<td width="13%">';
              ?>
                  <?php
              
   $invoiceExportDisplayOne=1;
   $invoiceExportDisplayTwo=0;               

   if ($row['invoiceDisplay']==$invoiceExportDisplayOne) {
        $idd = $row['id'];
        $invoice_img = $DB_con->prepare('SELECT * FROM tbl_invoiceexport WHERE stackID =:uid');
        $invoice_img->execute(array(':uid'=>$idd));
        $invoiceFileRecord = $invoice_img->fetch(PDO::FETCH_ASSOC);
      
   ?>
<section>
   <div>
   <a href="#" data-toggle="modal" data-target="#invoiceMagnifyReExport" data-whatever13=<?php echo $row['id'];?> ><img src="upload/<?php echo $invoiceFileRecord['invoiceFile']; ?>" class="img-rounded" width="60px" height="50px" /></a>
    </div>
  </section>
<?php
   }elseif ($row['invoiceDisplay']==$invoiceExportDisplayTwo) {
      ?> 
<a href="invoiceRecords.php?invoiceIdRe-export=<?php echo $row['id']; ?>" class="btn btn-small btn-primary" ><i class="fa icon-folder-open-alt fa-2x sancolor-white" style="font-size: 30px;"></i></a> 
      <?php
   }
                  ?>

                    <?php
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
 
              