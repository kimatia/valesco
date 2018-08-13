

<?php
$idd = $_GET['id'];
?>
 <center><strong><h3>Image upload of invoice.</h3></strong></center>
         <form method="post" id="uploadForm"  enctype="multipart/form-data" class="form-horizontal">
         <div class="modal-body">

<input class="form-control " type="hidden" name="stackIdentity" value="<?php echo $idd; ?>" id="action"  placeholder="Enter action" >
<input class="form-control " type="hidden" name="postUser" value="<?php echo $row['userName']; ?>" id="action"  placeholder="Enter action" >
<!-- IMAGE OF MANIFEST FILE ENTRY -->
<div class="form-group input-group">
  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;Manifest Pages&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input  type="file" name="file" id="file" class="btn btn-default form-control" accept="image/*" />

</div>
<input type="hidden" name="manifestid" value="<?php echo $idd;  ?>" id="manifestid" class="btn btn-default form-control">
<button type="submit" name="btnSavePages" value="send" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>Save
        </button>
        </div>
        </form>