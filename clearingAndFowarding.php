         <?php
         session_start();
         //edit file  in that stack
if (isset($_GET['editbol'])){
  $_SESSION['editbol'] = $_GET['editbol'];
  $_SESSION['editfile'] = "bol";
  header("location: editFile.php");
}

if (isset($_GET['editidf'])){
  $_SESSION['editidf'] = $_GET['editidf'];
  $_SESSION['editfile'] = "idf";
  header("location: editFile.php");
}

if (isset($_GET['editkbs'])){
  $_SESSION['editkbs'] = $_GET['editkbs'];
  $_SESSION['editfile'] = "kbs";
  header("location: editFile.php");
}

if (isset($_GET['editecert'])){
  $_SESSION['editecert'] = $_GET['editecert'];
  $_SESSION['editfile'] = "editecert";
  header("location: editFile.php");
}

if (isset($_GET['editinvoice'])){
  $_SESSION['editinvoice'] = $_GET['editinvoice'];
  $_SESSION['editfile'] = "invoice";
  header("location: editFile.php");
}

if (isset($_GET['edittreciept'])){
  $_SESSION['edittreciept'] = $_GET['edittreciept'];
  $_SESSION['editfile'] = "treciept";
  header("location: editFile.php");
}

if (isset($_GET['editquadruplicate'])){
  $_SESSION['editquadruplicate'] = $_GET['editquadruplicate'];
  $_SESSION['editfile'] = "quadruplicate";
  header("location: editFile.php");
}

if (isset($_GET['editlbook'])){
  $_SESSION['editlbook'] = $_GET['editlbook'];
  $_SESSION['editfile'] = "lbook";
  header("location: editFile.php");
}



//check stack number to direct input of files in that stack
if (isset($_GET['addBOL'])){
  $_SESSION['stackNumber'] = $_GET['addBOL'];
  $_SESSION['file'] = "BOL";
  ?>
  <script>
  window.location.href='addFile.php';
  </script>
  <?php
}

if (isset($_GET['addIDF'])){
  $_SESSION['stackNumber'] = $_GET['addIDF'];
  $_SESSION['file'] = "IDF";
  header("location: addFile.php");
}

if (isset($_GET['addKBS'])){
  $_SESSION['stackNumber'] = $_GET['addKBS'];
  $_SESSION['file'] = "KBS";
  header("location: addFile.php");
}

if (isset($_GET['addECert'])){
  $_SESSION['stackNumber'] = $_GET['addECert'];
  $_SESSION['file'] = "ECert";
  header("location: addFile.php");
}

if (isset($_GET['addInvoice'])){
  $_SESSION['stackNumber'] = $_GET['addInvoice'];
  $_SESSION['file'] = "Invoice";
  header("location: addFile.php");
}

if (isset($_GET['addTReciept'])){
  $_SESSION['stackNumber'] = $_GET['addTReciept'];
  $_SESSION['file'] = "TReciept";
  header("location: addFile.php");
}

if (isset($_GET['addQuadruplicate'])){
  $_SESSION['stackNumber'] = $_GET['addQuadruplicate'];
  $_SESSION['file'] = "Quadruplicate";
  header("location: addFile.php");
}

