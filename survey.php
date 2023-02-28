<?php include ('dbconn.php');
if(isset($_POST['submit']))
{ 
    $fname=$_POST["fname"];
    $date=$_POST["date"];
    $email=$_POST["email"];
    $user_reg ="INSERT INTO `survey` (`fname`, `date`, `email`) VALUES ('$fname','$date','$email')";
        $user_reg_query = mysqli_query($conn,$user_reg);
    
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
    <title>Survey</title>
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
    <body class="abc"><hr><hr><hr><hr><hr><hr><hr><hr><hr>
       
    
  
            
      
           
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="wrap d-md-flex">
                                <div class="text-wrap p-4 p-lg-5 d-flex img d-flex align-items-end" style="background-image: url(images/bg1.jpg);">
                                    <div class="text w-100">
                                        <h2 class="mb-4">Assign Duties</h2>
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
                                                    <input type="fname" class="fname" name="fname" id="fname" placeholder="Enter first name" autocomplete="off"
                                                     required onkeyup="return Validate()"><span id="nameError" style="color:rgb(255,0,0,0.404);"></span>
</div>
</div></div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group d-flex align-items-center">
                                                    <label class="label" for="name">Date</label>
                                                    <input type="date" class="date" name="date" id="date" placeholder="Enter first name" autocomplete="off">
                                                    
</div>
</div></div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group d-flex align-items-center">
                                                        <label class="label" for="name">Email</label>
                                                        <input type="name" placeholder="name@email.com"  id="email" name="email" required onkeyup="return ValidateEmail()"/>
                                                        <span id="emailError" style="color:rgb(255,0,0,0.404);"></span>
                                                    </div>
                                                </div></div>
                                                
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-secondary submit p-3" value="Assign" id="btn" name="submit">
                                                    </div>
                                               
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