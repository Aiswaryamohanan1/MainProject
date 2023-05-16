
 <?php
include '../dbconn.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

if(isset($_POST['register'])){
  $fname = $_POST['fname'];
  $lname = $_POST['lastname'];
   // $dob = $_POST['dob'];
   // $class_name =$_POST['class_name'];
    //$qualification = $_POST['qualification'];
  //  $subject=$_POST['subject'];
   // $role=$_POST['role'];
   // $gender = $_POST['gender'];
   // $address = $_POST['address'];
    $email=$_POST['email'];
   // $phone = $_POST['phone'];
    $password = $_POST['password'];
    
        $user_check = "SELECT `typeno` FROM `usertype` WHERE `typename` = 'staff'";
        $user_check_rslt = mysqli_query($conn,$user_check);
        while($row = mysqli_fetch_array($user_check_rslt)){
            //echo $row['type_id'];
        $type = $row['typeno'];
        $user_reg = "INSERT INTO `staffregg`(`fname`, `lastname`, `email`, `password`) VALUES ('$fname','$lname','$email','$password' )";
        $user_reg_query = mysqli_query($conn,$user_reg);
    
        $last_id = mysqli_insert_id($conn);
        if($user_reg_query){
          $reg = "INSERT INTO `u_login`(`email`, `password`, `typeno`) VALUES ('$email','$password','$type')";
          $reg_query = mysqli_query($conn,$reg);
            echo'<script> alert ("Account created '.$fname.'");</script>';
            echo'<script>window.location.href="../akogin.php";</script>'; 
        


            $mail = new PHPMailer(true);

    
            //Server settings
           // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'aiswaryamohanan2023a@mca.ajce.in';                     //SMTP username
            $mail->Password   = 'Aiswarya@123';                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('aiswaryamohanan2023a@mca.ajce.in', 'E-Taluk');
            $mail->addAddress($email);     //Add a recipient
           //
        
            //Attachments
           // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
           // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Hi '.$fname.' '.$lname.' This is your User Name and Password for your Login.';
            $mail->Body    = '<h1> User Name: '.$email.'<br> Password: '.$password.'<h1> <br> <strong>Use this for Login.</strong>';
           // $mail->AltBody = 'copy this token ';
        
            $mail->send();
                // $_SESSION['mailsend']="Check Your mail!!!";
                header('location:stafreg.php'); 

        }
        }
    }
?>

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
<style>

      .form-control {
	height: 40px;
	box-shadow: none;
	color: #5cb85c;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
  border-radius: 8px;
  color: #299b63;
}
.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 18px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #5cb85c;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 35px;
	text-align: center;
}
.signup-form form {
	color:  #299b63;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.7);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 25px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #f2f3f7;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
} 
.action {
    font-size: 15px;
	font-weight: bold;		
	min-width: 140px;
  color:#5cb85c;
	outline: none !important;
  display: flex;
  justify-content: center;
  align-items: flex-end;
  height: 5vh; /* adjust this value to fit your needs */
} 
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}
</style>
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
                        <a  href="vieapp.php"><i class="fa fa-square-o fa-3x"></i>View Applications</a>
                        <li><a href="viewapp.php">Caste</a></li>  
 <li><a href="viewiapp.php">Income</a></li>  
 <li><a href="viewpk.php">Pokkuvaravu</a></li>  
 <li><a href="viewnativity.php">Nativity</a></li> 