if (isset($_GET['addLBook'])){
  $_SESSION['stackNumber'] = $_GET['addLBook'];
  $_SESSION['file'] = "LBook";
  header("location: addFile.php");
}

         ?>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
          <div class="panel panel-body">
            <div class="panel panel-default">
              <div id="div2" style="display:none;">
        <table class="table table-striped table-bordered">
                <thead>
                <tr>
                <th>Number</th>
                 <th>Manifest Type</th>
                  <th>Action</th>  
                </tr>
                </thead>
                <tbody>
                    <?php
                         while ($row = mysqli_fetch_assoc($result)){

  $directTranshipment="Direct Transhipment";
  $reExport="Re-Export";
  $verification="Verification";
  $billOfLadingFileFile="Clearing and Fowarding";
?>

 
<?php
if ($row['display']==0) {
  $directTranshipment="Direct Transhipment";
  $reExport="Re-Export";
  $verification="Verification";
  $billOfLadingFileFile="Clearing and Fowarding";
  
  if($row['valescoAction']==$directTranshipment){
echo '<tr>';
                               echo '<td>'.$row['id'].'</td>';
                               echo '<td>'.$row['valescoAction'].'</td>';
                              
                               echo '<td>
                               <div class="row">
                               <div class="col-md-4">
  <a class="btn btn-small btn-primary" data-toggle="modal" data-target="#exampleModalDirectTranshipment" data-whatever="'.$row['id'].' ">Create</a>
  </div>
  <div class="col-md-4">
  <a class="btn btn-small btn-primary" href="adhome.php?lock_id='.$row['id'].' ">&nbsp;&nbsp;Lock&nbsp;&nbsp;</a>  
  </div>
  <div class="col-md-4">                                      
  <a class="btn btn-small btn-danger" href="adhome.php?delete_action='.$row['id'].' " title="click for delete" onclick="return confirm("sure to delete ?")"><i class="icon-remove icon-white"></i>Delete</a>
  </div>
  </div>
                                     </td>';
                                    
                            echo '</tr>';
  }elseif ($row['valescoAction']==$reExport) {
    echo '<tr>';
                               echo '<td>'.$row['id'].'</td>';
                               echo '<td>'.$row['valescoAction'].'</td>';
                              
                               echo '<td>
                               <div class="row">
                               <div class="col-md-4">
  <a class="btn btn-small btn-primary" data-toggle="modal" data-target="#exampleModalReExport" data-whatever9="'.$row['id'].' ">Create</a>
  </div>
  <div class="col-md-4">
  <a class="btn btn-small btn-primary" href="adhome.php?lock_id='.$row['id'].' ">&nbsp;&nbsp;Lock&nbsp;&nbsp;</a>  
  </div>
  <div class="col-md-4">                                      
  <a class="btn btn-small btn-danger" href="adhome.php?delete_action='.$row['id'].' " title="click for delete" onclick="return confirm("sure to delete ?")"><i class="icon-remove icon-white"></i>Delete</a>
  </div>
  </div>
                                     </td>';
                                    
                            echo '</tr>';
  }elseif ($row['valescoAction']==$verification) {
    echo '<tr>';
                               echo '<td>'.$row['id'].'</td>';
                               echo '<td>'.$row['valescoAction'].'</td>';
                              
                               echo '<td>
                               <div class="row">
                               <div class="col-md-4">
  <a class="btn btn-small btn-primary" data-toggle="modal" data-target="#exampleModalVerification" data-whatever9="'.$row['id'].' ">Create</a>
  </div>
  <div class="col-md-4">
  <a class="btn btn-small btn-primary" href="adhome.php?lock_id='.$row['id'].' ">&nbsp;&nbsp;Lock&nbsp;&nbsp;</a>  
  </div>
  <div class="col-md-4">                                      
  <a class="btn btn-small btn-danger" href="adhome.php?delete_action='.$row['id'].' " title="click for delete" onclick="return confirm("sure to delete ?")"><i class="icon-remove icon-white"></i>Delete</a>
  </div>
  </div>
                                     </td>';
                                    
                            echo '</tr>';
  }elseif ($row['valescoAction']==$billOfLadingFileFile) {
    echo '<tr>';
                               echo '<td>'.$row['id'].'</td>';
                               echo '<td>'.$row['valescoAction'].'</td>';
                              
                               echo '<td>
                               <div class="row">
                               <div class="col-md-4">
  <a class="btn btn-small btn-primary" data-toggle="modal" data-target="#exampleModalClearingAndFowarding" data-whatever9="'.$row['id'].' ">Create</a>
  </div>
  <div class="col-md-4">
  <a class="btn btn-small btn-primary" href="adhome.php?lock_id='.$row['id'].' ">&nbsp;&nbsp;Lock&nbsp;&nbsp;</a>  
  </div>
  <div class="col-md-4">                                      
  <a class="btn btn-small btn-danger" href="adhome.php?delete_action='.$row['id'].' " title="click for delete" onclick="return confirm("sure to delete ?")"><i class="icon-remove icon-white"></i>Delete</a>
  </div>
  </div>
                                     </td>';
                                    
                            echo '</tr>';
  }
  
}
elseif ($row['display']==1) {
   echo '<tr>';
                               echo '<td style="background-color:#dff0d8">'.$row['id'].'</td>';
                               echo '<td style="background-color:#dff0d8">'.$row['valescoAction'].'</td>';
                              
                               echo '<td style="background-color:#dff0d8">
                               <div class="row">
                               <div class="col-md-4">
  <a class="btn btn-small btn-primary" data-toggle="modal"  >Locked</a>
  </div>
  <div class="col-md-4">
  <a class="btn btn-small btn-primary" data-toggle="modal"  href="adhome.php?unlock_id='.$row['id'].' ">Unlock</a>
  </div> 
  <div class="col-md-4">                                       
  <a class="btn btn-small btn-danger" href="adhome.php?delete_action='.$row['id'].' " title="click for delete" onclick="return confirm("sure to delete ?")"><i class="icon-remove icon-white"></i>Delete</a>
     </div>
     </div>                                </td>';
                                    
                            echo '</tr>';
 
}
?>








<?php


                            
                         }
                         /* free result set */
                         
                    ?>
                </tbody>
               
            </table>

