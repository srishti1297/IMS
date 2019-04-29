<!DOCTYPE html>
<html lang="en">
<?php
ini_set("display_error", 1);
ob_start();
 include_once('include/database.php');
	session_start();
	 $handlerid=$_SESSION['handlerid'];
	if(!isset($_SESSION['handlerid']) && $_SESSION['handlerid']=="")
	{
	header("location:handler-logout.php"); 
	}
?>
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
      <a href="handler-login.php" class="logo">MIET <span class="lite">Incident Management System</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
       
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

         
        
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                              Hii.. <?php echo $_SESSION['name']; ?>
                            </span>
                           
                            <b class="caret"></b>
                        </a>
						
           
          </li> <li class="dropdown">
            <a  class="dropdown-toggle" href="handler-logout.php">
                            Logout
                           
                            <b class="caret"></b>
                        </a>
						
           
          </li> 
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    
    <!--sidebar end--><?php


 include_once('include/database.php');
  
  if(isset($_REQUEST['id']))
	 $id=$_REQUEST['id'];
else
	$id="";
$nn=$_SESSION["name"];
$fetch_query1="select * from incident_records where status='closed' && assigned_to='$nn'";
$rid1=mysqli_query($link,$fetch_query1);
echo $rd=mysqli_num_rows($rid1);	

$fetch_query="select * from incident_records where id=$id";
$rid=mysqli_query($link,$fetch_query);
$datainfo=mysqli_fetch_array($rid);
 
$success="";


	if(isset($_REQUEST['submit'])){
	 $assigned_to =trim($_POST['assigned_to']);
  
				  

		 $status =trim($_POST['status']);
		
			 
		 
		
         $id=$_REQUEST['id'];
		  if($status=="Closed"){
 
 
  $fetch_query="update incident_records set status='$status',incident_closed_date=NOW() where id='$id'";
 
 
		  }
		  else
		  {
			$fetch_query="update incident_records set status='$status',incident_closed_date=''  where id='$id'";  
		  }
		  
		  
		  $fetch_query7="select * from count_records where  assigned_to='$nn'";
$rid7=mysqli_query($link,$fetch_query7);
echo $rd7=mysqli_num_rows($rid7);

if($rd7>0)
	{
		$fetch_query12="update count_records set assigned_to='$assigned_to',incident_count='$rd'  where assigned_to='$assigned_to'";  
		    
	}
	
	else{
		
		$fetch_query12="insert into count_records(assigned_to,incident_count) values('$assigned_to','$rd') ";
	}
 
$rid=mysqli_query($link,$fetch_query);
$rid12=mysqli_query($link,$fetch_query12);
}








 ?>
 <style>
.imgimg{width:50px;height:50px;cursor:pointer}
.imgpp{width:400px;height:400px;cursor:pointer}
 
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
  top:5%;
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
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <<ul class="sidebar-menu">
		
          <li class="active">
            <a class="" href="handler_panel.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          
          

        </ul>
		
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

   <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Incident Status:-</h3>
            
          </div>
        </div>
        <!-- Form validations -->
		
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
             
              <div class="panel-body">
			  
                <div class="form">
                  <form class="form-validate form-horizontal" id="register_form" method="post" action="">
				  <div class="form-group ">
                      
                      <div class="col-lg-10">
					  
					  <div class="col-md-5">Incident No.:-</div><div class="col-md-5"><strong><?php echo $datainfo['incident_no'];?></strong></div>
					  <div class="col-md-5">Incident Open Date:-</div><div class="col-md-5"><strong><?php echo $datainfo['incident_open_date'];?></strong></div>
					  <div class="col-md-5">Incident Created By:-</div><div class="col-md-5"><strong><?php echo $datainfo['incident_created_by'];?></strong></div>
					  <div class="col-md-5">Designation:-</div><div class="col-md-5"><strong><?php echo $datainfo['designation'];?></strong></div>
					  <div class="col-md-5">Title:-</div><div class="col-md-5"><strong><?php echo $datainfo['title'];?></strong></div>
					  <div class="col-md-5">Description:-</div><div class="col-md-5"><strong><?php echo $datainfo['description'];?></strong></div>
					  <div class="col-md-5">Category:-</div><div class="col-md-5"><strong><?php echo $datainfo['category'];?></strong></div>
					  <div class="col-md-5">Location:-</div><div class="col-md-5"><strong><?php echo $datainfo['location'];?></strong></div>
					  <div class="col-md-5">Email:-</div><div class="col-md-5"><strong><?php echo $datainfo['email'];?></strong></div>
					  <div class="col-md-5">Phone:-</div><div class="col-md-5"><strong><?php echo $datainfo['phone'];?></strong></div>
					  <div class="col-md-5">Priority:-</div><div class="col-md-5"><strong><?php echo $datainfo['priority'];?></strong></div>
					  		 
					  <div class="col-md-5">Status:-</div><div style="width:20%;"  <?php if($datainfo['status']=='Closed') { ?>class="col-md-5 btn btn-success" <?php } elseif($datainfo['status']=='Processing') { ?>class="col-md-5 btn btn-warning"
	 <?php } else { ?>   class="col-md-5 btn btn-danger"  <?php }?>><strong><?php echo $datainfo['status'];?></strong></div>
					  
					  <?php if($datainfo['assigned_to']!="") { ?><div style="margin-top:10px" class="col-md-5">Assigned To:-</div><div style="width:20%;margin-top:10px" class="col-md-5 btn btn-primary"><strong><?php echo $datainfo['assigned_to'];?></strong></div><?php }?>
                        
                 <?php if($datainfo['image']!="") { ?>     <div class="col-md-5">Image:-</div><div class="col-md-5"><strong><a href="javascript:void(0)"onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'"><img class="imgimg"src="upload/<?php  echo $datainfo['image']; ?>"></a> </div>
	 
						 <div id="light" class="white_content">
	 <a style="float:right" href="javascript:void(0)"onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>
 <img class="imgpp"src="upload/<?php  echo $datainfo['image']; ?>">
 
				 </div>  <?php } ?>
					 </div>
					  
					  
                    </div>
					
					
					
                       
					<div class="form-group">
                    <label class="control-label col-lg-2" for="inputSuccess">Status *:-</label>
                    <div class="col-lg-10">
                     <input type="hidden" name="assigned_to" value="<?php echo $datainfo['assigned_to'] ?>">

                     <select class="form-control m-bot15" name="status" required>
					 <option value="">Select</option>
					 <option value="Pending"  <?php if($datainfo['status']=="Pending") echo 'selected="selected"';?>>Pending</option>
					 <option value="Processing"  <?php if($datainfo['status']=="Processing") echo 'selected="selected"';?>>Processing</option>
					 <option value="Closed" <?php if($datainfo['status']=="Closed") echo 'selected="selected"';?> >Closed</option>
					 </select>
                               
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
      </section>
    </section>
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

</body>

</html>
