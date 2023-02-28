
<?php include ('dbconn.php');
if(isset($_POST['submit']))
{ 
    $fname=$_POST["fname"];
    $lastname=$_POST["lastname"];
    $mobile=$_POST["mobile"];
    $email=$_POST["email"];
    $Aadharno = $_POST["Aadhar"]; 
    $address=$_POST["address"];
    $street=$_POST["street"];
    $password = $_POST["password"];
    $cpassword=$_POST["cpassword"];
    //$abc=md5($_POST["password"]);
    $user_check = "SELECT `typeno` FROM `usertype` WHERE `typename` = 'user'";
    $user_check_rslt = mysqli_query($conn,$user_check);
    while($row = mysqli_fetch_array($user_check_rslt)){
        
    $type = $row['typeno'];
    $user_reg ="INSERT INTO `userreg` (`fname`, `lastname`, `mobile`,`email`, `Aadhar`,`address`,`street`,`password`) VALUES ('$fname','$lastname','$mobile','$email','$Aadharno' ,'$address','$street','$password')";
        $user_reg_query = mysqli_query($conn,$user_reg);
    
     $last_id = mysqli_insert_id($conn);
     $result=mysqli_query($conn,"SELECT Rid from userreg where Rid=$last_id");
     $row=mysqli_fetch_array($result);
    if($row>0){
        $rid=$row['Rid'];
    $reg = "INSERT INTO `u_login` (`Rid`,`email`, `password`, `typeno`) VALUES ('$rid','$email','$password','$type')";
     $reg_query = mysqli_query($conn,$reg);
    
    echo'<script> alert ("Account created '.$fname.'");</script>';
    echo'<script>window.location.href="akogin.php";</script>'; 
    }
    else{
        echo "<script> alert('Error');</script>";
        echo'<script>window.location.href="userreg.php";</script>'; 
    }
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <style>
        body
        {
            background-image:url('Kerala_Government_Secretariat (1).jpg')
        }
    </style>
    <title>Sign Up 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/style.css">
    


<!-- Bootstrap-CSS -->      <link rel="stylesheet" href="css/bootstrap.min.css"     type="text/css" media="all">
<!-- Index-Page-CSS -->     <link rel="stylesheet" href="css/style.css"         type="text/css" media="all">
<!-- Gallery-Popup-CSS -->  <link rel="stylesheet" href="css/chocolat.css"      type="text/css" media="all">
<!-- //Custom-Stylesheet-Links -->

<!-- Web-Fonts -->
<!-- Body-Font -->   <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' type='text/css'>
<!-- Logo-Font -->   <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Bree+Serif'        type='text/css'>
<!-- Link-Font -->   <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Raleway:400,500,600'       type='text/css'>
<!-- //Web-Fonts -->
    
    <!-- Latest compiled and minified CSS
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> 
 jQuery library 
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
 Popper JS 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

 Latest compiled JavaScript 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> -->

    </head>
    <body class="abc">
       
    
  
            
      
             <!-- <form name="myForm" method="POST" onsubmit="return Validate() && Validatename()  && ValidatePhone() && ValidateEmail() && Validatepassword() && Confirmpass()"> -->
            <!-- <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-5">
                            <h2 class="heading-section">Sign Up Form</h2>
                        </div>
                    </div> -->
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="wrap d-md-flex">
                                <div class="text-wrap p-4 p-lg-5 d-flex img d-flex align-items-end" style="background-image: url(images/bg1.jpg);">
                                    <div class="text w-100">
                                        <h2 class="mb-4">Welcome to signup form</h2>
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
                                                      
                                                             maxlength="30" ><span id="nameErr" style="color:rgb(255,0,0,0.404);"></span></div></div></div>
                                       
                                       
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group d-flex align-items-center">
                                                    <label class="label" for="name">Mobile</label>
                                                    <input type="mobile" class="mobile" name="mobile" id="mobile" minlength="10" maxlength="10" placeholder="Enter phone number" autocomplete="off"
                                                    required onkeyup="return ValidatePhone()" />
                                                    <span id="phoneError" style="color:rgb(255,0,0,0.404);"></span>
                                                </div>
                                                </div>
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
                                                <div class="col-md-12">
                                                    <div class="form-group d-flex align-items-center">
                                                        <label class="label" for="name">Aadhaar no</label>
                                                        <input type="name" class="form-control" placeholder="Aadharno" minlength="12" maxlength="12" id="Aadhar" name="Aadhar" required onkeyup="return ValidateAadhar()"
                                                        
                                                        /> 
                                                        <span id="AadharError" style="color:rgb(255,0,0,0.404);"></span>
                                                    </div>
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
  <input type="name" class="form-control" placeholder="street" id="street" name="street" style="width:100%" required onkeyup="ValidateStreet()">
  <span id="streetError" style="color:rgb(255,0,0,0.404);"></span>
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
                                                              required onkeyup="return Validatepassword()">
                                                              <span id="passwordError" style="color:rgb(255,0,0,0.404);"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group d-flex align-items-center">
                                                            <label class="label" for="password">Confirm Password</label>
                                                            <input type="password" class="form-control" placeholder=" Re enter Password" id="cpassword" name="cpassword" required
                                                              required onkeyup="return Confirmpass()">
                                                              <span id="cpasswordError" style="color:rgb(255,0,0,0.404);"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <span id="pass1" style="color:red;"> </span>
                                                    </div>
                                            
                                                </div>
                                                <div class="col-md-12 my-4">
                                                    <div class="form-group">
                                                        <div class="w-100">
                                                            <label class="checkbox-wrap checkbox-primary">I agree all statements in terms of service
                                                            <input type="checkbox" checked required >
                                                            <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                        I'm already a member! <a href="akogin.php">Sign In</a>
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
                                        <a href="index.php">Back to Home</a>
                                    </form> 
                          
                        </div>
                        <a href="index.php">Back to Home</a>
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
                              document.getElementById('nameErr').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                    document.getElementById('lastname').value = val;
                                    document.getElementById('lastname').style.color = "red";
                                      return false;
                                     flag=1;
                            }
                            if(val.length<1||val.length>30){
                            document.getElementById('nameErr').innerHTML="Between 3 to 10 characters";
                                    document.getElementById('lastname').value = val;
    
    
                                document.getElementById('lastname').style.color = "red";
                                      return false;
                                      
                            }
                            else{
    
                            
                             document.getElementById('nameErr').innerHTML=" ";
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
                           
                              if(email.length<3||email.length>50){
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
                            document.getElementById('phoneError').innerHTML="Enter a valid phone number only number are allowed Start with 9,8,7,6";
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
                             document.getElementById('streetError').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                    document.getElementById('street').value = address;
                                    document.getElementById('street').style.color = "red";
                                      return false;
                                     flag=1;
                            }
                            if(address.length<3||address.length>30){
                            document.getElementById('streetError').innerHTML="";
                                    document.getElementById('street').value = address;
    
    
                                document.getElementById('street').style.color = "red";
                                      return false;
                                      
                            }
                            else{
    
                            
                            //   document.getElementById('addressError').innerHTML=" ";
                              document.getElementById('street').style.color = "green";
                             return true;
                            }
}
function ValidateAadhar()
                            {
                              var Aadhar=document.getElementById('Aadhar').value;
                            if(Aadhar.length<12){
                            document.getElementById('AadharError').innerHTML="Enter a valid Aadahar  number";
                            document.getElementById('Aadhar').style.color="red";
                           return false;
                           }
                          else{
                         document.getElementById('AadharError').innerHTML=" ";
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