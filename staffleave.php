
<?php session_start();
 $r= $_SESSION['lid'];
 

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Taluk</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">FreshShop</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
	        		
	        		
	      		</li>
			    <li class="dropdown">
	        		<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="images/1.png"><span class="badge"></span></a>
	        		<ul class="dropdown-menu">
						<li class="dropdown-menu-header text-center">
							<strong>Account</strong>
					
						
						<li class="m_2"><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>	
	        		</ul>
	      		</li>
			</ul>
			<form class="navbar-form navbar-right">
              <input type="text" class="form-control" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
            </form>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                         <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                        </li>
                       
                        
                        
                         <li>
                            <a href="#"><i class="fa fa-check-square-o nav_icon"></i>Leave Application<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                <li>
                                    <a href="leave.php">Registration</a>
                                </li>
                                <li>
                                    <a href="viewleave.php">View</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   
   <div class="panel-body1">
   <table class="table">
     <thead>
        <tr>
          <th>SLNO</th>
          <th>Todate</th>
          <th>FromDate</th>
          <th>Reason</th>
          
          <th>Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
          
        
        <?php
include("dbconn.php");
?>
<?php
$s=1;


$sql=mysqli_query($con,"SELECT l.*,o.*,r.* FROM tbl_leave l inner join u_login o on o.lid=l.lid inner join tbl_register r on r.rid=o.rid  WHERE l.lestatus!='Deleted' AND l.lid='$r' ORDER BY l.leid desc");


   while($display=mysqli_fetch_array($sql))
   {
$status=$display['lestatus'];


if($status=='Pending'){
    echo "<tr>";
	echo"<td>".$s++."</td>";
    echo "<td>".$display["todate"]."</td>";
    echo "<td>".$display["fromdate"]."</td>";
	echo "<td>".$display["reason"]."</td>";
    echo "<td>".$display["lestatus"]."</td>";
    
    
    
    ?>
    <td><button class="btn btn-info" ><a href="deleteleave.php?id=<?php echo $display['leid'];?>"style="color:white;">Delete</a></button> </td>
    <?php
   
   echo "</tr>";
}

else {
	
	echo "<tr>";
    echo"<td>".$s++."</td>";
    echo "<td>".$display["todate"]."</td>";
    echo "<td>".$display["fromdate"]."</td>";
	echo "<td>".$display["reason"]."</td>";
    echo "<td>".$display["lestatus"]."</td>";
    	
    echo "</tr>";
  }
 

   }
?>
      
        
      </tbody>
    </table>
    </div>
    
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
