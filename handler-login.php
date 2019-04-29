<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Handler Login-IMS</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>
<?php 
include_once('include/database.php');
$error="";
if(isset($_REQUEST['email']))
	{
	$username=mysqli_real_escape_string($link,$_REQUEST['email']);
	$password=mysqli_real_escape_string($link,$_REQUEST['password']);
	$status="Active";
	$query="select * from handler_registration where email='$username' && password='$password'   ";
	$rid=mysqli_query($link,$query);
	$hanlderinfo=mysqli_fetch_array($rid);
	$num=mysqli_num_rows($rid);
	
	$type=  $hanlderinfo['type'];


	if($num>0)
	{
	 
	  
	   if($type=="handler"){
		   session_start();
	  $_SESSION['handlerid']=$hanlderinfo['id'];
	  $_SESSION['name']=$hanlderinfo['name'];
	  $_SESSION['designation']=$hanlderinfo['designation'];
	  $_SESSION['email']=$hanlderinfo['email'];
	  $_SESSION['phone']=$hanlderinfo['phone'];
	  header("location:handler_panel.php");
	  }
	}

	else
	{
	  $error="<center><font color='red'><b>Incorrect Username Or Password.<b></font></center>";
	}
	 }
	
?>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" action="" method="post">
      <div class="login-wrap">
	  <img src="img/logo.png" style="width:360px">
	  <p style="font-size:24px;font-weight:bold;color:#000">MIET Incident Management System</p>
        <p style="font-weight:bold;font-size:25px;">IMS Handler Login</p>
        <p style="font-weight:bold;font-size:25px;"><?php echo $error;?></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" required name="email" placeholder="Email" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" required class="form-control" placeholder="Password">
        </div>
     
        <input  value="Sign In" name="submit" class="btn btn-primary btn-lg btn-block" type="submit">
      <div class="text-right" style="margin-top:10px;color:#000000">  <a href="new_user.php"> New User Registration</a> </div>
      <div class="text-right" style="margin-top:10px;color:#000000">  <a href="login.php"> Sign In for User</a> </div>
   
      </div>
    </form>
    
    </div>
  </div>
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '41a240acfba2bc3f74eb7609e68d2c4f21e59424';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>

</body>

</html>