</ol>  
                    </li>	
                </ul>
               
            </div>
            
        </nav>  

 
        <!-- partial:index.partial.html -->
        <body>
        <div class="signup-form">

      <form action="" method="post" onsubmit="return Validate() && Validatename()  && ValidateEmail() &&   Confirmpass()  && Val() && Validate() ">
      <h2>Staff Register</h2>
 
      
      <div class="form-group">
		  <div class="row">
      <div class="form-group">
          <label><b>First Name</b></label><br>
            <input type="text" class="form-control" name="fname" placeholder="Enter first name" id="fname"  title="Name must be alphabets"  required onkeyup="return Validate()" onblur="return Validate()" required/>
            <span id="fn" style="color: red;"></span>

            </div>
      <!--<div class="form-group">-->
      <div class="form-group">
          <label><b>Last  Name</b></label><br>
            <input type="text" name="lastname" class="form-control" id="lname" placeholder="Enter last name"  title="Name must be alphabets" onblur="return Validatename()" required onkeyup="return Validatename()" required/>
            <span id="ln" style="color: red;"></span>
      </div>
            <div class="form-group">
		          <label><b>Email<b></label><br>
               <input type="text" name="email"  class="form-control"placeholder="Enter mail" id="email" onblur="return ValidateEmail()" required onkeyup="return ValidateEmail()" required/>
                <span id="el" style="color: red;"></span>

            </div> 
                 <div class="form-group">
		              <label><b>Password</b></label><br>
                   <input type="password" name="password" class="form-control" id="password" placeholder="Password"   onblur="return Validatepassword()" required onkeyup="return Validatepassword()"/>
                    <span id="pss" style="color: red;"></span>
            
              <style>
                                                 /* The message box is shown when the user clicks on the password field */
                                                    #message {
                                                    display:none;
                                                    background:#fff;
                                                    color: #000;
                                                    position: relative;
                                                    padding: 20px;
                                                    margin-top: 10px;
                                                    }
                                                                        #message p {
                                                    padding: 1px 35px;
                                                    font-size: 14px;
                                                    }
                                                    /* Add a green text color and a checkmark when the requirements are right */
                                                    .valid {
                                                    color: green;
                                                    }

                                                    .valid:before {
                                                    position: relative;
                                                    left: -25px;
                                                    content: "✔";
                                                    }

                                                    /* Add a red text color and an "x" when the requirements are wrong */
                                                    .invalid {
                                                    color: red;
                                                    }

                                                    .invalid:before {
                                                    position: relative;
                                                    left: -25px;
                                                    content: "✖";
                                                    }
                                                    </style>
                                                <div id="message">
<!--                                                    <h4 style="color:rgb(249, 164, 61) ;">Password must contain the following:</h4>-->
                                                        <p id="letter" class="invalid">A lowercase letter</p>
                                                        <p id="capital" class="invalid">A capital (uppercase) letter</p>
                                                        <p id="number" class="invalid">A number</p>
                                                        <p id="length" class="invalid">Minimum 8 characters</b></p>
                                                     </div>
                                                <script>
                                        var myInput = document.getElementById("password");
                                        var letter = document.getElementById("letter");
                                        var capital = document.getElementById("capital");
                                        var number = document.getElementById("number");
                                        var length = document.getElementById("length");
                                        myInput.onfocus = function() {
                                        document.getElementById("message").style.display = "block";
                                        }
                                        myInput.onblur = function() {
                                        document.getElementById("message").style.display = "none";
                                        }
                                        // When the user starts to type something inside the password field
                                        myInput.onkeyup = function() {
                                        // Validate lowercase letters
                                        var lowerCaseLetters = /[a-z]/g;
                                        if(myInput.value.match(lowerCaseLetters)) {
                                            letter.classList.remove("invalid");
                                            letter.classList.add("valid");
                                        } else {
                                            letter.classList.remove("valid");
                                            letter.classList.add("invalid");
                                        }

                                        // Validate capital letters
                                        var upperCaseLetters = /[A-Z]/g;
                                        if(myInput.value.match(upperCaseLetters)) {
                                            capital.classList.remove("invalid");
                                            capital.classList.add("valid");
                                        } else {
                                            capital.classList.remove("valid");
                                            capital.classList.add("invalid");
                                        }

                                        // Validate numbers
                                        var numbers = /[0-9]/g;
                                        if(myInput.value.match(numbers)) {
                                            number.classList.remove("invalid");
                                            number.classList.add("valid");
                                        } else {
                                            number.classList.remove("valid");
                                            number.classList.add("invalid");
                                        }

                                        // Validate length
                                        if(myInput.value.length >= 8) {
                                            length.classList.remove("invalid");
                                            length.classList.add("valid");
                                        } else {
                                            length.classList.remove("valid");
                                            length.classList.add("invalid");
                                        }
                                        }
                                    </script>
                                      </div>
                                      <div class="form-group">
		  
          <label><b>Confirm Password</b></label><br>
            <input type="password" class="form-control" name="cpassword" placeholder="confirm password"  id="cpassword" required onkeyup="return Confirmpass()" onblur="return Confirmpass()"  required/>
            <span id="cpss" style="color: red;"></span><br>

          </div><br>

                                      
      

        
          <!-- <a href="#" class="link">Forgot Your Password?</a>  -->
    
          
          <div class="action">
          <button type="submit"class="registerbtn" name="register" >Register</button>
        </div>
         
       
      </form>
      <div class="abcd">
      <a href="index.html">Back to home</a>
                                      </div>
    </div>
      
   
    <!-- partial -->
    <!-- <script  src="./script.js"></script> -->
           