</div>
<script type="text/javascript">
  $(document).ready(function(){
  $("#valesco").click(function(){
    $("#action").fadeIn(0);
 $("#div3").fadeOut(0);
 $("#div1").fadeOut(0);
  });
});
</script>

            <h3>Clearing And Fowarding&nbsp;<a href="#" data-toggle="modal" data-target="#findClear"><span class="fa fa-2x fa-search"></span></a></h3>
            <hr>
            <?php
            if(isset($msgCreateStack)){
              echo $msgCreateStack;
            }
            $x = 0;
            $respstack = $con->query("SELECT * FROM tbl_stacks ORDER BY id DESC");
            while($rowStack=$respstack->fetch_array()){
              $x++;
              $num = $rowStack['stackNumber'];
              $No = "No";
              $Yes = "Yes";
              if($rowStack['status']==$No){
              ?>
              <div class="panel panel-default" style="background-color:whitesmoke">
              <h4>
                &nbsp&nbsp&nbsp<?php echo $num;?>
                <span class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?deleteStack=<?php echo $rowStack['id'];?>" class="fa fa-trash"></a>&nbsp;</span>
                <span class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?lockStack=<?php echo $rowStack['id'];?>" class="fa fa-lock"></a>&nbsp;</span>
                &nbsp;&nbsp;&nbsp;
                <?php
                 $pending = "pending";
                 if($rowStack['finalDate']==$pending){ ?>
                   <span class="pull-right text-muted" style="background-color:blue">&nbsp;&nbsp;
                   <span class="fa fa-unlock" style="color:white"> Open</span>&nbsp;&nbsp;
                   <a href="?view=<?php echo $rowStack['stackNumber']?>" class="fa fa-info-circle" style="color:white"> More...</a>&nbsp;&nbsp;&nbsp;
                   </span>
                  <?php
                 } else{
                   ?>
                <span class="pull-right text-muted" style="background-color:red">&nbsp;&nbsp;
                   <span class="fa fa-lock"style="color:white"> Closed</span>&nbsp;&nbsp;
                   <a href="?view=<?php echo $rowStack['stackNumber']?>" class="fa fa-info-circle" style="color:white"> More...</a>&nbsp;&nbsp;&nbsp;
                </span>
                   <?php
                 }?>
              </h4>
              <hr>
              <div class="row">
                <div class="col-md-3">
                  <h5>&nbsp;&nbsp;&nbsp;&nbsp;Bill of Lading</h5>
                  <?php
                  //get file image
                  $respFileImage = $con->query("SELECT * FROM tbl_billoflading WHERE stackNumber='$num'");
                  if($respFileImage){
                    $rowFileImage=$respFileImage->fetch_array();
                  }

                  $dee = $rowFileImage['userId'];
                  $respUserName = $con->query("SELECT userName FROM tbl_users WHERE userID='$dee'");
                  $rowUserName=$respUserName->fetch_array();

                   if($rowStack['bol']=="Yes"){
                    ?>
                    <a href="#"  data-toggle="modal" data-target="#displaybol<?php echo $x; ?>">
                      <img src="upload/<?php echo $rowFileImage['billofLading_file']; ?>" class="img-thumbnail" style="width:80%; height: 80px;"></img>
                    </a>
                   &nbsp;&nbsp;<span class="fa fa-user"><?php echo $rowUserName['userName'];?></span>
                   &nbsp;&nbsp;
                    <span ><a href="editFile.php?editbol=<?php echo $rowFileImage['id']; ?>" class="fa fa-pencil"> Edit</a></span>
                    <!-- search by atribute functionality-->
                    <div class="modal fade" id="displaybol<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" style="width: 800px" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                       <h4><span class="fa  fw"> Bill of Lading</span></h4>
                                     </div>
                                     
                                     <div class="modal-body section">
                                     <div id="printableArea15">
                                  <img src="upload/<?php echo $rowFileImage['billofLading_file']; ?>" class="img-thumbnail" style="width:80%; height: 80%;"></img>
                                     </div>
                                     </div>
                                     <div class="modal-footer">
                                       <div class="form-group" >

<input type="button" onclick="printDiv('printableArea15')" class="btn btn-lg btn-default" value="print!" />
                                         <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
                                       </div>
                                       </form>
                                     </div>
                                </div>
                            </div>
                            </div>
                    <?php
                  }else{
                    ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="addFile.php?addBOL=<?php echo $rowStack['stackNumber'];?>" class="fa fa-file" style="font-size:80px"></a>
                    <?php
                  }?>
                  <br>
                  <br>
                  <br>

                </div>
                <div class="col-md-3">
                  <h5>I.D.F</h5>
                  <?php
                  //get file image
                  $respFileImage = $con->query("SELECT * FROM tbl_idf WHERE stackNumber='$num'");
                  if($respFileImage){
                    $rowFileImage=$respFileImage->fetch_array();
                  }

                  $dee = $rowFileImage['userId'];
                  $respUserName = $con->query("SELECT userName FROM tbl_users WHERE userID='$dee'");
                  $rowUserName=$respUserName->fetch_array();

                  if($rowStack['idf']=="Yes"){
                   ?>
                   <a href="#" data-toggle="modal" data-target="#displayidf<?php echo $x; ?>">
                   <img src="upload/<?php echo $rowFileImage['idf_file']; ?>" class="img-thumbnail" style="width:80%; height: 80px;"></img>
                 </a>
                 &nbsp;&nbsp;<span class="fa fa-user"><?php echo $rowUserName['userName'];?></span>
                  &nbsp;&nbsp;
<span ><a href="editFile.php?editidf=<?php echo $rowFileImage['id']; ?>" class="fa fa-pencil"> Edit</a></span>
                   <div class="modal fade" id="displayidf<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" style="width: 800px" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h4><span class="fa  fw"> I.D.F</span></h4>
                                    </div>
                           
                                     <div class="modal-body section">
                                              <div id="printableArea1">
                                       <img src="upload/<?php echo $rowFileImage['idf_file']; ?>" class="img-thumbnail" style="width:80%; height: 80%;"></img>
                                     </div>
                                     </div>
                                     <div class="modal-footer">
                                       <div class="form-group" >

<input type="button" onclick="printDiv('printableArea1')" class="btn btn-lg btn-default" value="print!" />
                                        <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
                                      </div>
                                      </form>
                                    </div>
                               </div>
                           </div>
                           </div>
                           <?php
                 }else{
                   ?>
                  <a href="addFile.php?addIDF=<?php echo $rowStack['stackNumber'];?>" class="fa fa-file" style="font-size:80px"></a>
                  <?php }?>
                  <br>
                  <br>
                  <br>

                </div>
                <div class="col-md-3">
                  <h5>K.B.S</h5>
                  <?php
                  //get file image
                  $respFileImage = $con->query("SELECT * FROM tbl_kbs WHERE stackNumber='$num'");
                  if($respFileImage){
                    $rowFileImage=$respFileImage->fetch_array();
                  }

                  $dee = $rowFileImage['userId'];
                  $respUserName = $con->query("SELECT userName FROM tbl_users WHERE userID='$dee'");
                  $rowUserName=$respUserName->fetch_array();

                  if($rowStack['kbs']=="Yes"){
                    ?>
                    <a href="#" data-toggle="modal" data-target="#displaykbs<?php echo $x; ?>">
                    <img src="upload/<?php echo $rowFileImage['kbs_file']; ?>" class="img-thumbnail" style="width:80%; height: 80px;"></img>
                  </a>

                  &nbsp;&nbsp;<span class="fa fa-user"><?php echo $rowUserName['userName'];?></span>
                   &nbsp;&nbsp;
<span><a href="editFile.php?editkbs=<?php echo $rowFileImage['id']; ?>" class="fa fa-pencil"> Edit</a></span>
                    <div class="modal fade" id="displaykbs<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" style="width: 800px" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                       <h4><span class="fa  fw"> Kenya Bureau of Standards</span></h4>
                                     </div>
                                     
                                     <div class="modal-body section">
                                     <div id="printableArea2">
                                       <img src="upload/<?php echo $rowFileImage['kbs_file']; ?>" class="img-thumbnail" style="width:80%; height: 80%;"></img>
                                     </div>
                                     </div>
                                     <div class="modal-footer">
                                       <div class="form-group" >

<input type="button" onclick="printDiv('printableArea2')" class="btn btn-lg btn-default" value="print!" />
                                         <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
                                       </div>
                                       </form>
                                     </div>
                                </div>
                            </div>
                            </div>
                            <?php
                  }else{
                    ?>
                  <a href="addFile.php?addKBS=<?php echo $rowStack['stackNumber'];?>" class="fa fa-file" style="font-size:80px"></a>
                  <?php }?>
                  <br>
                  <br>
                  <br>

                </div>
                <div class="col-md-3">
                  <h5>Export Certificate</h5>
                  <?php //get file image
                  $respFileImage = $con->query("SELECT * FROM tbl_ecert WHERE stackNumber='$num'");
                  if($respFileImage){
                    $rowFileImage=$respFileImage->fetch_array();
                  }

                  $dee = $rowFileImage['userId'];
                  $respUserName = $con->query("SELECT userName FROM tbl_users WHERE userID='$dee'");
                  $rowUserName=$respUserName->fetch_array();


                  if($rowStack['ecert']=="Yes"){
                    ?>
                    <a href="#" data-toggle="modal" data-target="#displayecert<?php echo $x; ?>">
                    <img src="upload/<?php echo $rowFileImage['ecert_file']; ?>" class="img-thumbnail" style="width:80%; height: 80px;"></img>
                  </a>
                  &nbsp;&nbsp;<span class="fa fa-user"><?php echo $rowUserName['userName'];?></span>
                    &nbsp;&nbsp;
<span ><a href="editFile.php?editecert=<?php echo $rowFileImage['id']; ?>" class="fa fa-pencil"> Edit</a></span>
                    <div class="modal fade" id="displayecert<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" style="width: 800px" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                       <h4><span class="fa  fw"> Export Certificate</span></h4>
                                     </div>
                                     
                                     <div class="modal-body section">
                                     <div id="printableArea3">
                                       <img src="upload/<?php echo $rowFileImage['ecert_file']; ?>" class="img-thumbnail" style="width:80%; height: 80%;"></img>
                                     </div>
                                     </div>
                                     <div class="modal-footer">
                                       <div class="form-group" >

<input type="button" onclick="printDiv('printableArea3')" class="btn btn-lg btn-default" value="print!" />
                                         <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
                                       </div>
                                       </form>
                                     </div>
                                </div>
                            </div>
                            </div>
                            <?php
                  }else{
                    ?>
                  <a href="addFile.php?addECert=<?php echo $rowStack['stackNumber'];?>" class="fa fa-file" style="font-size:80px"></a>
                  <?php }?>
                  <br>
                  <br>
                  <br>
                </div>
                </div>
                <div class="row">
                <div class="col-md-3">
                  <h5>&nbsp;&nbsp;&nbsp;&nbsp;Invoice</h5>
                  <?php
                  //get file image
                  $respFileImage = $con->query("SELECT * FROM tbl_invoice WHERE stackNumber='$num'");
                  if($respFileImage){
                    $rowFileImage=$respFileImage->fetch_array();
                  }


                  $dee = $rowFileImage['userId'];
                  $respUserName = $con->query("SELECT userName FROM tbl_users WHERE userID='$dee'");
                  $rowUserName=$respUserName->fetch_array();


                  if($rowStack['invoice']=="Yes"){
                    ?>
                    <a href="#" data-toggle="modal" data-target="#displayinvoice<?php echo $x; ?>">
                    <img src="upload/<?php echo $rowFileImage['invoice_file']; ?>" class="img-thumbnail" style="width:80%; height: 80px;"></img>
                  </a>
                 &nbsp;&nbsp;<span class="fa fa-user"><?php echo $rowUserName['userName'];?></span>
                   &nbsp;&nbsp;
<span><a href="editFile.php?editinvoice=<?php echo $rowFileImage['id']; ?>" class="fa fa-pencil"> Edit</a></span>
                    <div class="modal fade" id="displayinvoice<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" style="width: 800px" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                       <h4><span class="fa  fw"> Invoice Form</span></h4>
                                     </div>
                                    
                                     <div class="modal-body section">
                                      <div id="printableArea16">
                                       <img src="upload/<?php echo $rowFileImage['invoice_file']; ?>" class="img-thumbnail" style="width:80%; height: 80%;"></img>
                                     </div>
                                     </div>
                                     <div class="modal-footer">
                                       <div class="form-group" >

<input type="button" onclick="printDiv('printableArea16')" class="btn btn-lg btn-default" value="print!" />
                                         <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
                                       </div>
                                       </form>
                                     </div>
                                </div>
                            </div>
                            </div>
                      <?php
                  }else{
                    ?>
                  &nbsp;&nbsp;&nbsp;&nbsp;<a href="addFile.php?addInvoice=<?php echo $rowStack['stackNumber'];?>" class="fa fa-file" style="font-size:80px"></a>
                  <?php }?>
                  <br>
                  <br>
                  <br>

                </div>
                <div class="col-md-3">
                  <h5>KRA Bank Slip</h5>
                  <?php
                  //get file image
                  $respFileImage = $con->query("SELECT * FROM tbl_treciept WHERE stackNumber='$num'");
                  if($respFileImage){
                    $rowFileImage=$respFileImage->fetch_array();
                  }

                  $dee = $rowFileImage['userId'];
                  $respUserName = $con->query("SELECT userName FROM tbl_users WHERE userID='$dee'");
                  $rowUserName=$respUserName->fetch_array();

                   if($rowStack['treciept']=="Yes"){
                    ?>
                    <a href="#" data-toggle="modal" data-target="#displaytreciept<?php echo $x; ?>">
                    <img src="upload/<?php echo $rowFileImage['treciept_file']; ?>" class="img-thumbnail" style="width:80%; height: 80px;"></img>
                  </a>
                 &nbsp;&nbsp;<span class="fa fa-user"><?php echo $rowUserName['userName'];?></span>
                   &nbsp;&nbsp;
<span ><a href="editFile.php?edittreciept=<?php echo $rowFileImage['id']; ?>" class="fa fa-pencil"> Edit</a></span>
                    <div class="modal fade" id="displaytreciept<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" style="width: 800px" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                       <h4><span class="fa  fw"> KRA Bank Slip</span></h4>
                                     </div>
                                     
                                     <div class="modal-body section">
                                     <div id="printableArea4">
                                       <img src="upload/<?php echo $rowFileImage['treciept_file']; ?>" class="img-thumbnail" style="width:80%; height: 80%;"></img>
                                     </div>
                                     </div>
                                     <div class="modal-footer">
                                       <div class="form-group" >

<input type="button" onclick="printDiv('printableArea4')" class="btn btn-lg btn-default" value="print!" />
                                         <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
                                       </div>
                                       </form>
                                     </div>
                                </div>
                            </div>
                            </div>
                            <?php
                  }else{
                    ?>
                  <a href="addFile.php?addTReciept=<?php echo $rowStack['stackNumber'];?>" class="fa fa-file" style="font-size:80px"></a>
                  <?php }?>
                  <br>
                  <br>
                  <br>

                </div>
                <div class="col-md-3">
                  <h5>Quadruplicate</h5>
                  <?php
                  //get file image
                  $respFileImage = $con->query("SELECT * FROM tbl_quadruplicate WHERE stackNumber='$num'");
                  if($respFileImage){
                    $rowFileImage=$respFileImage->fetch_array();
                  }

                  $dee = $rowFileImage['userId'];
                  $respUserName = $con->query("SELECT userName FROM tbl_users WHERE userID='$dee'");
                  $rowUserName=$respUserName->fetch_array();

                   if($rowStack['quadruplicate']=="Yes"){
                    ?>
                    <a href="#" data-toggle="modal" data-target="#displayquadruplicate<?php echo $x; ?>">
                    <img src="upload/<?php echo $rowFileImage['quadruplicate_file']; ?>" class="img-thumbnail" style="width:80%; height: 80px;"></img>
                  </a>
                  &nbsp;&nbsp;
                 <span class="fa fa-user"><?php echo $rowUserName['userName'];?></span>
                   &nbsp;&nbsp;
<span ><a href="editFile.php?editquadruplicate=<?php echo $rowFileImage['id']; ?>" class="fa fa-pencil"> Edit</a></span>
                    <div class="modal fade" id="displayquadruplicate<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" style="width: 800px" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                       <h4><span class="fa  fw"> Quadruplicate Form</span></h4>
                                     </div>
                                    
                                     <div class="modal-body section">
                                     <div id="printableArea5">
                                       <img src="upload/<?php echo $rowFileImage['quadruplicate_file']; ?>" class="img-thumbnail" style="width:80%; height: 80%;"></img>
                                     </div>
                                     </div>
                                     <div class="modal-footer">
                                       <div class="form-group" >

<input type="button" onclick="printDiv('printableArea5')" class="btn btn-lg btn-default" value="print!" />
                                         <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
                                       </div>
                                       </form>
                                     </div>
                                </div>
                            </div>
                            </div>
                            <?php
                  }else{
                    ?>
                  <a href="addFile.php?addQuadruplicate=<?php echo $rowStack['stackNumber'];?>" class="fa fa-file" style="font-size:80px"></a>
                  <?php }?>
                  <br>
                  <br>
                  <br>

                </div>
                <div class="col-md-3">
                  <h5>Log Book</h5>
                  <?php

                  //get file image
                  $respFileImage = $con->query("SELECT * FROM tbl_lbook WHERE stackNumber='$num'");
                  if($respFileImage){
                    $rowFileImage=$respFileImage->fetch_array();
                  }

                  $dee = $rowFileImage['userId'];
                  $respUserName = $con->query("SELECT userName FROM tbl_users WHERE userID='$dee'");
                  $rowUserName=$respUserName->fetch_array();

                   if($rowStack['lbook']=="Yes"){
                    ?>
                    <a href="#" data-toggle="modal" data-target="#displaylbook<?php echo $x; ?>">
                    <img src="upload/<?php echo $rowFileImage['lbook_file']; ?>" class="img-thumbnail" style="width:80%; height: 80px;"></img>
                    </a>
                    &nbsp;&nbsp;<span class="fa fa-user"><?php echo $rowUserName['userName'];?></span>
                    &nbsp;&nbsp;
<span ><a href="editFile.php?editlbook=<?php echo $rowFileImage['id']; ?>" class="fa fa-pencil"> Edit</a></span>
                    <div class="modal fade" id="displaylbook<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" style="width: 800px" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                       <h4><span class="fa  fw"> Log Book Form</span></h4>
                                     </div>
                                     
                                     <div class="modal-body section">
                                     <div id="printableArea6">
                                       <img src="upload/<?php echo $rowFileImage['lbook_file']; ?>" class="img-thumbnail" style="width:80%; height: 80%;"></img>
                                     </div>
                                     </div>
                                     <div class="modal-footer">
                                       <div class="form-group" >

<input type="button" onclick="printDiv('printableArea6')" class="btn btn-lg btn-default" value="print!" />
                                         <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
                                       </div>
                                       </form>
                                     </div>
                                </div>
                            </div>
                            </div>
                            <?php
                  }else{
                    ?>
                  <a href="addFile.php?addLBook=<?php echo $rowStack['stackNumber'];?>" class="fa fa-file" style="font-size:80px"></a>
                  <?php }?>
                  <br>
                  <br>
                  <br>
                 
                </div>
                <br>
                <hr>
              </div>
            </div>
              <?php
            }elseif($rowStack['status']==$Yes){//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
              ?>
              <div class="panel panel-default" style="background-color:whitesmoke">
              <h4>
                &nbsp;&nbsp;&nbsp;<?php echo $num;?>
                <span class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?deleteStack=<?php echo $rowStack['id'];?>" class="fa fa-trash"></a>&nbsp;</span>
                <span class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?unlockStack=<?php echo $rowStack['id'];?>" class="fa fa-unlock"></a>&nbsp;</span>
                &nbsp;&nbsp;&nbsp;
                <?php
                 $pending = "pending";
                 if($rowStack['finalDate']==$pending){ ?>
                   <span class="pull-right text-muted" style="background-color:blue">&nbsp;&nbsp;
                   <span class="fa fa-unlock" style="color:white"> Open</span>&nbsp;&nbsp;
                   <a href="?view=<?php echo $rowStack['stackNumber']?>" class="fa fa-info-circle" style="color:white"> More...</a>&nbsp;&nbsp;&nbsp;
                   </span>
                  <?php
                 } else{
                   ?>
                <span class="pull-right text-muted" style="background-color:red">&nbsp;&nbsp;
                   <span class="fa fa-lock"style="color:white"> Closed</span>&nbsp;&nbsp;
                   <a href="?view=<?php echo $rowStack['stackNumber']?>" class="fa fa-info-circle" style="color:white"> More...</a>&nbsp;&nbsp;&nbsp;
                </span>
                   <?php
                 }?>
              </h4>
              <hr>
              <div class="row">
                <div class="col-md-3">
                  <h5>&nbsp;&nbsp;&nbsp;&nbsp;Bill of Lading</h5>
                  <?php
                  //get file image
                  $respFileImage = $con->query("SELECT * FROM tbl_billoflading WHERE stackNumber='$num'");
                  if($respFileImage){
                    $rowFileImage=$respFileImage->fetch_array();
                  }

                  $dee = $rowFileImage['userId'];
                  $respUserName = $con->query("SELECT userName FROM tbl_users WHERE userID='$dee'");
                  $rowUserName=$respUserName->fetch_array();

                   if($rowStack['bol']=="Yes"){
                    ?>
                    <a href="#"  data-toggle="modal" data-target="#displaybol<?php echo $x; ?>">
                      <img src="upload/<?php echo $rowFileImage['billofLading_file']; ?>" class="img-thumbnail" style="width:80%; height: 80px;"></img>
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user"><?php echo $rowUserName['userName'];?></span>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;

                    <!-- search by atribute functionality-->
                    <div class="modal fade" id="displaybol<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" style="width: 800px" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                       <h4><span class="fa  fw"> Bill of Lading</span></h4>
                                     </div>
                                     <div class="modal-body section">
                                      <div id="printableArea7">
                                       <img src="upload/<?php echo $rowFileImage['billofLading_file']; ?>" class="img-thumbnail" style="width:80%; height: 80%;"></img>
                                     </div>
                                     </div>
                                     <div class="modal-footer">
                                       <div class="form-group" >

<input type="button" onclick="printDiv('printableArea7')" class="btn btn-lg btn-default" value="print!" />
                                         <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
                                       </div>
                                       </form>
                                     </div>
                                </div>
                            </div>
                            </div>
                    <?php
                  }else{
                    ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="fa fa-file" style="font-size:80px; color:grey"></a>
                    <?php
                  }?>
                  <br>
                  <br>
                  <br>

                </div>
                <div class="col-md-3">
                  <h5>I.D.F</h5>
                  <?php
                  //get file image
                  $respFileImage = $con->query("SELECT * FROM tbl_idf WHERE stackNumber='$num'");
                  if($respFileImage){
                    $rowFileImage=$respFileImage->fetch_array();
                  }

                  $dee = $rowFileImage['userId'];
                  $respUserName = $con->query("SELECT userName FROM tbl_users WHERE userID='$dee'");
                  $rowUserName=$respUserName->fetch_array();

                  if($rowStack['idf']=="Yes"){
                   ?>
                   <a href="#" data-toggle="modal" data-target="#displayidf<?php echo $x; ?>">
                   <img src="upload/<?php echo $rowFileImage['idf_file']; ?>" class="img-thumbnail" style="width:80%; height: 80px;"></img>
                 </a>
                 &nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user"><?php echo $rowUserName['userName'];?></span>
                   <br>
                   &nbsp;&nbsp;&nbsp;&nbsp;

                   <div class="modal fade" id="displayidf<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" style="width: 800px" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h4><span class="fa  fw"> I.D.F</span></h4>
                                    </div>
                                    <div class="modal-body section">
                                      <div id="printableArea8">
                                       <img src="upload/<?php echo $rowFileImage['idf_file']; ?>" class="img-thumbnail" style="width:80%; height: 80%;"></img>
                                     </div>
                                     </div>
                                     <div class="modal-footer">
                                       <div class="form-group" >

<input type="button" onclick="printDiv('printableArea8')" class="btn btn-lg btn-default" value="print!" />
                                        <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
                                      </div>
                                      </form>
                                    </div>
                               </div>
                           </div>
                           </div>
                           <?php
                 }else{
                   ?>
                  &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="fa fa-file" style="font-size:80px; color:grey"></a>
                  <?php }?>
                  <br>
                  <br>
                  <br>

                </div>
                <div class="col-md-3">
                  <h5>K.B.S</h5>
                  <?php
                  //get file image
                  $respFileImage = $con->query("SELECT * FROM tbl_kbs WHERE stackNumber='$num'");
                  if($respFileImage){
                    $rowFileImage=$respFileImage->fetch_array();
                  }

                  $dee = $rowFileImage['userId'];
                  $respUserName = $con->query("SELECT userName FROM tbl_users WHERE userID='$dee'");
                  $rowUserName=$respUserName->fetch_array();

                  if($rowStack['kbs']=="Yes"){
                    ?>
                    <a href="#" data-toggle="modal" data-target="#displaykbs<?php echo $x; ?>">
                    <img src="upload/<?php echo $rowFileImage['kbs_file']; ?>" class="img-thumbnail" style="width:80%; height: 80px;"></img>
                  </a>

                  &nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user"><?php echo $rowUserName['userName'];?></span>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="modal fade" id="displaykbs<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" style="width: 800px" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                       <h4><span class="fa  fw"> Kenya Bureau of Standards</span></h4>
                                     </div>
                                     <div class="modal-body section">
                                      <div id="printableArea9">
                                       <img src="upload/<?php echo $rowFileImage['kbs_file']; ?>" class="img-thumbnail" style="width:80%; height: 80%;"></img>
                                     </div>
                                     </div>
                                     <div class="modal-footer">
                                       <div class="form-group" >

<input type="button" onclick="printDiv('printableArea9')" class="btn btn-lg btn-default" value="print!" />
                                         <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
                                       </div>
                                       </form>
                                     </div>
                                </div>
                            </div>
                            </div>
                            <?php
                  }else{
                    ?>
                   &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="fa fa-file" style="font-size:80px; color:grey"></a>
                  <?php }?>
                  <br>
                  <br>
                  <br>

                </div>
                <div class="col-md-3">
                  <h5>Export Certificate</h5>
                  <?php //get file image
                  $respFileImage = $con->query("SELECT * FROM tbl_ecert WHERE stackNumber='$num'");
                  if($respFileImage){
                    $rowFileImage=$respFileImage->fetch_array();
                  }

                  $dee = $rowFileImage['userId'];
                  $respUserName = $con->query("SELECT userName FROM tbl_users WHERE userID='$dee'");
                  $rowUserName=$respUserName->fetch_array();


                  if($rowStack['ecert']=="Yes"){
                    ?>
                    <a href="#" data-toggle="modal" data-target="#displayecert<?php echo $x; ?>">
                    <img src="upload/<?php echo $rowFileImage['ecert_file']; ?>" class="img-thumbnail" style="width:80%; height: 80px;"></img>
                  </a>
                  &nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user"><?php echo $rowUserName['userName'];?></span>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="modal fade" id="displayecert<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" style="width: 800px" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                       <h4><span class="fa  fw"> Export Certificate</span></h4>
                                     </div>
                                     <div class="modal-body section">
                                       <div id="printableArea10">
                                       <img src="upload/<?php echo $rowFileImage['ecert_file']; ?>" class="img-thumbnail" style="width:80%; height: 80%;"></img>
                                     </div>
                                     </div>
                                     <div class="modal-footer">
                                       <div class="form-group" >

<input type="button" onclick="printDiv('printableArea10')" class="btn btn-lg btn-default" value="print!" />
                                         <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
                                       </div>
                                       </form>
                                     </div>
                                </div>
                            </div>
                            </div>
                            <?php
                  }else{
                    ?>

                  &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="fa fa-file" style="font-size:80px; color:grey"></a>

                  <?php }?>
                  <br>
                  <br>
                  <br>
                </div>
                </div>
                <div class="row">
                <div class="col-md-3">
                  <h5>&nbsp;&nbsp;&nbsp;&nbsp;Invoice</h5>
                  <?php
                  //get file image
                  $respFileImage = $con->query("SELECT * FROM tbl_invoice WHERE stackNumber='$num'");
                  if($respFileImage){
                    $rowFileImage=$respFileImage->fetch_array();
                  }


                  $dee = $rowFileImage['userId'];
                  $respUserName = $con->query("SELECT userName FROM tbl_users WHERE userID='$dee'");
                  $rowUserName=$respUserName->fetch_array();


                  if($rowStack['invoice']=="Yes"){
                    ?>
                    <a href="#" data-toggle="modal" data-target="#displayinvoice<?php echo $x; ?>">
                    <img src="upload/<?php echo $rowFileImage['invoice_file']; ?>" class="img-thumbnail" style="width:80%; height: 80px;"></img>
                  </a>
                  &nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user"><?php echo $rowUserName['userName'];?></span>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="modal fade" id="displayinvoice<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" style="width: 800px" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                       <h4><span class="fa  fw"> Invoice Form</span></h4>
                                     </div>
                                     <div class="modal-body section">
                                       <div id="printableArea11">
                                       <img src="upload/<?php echo $rowFileImage['invoice_file']; ?>" class="img-thumbnail" style="width:80%; height: 80%;"></img>
                                     </div>
                                     </div>
                                     <div class="modal-footer">
                                       <div class="form-group" >

<input type="button" onclick="printDiv('printableArea11')" class="btn btn-lg btn-default" value="print!" />
                                         <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
                                       </div>
                                       </form>
                                     </div>
                                </div>
                            </div>
                            </div>
                      <?php
                  }else{
                    ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="fa fa-file" style="font-size:80px; color:grey"></a>
                  <?php }?>
                  <br>
                  <br>
                  <br>

                </div>
                <div class="col-md-3">
                  <h5>KRA Bank Slip</h5>
                  <?php
                  //get file image
                  $respFileImage = $con->query("SELECT * FROM tbl_treciept WHERE stackNumber='$num'");
                  if($respFileImage){
                    $rowFileImage=$respFileImage->fetch_array();
                  }

                  $dee = $rowFileImage['userId'];
                  $respUserName = $con->query("SELECT userName FROM tbl_users WHERE userID='$dee'");
                  $rowUserName=$respUserName->fetch_array();

                   if($rowStack['treciept']=="Yes"){
                    ?>
                    <a href="#" data-toggle="modal" data-target="#displaytreciept<?php echo $x; ?>">
                    <img src="upload/<?php echo $rowFileImage['treciept_file']; ?>" class="img-thumbnail" style="width:80%; height: 80px;"></img>
                  </a>
                  &nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user"><?php echo $rowUserName['userName'];?></span>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="modal fade" id="displaytreciept<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" style="width: 800px" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                       <h4><span class="fa  fw"> KRA Bank Slip</span></h4>
                                     </div>
                                     <div class="modal-body section">
                                       <div id="printableArea12">
                                       <img src="upload/<?php echo $rowFileImage['treciept_file']; ?>" class="img-thumbnail" style="width:80%; height: 80%;"></img>
                                     </div>
                                     </div>
                                     <div class="modal-footer">
                                       <div class="form-group" >

<input type="button" onclick="printDiv('printableArea12')" class="btn btn-lg btn-default" value="print!" />
                                         <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
                                       </div>
                                       </form>
                                     </div>
                                </div>
                            </div>
                            </div>
                            <?php
                  }else{
                    ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="fa fa-file" style="font-size:80px; color:grey"></a>
                  <?php }?>
                  <br>
                  <br>
                  <br>

                </div>
                <div class="col-md-3">
                  <h5>Quadruplicate</h5>
                  <?php
                  //get file image
                  $respFileImage = $con->query("SELECT * FROM tbl_quadruplicate WHERE stackNumber='$num'");
                  if($respFileImage){
                    $rowFileImage=$respFileImage->fetch_array();
                  }

                  $dee = $rowFileImage['userId'];
                  $respUserName = $con->query("SELECT userName FROM tbl_users WHERE userID='$dee'");
                  $rowUserName=$respUserName->fetch_array();

                   if($rowStack['quadruplicate']=="Yes"){
                    ?>
                    <a href="#" data-toggle="modal" data-target="#displayquadruplicate<?php echo $x; ?>">
                    <img src="upload/<?php echo $rowFileImage['quadruplicate_file']; ?>" class="img-thumbnail" style="width:80%; height: 80px;"></img>
                  </a>
                  &nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user"><?php echo $rowUserName['userName'];?></span>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="modal fade" id="displayquadruplicate<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" style="width: 800px" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                       <h4><span class="fa  fw"> Quadruplicate Form</span></h4>
                                     </div>
                                     <div class="modal-body section">
                                       <div id="printableArea13">
                                       <img src="upload/<?php echo $rowFileImage['quadruplicate_file']; ?>" class="img-thumbnail" style="width:80%; height: 80%;"></img>
                                     </div>
                                     </div>
                                     <div class="modal-footer">
                                       <div class="form-group" >

<input type="button" onclick="printDiv('printableArea13')" class="btn btn-lg btn-default" value="print!" />
                                         <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
                                       </div>
                                       </form>
                                     </div>
                                </div>
                            </div>
                            </div>
                            <?php
                  }else{
                    ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="fa fa-file" style="font-size:80px; color:grey"></a>
                  <?php }?>
                  <br>
                  <br>
                  <br>

                </div>
                <div class="col-md-3">
                  <h5>Log Book</h5>
                  <?php

                  //get file image
                  $respFileImage = $con->query("SELECT * FROM tbl_lbook WHERE stackNumber='$num'");
                  if($respFileImage){
                    $rowFileImage=$respFileImage->fetch_array();
                  }

                  $dee = $rowFileImage['userId'];
                  $respUserName = $con->query("SELECT userName FROM tbl_users WHERE userID='$dee'");
                  $rowUserName=$respUserName->fetch_array();

                   if($rowStack['lbook']=="Yes"){
                    ?>
                    <a href="#" data-toggle="modal" data-target="#displaylbook<?php echo $x; ?>">
                    <img src="upload/<?php echo $rowFileImage['lbook_file']; ?>" class="img-thumbnail" style="width:80%; height: 80px;"></img>
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user"><?php echo $rowUserName['userName'];?></span>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="modal fade" id="displaylbook<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                             <div class="modal-dialog" style="width: 800px" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                       <h4><span class="fa  fw"> Log Book Form</span></h4>
                                     </div>
                                     <div class="modal-body section">
                                       <div id="printableArea14">
                                       <img src="upload/<?php echo $rowFileImage['lbook_file']; ?>" class="img-thumbnail" style="width:80%; height: 80%;"></img>
                                     </div>
                                     </div>
                                     <div class="modal-footer">
                                       <div class="form-group" >

<input type="button" onclick="printDiv('printableArea14')" class="btn btn-lg btn-default" value="print!" />
                                         <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
                                       </div>
                                       </form>
                                     </div>
                                </div>
                            </div>
                            </div>
                            <?php
                  }else{
                    ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="fa fa-file" style="font-size:80px; color:grey"></a>
                  <?php }?>
                  <br>
                  <br>
                  <br>

                </div>
                <br>
                <hr>
              </div>
            </div>
              <?php
              }
            }//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
             ?>
         </div>
            </div>

