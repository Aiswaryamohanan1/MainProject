
<?php include ('../dbconn.php');

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
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"     type="text/css" media="all">
<!-- Index-Page-CSS -->     <link rel="stylesheet" href="css/style.css"         type="text/css" media="all">
<!-- Gallery-Popup-CSS -->  <link rel="stylesheet" href="css/chocolat.css"      type="text/css" media="all">
<!-- //Custom-Stylesheet-Links -->

<!-- Web-Fonts -->
<!-- Body-Font -->   <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' type='text/css'>
<!-- Logo-Font -->   <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Bree+Serif'        type='text/css'>
<!-- Link-Font -->   <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Raleway:400,500,600'       type='text/css'>
<!-- //Web-Fonts -->
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
font-size: 16px;"> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="index.html"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="staffreg.php"><i class="fa fa-desktop fa-3x"></i>Add Staff</a>
                    </li>
                    <li>
                        <a  class="active-menu" href="survey.php"><i class="fa fa-qrcode fa-3x"></i>Assign Duty</a>
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
                        <a  href="noti.php"><i class="fa fa-square-o fa-3x"></i>Notification</a>
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
           <center> <h1>STAFF DUTY ASSIGNMENT</h1></center>
          </div>
         
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <center>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
     

              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                 
                </table><div class="form-group">
   <label for="name">Staff  Name:</label>
   
        <select id="cassign" class="form-control"  name="cassign" placeholder="select">
             <option value=0>Select</option>
         <?php
            $q="select * from staffregg where costatus='0'";
             $result=mysqli_query($conn,$q);
  while($r=mysqli_fetch_array($result))
  {
  ?>
           
        <option value="<?php echo $r['fname'];?>"> <?php echo $r['fname'];?>
  </option>    
           
          <?php

  }?>
        </select>

                    <br>
                    <br>
                   

<p> <button type="submit"  name="btnsignup" class="btn btn-default" >Submit</button></p>

                     
                    <?php
     
     
               
  if(isset($_POST['btnsignup']))
  {
    $name=$_POST['cassign'];
   $sql4 = mysqli_query($conn,"SELECT * from staffregg where fname='$name'");
   while ($row = mysqli_fetch_array($sql4))
    {
        $xu=$row['email'];
		?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div>
          
      </div><!-- /.container-fluid -->
    </section>
    </center>
    <center>
           <div class="card-body">
               
<table id="example1" class="table table-bordered table-striped" border="0">
	
	<thead>
                      <tr>
                     
                      <th scope="col">Place</th>
                      <th scope="col">Panchayat</th>
                      <th scope="col">Village</th>
                          
                 
                      </tr>
                    </thead>
					
<tr>
     <td ><?php echo $row[2];?></td>
      <td ><?php echo $row[4];?></td>
	  <td ><?php echo $row[7];?></td>
    <td ><?php echo $row[5];?></td>
    <td ><?php echo $row[6];?></td>
	  <td>
	 <button  type="button" class="btn btn-outline-success"><?php echo "<a href='coassign2.php?id=$row[0]'>SET PASSWORD AND USERNAME</a>";?></button>
	  </td>
	  </tr>
	  </table>
               </center>
	  <?php
    }
      
 
      ?>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Footer <a href="">E-TALUK</a>.</strong>
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
</form>
</body>
</html>
<?php
  }
    ?>        