<script type="text/javascript">
function Validate() 
                            {
                            var val = document.getElementById('fname').value;
                            if (!val.match(/^[A-Z].*$/)) 
                            {
                              document.getElementById('fn').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                    document.getElementById('fname').value = val;
                                    document.getElementById('fname').style.color = "red";
                                      return false;
                                     flag=1;
                            }
                            if(val.length<3||val.length>30){
                              document.getElementById('fn').innerHTML="Between 3 to 10 characters";
                                    document.getElementById('fname').value = val;
    
    
                                document.getElementById('fname').style.color = "red";
                                      return false;
                                      
                            }
                            else{
    
                            
                             document.getElementById('fn').innerHTML=" ";
                              document.getElementById('fname').style.color = "green";
                             return true;
                            }
                          }
                          function Validatename() 
                          {
                            var val = document.getElementById('lname').value;
                            if (!val.match(/^[A-Z].*$/)) 
                            {
                              document.getElementById('ln').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                    document.getElementById('lname').value = val;
                                    document.getElementById('lname').style.color = "red";
                                      return false;
                                     flag=1;
                            }
                            if(val.length<3||val.length>30){
                               document.getElementById('ln').innerHTML="Between 3 to 10 characters";
                                    document.getElementById('lname').value = val;
    
    
                                document.getElementById('lname').style.color = "red";
                                      return false;
                                      
                            }
                            else{
    
                            
                               document.getElementById('ln').innerHTML=" ";
                              document.getElementById('lname').style.color = "green";
                             return true;
                            }
                          }
                            
                          function ValidateEmail()
                            {
                         
                              var email=document.getElementById('email').value;  
                              var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                            //var atposition=x.indexOf("@");  
                            //var dotposition=x.lastIndexOf(".");  
                           
                              if(email.length<3||email.length>40){
                                document.getElementById('el').innerHTML="Invalid Email";
                                    document.getElementById('email').value = email;
                                    document.getElementById('email').style.color = "red";
                                   // alert("err");
                                      return false;
                              }
                             if(!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)){  
                                document.getElementById('el').innerHTML="Please enter a valid Email";  
                                document.getElementById('email').value = email;
                                    document.getElementById('email').style.color = "red";
                              return false;  
                              }
                              else{
                              document.getElementById('el').innerHTML=" ";
                              document.getElementById('email').style.color = "green";
                             return true;
    
                              
                            }
                          }
                             function Validatepassword()
                             {
                          
                              var pass=document.getElementById('password').value;
                              var patt="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/";
                              if (pass.length<8)
                               if(!pass.match(/[a-z]/g)){
                                document.getElementById('password').value = pass;
                                 document.getElementById('cpss').innerHTML="Enter a strong password eg:Aa#23gh56";
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
                                 document.getElementById('cpss').innerHTML="Password doesn't match ";  
                                document.getElementById('cpassword').value = pass2;
                                document.getElementById('cpassword').style.color = "red";
                              return false;  
                              }
                           
                              else{
                              document.getElementById('cpss').innerHTML=" ";
                              document.getElementById('cpassword').style.color = "green";
                            return true;
                              
                            }
                          }
                          function ValidatePhone(){
                            var mobile=document.getElementById('tel').value;
                            if(!mobile.match(/^[6789][0-9]{9}$/)){
                             document.getElementById('pe').innerHTML="Enter a valid phone number";
                            document.getElementById('tel').style.color="red";
                           return false;
                           }
                          else{
                          document.getElementById('pe').innerHTML=" ";
                          document.getElementById('tel').style.color="green";
                          return true;
}
}
                          
function ValidateAddress(){
  var address = document.getElementById('address').value;
                            if (!address.match(/^[a-zA-Z ]*$/)) 
                            {
                              document.getElementById('ad').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                    document.getElementById('address').value = address;
                                    document.getElementById('address').style.color = "red";
                                      return false;
                                     flag=1;
                            }
                            if(address.length<3||address.length>30){
                               document.getElementById('ad').innerHTML="Between 3 to 10 characters";
                                    document.getElementById('address').value = address;
    
    
                                document.getElementById('address').style.color = "red";
                                      return false;
                                      
                            }
                            else{
    
                            
                              document.getElementById('ad').innerHTML=" ";
                              document.getElementById('address').style.color = "green";
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
