 
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
  

    if(isset($_GET['id'])&& !empty($_GET['id']))
  {
        $id = $_GET['id'];
        $stmt_action_type = $DB_con->prepare('SELECT * FROM tbl_action WHERE id =:uid');
        $stmt_action_type->execute(array(':uid'=>$id));
        $rowAction = $stmt_action_type->fetch(PDO::FETCH_ASSOC);
        
      }

$directTranshipment="Direct Transhipment";
$reExportFile="Re-Export";
$verificationFile="Verification";
$billOfLadingFile="Clearing and Fowarding";
    

?>

<body>

<?php
if($rowAction['valescoAction']==$directTranshipment){
  ?>
  <div id="DirectTranshipment">
       
         <form method="post" id="uploadimage"  enctype="multipart/form-data" class="form-horizontal">
         <div class="modal-body">
<div class="form-group input-group">
  <span class="input-group-addon">Valesco Manifest Action</span>
    <input class="form-control " readonly="" type="text" name="manifestType" value="<?php echo $rowAction['valescoAction']; ?>" id="manifest"  placeholder="Enter Manifest Type" >

</div>
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;Manifest Entry Number</span>
<input class="form-control " type="text" name="manifestNumber" id="number"  placeholder="Enter Manifest Entry Number" >

</div>
<div class="form-group input-group" >
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Bill Of Lading No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="billOfLadingNumber" id="number"  placeholder="Enter Number of bls" >
</div>
<button type="submit" name="btnSaveDirectTranshipment" value="send" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>save action
        </button>
        </div>
        </form>
    </div>
    <?php
}elseif ($rowAction['valescoAction']==$reExportFile) {
 ?>
<div id="ReExport">
       
         <form method="post" id="uploadimage"  enctype="multipart/form-data" class="form-horizontal">
         <div class="modal-body">
<div class="form-group input-group">
  <span class="input-group-addon">Valesco Manifest Action</span>
    <input class="form-control " readonly="" type="text" name="manifestType" value="<?php echo $rowAction['valescoAction']; ?>" id="manifest"  placeholder="Enter Manifest Type" >

</div>
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Container Number&nbsp;</span>
<input class="form-control " type="text" name="containerNumber" id="container number"  placeholder="Enter Container Number" >

</div>
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BLs Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="billOfLadingNumber" id="bls"  placeholder="Enter Number of Bls." >

</div>
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C.F.S Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="cfsName" id="cfs"  placeholder="Enter C.F.S Name" >

</div>
<div class="form-group input-group" >
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Outgoing Vessel.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="outgoingVessel" id="vessel"  placeholder="Enter Outgoing Vessel" >
</div>
<h4><center><strong>Charges On Invoice</strong></center></h4>
<div class="form-group input-group" >
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transport Charges.&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="transportCharges" id="transport"  placeholder="Enter Transport Charges" >
</div>
<div class="form-group input-group" >
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C.F.S Charges.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="cfsCharges" id="cfsCharges"  placeholder="Enter C.F.S Charges" >
</div>
<div class="form-group input-group" >
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;Custom warehouse.&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="customWarehouse" id="warehouse"  placeholder="Enter Custom Warehouse Charges" >
</div>
<div class="form-group input-group" >
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;K.P.A Export.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="kpaExport" id="kpaExport"  placeholder="Enter K.P.A Export Charges" >
</div>
<button type="submit" name="btnSaveReExport" value="send" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>save action
        </button>
        </div>
        </form>
    </div>
 <?php
}elseif ($rowAction['valescoAction']==$verificationFile) {
  ?>
<div id="verification">
       
         <form method="post" id="uploadimage"  enctype="multipart/form-data" class="form-horizontal">
         <div class="modal-body">
<div class="form-group input-group">
  <span class="input-group-addon">Valesco Manifest Action</span>
    <input class="form-control " readonly="" type="text" name="manifestType" value="<?php echo $rowAction['valescoAction']; ?>" id="manifest"  placeholder="Enter Manifest Type" >

</div>
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Container Number&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="containerNumber" id="containerNumber"  placeholder="Enter Container Number" >

</div>
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;Bill of Lading Number&nbsp;</span>
<input class="form-control " type="text" name="billOfLadingNumber" id="blnumber"  placeholder="Enter Number Of BLs." >

</div>

<div class="form-group input-group" >
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Receipt.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="date" name="dateOfReceipt" id="dateOfReceipt"  placeholder="Enter Date of Receipt" >
</div>
<div class="form-group input-group" >
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Date of Verification.&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="date" name="dateOfVerification" id="dateOfVerification"  placeholder="Enter Date of Verification" >
</div>
<div class="form-group input-group" >
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Old Seal Number.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="oldSealNumber" id="oldSealNumber"  placeholder="Enter Old Seal Number" >
</div>
<div class="form-group input-group" >
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;New Seal Number.&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="newSealNumber" id="newSealNumber"  placeholder="Enter New Seal Number" >
</div>
<div class="form-group input-group" >
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;Date of Submission.&nbsp;&nbsp;&nbsp;</span>
<input class="form-control " type="text" name="dateOfSubmission" id="dateOfSubmission"  placeholder="Enter Date Documents Are Submitted" >
</div>

<button type="submit" name="btnSaveVerification" value="send" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>save action
        </button>
        </div>
        </form>
    </div>
  <?php
}elseif ($rowAction['valescoAction']==$billOfLadingFile) {
  ?>
<div id="BillOfLading">
       
                        
<form method="post" id="uploadimage"  enctype="multipart/form-data" class="form-horizontal">
  <div class="form-group">
    <label for="stackNumber">Stack Number</label>
    <input type="text" name="stackNumber" placeholder="Stack Number" class="form-control"  autofocus required/>
  </div>
   <button class="btn btn-primary btn-outline" type="submit" name="btn-add-stack"> Create</button>
</form>
                        
                    
    </div>
  <?php
}
?>
   
</body>
</html>
 