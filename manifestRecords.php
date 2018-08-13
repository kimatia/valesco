<form method="post" id="uploadForm"  enctype="multipart/form-data" class="form-horizontal">

<?php
$manifestInsertId=$_GET['id'];

?>
<div class="modal-body">
<!-- IMAGE OF MANIFEST FILE ENTRY -->
<div class="form-group input-group">
  <span class="input-group-addon">Manifest File</span>
<input  type="file" name="file" id="file" class="btn btn-default form-control" accept="image/*" />

</div>
<input type="hidden" name="manifestid" value="<?php echo $manifestInsertId;  ?>" id="manifestid" class="btn btn-default form-control">
<button type="submit" name="btnSaveManifestFile" value="send" class="btn btn-success">
        <span class="glyphicon glyphicon-save"></span>Update
        </button>
        </div>
        </form>