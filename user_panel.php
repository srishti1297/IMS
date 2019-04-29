  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
<style>
.tooltip {
    position: relative;
    display: inline-block;
    pointer:cursor;
	opacity:1 !important;
	z-index: 9999;
}

, 163, 163);
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
                    <label class="control-label col-lg-2" for="inputSuccess">Location
					</label>
                    <div class="col-lg-9" >
                      
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
                  
                     
                    </div><div class="col-lg-1" ><img src="img/location.png" style="width:40px;height:40px;"></div>
                  </div>
				  
				   <div class="form-group ">
                      <label for="designation" class="control-label col-lg-2">Category </label>
					  <div class="col-lg-10">
					  	<select id="catselect" name='category' required class='catselect form-control m-bot15' >
		<option >Select </option>
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
                      <div class="col-lg-10" style="margin-bottom:30px;">
             	<input type="text"  class=" form-control" autocomplete="off" id="keyword" name="description" value="" Placeholder="Search By Name"> 
			<div  id="ajax_response" style="display: none;"
    ></div>
		
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
		$(document).ready(function(){
			 $("select.catselect").change(function(){
        var catselect = $(this).children("option:selected").val();
		slectdesc.style.display='inline';
       
  
	$(document).click(function(){
		$("#ajax_response").fadeOut('slow');
	});

	
	
	$("#keyword").focus();
	var offset = $("#keyword").offset();
	var width = $("#keyword").width()-2;
	//$("#ajax_response").css("left",offset.left); 
	//$("#ajax_response").css("width",width);
	$("#keyword").keyup(function(event){
		 
		 //alert(event.keyCode);
		 var keyword = $("#keyword").val();
		 if(keyword.length)
		 {
			 if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13)
			 {
				 $("#loading").css("visibility","visible");
				 $.ajax({
				   type: "POST",
				   url: "states.php",
				   data: "data="+keyword+"&catselect=" + catselect ,
				   success: function(msg){	
					if(msg != 0)
					  $("#ajax_response").fadeIn("slow").html(msg);
					else
					{
					  $("#ajax_response").fadeIn("slow");	
					  $("#ajax_response").html('<div style="text-align:left;">No Matches Found, Write Your Problem</div>');
					}
					$("#loading").css("visibility","hidden");
				   }
				 });
			 }
			 else
			 {
				switch (event.keyCode)
				{
				 case 40:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.next().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:first").addClass("selected");
					 }
				 break;
				 case 38:
				 {
					  found = 0;
					  $("li").each(function(){
						 if($(this).attr("class") == "selected")
							found = 1;
					  });
					  if(found == 1)
					  {
						var sel = $("li[class='selected']");
						sel.prev().addClass("selected");
						sel.removeClass("selected");
					  }
					  else
						$("li:last").addClass("selected");
				 }
				 break;
				 case 13:
					$("#ajax_response").fadeOut("slow");
					$("#keyword").val($("li[class='selected'] a").text());
				 break;
				}
			 }
		 }
		 else
			$("#ajax_response").fadeOut("slow");
	});
	$("#ajax_response").mouseover(function(){
		$(this).find("li a:first-child").mouseover(function () {
			  $(this).addClass("selected");
		});
		$(this).find("li a:first-child").mouseout(function () {
			  $(this).removeClass("selected");
		});
		$(this).find("li a:first-child").click(function () {
			  $("#keyword").val($(this).text());
			  $("#ajax_response").fadeOut("slow");
		});
	});
	
	
	  });
});</script>
  <!-- container section start -->

  <!-- javascripts -->

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
