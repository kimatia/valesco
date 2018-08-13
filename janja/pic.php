

 <script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./postscript2.js"></script>
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


        $id = $row['userID'];
		$stmt_edit = $DB_con->prepare('SELECT userPic FROM tbl_users WHERE userID =:uidd');
		$stmt_edit->execute(array(':uidd'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);

	
	   
	         ?>
	           


<div class="row" style="background-color: cream">
<div class="panel body" style="background-color: purple">
<span id="message1"></span> 
<form method="post" id="uploadimage" enctype="multipart/form-data" class="form-horizontal">


	<table class="table table-bordered table-responsive">

    
    <tr>
    	<td><label class="control-label">Profile Img.</label></td>
        <td>
        	<p>
        	
        	<div class="userFetchEdit"><h5>Loading image to be edited...</h5></div>
        	</p>
        	<input class="input-group" type="file" name="file"  accept="image/*" />
        </td>
    </tr>

    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>

        <a class="btn btn-default" href="dashboard.php?page=pic"> <span class="glyphicon glyphicon-backward"></span> cancel </a>

        </td>
    </tr>

    </table>

</form>
</div>
</div>
<!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

 
