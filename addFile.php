

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="postscript.js"></script>

<script>
function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
  
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}


</script>
<script>
  var timeruser=10;
  var user="";
  $(function (){
    function inTime(){
      setTimeout(inTime, 1000);
 
      if(timeruser==10){
  
       $.post("userFetch.php",{userload:user},function(data){
        $(".userfetch h5").html(data);
       })
       timeruser=11;
       clearTimeout(inTime); 
      }
      timeruser--;
    }

    inTime(); 
  });

</script>
<script>
  var timerpic=10;
  var pic="";
  $(function (){
    function picTime(){
      setTimeout(picTime, 1000);
 
      if(timerpic==10){
  
       $.post("picFetch.php",{picload:pic},function(data){
        $(".picFetch h5").html(data);
       })
       timerpic=11;
       clearTimeout(picTime); 
      }
      timerpic--;
    }

    picTime(); 
  });

</script>
<script>
  var action=10;
  var acts="";
  $(function (){
    function actionTime(){
      setTimeout(actionTime, 1000);
 
      if(action==10){
  
       $.post("actionFetch.php",{acting:acts},function(data){
        $(".actionFetch h5").html(data);
       })
       action=11;
       clearTimeout(actionTime); 
      }
      action--;
    }

    actionTime(); 
  });

</script>
<script>
  var manifestTimer=10;
  var manifest="";
  $(function (){
    function manTime(){
      setTimeout(manTime, 1000);
 
      if(manifestTimer==10){
  
       $.post("bol.php",{userload:manifest},function(data){
        $(".billOfLading h5").html(data);
       })
       manifestTimer=11;
       clearTimeout(manTime); 
      }
      manifestTimer--;
    }

    manTime(); 
  });

</script>
<!-- Script -->


     
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
  


//check out a particular file stack
if (isset($_GET['view'])){
  $_SESSION['view'] = $_GET['view'];
  header("location: stack.php");
}

if(isset($_POST['btn-add-stack'])){

 $sNumber = $_POST['stackNumber'];

 $SQL = $con->prepare("INSERT INTO tbl_stacks(stackNumber, postDate) VALUES(?,now())");
 if(!$SQL){
  echo $con->error;
  $msgCreateStack = "<div class='alert alert-danger'>
    <button class='close' data-dismiss='alert'>&times;</button>
     <strong>Sorry!</strong>  Post failed.
     </div>
     ";
  header("refresh:5;adhome.php");
}else{

  $SQL->bind_param('s',$sNumber);
  $SQL->execute();
  header("location: adhome.php");
  $msgCreateStack = "<div class='alert alert-success'>
    <button class='close' data-dismiss='alert'>&times;</button>
     <strong>Success !</strong>  Post success.
     </div>
     ";
 }
}

