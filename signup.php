<script>
function getcity(id) {
      xhr = new XMLHttpRequest();
      xhr.open('GET' , 'test.php?idd='+id, true);
      xhr.send();
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status==200){
          document.getElementById("city_display").innerHTML = xhr.responseText;
          }
      
        }


}

function getEmail(emailid){

      email  = new XMLHttpRequest();
      email.open('GET' , 'test2.php?email='+emailid, true);
      email.send();
      email.onreadystatechange = function(){
        if (email.readyState == 4 && email.status == 200)
        {
          
          document.getElementById('emailDiv').innerHTML = email.responseText;
          }
        
        }
  
  
  }
  
  
  function password (pass){
  var a = document.getElementById('txtpass1').value;
  //  document.write(a);
    var b = document.getElementById('txtpass2').value;
    if (a == b ){
      document.getElementById('cnfrmpass').innerHTML = "<font color='#00CC00'>Matched</font>";
      }
      else {
        
        document.getElementById('cnfrmpass').innerHTML = "<font color='red'>Miss matched</font>";
        }
    }

</script>


<?php
session_start();
require_once 'dbconfig.php'; 
require_once 'class.user.php';

$result = $mysqli->query("SELECT * FROM tbl_country ORDER BY id ASC");
if(!$result){
  echo 'query failed';}

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
  $stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
  $stmt->execute(array(":uid"=>$_SESSION['userSession']));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if($row['loginType']=="admin"){
    $reg_user->redirect('adhome.php');
  }else if($row['loginType']=="company"){
    $reg_user->redirect('home.php');
  }
}


if(isset($_POST['btn-signup']))
{
 $uname = trim($_POST['txtuname']);
 $email = trim($_POST['txtemail']);
 $upass = trim($_POST['txtpass']);
 $uphone = trim($_POST['txtphone']);
 $uNatId = trim($_POST['txtNatId']);
 $uCity=trim($_POST['txtCity']);
 $uCountry=trim($_POST['txtCountry']);
 $urole = trim($_POST['txtrole']);

 $stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
 $stmt->execute(array(":email_id"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC);

 if($stmt->rowCount() > 0)
 {
  $msg = "
        <div class='alert alert-danger'>
    <button class='close' data-dismiss='alert'>&times;</button>
     <strong>Sorry !</strong>  User with that email already exists , Please Try another one
     </div>
     ";
 } else {
  if($reg_user->register($uname,$email,$upass,$uphone,$uNatId,$uCity,$uCountry,$urole)){
    $msg = "
          <div class='alert alert-success'>
      <button class='close' data-dismiss='alert'>&times;</button>
       <strong>Success !</strong>  You can now login.
       </div>
       ";
       //after successful login, lets take the user to the login page
       header("refresh:3;login.php");
        
 }else  {
   echo "sorry , Query could no execute...";
  }
}
}

if(isset($_POST['btn-call']))
    {
        $username = $_POST['user_name'];// name
        $userphone = $_POST['user_phone'];// phone
        
       
        if(empty($username)){
            $errMSG = "Please Enter Name.";
        }
        else if(empty($userphone)){
            $errMSG = "Please Enter phone number.";
        }
       
       


        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('INSERT INTO tbl_call(userName,userPhone,sendtime) VALUES(:uname,:uphone,now())');
            $stmt->bindParam(':uname',$username);
            $stmt->bindParam(':uphone',$userphone);
            

            if($stmt->execute())
            {
                $successMSG = "successfully created a call request...";
               
            }
            else
            {
                $errMSG = "error while creating a call request....";
            }
        }
    }
?>
<!DOCTYPE HTML>
<html>

<head>
<title>Valesco | Signup</title>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

     <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Begin emoji-picker Stylesheets -->
    <link href="lib/css/emoji.css" rel="stylesheet">
    <!-- End emoji-picker Stylesheets -->
    <!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="css/style3.css" />
    <script src="js/app.js"></script>
    <script src="js/reveal.js"></script>
<script src="js/angular.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!--chat-->
<link rel="stylesheet" type="text/css" href="js/jScrollPane/jScrollPane.css" />
<link rel="stylesheet" type="text/css" href="css/page.css" />
<link rel="stylesheet" type="text/css" href="css/chat.css" />

<script src="js/jScrollPane/jquery.mousewheel.js"></script>
<script src="js/jScrollPane/jScrollPane.min.js"></script>
 <link rel="stylesheet" href="css/lightbox.min.css">
<link rel="stylesheet" type="text/css" href="css/component.css" />
<script src="js/modernizr.custom.js"></script>
</head>

