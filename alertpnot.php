<?php
include 'dbconn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if (isset($_POST['register'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $ThandaperNo = $_POST['ThandaperNo'];
  $amount = $_POST['Amount'];
  $message = $_POST['message'];


  $user_check = "SELECT `taxid` FROM `taxtype` WHERE `taxname` = 'BuildingTax'";
  $user_check_rslt = mysqli_query($conn, $user_check);
  while ($row = mysqli_fetch_array($user_check_rslt)) {

    $type = $row['taxid'];
    $user_reg = "INSERT INTO `tbl_alert`(`fname`, `lname`,  `email`, `message`) VALUES ('$fname','$lname','$email','$message' )";
    $user_reg_query = mysqli_query($conn, $user_reg);

    $last_id = mysqli_insert_id($conn);
    if ($user_reg_query) {
      $reg = "INSERT INTO `tbl_noti`(`adn_no`,`email`, `message`,`ThandaperNo`,`Amount`, `taxid`,`status`) VALUES ('$last_id','$email','$message','$ThandaperNo','$amount','1','unpaid')";
      $reg_query = mysqli_query($conn, $reg);




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
      $mail->Subject = 'Hi ' . $fname . ' ' . $lname . ' This Is A Message From Taluk Office Kanjirappally You have Forgot to Pay.';
      $mail->Body    = '<h1> User Name: ' . $last_id . '<br> Message: ' . $message . '<h1> <br> <strong>Use the link T  Pay.</strong>';
      // $mail->AltBody = 'copy this token ';

      $mail->send();
      echo '<script> alert ("NoTification Sent To ' . $fname . '");</script>';
      echo '<script>window.location.href="alertpnot.php";</script>';
      // $_SESSION['mailsend']="Check Your mail!!!";
      // header('location:alertpnot.php'); 

    }
  }
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
<style>
  .form-control {
    height: 40px;
    box-shadow: none;
    color: blue;
  }

  .form-control:focus {
    border-color: blue;
  }

  .form-control,
  .btn {
    border-radius: 8px;
    color: blue;
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

  .signup-form h2:before,
  .signup-form h2:after {
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
    color: #299b63;
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
    color: #5cb85c;
    outline: none !important;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    height: 5vh;
    /* adjust this value to fit your needs */
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
    opacity: 1;
  }
</style>
</head>
</head>

<body>

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
font-size: 16px;"> &nbsp; <a href="..\logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
      </nav>
      <!-- /. NAV TOP  -->
      <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
          <ul class="nav" id="main-menu">
            <li class="text-center">
              <img src="assets/img/find_user.png" class="user-image img-responsive" />
            </li>


            <li>
              <a class="active-menu" href="index.html"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
            </li>
            <li>
              <a href="stafreg.php"><i class="fa fa-plus fa-3x"></i>Add Staff</a>
            </li>
            <li>
              <a href="viewapplication.php"><i class="fa fa-eye fa-3x"></i>View</a>
            </li>
            <li>
              <a href="alertpnot.php"><i class="fa fa-bar-chart-o fa-3x"></i>Notification To User</a>
            </li>
            <li>
              <a href="viewleave.php"><i class="fa fa-eye fa-3x"></i>View Leave Application</a>
            </li>
            <li>
              <a href="table.php"><i class="fa fa-table fa-3x"></i>Table Places</a>
            </li>
            <li>
              <a href="viewapp.html"><i class="fa fa-square-o fa-3x"></i> View Application</a>
            <li><a href="viewapp.php">Caste</a></li>
            <li><a href="viewiapp.php">Income</a></li>
            <li><a href="viewpk.php">Pokkuvaravu</a></li>
            <li><a href="viewnativity.php">Nativity</a></li>

            </ol>

            </li>
          </ul>

        </div>

      </nav>

      </li>
      </ul>

    </div>

    </nav>
    <!-- partial:index.partial.html -->

    <body>
      <div class="signup-form">

        <form action="" method="post" onsubmit="return Validate() && Validatename()  && ValidateEmail() &&   Confirmpass()  && Val() && Validate() ">
          <h2>Alert Tax Notification</h2>


          <div class="form-group">
            <div class="row">
              <div class="form-group">
                <label><b>First Name</b></label><br>
                <input type="text" class="form-control" name="fname" placeholder="Enter first name" id="fname" title="Name must be alphabets" required onkeyup="return Validate()" onblur="return Validate()" required />
                <span id="fn" style="color: red;"></span>

              </div>
              <!--<div class="form-group">-->
              <div class="form-group">
                <label><b>Last Name</b></label><br>
                <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter last name" title="Name must be alphabets" onblur="return Validatename()" required onkeyup="return Validatename()" required />
                <span id="ln" style="color: red;"></span>
              </div>
              <div class="form-group">
                <label><b>Email<b></label><br>
                <input type="text" name="email" class="form-control" placeholder="Enter mail" id="email" onblur="return ValidateEmail()" required onkeyup="return ValidateEmail()" required />
                <span id="el" style="color: red;"></span>

              </div>
              <div class="form-group">
                <label><b>Message</b></label><br>
                <input type="text" name="message" class="form-control" id="message" placeholder="Message" autofill="Pay Tax" />
              </div>
              <div class="form-group">
                <label><b>ThandaperNo</b></label><br>
                <input type="text" name="ThandaperNo" class="form-control" id="ThandaperNo" placeholder="ThandaperNumber" />
              </div>
              <div class="form-group">
                <label><b>Amount</b></label><br>
                <input type="text" name="Amount" class="form-control" style="margin-bottom: 40px;" id="amount" placeholder="Amount" />
              </div>

              <div class="action">
                <button type="submit" class="registerbtn" style="border-radius: 15px;" name="register">Register</button>
              </div>
            </div>
          </div>
          <div class="abcd">
            <a href="index.html">Back to home</a>
          </div>
        </form>
      </div>


      <!-- partial -->
      <!-- <script  src="./script.js"></script> -->

      <script type="text/javascript">
        function Validate() {
          var val = document.getElementById('fname').value;
          if (!val.match(/^[A-Z].*$/)) {
            document.getElementById('fn').innerHTML = "Start with a Capital letter & Only alphabets are allowed";
            document.getElementById('fname').value = val;
            document.getElementById('fname').style.color = "red";
            return false;
            flag = 1;
          }
          if (val.length < 3 || val.length > 30) {
            document.getElementById('fn').innerHTML = "Between 3 to 10 characters";
            document.getElementById('fname').value = val;


            document.getElementById('fname').style.color = "red";
            return false;

          } else {


            document.getElementById('fn').innerHTML = " ";
            document.getElementById('fname').style.color = "green";
            return true;
          }
        }

        function Validatename() {
          var val = document.getElementById('lname').value;
          if (!val.match(/^[A-Z].*$/)) {
            document.getElementById('ln').innerHTML = "Start with a Capital letter & Only alphabets are allowed";
            document.getElementById('lname').value = val;
            document.getElementById('lname').style.color = "red";
            return false;
            flag = 1;
          }
          if (val.length < 3 || val.length > 30) {
            document.getElementById('ln').innerHTML = "Between 3 to 10 characters";
            document.getElementById('lname').value = val;


            document.getElementById('lname').style.color = "red";
            return false;

          } else {


            document.getElementById('ln').innerHTML = " ";
            document.getElementById('lname').style.color = "green";
            return true;
          }
        }

        function ValidateEmail() {

          var email = document.getElementById('email').value;
          var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          //var atposition=x.indexOf("@");  
          //var dotposition=x.lastIndexOf(".");  

          if (email.length < 3 || email.length > 40) {
            document.getElementById('el').innerHTML = "Invalid Email";
            document.getElementById('email').value = email;
            document.getElementById('email').style.color = "red";
            // alert("err");
            return false;
          }
          if (!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
            document.getElementById('el').innerHTML = "Please enter a valid Email";
            document.getElementById('email').value = email;
            document.getElementById('email').style.color = "red";
            return false;
          } else {
            document.getElementById('el').innerHTML = " ";
            document.getElementById('email').style.color = "green";
            return true;


          }
        }

        function Validatepassword() {

          var pass = document.getElementById('password').value;
          var patt = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/";
          if (pass.length < 8)
            if (!pass.match(/[a-z]/g)) {
              document.getElementById('password').value = pass;
              document.getElementById('cpss').innerHTML = "Enter a strong password eg:Aa#23gh56";
              document.getElementById('password').style.color = "red";
              return false;
            }
          if (!pass.match(/[A-Z]/g)) {
            document.getElementById('password').value = pass;
            document.getElementById('passwordError').innerHTML = "Include minimum one capital letter";
            document.getElementById('password').style.color = "red";

            return false;
          }
          if (!pass.match(/[0-9]/g)) {
            document.getElementById('password').value = pass;
            document.getElementById('passwordError').innerHTML = "Include 1 digit";
            document.getElementById('password').style.color = "red";

            return false;
          }
          if (!pass.match(/[^a-zA-Z\d]/g)) {
            document.getElementById('password').value = pass;
            document.getElementById('passwordError').innerHTML = "Include 1 special character";
            document.getElementById('password').style.color = "red";

            return false;
          }
          if (pass.length < 8) {
            document.getElementById('password').value = pass;
            document.getElementById('passwordError').innerHTML = "Minimum 8 characters";
            document.getElementById('password').style.color = "red";

            return false;
          } else {
            document.getElementById('password').value = pass;

            document.getElementById('passwordError').innerHTML = "";
            document.getElementById('password').style.color = "green";
          }


        }

        function Confirmpass() {

          var pass1 = document.getElementById('password').value;
          var pass2 = document.getElementById('cpassword').value;
          if (pass1 != pass2) {
            document.getElementById('cpss').innerHTML = "Password doesn't match ";
            document.getElementById('cpassword').value = pass2;
            document.getElementById('cpassword').style.color = "red";
            return false;
          } else {
            document.getElementById('cpss').innerHTML = " ";
            document.getElementById('cpassword').style.color = "green";
            return true;

          }
        }

        function ValidatePhone() {
          var mobile = document.getElementById('tel').value;
          if (!mobile.match(/^[6789][0-9]{9}$/)) {
            document.getElementById('pe').innerHTML = "Enter a valid phone number";
            document.getElementById('tel').style.color = "red";
            return false;
          } else {
            document.getElementById('pe').innerHTML = " ";
            document.getElementById('tel').style.color = "green";
            return true;
          }
        }

        function ValidateAddress() {
          var address = document.getElementById('address').value;
          if (!address.match(/^[a-zA-Z ]*$/)) {
            document.getElementById('ad').innerHTML = "Start with a Capital letter & Only alphabets are allowed";
            document.getElementById('address').value = address;
            document.getElementById('address').style.color = "red";
            return false;
            flag = 1;
          }
          if (address.length < 3 || address.length > 30) {
            document.getElementById('ad').innerHTML = "Between 3 to 10 characters";
            document.getElementById('address').value = address;


            document.getElementById('address').style.color = "red";
            return false;

          } else {


            document.getElementById('ad').innerHTML = " ";
            document.getElementById('address').style.color = "green";
            return true;
          }
        }






        function Val() {
          if (Validate() === false || ValidateEmail() === false || Validatepassword() === false || Confirmpass() === false || ValidatePhone() === false) {
            return false;
          }
        }
      </script>

    </body>



</html>