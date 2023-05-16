<?php include ('../dbconn.php');
if(isset($_POST['submit']))
{ 
    $tno=$_POST["tno"];
    $cent=$_POST["cent"];
    $amount=$_POST["amount"];
    $email=$_POST["email"];
    $date1=$_POST["date1"];
     
    $user_check = "SELECT `taxid` FROM `taxtype` WHERE `taxname` = 'bulidingTax'";
    $user_check_rslt = mysqli_query($conn,$user_check);
    while($row = mysqli_fetch_array($user_check_rslt)){
        //echo $row['typeno'];
    $type = $row['taxid'];
    $user_reg ="INSERT INTO `tperdetails` (`tno`, `cent`, `amount`,`email`, `date1`,`status`) VALUES ('$tno','$cent','$amount','$email' ,'$date1','unpaid')";
 
    $user_reg_query = mysqli_query($conn,$user_reg);
    
    $last_id = mysqli_insert_id($conn);
    if($user_reg_query){
      $reg = "INSERT INTO `tbl_taxalert`(`tno`, `cent`, `amount`,`date1`,`email`,`taxid`,`status`) VALUES ('$tno','$cent','$amount','$date1','$email','$type','topay')";
      $reg_query = mysqli_query($conn,$reg);
        echo'<script> alert ("Alert Notification Send to '.$email.'");</script>';
        echo'<script>window.location.href="alert.php";</script>'; 
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
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
                        <a  href="staffreg.php"><i class="fa fa-plus fa-3x"></i>Add Staff</a>
                    </li>
                    <li>
                    <a  href="viewapplication.php"><i class="fa fa-eye fa-3x"></i>View</a>
                    </li>
						   <li  >
                        <a   href="chart.html"><i class="fa fa-bar-chart-o fa-3x"></i>Distribute Salary</a>
                    </li>	
                      <li  >
                        <a  href="viewleave.php"><i class="fa fa-eye fa-3x"></i>View Leave Application</a>
                      </li>
                      <li  >
                        <a  href="table.php"><i class="fa fa-table fa-3x"></i>Table Places</a>
                      </li>
                    	<li>		          
                        <a  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  

    <!-- Required meta tags-->
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates"> -->

    <!-- Title Page-->
    <title>Alerting Users </title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Alert</h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                <label class="label">Thandapernumber</label>
                            <!-- <div class="rs-select2 js-select-simple select--search"> -->
                           
                                
                                <select class="form-control" name="tno" id="tno">
                                <?php 
                      $sql="select tno from tperdetails where status='unpaid'";
                      $query=mysqli_query($conn,$sql);
                      while($row = mysqli_fetch_array($query)){ ?>
                     <option value="<?php echo $row['tno'];?>"><?php echo ($row['tno']); ?></option>
                     <?php }

                      ?>
</div>
                                   
                                </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Cent</label>
                                    <input class="input--style-4" type="text" name="cent" id="cent">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">amount</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                
                                <input class="input--style-4" type="number" name="amount" id="amount">
                
                            </div>
                        </div>
                        
                        </div>
                        <br>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" id="email">
                                </div>
                            </div>
                            <br>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">date</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="date1" id="date1">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                   
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                       
                        <div class="p-t-15">
                        
                         <center>   <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
