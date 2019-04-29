<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>MIET IMS</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="login.php" class="logo">MIET <span class="lite">Incident Management System</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
       
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
      
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    
<?php 
 include_once('include/database.php');

$success="";
	if(isset($_REQUEST['submit'])){
	

	 $name =$_POST['name'];
		 
		  $designation =trim($_POST['designation']);
		 $email =trim($_POST['email']);
		 $phone =trim($_POST['phone']);
		 $password =trim($_POST['password']);
		 $hash =rand(1000,100000);
		
		 
		
        
$query = mysqli_query($link,"insert into registration(name,designation,email,phone,password,type,status,hash) values ('$name','$designation','$email','$phone','$password','guest','0','$hash')");
//$success="You are successfully Registered!. <a href='login.php'>Click here to Login</a>";
$success = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';


$to      = $email; // Send email to our user
$subject = 'IMS MIET Signup | Verification'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$email.'
Password: '.$password.'
------------------------
 
Please click this link to activate your account:
http://localhost/ims/verify.php?email='.$email.'&hash='.$hash.'&name='.$name.'
 
'; // Our message above including the link
                     
$headers = 'From:imsmiet@gmail.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers);

}


 ?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> New User Registration</h3>
            
          </div>
        </div>
        <!-- Form validations -->
		<?php if($success!=""){?>
       <ol class="breadcrumb" style="color:#4cd964;text-align:center;height:55px;font-weight:bold;">
            <?php echo $success; ?>
		</ol><?php }?>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
             
              <div class="panel-body">
			  
                <div class="form">
                  <form class="form-validate form-horizontal" id="register_form" method="post" action="">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="name" name="name" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="designation" class="control-label col-lg-2">Designation <span class="required">*</span></label>
                      <div class="col-lg-10">
					  <?php	 $query="SELECT * FROM designation";


$result = mysqli_query($link,$query);
echo "<select name='designation' id='designation' required class='form-control m-bot15'    >";

echo "<option value=>Select</option>";
while($nt=mysqli_fetch_array($result)){

?>
<option value="<?php echo $nt['designation_name'] ?>"  ><?php echo $nt['designation_name'] ?></option>

<?php 
}
echo "</select>"; ?>
                          
                       
                      </div>
                    </div>
                   
					<div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="email" name="email" autocomplete="off"type="email" onBlur="checkAvailability()" /><span id="emailError"></span>
                      </div>
                    </div>
					
					<div class="form-group ">
                      <label for="phone" class="control-label col-lg-2">Phone No. <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="phone" name="phone" type="text" />
                      </div>
                    </div>
					
                    <div class="form-group ">
                      <label for="password" class="control-label col-lg-2">Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="password" name="password" type="password" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="confirm_password" class="control-label col-lg-2">Confirm Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                      </div>
                    </div>
                    
                   
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <input class="btn btn-primary" name="submit" id="subbutn" Value="Register" type="submit">
                        
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    <div class="text-right">
      <div class="credits">
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
        </div>
    </div>
  </section>
  <!-- container section end -->
<script>
    
		function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_email.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
  if(data == 1) {
                    //the email is available
					
                    $("#emailError").html("Available");
					$('#emailError').css('color', '#8AD919');
					$('#subbutn').removeAttr('disabled');
					  //$('#reality_form').removeClass('submit_class');
                }
				else{
				
			$('#subbutn').attr('disabled', 'disabled');
			$('#emailError').css('color', '#C33');
				$("#emailError").html("Email not available");
				
				}
                
},



});
}

</script>
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery validate js -->
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <!-- custom form validation script for this page-->
  <script src="js/form-validation-script.js"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>


</body>

</html>
