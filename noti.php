<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?php
 include "../dbconn.php";
?>
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
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 10">
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
                        <a  href="survey.php"><i class="fa fa-qrcode fa-3x"></i>Assign Duty</a>
                    </li>
						   <li  >
                        <a   href="#"><i class="fa fa-bar-chart-o fa-3x"></i>Distribute Salary</a>
                    </li>	
                      <li  >
                        <a  href="viewleave.php"><i class="fa fa-table fa-3x"></i>View</a>
                      </li>
                      <li  >
                        <a  href="table.php"><i class="fa fa-table fa-3x"></i>Table Places</a>
                      </li>
                    	<li>		          
                        <a  href="noti.php"><i class="fa fa-square-o fa-3x"></i>View Notification</a>
                    
                    </li>	
                </ul>
               
            </div>
            
        </nav>  

 
      

    <body class="abc">
<body>
<center>
<form name="form1" method="post" action="">
<center><h1> YOUR NOTIFICATIONS</h1>
<br>
<br>
  <table width="1281" border="1">
    <tr> 
      <td width="218" height="38"><div align="center"></div></td>
      <td width="261">SUBJECT</td>
      <td width="255">NOTIFICATION DATE</td>
      
     
      <?php
	  
	 //$date=date("Y-m-d");
	$st=mysqli_query($conn,"select * from u_login where email='admin@gamil.com'");
	while($res=mysqli_fetch_array($st))
	{
		
	 $st1=mysqli_query($conn,"select * from tbl_notification where nid!='$res[2]' ");
	}
	while($res1=mysqli_fetch_array($st1))
	{
	
	
	?>
    <tr> 
	<td width="218" height="70"><?php echo $res1[0];?></td>
      <td width="218" height="70"><?php echo $res1[3];?></td>
      <td width="261">&nbsp;<?php echo $res1[4];?></td>
      
	  <td width="249">&nbsp;<?php echo "<a href='viewnotificationmsg.php?id=$res1[0]&rid=1'>View</a>";?></td>
    </tr>
    <?php
	}
	
	?>
  </table>
</form>
</center></center>
</body>
</html>
