<?php include_once('include/header.php');
 include_once('include/database.php');?>

    
<?php 
 include_once('include/database.php');

$success="";
	if(isset($_REQUEST['submit'])){
	

	 $designation_name =$_POST['designation_name'];
		 
		 
		
		 
		
        
$query = mysqli_query($link,"insert into designation(designation_name) values ('$designation_name')");
//$success="You are successfully Registered!. <a href='login.php'>Click here to Login</a>";
$success = 'Designation Successfully Added';




}








 ?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> New Designation</h3>
            
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
                      <label for="fullname" class="control-label col-lg-2">Designation <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="designation_name" required name="designation_name" type="text" />
                      </div>
                    </div>
                  
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <input class="btn btn-primary" name="submit" id="subbutn" Value="Submit" type="submit">
                        
                      </div>
                    </div>
                  </form>
				  <div class="panel-bodys">
                <table class="table bootstrap-datatable countries">
                  <thead>
				  <tr><td><strong>S No.</strong></td>
				  <td><strong>Designation</strong></td></tr>
			<?php	 $query="SELECT * FROM designation";
$i=1;

$result = mysqli_query($link,$query);

while($nt=mysqli_fetch_array($result)){

?>
 <tr><td><?php echo $i;?></td>
<td>  <?php echo $nt['designation_name'] ?></td></tr>

<?php 
$i++;
}
 ?><table></div>
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
    <!-- Smartsupp Live Chat script -->

    </div>
  </section>
  <!-- container section end -->

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
