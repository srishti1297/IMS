<?php include_once('include/header.php');
 include_once('include/database.php');
 
t_records ORDER BY id DESC   ";
$res=mysqli_query($link,$query);
$num=mysqli_num_rows($res);
if($num>0)
	{
	$i=1;
 ?>

    <!--sidebar start-->
    

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-cloud-download"></i>
              <div class="count"><?php echo $num;?></div>
              <div class="title">Total Incident</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-share"></i>
              <div class="count"><?php echo $num1;?></div>
              <div class="title">Pending Incident</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-cubes"></i>
              <div class="count"><?php echo $num2;?></div>
              <div class="title">Work on Incident</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-thumbs-o-up"></i>
              <div class="count"><?php echo $num3;?></div>
              <div class="title">Incident Closed</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->


        



        <div class="row">

          <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Incident Records</strong></h2>
                
              </div>
              <div class="panel-body">
                <table class="table bootstrap-datatable countries">
                  <thead>
                    <tr>
                      <th>S.No.</th>
                      <th>Incident No.</th>
                      <th>Incident Date</th>
                      <th>Title</th>
                      <th>Created By</th>
                      <th>Designation</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Category</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
while($row_data= mysqli_fetch_array($res))
 {				  ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php  echo $row_data['incident_no']; ?></td>
                      <td><?php  echo $row_data['incident_open_date']; ?></td>
                      <td><?php  echo $row_data['title']; ?></td>
                      <td><?php  echo $row_data['incident_created_by']; ?></td>
                      <td><?php  echo $row_data['designation']; ?></td>
                      <td><?php  echo $row_data['email']; ?></td>
                      <td><?php  echo $row_data['phone']; ?></td>
                      <td><?php  echo $row_data['category']; ?></td>
                      <td><?php  echo $row_data['status']; ?></td>
                      <td><a class="btn btn-success" href="update_incident.php?id=<?php echo $row_data['id']; ?>"><i class="fa fa-pencil"></i></a></td>
                      
                    </tr>
	<?php  $i++; } }


	else {
	echo "No Result Found !."; }?>
                    
                  </tbody>
                </table>
              </div>

            </div>

          </div>
          <!--/col-->
         



        
      </section>
     
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
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
