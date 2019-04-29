
   
<?php 
include_once('include/header.php');
 include_once('include/database.php');

$success="";
	if(isset($_REQUEST['submit'])){
	

	echo $name = trim($_POST['name']);
		 
		  $designation =trim($_POST['designation']);
		 $email =trim($_POST['email']);
		 $phone =trim($_POST['phone']);
		 $password =trim($_POST['password']);
		
		 
		
        
$query = mysqli_query($link,"insert into handler_registration(name,designation,email,phone,password,type) values ('$name','$designation','$email','$phone','$password','handler')");
$success="You are successfully Registered!. <a href='handler-login.php'>Click here to Login</a>";

}








 ?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> New Handler Registration</h3>
            
          </div>
        </div>
        <!-- Form validations -->
		<?php if($success!=""){?>
       <ol class="breadcrumb" style="color:#4cd964;text-align:center;font-weight:bold;">
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
                   <div class="form-group">
                    <label class="control-label col-lg-2" for="inputSuccess">Designation</label>
                    <div class="col-lg-10">
                    	<?php	 $querys="SELECT * FROM handler_panel";


$results = mysqli_query($link,$querys);
echo "<select name='designation' id='category' required class='form-control m-bot15'    >";

echo "<option value=>Select</option>";
while($nts=mysqli_fetch_array($results)){

?>
<option value="<?php echo $nts['handler_designation'] ?>"  ><?php echo $nts['handler_designation'] ?></option>

<?php 
}
echo "</select>"; ?>

                     
                    </div>
                  </div>
                   
					<div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="email" name="email" type="email" onBlur="checkAvailability()" /><span id="emailError"></span>
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
    
  </section>
  <!-- container section end -->
<script>
    
		function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_handler_email.php",
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