<!-- search by atribute functionality-->
<div class="modal fade" id="findClear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                   <h4><span class="fa fa-search fw">Clearing And Fowarding File</span></h4>
                 </div>
                 <div class="modal-body section">
                   <div class="">
                   <form action="" class="">
                   <div class="form-group input-group">
                           <input type="text" class="form-control" id="formsClear" onkeyup="mySearchClear()" placeholder="Search for a form..">
                           <span class="input-group-btn">
                               <button class="btn btn-default btn-info" type="button"><i class="fa fa-search"></i>
                               </button>
                           </span>
                       </div>
                   </form>

                   <table id="formsTableClear" class="table table-hover table-condensed" style="table-layout: fixed;">
                   <thead>
                    <tr>
                      <th style="width:75%;">File Number</th>
                      <th style="width:25%;">Action</th>
                    </tr>
                   </thead>
                   <tbody>
                    <?php
                    $respSearchForm1 = $con->query("SELECT * FROM tbl_stacks ORDER BY id DESC");
                    while($rowSearchForm1=$respSearchForm1->fetch_array()){
                      $joinIdSearchForm1 = $rowSearchForm1['id'];
                    ?>
                        <td><?php echo $rowSearchForm1['stackNumber']; ?></td>
                        <td><a href="viewClear.php?viewClear=<?php echo $rowSearchForm1['id']?>" class="btn btn-info"><p style="color: white;">View</p></a></td>

                      </tr>
                    <?php  } ?>
                    <tbody>
                   </table>
                 </div>
                 </div>
                 <div class="modal-footer">
                   <div class="form-group" >
                     <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Close</button>
                   </div>
                   </form>
                 </div>
            </div>
        </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalDirectTranshipment" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="memberModalLabel">Direct Transhipment File</h4>
            </div>
            <div class="modal-body">
            <div class="dash">

            </div>
            </div>
         <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
    </div>
        </div>
    </div>
</div>
    <!-- Modal -->
<div class="modal fade" id="exampleModalVerification" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="memberModalLabel">Verification File</h4>
            </div>
            <div class="modal-body">
            <div class="verify">

            </div>
            </div>
         <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
    </div>
        </div>
    </div>
</div>
 <!-- Modal -->
<div class="modal fade" id="exampleModalReExport" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="memberModalLabel">Re-Export File</h4>
            </div>
            <div class="modal-body">
            <div class="dashRe-Export">

            </div>
            </div>
         <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
    </div>
        </div>
    </div>
</div>
 <!-- Modal -->
<div class="modal fade" id="exampleModalClearingAndFowarding" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="memberModalLabel">Clearing And Fowarding</h4>
            </div>
            <div class="modal-body">
            <div class="clearingFowarding">

            </div>
            </div>
         <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
    </div>
        </div>
    </div>
</div>
        
               

   

