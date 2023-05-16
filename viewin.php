<?php
    session_start(); 
    include 'dbconn.php';
     if(isset($_SESSION['typename']))
     {
                                      // echo 'inside';                          
                            // echo '<a href="profile.php">'      
                                          // echo '<h2> welcome'.$_SESSION['username'].'</h2>';
                                  }
    ?>
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
   </style>
<script language="javascript">
function SelectRedirect(){
// ON selection of section this function will work
switch(document.getElementById('s1').value)
{
case "caste":
window.location="viewapplication.php";
break;

case "income":
window.location="viewin.php";
break;

case "Pokkuvaravu":
window.location="applicationpk.php";

break;
case "pensionreg":
window.location="pen.php";
break;

case "service":
window.location="hmarriage.php";
break;

case "nativity":
    window.location="applicationnativity.php";
    break;


/// Can be extended to other different selections of SubCategory //////
default:
window.location="../"; // if no selection matches then redirected to home page
break;
}// end of switch 
}
</script>
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
                        <li><a href="viewnativity.php">Nativity</a></li> 
                       
                       </ol>  
                    </li>
                   
                </ul>
               
            </div>
            
        </nav>  
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
        <form action=" " method=POST>
      <div class="form first">
                <div class="details personal">
                                    <div class="input-field">
                                        <label style="font-size:large;">Select Application Type</label>
                                        <select  name="service" id = "s1" onChange="SelectRedirect();">
                                            <option value="caste">Caste Certicate</option>
                                            <option disabled selected  >Income Certificate</option>
                                            <option value="Pokkuvaravu">Pokkuvaravu</option>
                                            <option value="cordeath">Service</option> 
                                            <option value="nativity">Nativity</option>
                                             
                                        </select>
                                    </div>


<html>
    <head>
           <style>
#approve {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #approve td, #approve th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        /* #builder tr:nth-child(even){background-color: #f2f2f2;} */

        #approve tr:hover {background-color: #ddd;}

        #approve th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: grey;
        color: white;
        }
        </style>
        <body>
        
<table class="table table-striped table-bordered table-hover" id="dataTables-example" align="center">
                                    <thead>
                                        <table id ="approve"  class="content-table">

                                            <tr>
                                                <th>Slno</th>
                                                <th>First Name</th>&nbsp;&nbsp;
                                                <th>Last Name</th>&nbsp;&nbsp;
                                                <th>House Name</th>&nbsp;&nbsp;
                                                <th>Place</th>&nbsp;&nbsp;
                                                <th>PostOffice</th>&nbsp;&nbsp;
                                                <th>PIN</th>&nbsp;&nbsp;
                                                <th>Income</th>&nbsp;&nbsp;
                                                <th>Source</th>&nbsp;&nbsp;

                                                <th>Email</th>&nbsp;&nbsp;
                                                <th>Status</th>&nbsp;&nbsp;
                                                
                                                
                                                

                                               
                                            </tr>
                                            <?php 

                                            
                                            $query="SELECT * From tbl_income ORDER BY Iid ASC";
                                            $result=mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_array($result))
                                            {
                                    
                                            ?>
                                    
                                            <tr>
                                                <td><?php echo $row['Iid'];?></td>
                                                <td><?php echo $row['fname'];?></td>
                                                <td><?php echo $row['lname'];?></td>
                                                <td><?php echo $row['hname'];?></td>
                                                <td><?php echo $row['place'];?></td>
                                                <td><?php echo $row['post'];?></td>
                                                <td><?php echo $row['pin'];?></td>
                                                <td><?php echo $row['income'];?></td>
                                                <td><?php echo $row['source'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['status'];?></td>
                                               
                                                
	
                                                
                                                
                                                
                                                
                                             
                                               
                                            </td>
                                            </tr>
                                       
                                        <?php
                                        }
                                        ?>
                                         </table>
                                        </div>              