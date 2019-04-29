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
 
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
 
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

 
</head>

<body>
  
  <section id="container" class="">
    
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

    
      <a href="handler-login" class="logo">MIET <span class="lite">Incident Management System</span></a>
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
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
		
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
            <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-bars"></i>Pages</li>
              <li><i class="fa fa-square-o"></i>Pages</li>
            </ol>
          </div>
        </div>
		
		<table style="width:100%;" data-toggle="table" id="table-style"  data-row-style="rowStyle">
						    <thead>
						    <tr style="height:50px; background:#efefef; ">
						        <th style="width:10%;" > S/No.</th>
						        <th  style="width:10%;">Incident No.</th>
						        <th  style="width:10%;">Incident Date</th>
						        <th style="width:10%;">Title</th>
						        <th  style="width:10%;" data-field="price" >Category</th>
						     
						      
						        <th  style="width:10%;" data-field="price" >Location</th>
						        <th  style="width:10%;"  data-field="price" >Status</th>
						        <th  style="width:10%;"  data-field="price" >Priority</th>
						          <th  style="width:10%;"  data-field="price" >Action</th>
						        
						    </tr>
						    </thead>
        <!-- page start-->
        <?php    $query="Select * from incident_records where handler_id  ='$handlerid' ORDER BY id DESC  ";
$res=mysqli_query($link,$query);
$num=mysqli_num_rows($res);
 if($num>0)
	{
	$i=1;	
while($row_data= mysqli_fetch_array($res))
 {
?>

 <tr <?php if($i%2==0){  ?> style="background-color:#efefef; height:40px;" <?php } else {?> style="background:#ffffff;height:40px;"<?php } ?>>
	 <td style="width:5%" ><?php  echo $i; ?></td>
	 <td style="width:10%" ><?php  echo $row_data['incident_no']; ?></td>
	
	 <td style="width:10%" ><?php  echo $row_data['incident_open_date']; ?> </td>
	 <td style="width:10%"><?php  echo $row_data['title']; ?> </td>
	 <td style="width:10%"><?php  echo $row_data['category']; ?> </td>
	 <td style="width:10%"><?php  echo $row_data['location']; ?> </td>
	 <td <?php if($row_data['status']=='Closed') { ?>class="btn btn-success" <?php } elseif($row_data['status']=='Processing') { ?>class="btn btn-warning"
	 <?php } else { ?>   class="btn btn-danger"  <?php }?>	 ><?php  echo $row_data['status']; ?> </td>
	<td style="width:10%"><?php  echo $row_data['priority']; ?> </td> 
	 <td><a class="btn btn-success" href="update_handler_incident.php?id=<?php echo $row_data['id']; ?>"><i class="fa fa-pencil"></i></a></td>
 <?php $i++; }


	} else {
	echo "No Result Found !."; }		?>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>


</body>

</html>
