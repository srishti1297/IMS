<?php include_once('include/header.php');
 include_once('include/database.php');
  
$userid= $_SESSION['userid'];


 ?>
<style> .imgimg{width:50px;height:50px;cursor:pointer}
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
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> Incident Records</h3>
            
          </div>
        </div>
		<?php  if(isset($_GET['assigned_to'])){
			
		$assigned_to=$_GET['assigned_to'];
		}
		else
		{
		$assigned_to="";	
		}
		if($assigned_to!=''){
		?>
		<center style="font-size:18px;background-color:#4cd964;color:#fff;padding:5px 10px;text-align:center"><?php echo $assigned_to;?></center><?php } ?>
		<table style="width:100%;" data-toggle="table" id="table-style"  data-row-style="rowStyle">
						    <thead>
						    <tr style="height:50px; background:#efefef; ">
						        <th style="width:10%;" > S/No.</th>
						        <th  style="width:10%;">Incident No.</th>
						        <th  style="width:10%;">Incident Date</th>
						       
						        <th  style="width:10%;" data-field="price" >Category</th>
						     
						      
						        <th  style="width:10%;" data-field="price" >Location</th>
						        <th  style="width:10%;" data-field="price" >Assigned to</th>
						        <th  style="width:10%;"  data-field="price" >Status</th>
						        <th  style="width:10%;"  data-field="price" >Image</th>
						        
						        
						    </tr>
						    </thead>
        <!-- page start-->
        <?php    $query="Select * from incident_records where userid  ='$userid' ORDER BY id DESC ";
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
	
	 <td style="width:10%"><?php  echo $row_data['category']; ?> </td>
	 <td style="width:10%"><?php  echo $row_data['location']; ?> </td>
	 <td style="width:10%"><?php  echo $row_data['assigned_to']; ?> </td>
	 <td <?php if($row_data['status']=='Closed') { ?>class="btn btn-success" <?php } elseif($row_data['status']=='Processing') { ?>class="btn btn-warning"
	 <?php } else { ?>   class="btn btn-danger"  <?php }?>	 ><?php  echo $row_data['status']; ?> </td>
	<?php if($row_data['image']!=""){?> <td style="width:10%"><a href="javascript:void(0)"onclick="document.getElementById('light<?php echo $i;?>').style.display='block';document.getElementById('fade<?php echo $i;?>').style.display='block'"><img class="imgimg"src="upload/<?php  echo $row_data['image']; ?>"></a> </td>
	
	 <div id="light<?php echo $i;?>" class="white_content">
	 <a style="float:right" href="javascript:void(0)"onclick="document.getElementById('light<?php echo $i;?>').style.display='none';document.getElementById('fade<?php echo $i;?>').style.display='none'">Close</a>
 <img class="imgpp"src="upload/<?php  echo $row_data['image']; ?>">
 
</div>
<div id="fade<?php echo $i;?>"class="black_overlay"></div>
	
	
	<?php } else{ ?>
	
	<td style="width:10%"> </td>
	<?php } ?>
	

  <!-- Modal content -->


	
	
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
  
    <script src="js/jquery-1.10.2.js"></script>
 
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
 

</body>

</html>
