
<style>
.tooltip {
    position: relative;
    display: inline-block;
    pointer:cursor;
	opacity:1 !important;
	z-index: 9999;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 300px;
    background-color: black;
    color: #fff;
    text-align: left;
    border-radius: 6px;
    padding: 5px 0;
opacity:1 !important;
margin-left: -420px;
  
    position: absolute;
    z-index: 999;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}

.black_overlay {
  display: none;
  position: absolute;
  top:0%;
  left:0%;
  width:500px;
 height:400px
  background-color: black;
  z-index:1001;
  -moz-opacity:0.8;
  opacity:.80;
  filter: alpha(opacity=80);
}
.white_content {
  display: none;
  position: absolute;
  top:25%;
  left:35%;
  width:500px;
  height:500px;
  padding:16px;
  border:5px solid rgb(83, 163, 163);
  border-radius:5px;
  color:#000;
  background-color: white;
  z-index:1002;
  overflow: auto;
}
</style>

<?php

 include_once('include/header.php');
 include_once('include/database.php');
  

$success="";


	if(isset($_REQUEST['submit'])){
	
				  
$code= "MIET";
				  $date= Date('Ymd');
				  $rand= rand(100, 9999);
				   $incident_no= $code.''.$date.''.$rand;
	$incident_created_by = trim($_POST['incident_created_by']);
	$title = trim($_POST['title']);
		 
		  $designation =trim($_POST['designation']);
		 $email =trim($_POST['email']);
		 $phone =trim($_POST['phone']);
		// $priority =trim($_POST['priority']);
		 $status =trim($_POST['status']);
		 $location =trim($_POST['location']);
		 $category =trim($_POST['category']);
		 $description =trim($_POST['description']);
		 $userid =trim($_POST['userid']);
		 
		 if($designation=='Director, MIET' || $designation=='Director, Academics'|| $designation=='Senior Manager Strategic')
		 {
		 $priority="High"; }
		 elseif($designation=='Assistant Professor,CSE Engineer' ||$designation=='Manager-Student Expeience' || $designation=='HOD,IT & CSE' || $designation=='HOD,ECE'){
			 
			 $priority="Medium";
		 }
		 else{
			 $priority="Low";
		 }
		
		 $image=$_REQUEST['image'];
	  
		 $query1="Select * from handler_registration where designation= '$category' ORDER BY RAND() Limit 1  ";
$res1=mysqli_query($link,$query1);
 $row_data1= mysqli_fetch_array($res1);
 
  $nam= $row_data1['name'];
   $ids=$row_data1['id'];


	  
  
  
 $imgname= rand(1000,100000)."_".$_FILES['image']['name'];
   $source= $_FILES['image']['tmp_name'];
  $destination="upload/".$imgname;
  if(move_uploaded_file($source,$destination))
  {
		
        
$query = mysqli_query($link,"insert into incident_records(incident_created_by,title,designation,email,phone,priority,status,location,category,description,incident_open_date,incident_no,userid,assigned_to,handler_id,image) values ('$incident_created_by','$title','$designation','$email','$phone','$priority','$status','$location','$category','$description',NOW(),'$incident_no','$userid','$nam','$ids','$imgname')");
 
  }
  

header("location:user_incident.php?assigned_to=Your new incident assigned to <strong>Mr $nam</strong>");

	}

 ?>
   
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Create New Incident</h3>
            
          </div>
        </div>
       
		
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
             
              <div class="panel-body">
			  
                <div class="form">
                  <form class="form-validate form-horizontal" id="register_form" method="post" action="" enctype="multipart/form-data">
				  <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Incident Created By <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="incident_created_by"  required value="<?php echo $_SESSION['name']; ?>" readonly="true" name="incident_created_by" type="text" />
                      </div>
                    </div>
					
                        <input class=" form-control" id="name" value="<?php echo $_SESSION['userid']; ?>" readonly="true" name="userid" type="hidden" />
                        <input class=" form-control" id="name" value="<?php echo $_SESSION['designation']; ?>" readonly="true" name="designation" type="hidden" />
                        <input class=" form-control" id="name" value="<?php echo $_SESSION['email']; ?>" readonly="true" name="email" type="hidden" />
                        <input class=" form-control" id="name" value="<?php echo $_SESSION['phone']; ?>" readonly="true" name="phone" type="hidden" />
                        <input class=" form-control" id="priority" value="Low" readonly="true" name="priority" type="hidden" />
                        <input class=" form-control" id="status" value="Pending" readonly="true" name="status" type="hidden" />
                      
                   
					<div class="form-group">
                    <label class="control-label col-lg-2" for="inputSuccess">Location</label>
                    <div class="col-lg-10">
                      
					  				<?php	 $query="SELECT * FROM location";


$result = mysqli_query($link,$query);
echo "<select name='location' id='location' required class='form-control m-bot15'    >";

echo "<option value=>Select</option>";
while($nt=mysqli_fetch_array($result)){

?>
<option value="<?php echo $nt['location_name'] ?>"  ><?php echo $nt['location_name'] ?></option>

<?php 
}
echo "</select>"; ?>
                                             

                     
                    </div>
                  </div>
				  
				   <div class="form-group ">
                      <label for="designation" class="control-label col-lg-2">Category </label>
					  <div class="col-lg-10">
					  	<select id="country-select" name='category' required class='form-control m-bot15' >
		<option disabled selected>Select </option>
		<?php
			$sql = "SELECT * FROM handler_panel";
			$result = mysqli_query($link, $sql);
			while($row = mysqli_fetch_assoc($result)){
		?>
		<option value="<?php echo $row['handler_designation'] ?>"><?php echo $row['category_name'] ?></option>
		<?php } ?>
	</select>
	
					
 			

                     
                    </div>
                  </div>
                    <div class="form-group " id="slectdesc" >
                      <label for="designation" class="control-label col-lg-2">Description </label>
                      <div class="col-lg-10">
               <select id="state-select" name='description'  required class='form-control m-bot15' >
		
	</select>
                      </div>
                    </div>
                   
					
                  
					
					  <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Image </label>
                      <div class="col-lg-10">
                        <input class=" form-control"  required id="image"  name="image" type="file" />
                      </div>
                    </div>
                    
                   
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <input class="btn btn-primary" name="submit" Value="Submit" type="submit">
                        
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
    
	
	
	<style type="text/css">
		#slectdesc{
			display: none;
		}
	</style>




	
	<script type="text/javascript">
		function getStatesSelectList(){
			var country_select = document.getElementById("country-select");
			//var city_select = document.getElementById("city-select");
			
			var country_id = country_select.options[country_select.selectedIndex].value;
			console.log('CountryId : ' + country_id);
			

			var xhr = new XMLHttpRequest();
			var url = 'states.php?country_id=' + country_id;
			// open function
			xhr.open('GET', url, true);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			
			// check response is ready with response states = 4
			xhr.onreadystatechange = function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					var text = xhr.responseText;
					//console.log('response from states.php : ' + xhr.responseText);
					var state_select = document.getElementById("state-select");
					state_select.innerHTML = text;
					slectdesc.style.display='inline';
					city_select.style.display='none';
				}
			}

			xhr.send();
		}

		

		var country_select = document.getElementById("country-select");
		country_select.addEventListener("change", getStatesSelectList);

		var state_select = document.getElementById("state-select");
		state_select.addEventListener("change", getCitySelectList);
	</script>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>
  </section>
    </section>
	
</body>

</html>