<body  onload="startTime()" ng-app='myapp'>

<div id="particles-js"></div>


<header>
 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Valesco</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              <li>
                <a href="index.php"><span class="fa fa-sign-in"></span>&nbsp;Login</a>
              </li>
                
                
            </ul>
            <!-- /.navbar-top-links -->
        </nav>
</header>
    <div class="row" style="padding-top: 55px">
<div class="col-md-5 col-md-offset-3">
<div id="slider">
    <div id="slide-wrapper" class="rounded clear">
    <div class="panel panel-default">

            <div class="panel-heading">
                <center><strong>SIGNUP</strong></center>
               
                <?php
    if(isset($errMSG1)){
            ?>
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG1; ?></strong>
            </div>
            <?php
    }
    else if(isset($successMSG1)){
        ?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG1; ?></strong>
        </div>
        <?php
    }
    ?>
            </div>
            <div class="panel-body" style="background-color: purple;">

       <form class="form-signin" method="post" id="register-form" >



             <fieldset>
  <?php if(isset($msg)) echo $msg;  ?>
  <div class="form-group input-group">
  <span class="input-group-addon">Username&nbsp;&nbsp;</span>
      <input class="form-control" placeholder="Username" name="txtuname"  autofocus required>
  </div>
  <div class="form-group input-group">
  <span class="input-group-addon">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <input class="form-control" placeholder="E-mail" name="txtemail" type="email" required>
</div>
  <div class="form-group input-group">
  <span class="input-group-addon">Telephone&nbsp;&nbsp;</span>
      <input class="form-control" placeholder="Phone number" name="txtphone" required>
  </div>
  <div class="form-group input-group">
  <span class="input-group-addon">National ID</span>
    <input class="form-control" placeholder="National ID Number" name="txtNatId" required>
</div>
 <div class="form-group input-group">
                                <span class="input-group-addon">City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <input class="form-control" placeholder="city" name="txtCity" required>
                                </div>
<div class="form-group input-group">
  <span class="input-group-addon">Nationality</span>
    <select class="form-control" name="txtCountry">
<?php while($row = mysqli_fetch_assoc($result)){?>
<option value="<?php echo $row['userCountry']; ?>"> <?php echo $row['userCountry']; ?>
</option>
<?php } ?>
</select>
</div>
<div class="form-group input-group">
<span class="input-group-addon">Password&nbsp;&nbsp;&nbsp;</span>
    <input class="form-control" placeholder="Password" name="txtpass" id="txtpass1" type="password" value="" required>
</div>
<div class="form-group input-group">
<span class="input-group-addon">C.Password</span>
    <input class="form-control" placeholder="Password" name="txtpass2" id="txtpass2" onblur="password()" type="password" value="" required>
    
</div>
                                
  <input name="txtrole" type="hidden" value="worker" required>
                                 
<button class="btn btn-lg btn-success btn-block" type="submit" name="btn-signup">Signup</button></br>
          </fieldset>
             </form>
              </div>
            <div class="panel-footer">
             <div id="cnfrmpass"></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
    <script src="js/jquery.js"></script>

   <script src="js/jquery.countdown.js"></script>
<script src="js/script.js"></script>
 <script src="js/bootstrap.min.js"></script>
      <script src="js/animsition.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
      <script src="js/jquery.magnific-popup.min.js"></script>
      <script src="js/jquery.countdown.min.js"></script>
      <script src="js/twitterFetcher_min.js"></script>
      <script src="js/masonry.pkgd.min.js"></script>
      <script src="js/imagesloaded.pkgd.min.js"></script>
      <script src="js/jquery.flexslider-min.js"></script>
      <script src="js/photoswipe.min.js"></script>
      <script src="js/photoswipe-ui-default.min.js"></script>
      <script src="js/jqinstapics.min.js"></script>
      <script src="js/particles.min.js"></script>
      <script type="text/javascript">
        particlesJS("particles-js", {"particles":{"number":{"value":67,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"triangle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":12,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":false,"mode":"repulse"},"onclick":{"enable":false,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});var count_particles, stats, update; stats = new Stats; stats.setMode(0); stats.domElement.style.position = 'absolute'; stats.domElement.style.left = '0px'; stats.domElement.style.top = '0px'; document.body.appendChild(stats.domElement); count_particles = document.querySelector('.js-count-particles'); update = function() { stats.begin(); stats.end(); if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) { count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; } requestAnimationFrame(update); }; requestAnimationFrame(update);;
      </script>
      <script src="js/script.js"></script>
</body>
    


</html>

