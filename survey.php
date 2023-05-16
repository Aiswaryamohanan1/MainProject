<?php include ('../dbconn.php');
if(isset($_POST['submit']))
{ 
    $fname=$_POST["fname"];
    $date1=$_POST["date1"];
    $panchayat=$_POST["panchayat"];
    // $place=$_POST["place"];
    $user_reg ="INSERT INTO `survey` (`fname`, `date1`, `panchayat`) VALUES ('$fname','$date1','$panchayat')";
        $user_reg_query = mysqli_query($conn,$user_reg);
    
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
                        <a  href="survey.php"><i class="fa fa-qrcode fa-3x"></i>Assign Duty</a>
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
                    	<li>		          
                        <a  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
 
      
    
  
            
      
           
       <div class="row justify-content-center">
           <div class="col-lg-10">
               <div class="wrap d-md-flex">
                   <div class="text-wrap p-4 p-lg-5 d-flex img d-flex align-items-end" style="background-image: url(images/bg1.jpg);">
                       <div class="text w-100">
                           <h2 class="mb-4"></h2>
                           <p>SURVEY!</p>
                       </div>
             </div><br><br><br><br>
                   <div class="login-wrap p-4 p-md-5">
                 <h3 class="mb-3">Add Staff to Survey</h3>
                       <form  method="POST" class="signup-form" onsubmit="return Validate() && ValidateEmail()">
                       <div class="row">
                               <div class="col-md-12">
                                   <div class="form-group d-flex align-items-center">
                                       <label class="label" for="name">First Name</label>
                                       <select class="form-control" name="fname" id="fname">
                                       <?php 
                      $sql="select * from staffregg";
                      $query=mysqli_query($conn,$sql);
                      while($row = mysqli_fetch_array($query)){ ?>
                     <option value="<?php echo $row['email'];?>"><?php echo ($row['email']); ?></option>
                     <?php }
                      ?>
</div>
</div></div>
<br>
<br>
<hr>
<div class="row">
                               <div class="col-md-12">
                                   <div class="form-group d-flex align-items-center">
                                    <br>
                                       <label class="label" for="name">Date</label>
                                       <input type="date" class="date" name="date1" id="date1" placeholder="date" autocomplete="off">
                                       
</div>
</div></div>
                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group d-flex align-items-center">
                                       <label class="label" for="name">Panchayat</label>
                                       <select class="form-control" name="panchayat" id="fname">
                                       <?php 
                      $sql="select * from tbl_places";
                      $query=mysqli_query($conn,$sql);
                      while($row = mysqli_fetch_array($query)){ ?>
                     <option value="<?php echo $row['panchayat'];?>"><?php echo ($row['panchayat']); ?></option>
                     <?php }
                      ?>
                                       </div>
                                   </div></div>
                                   <br>

                                   
                                
                                       <div class="form-group">
                                           <input type="submit" class="btn btn-secondary submit p-3" value="Assign" id="btn" name="submit">
                                       </div>
                                  
                       </form> 
             
           </div>
           
         </div>
           </div>
       </div>
   </div>
</section>
</form>

<script type="text/javascript">
function Validate() 
               {
               var val = document.getElementById('fname').value;
               if (!val.match(/^[A-Z].*$/)) 
               {
               document.getElementById('nameError').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                       document.getElementById('fname').value = val;
                       document.getElementById('fname').style.color = "red";
                         return false;
                        flag=1;
               }
               if(val.length<3||val.length>30){
                document.getElementById('nameError').innerHTML="Between 3 to 10 characters";
                       document.getElementById('fname').value = val;


                   document.getElementById('fname').style.color = "red";
                         return false;
                         
               }
               else{

               
                document.getElementById('nameError').innerHTML=" ";
                 document.getElementById('fname').style.color = "green";
                return true;
               }
             }
             
             
               function ValidateEmail()
               {
            
                 var email=document.getElementById('email').value;  
                 var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
               //var atposition=x.indexOf("@");  
               //var dotposition=x.lastIndexOf(".");  
              
                 if(email.length<3||email.length>30){
                   document.getElementById('emailError').innerHTML="Invalid Email start with lowercase";
                       document.getElementById('email').value = email;
                       document.getElementById('email').style.color = "red";
                      // alert("err");
                         return false;
                 }
                if(!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)){  
                    document.getElementById('emailError').innerHTML="Please enter a valid Email";  
                   document.getElementById('email').value = email;
                       document.getElementById('email').style.color = "red";
                 return false;  
                 }
                 else{
               document.getElementById('emailError').innerHTML=" ";
                 document.getElementById('email').style.color = "green";
                return true;

                 
               }
             }
              
</script>
</body>
</html>