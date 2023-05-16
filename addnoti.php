<?php
  include "../dbconn.php";

 // $getid=$_SESSION['uname'];
 $getid=$_SESSION['email'];
 
if($getid!=0)
{
  
 
   if(isset($_POST['Submit']))
{   
      
  
 //session_start();
 //$cid=$_SESSION['cid'];
	$subject=$_POST['t1'];
	$msg=$_POST['t2'];
	$ndate=date("Y-m-d");
	$n=mysqli_query($conn,"insert into tbl_notification(cid,sub,msg,ndate) values('18','$subject','$msg','$ndate')");
	
	?>
	<script>alert("New notification added")</script>
	<?php
}
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
                    <a  href="viewapplication.php"><i class="fa fa-eye fa-3x"></i>View</a>
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
                        <ol>  
 <li><a href="viewapp.php">Caste</li>  
 <li><a href="viewiapp.php">Income</li>  
 <li><a href="viewpk.php">Pokkuvaravu</li>  
 <li>SQL</li>  
</ol>  
                    
                    </li>	
                </ul>
               
            </div>
            
        </nav>  


      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Notifications</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Noficatons</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
       

            <div class="card">
              <div class="card-header">
                 
                
                            
              <!-- /.card-header -->
                            

































<body>
<form name="form1" method="post" action="">
  <div class="modal-content">
                            <div class="modal-header">
                              
                             
                               
   <center>
      <p>&nbsp;</p>
        <div class="card card-primary">
                              <div class="card-body">
                                <div class="row">
                                   
                                  <div class="form-group">
      
      <table width="54%" border="0">
        <tr> 
            <h4 class="modal-title">Add Notifications</h4>
          <td >Subject</td><td height="28"><input  name="t1" type="text" id="t1" size="50" class="form-control"></td>
        </tr>
        
		<tr> 
          <td>Message</td><td height="28"><textarea name="t2" type="text" id="t2" size="50" class="form-control"></textarea></td>
        </tr>
          
                               <div class="form-group">
                                  
        <tr> 
            <center>
          <td><input type="submit" class="btn btn-primary" name="Submit" value="Submit"></td>
            </center>
        </tr>
      </table>
	
    <div align="justify"></div>
  </div>
                                      
          <footer class="main-footer">
    <strong>Footer <a href="">Project Management System</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Footer</b>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [""]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>                            
        <?php
}
else
{
    header("Location:login.php");    
}
               
               
               ?>                               
                                      
                                      
                       