//check stack number to direct input of files in that stack
if (isset($_GET['addBOL'])){
  $_SESSION['stackNumber'] = $_GET['addBOL'];
  $_SESSION['file'] = "BOL";
  header("location: addFile.php");
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

if (isset($_SESSION["errMssg"])){
  $mssg = "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>Bill of lading form reqired first to proceed to the next
           </div>";
}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Valesco | Admin</title>
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




</head>

<body style="background-image: url(images/8.jpg); " onload="startTime()" ng-app='myapp'>

<header>
 <!-- Navigation -->
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
             
                <li class="dropdown get_tooltip" data-toggle="tooltip" data-placement="bottom" title="logout">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo "Admin ". $row['userName'];?> <i class="fa fa-caret-down"></i>
                    </a>
                    
                    <!-- /.dropdown-user -->
                </li>
            </ul>
            <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"> Logout</i></a>
                        </li>
                    </ul>
            <!-- /.navbar-top-links -->
        </nav>
</header>



<div class="row" style="margin-top: 60px;">
  <div class="col-md-3">
    <div class="panel panel-default">
      <div class="panel-body">
      <div class="row">
        <div class="picFetch"><h5>Loading Your Image...</h5></div>
        </div>
        <div class="row">
        <div class="col-md-3">
        <div id="content">
          <dl class="accordion text-center">
 <dd>
    <a href="dashboard.php?page=pic" style="background:#3EB05B;"  title="Profile Picture">
  <i class="fa fa-user fa-2x sancolor-white"></i></a>
  </dd>
  
  
  <dd>
    <a href="dashboard.php?page=password" style="background:#E94B3B"  title="Change Password"><i class="fa fa-lock fa-2x sancolor-white"></i></a>
  </dd>
  <dd>
    <a href="dashboard.php?page=profile"  style="background:#0099D3;"  title="profile"><i class="fa icon-cog fa-2x sancolor-white"></i></a>
  </dd>
  <dd id="email1" >
    <a  style="background:#F7990D;"  title="Actions"><i class="fa icon-pencil fa-2x sancolor-white"></i></a>
  </dd>
  <dd id="email" >
    <a style="background:#5bc0de;"  title="Manifest"><i class="fa icon-book fa-2x sancolor-white"></i>
  </dd>
  

       
  </dl>
  </div>
        </div>
        
        <div class="col-md-9">
 
 <div class="well well-small">
                <a href="adhome.php?page=manifest"><button class="btn btn-inverse btn-block" style="color: black"><strong>Manifest</strong> </button></a><br>
                <a href="billOfLading.php"><button class="btn btn-inverse btn-block" style="color: black"><strong>Bill of lading</strong> </button></a><br>
                <a href="adhome.php?page=manifest"><button class="btn btn-inverse btn-block" style="color: black"><strong>Verification</strong> </button></a><br>
                <a href="adhome.php?page=manifest"><button class="btn btn-inverse btn-block" style="color: black"><strong>C.Fowarding</strong> </button></a><br>
 <input id="email1ss" value="2" type="checkbox"><i class="icon-remove icon-white"></i>Action
<input id="email1sss" value="2" type="checkbox"><i class="icon-remove icon-white"></i>Manifest
            </div>

        </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
  <?php
    $page=@$_REQUEST['page'];
    
    switch($page){
    
    case($page=='main'):
    
    break; 
     case($page=='manifest'):
     include('valescodirects/manifest.php');
    break;
    case($page=='country'):
    include('janja/country.php');
    break;
    case($page=='billOfLading'):
    include('billOfLadingRecords.php');
    break;
    case($page=='booking'):
    include('booking/booking.php');
    break;
    
    case($page=='info'):
    include('janja/info.php');
    break;
    
    case($page=='profile'):
    include('janja/profile.php');
    break;
    
    default:
    include('janja/main.php');
    break;  
      
      
    }
    
    ?> 
    <div class="row">
      <div class="panel panel-default">
         <div class="panel panel-default">
          <div class="panel panel-body">
           <span><?php echo $_SESSION['file'];?><i class="pull-right"><?php echo $_SESSION['stackNumber']; ?></i></span>
           <hr>
           <?php
           $BOL = "BOL";
           $COC = "COC";
           $IDF = "IDF";
           $KBS = "KBS";
           $ECert = "ECert";
           $Invoice = "Invoice";
           $TReciept = "TReciept";
           $Quadruplicate = "Quadruplicate";
           $LBook = "LBook";

           if($_SESSION['file']==$BOL){
            ?>
            <?php if (isset($mssg)){ echo $mssg; }?>
            <div class="col-lg-3">
                  <span id="message"></span>
                  <form id="uploadimage" method="POST">

                    <input type="hidden" name="stackNumber" value="<?php echo $_SESSION['stackNumber']; ?>" required/>

                    <input type="hidden" name="userId" value="<?php echo $row['userID']; ?>" required/>

                    <div class="form-group">
                      <label for="billofLadingNumber"> Bill of Lading Number</label>
                        <input type="text"  name="billofLadingNumber" placeholder="" class="form-control"/>
                    </div>

                   <div class="form-group">
                     <label for="shippername"> Shipper</label>
                       <input type="text" name="shippername" placeholder="Name" class="form-control" required/>
                   </div>

                   <div class="form-group">
                     <label for="shipperadress"> Adress</label>
                       <input type="text" name="shipperadress" placeholder="Shippers adress" class="form-control" required/>
                   </div>

                   <div class="form-group">
                     <label for="shipperlocation"> Location</label>
                       <input type="text" name="shipperlocation" placeholder="Shipper's Adress" class="form-control" required/>
                   </div>

            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-3">
                     <div class="form-group">
                       <label for="consigneename"> Consignee</label>
                         <input type="text" name="consigneename" placeholder="Consignee Name" class="form-control" required/>
                     </div>

                     <div class="form-group">
                       <label for="consigneeadress"> Adress</label>
                         <input type="text" name="consigneeadress" placeholder="Consignee adress" class="form-control" required/>
                     </div>

                     <div class="form-group">
                       <label for="consigneelocation"> Location</label>
                         <input type="text" name="consigneelocation" placeholder="consignee Adress" class="form-control" required/>
                     </div>

            </div>
            <!-- /.col-lg-4 -->

            <div class="col-lg-3">
                      <div class="form-group">
                        <label for="precariageBy">Precariage By</label>
                          <input type="text" name="precariageBy" placeholder="" class="form-control"/>
                      </div>

                        <div class="form-group">
                          <label for="placeofReciept">Place of Reciept</label>
                            <input type="text" name="placeofReciept" placeholder="" class="form-control"/>
                        </div>

                        <div class="form-group">
                          <label for="vessel">Vessel</label>
                            <input type="text" name="vessel" placeholder="" class="form-control"/>
                        </div>

                        <div class="form-group">
                          <label for="voyno">Voy No</label>
                            <input type="text" name="voyno" placeholder="" class="form-control"/>
                        </div>

            </div>

            <div class="col-lg-3">
              <div class="form-group">
                <label for="loadingport">Port of Loading</label>
                  <input type="text" name="loadingport" placeholder="" class="form-control"/>
              </div>

              <div class="form-group">
                <label for="dischargeport">Port of Discharge</label>
                  <input type="text" name="dischargeport" placeholder="" class="form-control"/>
              </div>

              <div class="form-group">
                <label for="finalDestination">Final Destination</label>
                  <input type="text" name="finalDestination" placeholder="" class="form-control"/>
              </div>

              <div class="form-group">
                <label for="freightName">Freight & Charges</label>
                  <input type="text"  name="freightName" placeholder="" class="form-control"/>
              </div>

          </div>

          <br><br>

          <div class="col-md-3">

            <div class="form-group">
              <label for="revenueTons"> Revenue Tons</label>
                <input type="text"  name="revenueTons" placeholder="" class="form-control"/>
            </div>

            <div class="form-group">
              <label for="rate"> Rate</label>
                <input type="text"  name="rate" placeholder="" class="form-control"/>
            </div>

            <div class="form-group">
              <label for="per"> Per</label>
                <input type="text"  name="per" placeholder="" class="form-control"/>
            </div>

            <div class="form-group">
              <label for="prepaid"> Prepaid</label>
                <input type="text"  name="prepaid" placeholder="" class="form-control"/>
            </div>

            <div class="form-group">
              <label for="collect"> Collect</label>
                <input type="text"  name="collect" placeholder="" class="form-control"/>
            </div>

          </div>


          <div class="col-md-3">

            <div class="form-group">
              <label for="markNumber">Marks & Number</label>
                <input type="text" name="markNumber" placeholder="" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" name="description" placeholder="" class="form-control"/></textarea>
            </div>

            <div class="form-group">
              <label for="grossweight">Gross Weight</label>
                <input type="text"  name="grossweight" placeholder="" class="form-control"/>
            </div>

            <div class="form-group">
              <label for="measurement">Measurement(CBM)</label>
                <input type="text"  name="measurement" placeholder="" class="form-control"/>
            </div>

          </div>

          <div class="col-md-3">

            <div class="form-group">
              <label for="packagesNo">Total Number of Packages</label>
                <input type="text"  name="packagesNo" placeholder="" class="form-control"/>
            </div>
            <div class="form-group">
              <label for="freightPayable"> Freight Payable</label>
                <input type="text"  name="freightPayable" placeholder="" class="form-control"/>
            </div>

            <div class="form-group">
              <label for="numberOriginal"> Number of Original</label>
                <input type="text"  name="numberOriginal" placeholder="" class="form-control"/>
            </div>

            <div class="form-group">
              <label for="placeOfIssue"> Place of Issue</label>
                <input type="text"  name="placeOfIssue" placeholder="" class="form-control"/>
            </div>

            <div class="form-group">
              <label for="dateOfIssue"> Date of Issue</label>
                <input type="text"  name="dateOfIssue" placeholder="" class="form-control"/>
            </div>

          </div>

          <div class="col-md-3">
            <div id="image_preview" ><center><img id="previewing" src="//placehold.it/600x350/99223" class="img-responsive"/></center></div>

           <div class="form-group">
             <label for="file">File</label>
              <input type="file" name="file" id="file"/>
           </div>

          <input type="submit" value="Upload" class="btn btn-outline btn-primary btn-block" />
         </form>
          </div>
            <?php
           }elseif($_SESSION['file']==$COC){
            ?>
            <span id="message"></span>
            <form id="uploadimage" method="post">
              <div class="form-group">
                  <label for="Number">Number</label>
                  <input type="text" name="Number" placeholder="Number" class="form-control"  autofocus required/>
              </div>

              <input type="hidden" name="stackNumber" value="<?php echo $_SESSION['stackNumber']; ?>" required/>

              <input type="hidden" name="userId" value="<?php echo $row['userID']; ?>" required/>

              <div class="form-group">
                <label for="file">File</label>
                 <input type="file" name="file" id="file"/>
              </div>

                <button class="btn btn-primary btn-outline" type="submit" name="btn-add-stack"> Submit</button></br>
              </form>
            <?php
           }elseif($_SESSION['file']==$IDF){
            ?>
            <span id="message"></span>
            <form id="uploadimage" method="post">
              <div class="form-group">
                  <label for="idfNumber">IDF Number</label>
                  <input type="text" name="idfNumber" placeholder="IDF Number" class="form-control"  autofocus required/>
              </div>

              <input type="hidden" name="stackNumber" value="<?php echo $_SESSION['stackNumber']; ?>" required/>

              <input type="hidden" name="userId" value="<?php echo $row['userID']; ?>" required/>

              <div class="form-group">
                <label for="file">File</label>
                 <input type="file" name="file" id="file"/>
              </div>

                <button class="btn btn-primary btn-outline" type="submit" name="btn-submit"> Submit</button></br>
              </form>
            <?php
           }elseif($_SESSION['file']==$KBS){
            ?>
            <span id="message"></span>
            <form id="uploadimage" method="post">
              <div class="form-group">
                  <label for="kbsNumber">Certificate Number</label>
                  <input type="text" name="kbsNumber" placeholder="KBS Certificate Number" class="form-control"  autofocus required/>
              </div>

              <input type="hidden" name="stackNumber" value="<?php echo $_SESSION['stackNumber']; ?>" required/>

              <input type="hidden" name="userId" value="<?php echo $row['userID']; ?>" required/>

              <div class="form-group">
                <label for="file">File</label>
                 <input type="file" name="file" id="file"/>
              </div>

                <button class="btn btn-primary btn-outline" type="submit" name="btn-submit"> Submit</button></br>
              </form>
            <?php
           }elseif($_SESSION['file']==$ECert){
            ?>
            <span id="message"></span>
            <form id="uploadimage" method="post">
              <div class="form-group">
                  <label for="ecertNumber">Export Certificate Number</label>
                  <input type="text" name="ecertNumber" placeholder="Export Certificate Number" class="form-control"  autofocus required/>
              </div>

              <input type="hidden" name="stackNumber" value="<?php echo $_SESSION['stackNumber']; ?>" required/>

              <input type="hidden" name="userId" value="<?php echo $row['userID']; ?>" required/>

              <div class="form-group">
                <label for="file">File</label>
                 <input type="file" name="file" id="file"/>
              </div>

                <button class="btn btn-primary btn-outline" type="submit" name="btn-submit"> Submit</button></br>
              </form>
            <?php
           }elseif($_SESSION['file']==$Invoice){
            ?>
            <span id="message"></span>
            <form id="uploadimage" method="post">
              <div class="form-group">
                  <label for="invoiceNumber">Invoice Number</label>
                  <input type="text" name="invoiceNumber" placeholder="Invoice Number" class="form-control"  autofocus required/>
              </div>

              <input type="hidden" name="stackNumber" value="<?php echo $_SESSION['stackNumber']; ?>" required/>

              <input type="hidden" name="userId" value="<?php echo $row['userID']; ?>" required/>

              <div class="form-group">
                <label for="file">File</label>
                 <input type="file" name="file" id="file"/>
              </div>

                <button class="btn btn-primary btn-outline" type="submit" name="btn-submit"> Submit</button></br>
              </form>
            <?php
          }elseif($_SESSION['file']==$TReciept){
            ?>
            <span id="message"></span>
            <form id="uploadimage" method="post">
              <div class="form-group">
                  <label for="trecieptNumber">Transaction Reciept Number</label>
                  <input type="text" name="trecieptNumber" placeholder="Transaction Reciept Number" class="form-control"  autofocus required/>
              </div>

              <input type="hidden" name="stackNumber" value="<?php echo $_SESSION['stackNumber']; ?>" required/>

              <input type="hidden" name="userId" value="<?php echo $row['userID']; ?>" required/>

              <div class="form-group">
                <label for="file">File</label>
                 <input type="file" name="file" id="file"/>
              </div>

                <button class="btn btn-primary btn-outline" type="submit" name="btn-submit"> Submit</button></br>
              </form>
            <?php
           }elseif($_SESSION['file']==$Quadruplicate){
            ?>
            <span id="message"></span>
            <form id="uploadimage" method="post">
              <div class="form-group">
                  <label for="quadruplicateNumber">Quadruplicate Number</label>
                  <input type="text" name="quadruplicateNumber" placeholder="Quadruplicate Number" class="form-control"  autofocus required/>
              </div>

              <input type="hidden" name="stackNumber" value="<?php echo $_SESSION['stackNumber']; ?>" required/>

              <input type="hidden" name="userId" value="<?php echo $row['userID']; ?>" required/>

              <div class="form-group">
                <label for="file">File</label>
                 <input type="file" name="file" id="file"/>
              </div>

                <button class="btn btn-primary btn-outline" type="submit" name="btn-submit"> Submit</button></br>
              </form>
            <?php
           }elseif($_SESSION['file']==$LBook){
            ?>
            <span id="message"></span>
            <form id="uploadimage" method="post">
              <div class="form-group">
                  <label for="lbookNumber">Log Book Number</label>
                  <input type="text" name="lbookNumber" placeholder="Log Book Number" class="form-control"  autofocus required/>
              </div>

              <input type="hidden" name="stackNumber" value="<?php echo $_SESSION['stackNumber']; ?>" required/>

              <input type="hidden" name="userId" value="<?php echo $row['userID']; ?>" required/>

              <div class="form-group">
                <label for="file">File</label>
                 <input type="file" name="file" id="file"/>
              </div>

                <button class="btn btn-primary btn-outline" type="submit" name="btn-submit"> Submit</button></br>
              </form>
            <?php
           }
           ?>
          </div>
        </div>
      </div>
    </div>  
    </div>
   
        <script src="js/jquery.min.js"></script>
<script>
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            //$('#uploadForm + img').remove();
            //$('#uploadForm').after('<img src="'+e.target.result+'" width="450" height="300"/>');
            $('#uploadForm + embed').remove();
            $('#uploadForm').after('<embed src="'+e.target.result+'" width="200" height="200">');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#file").change(function () {
    filePreview(this);
});
</script>
      

 
   

 <div class="col-md-3  " >
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="userfetch"><h5>Loading users...</h5></div>

      </div>
    </div>
  </div>
  </div>
  </div>

  
 

                                         

   
   
    
</body>
</html>

