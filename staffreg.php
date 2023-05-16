
    
<?php include ('dbconn.php');
if(isset($_POST['submit']))
{ 
    $fname=$_POST["fname"];
    $lastname=$_POST["lastname"];
    $mobile=$_POST["mobile"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $street=$_POST["street"];
    $password = $_POST["password"];
    $cpassword=$_POST["cpassword"];
   //$abc=md5($_POST["password"]);
     $user_check = "SELECT `typeno` FROM `usertype` WHERE `typename` = 'staff'";
    $user_check_rslt = mysqli_query($conn,$user_check);
    while($row = mysqli_fetch_array($user_check_rslt)){
        //echo $row['typeno'];
    $type = $row['typeno'];
    $user_reg ="INSERT INTO `staffregg` (`fname`, `lastname`, `mobile`,`email`, `address`,`street`,`password`) VALUES ('$fname','$lastname','$mobile','$email' ,'$address','$street','$password')";
 
    $user_reg_query = mysqli_query($conn,$user_reg);
    
    $last_id = mysqli_insert_id($conn);
    if($user_reg_query){
      $reg = "INSERT INTO `u_login`(`email`, `password`, `typeno`) VALUES ('$email','$password','$type')";
      $reg_query = mysqli_query($conn,$reg);
        echo'<script> alert ("Account created '.$fname.'");</script>';
        echo'<script>window.location.href="../akogin.php";</script>'; 
    }
    }
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
                        <a  class="active-menu" href="staffreg.php"><i class="fa fa-plus fa-3x"></i>Add Staff</a>
                    </li>
                    <li>
                        <a  href="survey.php"><i class="fa fa-qrcode fa-3x"></i>Assign Duty</a>
                    </li>
						   <li  >
                        <a   href="addnoti.php"><i class="fa fa-bar-chart-o fa-3x"></i>Add Notification</a>
                    </li>	
                      <li  >
                        <a  href="viewleave.php"><i class="fa fa-eye fa-3x"></i>View</a>
                      </li>
                      <li  >
                        <a  href="table.php"><i class="fa fa-table fa-3x"></i>Table Places</a>
                      </li>
                    	<li>		          
                        <a  href="viewapp.php"><i class="fa fa-eye-o fa-3x"></i>View Applicarion</a>
                        <ol>  
 <li><a href="viewapp.php">Caste</a></li>  
 <li><a href="viewiapp.php">Income</a></li>  
 <li><a href="viewpk.php">Pokkuvaravu</a></li>  
 <li>SQL</li>  
</ol>  
                    
                    </li>	
                </ul>
               
            </div>
            
        </nav>  

 
      

    <body class="abc">
    
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="wrap d-md-flex">
                                <div class="text-wrap p-4 p-lg-5 d-flex img d-flex align-items-end" style="background-image: url(images/bg1.jpg);">
                                    <div class="text w-100">
                                        <h2 class="mb-4">Register Staff</h2>
                                        <p>WELCOME!</p>
                                    </div>
                          </div>
                                <div class="login-wrap p-4 p-md-5">
                              <h3 class="mb-3">Create an account</h3>
                                    <form  method="POST" class="signup-form" onsubmit="return Validate() && Validatename()  && ValidatePhone() && ValidateEmail() && Validatepassword() && Confirmpass() && ValidateAadhar() && ValidateAddress() && ValidateStreet()">
                                    <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group d-flex align-items-center">
                                                    <label class="label" for="name">First Name</label>
                                                    <input type="fname" class="fname" name="fname" id="fname" placeholder="Enter first name" autocomplete="off"
                                                     required onkeyup="return Validate()"><span id="nameError" style="color:rgb(255,0,0,0.404);"></span>
</div>
</div></div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group d-flex align-items-center">
                                                    <label class="label" for="name">Last Name</label>
                                                    <input type="lastname" class="lastname" name="lastname" id="lastname" placeholder="Enter last name" autocomplete="off"
                                                     required onkeyup="return Validatename()"
                                                      
                                                             maxlength="30" ><span id="lnameError" style="color:rgb(255,0,0,0.404);"></span></div></div></div>
                                       
                                       
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group d-flex align-items-center">
                                                    <label class="label" for="name">Mobile</label>
                                                    <input type="mobile" class="mobile" name="mobile" id="mobile" minlength="10" maxlength="10" placeholder="Enter phone number" autocomplete="off"
                                                    required onkeyup="return ValidatePhone()" /><span id="phoneError" style="color:rgb(255,0,0,0.404);"></span>
                                                </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <span id="fullname" style="color:red;"> </span>
                                        </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group d-flex align-items-center">
                                                        <label class="label" for="name">Email</label>
                                                        <input type="name" placeholder="name@email.com"  id="email" name="email" required onkeyup="return ValidateEmail()"/>
                                                        <span id="emailError" style="color:rgb(255,0,0,0.404);"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <span id="adress1" style="color:red;"> </span>
                                                </div>
                                                
                                                <div class="row">
                                                    <span id="phoneno" style="color:red;"> </span>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group d-flex align-items-center">
                                                        <label class="label" for="email">Address</label>
                                                        <input type="text" class="form-control" placeholder="" id="address" name="address" required
                                                        onkeyup ="ValidateAddress()">
                                                        <span id="addressError" style="color:rgb(255,0,0,0.404);"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <span id="mail1" style="color:red;"> </span>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group d-flex align-items-center">
<label class="label" for="name">Street</label>
  <input type="name" class="form-control" placeholder="street" id="street" name="street" style="width:100%" required onkeyup="ValidateStreet()"><span id="sError" style="color:rgb(255,0,0,0.404);"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <span id="date1" style="color:red;"> </span>
                                                </div>
                                                
                                         <!--   <div class="col-md-12">
                                                    <div class="form-group d-flex align-items-center">
                                                        <label class="label" for="name">PIN</label>
                                                             <input type="text" class="form-control" placeholder="Pin" id="Pin" name="Pin" required>
                                                        </select>
                                                     </div>
                                                </div>-->
                                                    <div class="col-md-12">
                                                        <div class="form-group d-flex align-items-center">
                                                            <label class="label" for="password">Password</label>
                                                            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required
                                                              required onkeyup="return Validatepassword()"><span id="passwordError" style="color:rgb(255,0,0,0.404);"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group d-flex align-items-center">
                                                            <label class="label" for="password">Confirm Password</label>
                                                            <input type="password" class="form-control" placeholder=" Re enter Password" id="cpassword" name="cpassword" required
                                                              required onkeyup="return Confirmpass()"><span id="cpasswordError" style="color:rgb(255,0,0,0.404);"></span>
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <span id="pass1" style="color:red;"> </span>
                                                    </div>
                                            
                                                </div>
                                                
                                               
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-secondary submit p-3" value="Create an account" id="btn" name="submit">
                                                    </div>
                                                </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <a href="index.html">Back to Home</a>
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
                          function Validatename() 
                          {
                            var val = document.getElementById('lastname').value;
                            if (!val.match(/^[A-Z].*$/)) 
                            {
                             document.getElementById('lnameError').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                    document.getElementById('lastname').value = val;
                                    document.getElementById('lastname').style.color = "red";
                                      return false;
                                     flag=1;
                            }
                            if(val.length<1||val.length>30){
                            document.getElementById('lnameError').innerHTML="Between 3 to 10 characters";
                                    document.getElementById('lastname').value = val;
    
    
                                document.getElementById('lastname').style.color = "red";
                                      return false;
                                      
                            }
                            else{
    
                            
                            document.getElementById('lnameError').innerHTML=" ";
                              document.getElementById('lastname').style.color = "green";
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
                                document.getElementById('emailError').innerHTML="Invalid Email";
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
                            
                             function Validatepassword()
                             {
                          
                              var pass=document.getElementById('password').value;
                              //var patt="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/";
                              //if (pass.length<8)
                               if(!pass.match(/[a-z]/g)){
                                document.getElementById('password').value = pass;
                                document.getElementById('passwordError').innerHTML="Enter a strong password eg:Aa#23gh56";
                                  document.getElementById('password').style.color="red";
                                  return false;
                                }
                                if(!pass.match(/[A-Z]/g)){
                                  document.getElementById('password').value = pass;
                                 document.getElementById('passwordError').innerHTML="Include minimum one capital letter";
                                 document.getElementById('password').style.color="red";

                                     return false;
                                }
                                if(!pass.match(/[0-9]/g)){
                                  document.getElementById('password').value = pass;
                                document.getElementById('passwordError').innerHTML="Include 1 digit";
                                document.getElementById('password').style.color="red";

                                return false;
                                 }
                              if(!pass.match(/[^a-zA-Z\d]/g)){
                                document.getElementById('password').value = pass;
                               document.getElementById('passwordError').innerHTML="Include 1 special character";
                              document.getElementById('password').style.color="red";

                              return false;
                                 }
                            if(pass.length < 8){
                              document.getElementById('password').value = pass;
                             document.getElementById('passwordError').innerHTML="Minimum 8 characters";
                              document.getElementById('password').style.color="red";

                              return false;
                            }
                              else{
                                document.getElementById('password').value = pass;

                                document.getElementById('passwordError').innerHTML="";
                                document.getElementById('password').style.color = "green";
                              }
                           
                               
                          }
                          function Confirmpass()
                             {
                          
                              var pass1=document.getElementById('password').value;
                              var pass2=document.getElementById('cpassword').value;
                               if (pass1!=pass2)
                                        {
                                document.getElementById('cpasswordError').innerHTML="Password doesn't match ";  
                                document.getElementById('cpassword').value = pass2;
                                document.getElementById('cpassword').style.color = "red";
                              return false;  
                              }
                           
                              else{
                              document.getElementById('cpasswordError').innerHTML=" ";
                              document.getElementById('cpassword').style.color = "green";
                            return true;
                              
                            }
                          }
                          function ValidatePhone(){
                            var mobile=document.getElementById('mobile').value;
                            if(!mobile.match(/^[6789][0-9]{9}$/)){
                             document.getElementById('phoneError').innerHTML="Enter a valid phone number";
                            document.getElementById('mobile').style.color="red";
                           return false;
                           }
                          else{
                        document.getElementById('phoneError').innerHTML=" ";
                          document.getElementById('mobile').style.color="green";
                          return true;
}
}
                          
function ValidateAddress(){
  var address = document.getElementById('address').value;
                            if (!address.match(/^[a-zA-Z ]*$/)) 
                            {
                            document.getElementById('addressError').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                    document.getElementById('address').value = address;
                                    document.getElementById('address').style.color = "red";
                                      return false;
                                     flag=1;
                            }
                            if(address.length<3||address.length>30){
                             document.getElementById('addressError').innerHTML="Between 3 to 10 characters";
                                    document.getElementById('address').value = address;
    
    
                                document.getElementById('address').style.color = "red";
                                      return false;
                                      
                            }
                            else{
    
                            
                            document.getElementById('addressError').innerHTML=" ";
                              document.getElementById('address').style.color = "green";
                             return true;
                            }
}
function ValidateStreet(){
  var address = document.getElementById('street').value;
                            if (!address.match(/^[a-zA-Z ]*$/)) 
                            {
                             document.getElementById('sError').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                    document.getElementById('street').value = address;
                                    document.getElementById('street').style.color = "red";
                                      return false;
                                     flag=1;
                            }
                            if(address.length<3||address.length>30){
                             document.getElementById('sError').innerHTML="Between 3 to 10 characters";
                                    document.getElementById('street').value = address;
    
    
                                document.getElementById('street').style.color = "red";
                                      return false;
                                      
                            }
                            else{
    
                            
                             document.getElementById('sError').innerHTML=" ";
                              document.getElementById('street').style.color = "green";
                             return true;
                            }
}
function ValidateAadhar()
                            {
                              var Aadhar=document.getElementById('Aadhar').value;
                            if(!Aadhar.match(/^[23456789][0-9]{12}$/)){
                            // document.getElementById('AadharError').innerHTML="Enter a valid phone number";
                            document.getElementById('Aadhar').style.color="red";
                           return false;
                           }
                          else{
                        //   document.getElementById('phoneError').innerHTML=" ";
                          document.getElementById('Aadhar').style.color="green";
                          return true;
}
                            }
    
                            function Val()
                            {
                              if(Validate()===false || ValidateEmail()===false || Validatepassword()===false || Confirmpass()===false || ValidatePhone()===false)
                              {
                                return false;
                              }
                            }
                            
                            
  </script>
    </body>
    </html>