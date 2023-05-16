<?php include ('dbconn.php');
if(isset($_POST['submit']))
{ 
    $Name=$_POST["Name"];
    $panchayat=$_POST["panchayat"];
    $wardno=$_POST["wardno"];
    $taluk=$_POST["taluk"];
 $user_reg ="INSERT INTO `tbl_places` (`fname`, `date`, `email`) VALUES ('$fname','$date','$email')";
        $user_reg_query = mysqli_query($conn,$user_reg);
    
}
?>
<!doctype html>
<html lang="en">
  <head>
  <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Admin</title>
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
            <a class="navbar-brand" href="index.html">Admin</a> 
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  &nbsp; <a href="..\logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
   
    
    
</head>
   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
        <link rel="stylesheet" href="style.css">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
          <li>
                        <a   href="index.html"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  class="active-menu" href="staffreg.php"><i class="fa fa-desktop fa-3x"></i>Add Staff</a>
                    </li>
                    <li>
                    <a  href="viewapplication.php"><i class="fa fa-eye fa-3x"></i>View</a>
                    </li>
						   <li  >
                        <a   href="# "><i class="fa fa-bar-chart-o fa-3x"></i>Distribute Salary</a>
                    </li>	
                      <li  >
                        <a  href="viewleave.php"><i class="fa fa-eye"></i>View</a>
                      </li>
                      <li  >
                        <a  href="table.php"><i class="fa fa-table fa-3x"></i>Table Places</a>
                      </li>
                    	<li>		          
                        <a  href="viewapp.php"><i class="fa fa-eyeS"></i>View Application</a>
                    
                    </li>	
                </ul>
               
            </div>
            
        </nav>  

 
      

    <body class="abc">
       
    
  
          