<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  &nbsp; <a href="..\logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a class="active-menu"  href="index.html"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="stafreg.php"><i class="fa fa-plus fa-3x"></i>Add Staff</a>
                    </li>
                    <li>
                    <a  href="viewapplication.php"><i class="fa fa-eye fa-3x"></i>View</a>
                    </li>
						   <li  >
                        <a   href="alertpnot.php"><i class="fa fa-bar-chart-o fa-3x"></i>Notification To User</a>
                    </li>	
                      <li  >
                        <a  href="viewleave.php"><i class="fa fa-eye fa-3x"></i>View Leave Application</a>
                      </li>
                      <li  >
                        <a  href="table.php"><i class="fa fa-table fa-3x"></i>Table Places</a>
                      </li>
                      <li  >
                        <a  href="predict.php"><i class="fa fa-table fa-3x"></i>Predict</a>
                      </li>	
                    	<li>		          
                        <a  href="viewapp.php"><i class="fa fa-square-o fa-3x"></i>View Applications</a>
                        <li><a href="viewapp.php">Caste</a></li>  
                        <li><a href="viewiapp.php">Income</a></li>  
                        <li><a href="viewpk.php">Pokkuvaravu</a></li>  
                       
                       </ol>  
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Table Examples</h2>   
                        <h5>Welcome Tahasildar </h5>
                       
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Income Application
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>         
               
           
       
        
          <tr>
          
            
            <th data-breakpoints="xs">SLNO</th>
            <th>Village</th>
            <th>Seller Name</th>
            <th>Seller Tper Number</th>
            <th>Buyer Name</th>
            <th>House Name</th>
            <th>Hecrte</th>
            <th>Are</th>
            <th>Sqm</th>
           
            <th>Remarks</th>
            <th>Email</th>
            <th>Approve</th>
            <th>Reject</th>
            
          
            
          </tr>
        </thead>
        <tbody>
          <tr data-expanded="true">
          <?php
          session_start();
include("dbconn.php");
?>
<?php
$s=1;


$sql=mysqli_query($conn,"SELECT * from tbl_pokkuvaravu where status='pending'");


   while($display=mysqli_fetch_array($sql))
   {
      $login=$display['pno']; 
	echo "<tr>";
	echo"<td>".$s++."</td>";
    echo "<td>".$display["village"]."</td>";
    echo "<td>".$display["sinfo"]."</td>";
    echo "<td>".$display["ssno"]."</td>";
    echo "<td>".$display["binfo"]."</td>";
	echo "<td>".$display["hectre"]."</td>";
    echo "<td>".$display["are"]."</td>";
    echo "<td>".$display["sqm"]."</td>";
    echo "<td>".$display["remarks"]."</td>";

    echo "<td>".$display["docno"]."</td>";
   
    echo "<td>".$display["email"]."</td>";

    
	?>
     <td><button class="btn btn-primary" ><a href="approvepk.php?id=<?php echo $display['pno'];?>"style="color:white;">Approve</a></button> </td>
     <td><button class="btn btn-danger" ><a href="rejectpk.php?id=<?php echo $display['pno'];?>"style="color:white;">Reject</a></button> </td>
    
   

	<?php
	echo "</tr>";
	
  }

echo "</table>";

?>

        </tbody>
      </table>
    </div>
  </div>

</div>

</section>
 <!-- footer -->
		  
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>