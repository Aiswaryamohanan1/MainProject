
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form - Sagar Developer</title>
    <link rel="stylesheet" href="paytax.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>
<?php 
include '../dbconn.php';
include '../session.php';?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">USER <b>DASHBOARD</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<i class="fa fa-user" aria-hidden="true"></i>
	</header>


	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="userpic.png">
				<h4>WELCOME!</h4>
			</div>
			<ul>
				<li>
					<a href="change.p.php">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Change Password</span>
					</a>
				</li>
				<li>
					<a href="democaste.php">
						<i class="fa fa-plus icons"></i>
						<span>Apply Application</span>
					</a>
				</li>
				<li>
					<a href="payyy.php">
						<i class="fa fa-plus icons" aria-hidden="true"></i>
						<span>Pay tax</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-info-circle" aria-hidden="true"></i>
						<span>Request Service</span>
					</a>
				</li>
				<li>
					<a href="servicestatus.php">
						<i class="fa fa-eye" aria-hidden="true"></i>
						<span>View Status</span>
                        <li><a href="servicestatus.php">Caste</a></li>  
 <li><a href="viewincomestatus.php">Income</a></li>  
 <li><a href="#">Pokkuvaravu</a></li>  
					</a>
				</li>
				<li>
					<a href="logout.php">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>

        
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Application Stautus</h2>   
                        
                       
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <table border = "2" id ="approve"  class="content-table">

                                            <tr>
                                                <th>Regid</th>
                                                <th>Email</th>&nbsp;&nbsp;
                                                <th>First Name</th>&nbsp;&nbsp;
                                                <th>Middle Name</th>&nbsp;&nbsp;
                                                <th>Last Name</th>

                                                <th>House Name</th>&nbsp;&nbsp;
                                                <th>Place</th>&nbsp;&nbsp;
                                                <th>PIN</th>&nbsp;&nbsp;
                                                <th>Category</th>&nbsp;&nbsp;
                                                <th>Religion</th>&nbsp;&nbsp;
                                                <th>status </th>&nbsp;&nbsp;
                                                <th>Download</th>
                                                
                                               
                                               
                                            </tr>
                                            <?php 
                                           
                                            $n=$_SESSION['email'];
                                            $sql=mysqli_query($conn,"select * from tbl_caste where email='$n' and status='approve'");;
                                           
                                            while($display = mysqli_fetch_array($sql))
                                            {
                                                $login=$display['Regid'];
                                                echo "<tr>";
                                                
                                                echo "<td>".$display["Regid"]."</td>";
                                                echo "<td>".$display["email"]."</td>";
                                                echo "<td>".$display["fname"]."</td>";
                                                echo "<td>".$display["mname"]."</td>";
                                                echo "<td>".$display["lname"]."</td>";
                                                echo "<td>".$display["hname"]."</td>";
                                                echo "<td>".$display["place"]."</td>";
                                                echo "<td>".$display["pin"]."</td>";
                                            
                                                echo "<td>".$display["category"]."</td>";
                                                echo "<td>".$display["religion"]."</td>";
                                                echo "<td>".$display["status"]."</td>";
                                                // echo "<td>".$display["email"]."</td>";
                                            ?>
                                     <td><button class="btn btn-primary" ><a href="pppp.php?id=<?php echo $display['Regid'];?>"style="color:Blue;">Download</a></button> </td>
                                           
                                       
                                        <?php
                                        }
                                        ?>
                                        
                                   
                                </table>
                            </div>
                        </div>
                    </div>
              </div>
    </div>  
                 <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
