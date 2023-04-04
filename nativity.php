<?php 
include '../dbconn.php';
include '../session.php';?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">USER <b>DASHBOARD</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<i class="fa fa-user" aria-hidden="true"></i>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="userpic.png">
				<h4>WELCOME!</h4>
				<?php
$currentuser= $_SESSION['email'];
$sql="SELECT * FROM `userreg` WHERE email='$currentuser'";
$gotresult=mysqli_query($conn,$sql);
if($gotresult)
{
    if(mysqli_num_rows($gotresult) > 0)
    {
        while($row=mysqli_fetch_array($gotresult))
        {
            //print_r($row['email']);
            ?>
            <p>Welcome <?php echo $row['email'];?></p>
            <?php
        }
    }
}
?>
			</div>
			<ul>
				<li>
					<a href="change.p.php">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Change Password</span>
					</a>
				</li>
				<li>
					<a href="democaste.php">
						<i class="fa fa-plus icons"></i>
						<span>Apply Application</span>
					</a>
				</li>
				<li>
					<a href="payyy.php">
						<i class="fa fa-plus icons" aria-hidden="true"></i>
						<span>Pay tax</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-info-circle" aria-hidden="true"></i>
						<span>Request Service</span>
					</a>
				</li>
				<li>
					<a href="servicestatus.php">
						<i class="fa fa-eye" aria-hidden="true"></i>
						<span>View Status</span>
					</a>
                    <li><a href="servicestatus.php">Caste</a></li>  
 <li><a href="viewincomestatus.php">Income</a></li>  
 <li><a href="#">Pokkuvaravu</a></li>  
				</li>
				<li>
					<a href="logout.php">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>
		<?php 

$id=$_SESSION['email'];
// require 'console.php';
// include("connection.php");
// $targetDir = "upload_image/birthreg/";
// $finalpath = "upload_image/birthreg/";
if(isset($_POST['submit'])) {
    $first_name = $_POST['fname'];
    $middle_name = $_POST['mname'];
    $last_name = $_POST['lname'];
     $aadharno = $_POST['aadharno'];
    $mobile = $_POST['mobno'];
    $House_name = $_POST['hname'];
    $place = $_POST['place'];
    $postoffice = $_POST['post'];
    $pincode = $_POST['pin'];
    // $datebirth=$_POST['dob'];
    $gender = $_POST['gender'];
    $fathername=$_POST['fathername'];
    $fathermob=$_POST['fathermob'];
    $fatheraadhar=$_POST['fatheraadhar'];
    $mothername=$_POST['mothername'];
    $mothermob=$_POST['mothermob'];
    $motheraadhar=$_POST['motheraadhar'];
    // $motherage=$_POST['motherage'];
    // $total=$_POST['total'];
    // $pincode=$_POST['pincode'];$pincode=$_POST['pincode'];

    // $dob = $_POST['dob'];
   
    // $religion =$_POST['religion'];
    // $caste =$_POST['caste'];
    //echo "$birthday";
    // $files = $_FILES['file'];
    // $filename = $files['name'];
    // $filrerror = $files['error'];
    // $filetemp = $files['tmp_name'];
    // $fileext = explode('.', $filename);
    // $filecheck = strtolower(end($fileext));
    // $fileextstored = array('png' , 'jpg' , 'jpeg');
    // a user does not already exist with the same username and/or email
    // name of the uploaded file
    // $filename = $_FILES['myfile']['name'];

    // // destination of the file on the server
    // $destination = 'upload_image/birthreg' . $filename;

    // // get the file extension
    // $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // // the physical file on a temporary uploads directory on the server
    // $file = $_FILES['myfile']['tmp_name'];
    // $size = $_FILES['myfile']['size'];
    // move_uploaded_file($file, $destination);
    // $pimg=$_FILES["pimage"]["name"];
    // $targetImage = $targetDir . $pimg;
    // $finaltargetImage = $finalpath . $pimg;
     
    // move_uploaded_file($_FILES["pimage"]["tmp_name"],$targetImage);
    // $file = $_FILES['file'];
    // $file_name = $file['name'];
    // $file_type = $file ['type'];
    // $file_size = $file ['size'];
    // $file_path = $file ['tmp_name'];
//     move_uploaded_file ($file_path,'/upload_image/nreg/'.$file_name);
//     $length = 6;
//     $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
//    $filenumber= substr(str_shuffle($str), 0, $length);

    $user_check_query1 = "SELECT Rid FROM u_login WHERE email='$id'";
    $checkqueryresult1 = mysqli_query($conn, $user_check_query1);
    $res1=mysqli_fetch_array($checkqueryresult1);
    $is= $res1['Rid'];
    $user_check_query2 = "SELECT Rid FROM userreg WHERE Rid='$is'";
    $checkqueryresult2 = mysqli_query($conn, $user_check_query2);
    $res2=mysqli_fetch_array($checkqueryresult2);
    // $reg= $res2['Rid'];

    $user_reg_query= "INSERT INTO `tbl_nativity`(`email`, `fname`, `mname`, `lname`, `aadharno`, `mobno`, `hname`, `place`, `post`, `pin`,  
     `gender`,  `fathername`, `mothername`, `fathermob`,  `mothermob`, `fatheraadhar`, `motheraadhar`) 
     VALUES ('$id','$first_name',' $middle_name','$last_name',' $aadharno',' $mobile',' $House_name',' $place',
     '$postoffice','$pincode',' $gender',
    '$fathername',' $mothername','$fathermob',' $mothermob','$fatheraadhar',' $motheraadhar')";
    $checkqueryresult3 = mysqli_query($conn, $user_reg_query);
    if($checkqueryresult3){
        // (move_uploaded_file($_FILES['image']['tmp_name'], $target));
        // move_uploaded_file($tmp_img_name,$folder.$img_name);
        // $user_check_query3=" INSERT INTO `tbl_servicesapplyed`( `filenumber`, `Rid`, `servicename`,  `status`) VALUES 
        // ('$filenumber','$is','Nativity','review pending')";
        // $checkqueryresult4 = mysqli_query($conn, $user_check_query3);
        // if($checkqueryresult4){
                    // require "Mail/phpmailer/PHPMailerAutoload.php";
                    // $mail = new PHPMailer;

                    // $mail->isSMTP();
                    // $mail->Host='smtp.gmail.com';
                    // $mail->Port=587;
                    // $mail->SMTPAuth=true;
                    // $mail->SMTPSecure='tls';

                    // // h-hotel account
                    // $mail->Username='aiswaryamohanan2023a@mca.ajce.in';
                    // $mail->Password='Aiswar23';

                    // // send by h-hotel email
                    // $mail->setFrom('aiswaryamohanan2023a@mca.ajce.in', 'E-Taluk');
                    // // get email from input
                    // $mail->addAddress($id);
                    //$mail->addReplyTo('lamkaizhe16@gmail.com');

                    // HTML body
                    // $mail->isHTML(true);
                    // $mail->Subject="Application sucessfully registered";
                    // $mail->Body="<b>Dear User</b>
                    // <h3>We received a request to register your Nativity Certificate Registration  with file number:'$filenumber'.</h3>
                    // <p>it is successfull !!!  </p>
                    // <br>use the provided file number to check the status of your file and you will be notified once application
                    // is approved<br>
                    // <p>With regrads,</p>
                    // <b>Kanjirappally Taluk Office</b>";
                    
                    echo"<script Type='text/javascript'>alert('Registration Successfully')</script>";
                    echo"<script>window.location.href='servicestatus.php';</script>";
                
        }
                // else{
                    
                //     echo"<script Type='text/javascript'>alert('mail sending failed')</script>";
                // }
        // echo"<script>window.location.href='index.html';</script>";

    
                }
        else{
            echo"<script Type='text/javascript'>alert('Registration unsuccessfull')</script>";
        }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 
    <!--<title>Responsive Regisration Form </title>--> 
</head>

<style>
    
/* ===== Google Font Import - Poppins ===== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
 /* body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center; 
    background: #99ffbb; 
}  */
.container{
    position: relative;
    width:1350px;
    height: auto;
    border-radius: 6px;
    padding: 30px;
    margin: 0 15px;
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
.container header{
    position: relative;
    font-size: 50px;
    font-weight: 800;
    color: #333;
}
.container header::before{
    content: "";
    position: absolute;
    left: 0;
    bottom: -2px;
    height: 3px;
    width: 27px;
    border-radius: 8px;
    background-color: #4070f4;
}
.container form{
    position: relative;
    margin-top: 16px;
    min-height: 1300px;
    background-color: #fff;
    overflow: hidden;
}
.container form .form{
    position: absolute;
    background-color: #fff;
    transition: 0.3s ease;
}
.container form .form.second{
    opacity: 0;
    pointer-events: none;
    transform: translateX(100%);
}
form.secActive .form.second{
    opacity: 1;
    pointer-events: auto;
    transform: translateX(0);
}
form.secActive .form.first{
    opacity: 0;
    pointer-events: none;
    transform: translateX(-100%);
}
.container form .title{
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    font-weight: 500;
    margin: 6px 0;
    color: #333;
}
.container form .fields{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
form .fields .input-field{
    display: flex;
    width: calc(100% / 3 - 15px);
    flex-direction: column;
    margin: 4px 0;
}
.input-field label{
    font-size: 14px;
    font-weight:bold;
    color: #2e2e2e;
}
.input-field input, select{
    outline: none;
    font-size: 14px;
    font-weight: 400;
    color: #333;
    border-radius: 5px;
    border: 1px solid #aaa;
    padding: 0 15px;
    height: 42px;
    margin: 8px 0;
}
.input-field input :focus,
.input-field select:focus{
    box-shadow: 0 3px 6px rgba(0,0,0,0.13);
}
.input-field select,
.input-field input[type="date"]{
    color: #707070;
}
.input-field input[type="date"]:valid{
    color: #333;
}
.container form button, .backBtn{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    width: 100%;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 5px;
    margin: 25px 0;
    background-color: #4070f4;
    transition: all 0.3s linear;
    cursor: pointer;
}
.container form .btnText{
    font-size: 14px;
    font-weight: 400;
}
form button:hover{
    background-color: #265df2;
}
form button i,
form .backBtn i{
    margin: 0 6px;
}
form .backBtn i{
    transform: rotate(180deg);
}
form .buttons{
    display: flex;
    align-items: center;
}
form .buttons button , .backBtn{
    margin-right: 14px;
}


 
</style>
<script language="javascript">
function SelectRedirect(){
// ON selection of section this function will work
switch(document.getElementById('s1').value)
{
    case "caste":
window.location="democaste.php";
break;

case "income":
window.location="income.php";
break;

case "Pokkuvaravu":
window.location="pokkuvaravu.php";

break;


case "service":
window.location="hmarriage.php";
break;

case "nativity":
    window.location="nativity.php"

/// Can be extended to other different selections of SubCategory //////
default:
window.location="../"; // if no selection matches then redirected to home page
break;
}// end of switch 
}
////////////////// 
</script>
<body>
    
<div class="container">
        <!-- <header>Registration</header> -->
 
        <form  autocomplete="off" method="POST" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                                    <div class="input-field">
                                        <label style="font-size:large;">select service</label>
                                        <select  name="service" id = "s1" onChange="SelectRedirect();">
                                        <form  autocomplete="off" method="POST" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                                    <div class="input-field">
                                        <label style="font-size:large;">select service</label>
                                        <select  name="service" id = "s1" onChange="SelectRedirect();">
                                            <option disabled selected>Caste Certicate</option>
                                            <option value="income">Income Certificate</option>
                                            <option value="pokkuvaravu.php">Pokkuvaravu</option>
                                            <option value="pensionreg">Service</option>
                                            <option value="nativity.php">Nativity</option>

                                        </select>
                                    </div>
                                <!-- <div class="input-field">
                                    <label>service type</label>
                                    <input type="text" placeholder="New Birth Registration"  disabled=True>
                            </div> -->
                            <header><span class="title">Applicant'S Details</span></header>
                            <div class="form-check">
                                <!-- <input class="form-check-input" type="checkbox" id="check1" name="option1" value="something" >
                                <label class="form-check-label">Select from saved</label>
                            </div> -->
 
                          <div class="fields">
                                <div class="input-field">
                                        <label>first name</label>
                                        <input type="text" onkeyup='fnameValidation(this)' name="fname" placeholder="Enter your first name" required>
                                        <span id="first" class="new" style="color:red;"></span> 
                                 </div>
 
                                 <div class="input-field">
                                    <label>middle name</label>
                                    <input type="text" placeholder="Enter your middle name" name="mname" onkeyup='mnameValidation(this)' >
                                    <span id="middle" class="new" style="color:red;"></span> 
                                </div>
 
                                 <div class="input-field">
                                        <label>last name</label>
                                        <input type="text" placeholder="Enter your last name" name="lname" onkeyup='lnameValidation(this)'required>
                                        <span id="last" class="new" style="color:red;"></span> 
                                </div>
 
                                    <!-- <div class="input-field">
                                        <label>Gender</label>
                                        <select required name="gender">
                                            <option disabled selected>Select gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div> -->
 
                                    
                                    <div class="input-field">
                                        <label>Aadhar number</label>
                                        <input type="text" placeholder="Enter your aadhar no" onkeyup='aadharValidation(this)' name="aadharno" required>
                                        <span id="aadhar" class="new" style="color:red;"></span> 
                                    </div>
                   

                                    <div class="input-field">
                                            <label>Mob Number</label>
                                            <input type="text"  name="mobno" placeholder="Enter your mobile number" onkeyup='mobileValidation(this)' required>
                                            <span id="mob" class="new" style="color:red;"></span> 
                                    </div>
<!--                                      
                                    <div class="input-field">
                                        <label>profile pic</label>
                                        <input type="file" placeholder="Enter your pic" required>
                                    </div>  -->
                          </div> 
                          
              
                                 <div class="details ID">
                                    <header> <span class="title">Address for communication </span> </header>
            
                                    <div class="fields">
                                            <div class="input-field">
                                                <label>House Name</label>
                                                <input type="text" placeholder="Enter house name" name="hname" onkeyup='housenameValidation(this)'required>
                                                <span id="hname" class="new" style="color:red;"></span> 
                                            </div>
                                            <div class="input-field">
                                                <label>Place</label>
                                                <input type="text" placeholder="Enter your place" name="place" onkeyup='placeValidation(this)'required>
                                                <span id="pal" class="new" style="color:red;"></span> 
                                            </div>
                                            <div class="input-field">
                                                <label>Post Office</label>
                                                <input type="text" placeholder="Enter your postoffice" name="post" onkeyup='pfoValidation(this)'required>
                                                <span id="poff" class="new" style="color:red;"></span> 
                                            </div>
                    
                                            <div class="input-field">
                                                <label>Pin Code</label>
                                                <input type="text" placeholder="Enter Pin number" name="pin" onkeyup='pinValidation(this)' required>
                                                <span id="pinc" class="new" style="color:red;"></span> 
                                            </div>
                                           
                                    </div>
                                  
                                    

                                         <div class="input-field">
                                                <label>Gender</label>
                                                <select required name="gender">
                                                    <option disabled selected>Select Gender</option>
                                                    <option value="male">MALE</option>
                                                    <option value="female">FEMALE</option>
                                                    </select>
                                         </div>
                                    
 
                                                <div class="input-field">
                                            <label>Date Of Birth</label>
                                          <input type="date" placeholder="Date of birth" name="dob" required>
                                          </div>
 

                                    <header> <span class="title">Details of parents </span> </header>
                                    <br>
            
                                    <div class="fields">
                                  
                                            <div class="input-field">
                                                <label>NAME OF FATHER</label>
                                                <input type="text" placeholder="Name of father" name="fathername" onkeyup='fathernameValidation(this)'required>
                                                <span id="fathername" class="new" style="color:red;"></span> 
                                            </div>
                                            <div class="input-field">
                                                <label>FATHER'S MOB NO</label>
                                                <input type="text" placeholder="Father's mobile number" name="fathermob" onkeyup='fmobValidation(this)'required>
                                                <span id="fmob" class="new" style="color:red;"></span> 
                                            </div>
                                            <div class="input-field">
                                                <label>AADHHAR Number</label>
                                                <input type="text" placeholder="Father's adhaaar number" name="fatheraadhar" onkeyup='fadhharValidation(this)'required>
                                                <span id="faadhar" class="new" style="color:red;"></span> 
                                            </div>
                                       
                                            <div class="input-field">
                                                <label>NAME OF MOTHER</label>
                                                <input type="text" placeholder="Name of mother" name="mothername" onkeyup='mothernameValidation(this)'required>
                                                <span id="mothername" class="new" style="color:red;"></span> 
                                            </div>
                                            <div class="input-field">
                                                <label>MOTHER'S MOB NO</label>
                                                <input type="text" placeholder="Mother's mobile number" name="mothermob" onkeyup=mothermobValidation(this)' required>
                                                <span id="mothemob" class="new" style="color:red;"></span> 
                                            </div>
                                            <div class="input-field">
                                                <label>AADHAAR NUMBER</label>
                                                <input type="text" placeholder="Mother's adhaaar number" name="motheraadhar" onkeyup='madhharValidation(this)'required>
                                                <span id="motheraadhar" class="new" style="color:red;"></span> 
                                            </div>   
                                            
                                            <!-- <div class="input-field">
                                                <label>Age of the mother (in completed years) at the time of this delivery </label>
                                                <input type="text" placeholder="Enter ID type" name="acholder" onkeyup='bnameValidation(this)'required>
                                                <span id="nac" class="new" style="color:red;"></span> 
                                            </div>  -->
                                         
                                        
                                       <div>
                                    <header> <span class="title">Documents required </span> </header>
                                      
            
                                    <div class="fields">
                                        <div class="input-field-sm mb-8">
                                        <label>SSLC BOOK</label>
                                        <input type="file"  placeholder="Enter your pic"  name="myfile" id="pImage" required>
                                        </div>
                                        <!-- <div class="input-field">
                                        <label>Aadhaar Card of father</label>
                                        <input type="file"  placeholder="Enter your pic"  name="proimage" id="pImage" required>
                                        </div>
                                        <div class="input-field">
                                        <label>Aadhaar Card of mother</label>
                                        <input type="file"  placeholder="Enter your pic"  name="proimage" id="pImage" required>
                                        </div> -->
                                    </div>
                                       </div>

                                        <button type="submit" value="su" class="nextBtn" name="submit">
                                                <span class="btnText">Submit</span>
                                                <i class="uil uil-navigator"></i>
                                            </button>
        </div>
 
        
       

</form>

</html>
<script>
//     $("#dropdownlist").change(function () {
//   var numInputs = $(this).val();
//   for (var i = 0; i < numInputs; i++)
//     $("#inputArea").append('<input name="inputs[]" />');
// });
    function fnameValidation(inputTxt){
    
    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("first");
        
    if(inputTxt.value != '' ){
    
        if(inputTxt.value.length >=1 ){
        
            if(inputTxt.value.match(regx)){
                textField.textContent = '';
                textField.style.color = "green";
                    
            }else{
                textField.textContent = 'only characters are allowded to insert!';
                textField.style.color = "red";
            }  
        }else{
            textField.textContent = 'your input must more than two chracters';
            textField.style.color = "red";
        }   
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function mnameValidation(inputTxt){
    
    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("middle");
        
    if(inputTxt.value != '' ){
    
        if(inputTxt.value.length >= 1){
        
            if(inputTxt.value.match(regx)){
                textField.textContent = '';
                textField.style.color = "green";
                    
            }else{
                textField.textContent = 'only characters are allowded to insert!';
                textField.style.color = "red";
            }  
        }else{
            textField.textContent = 'your input must more than two chracters';
            textField.style.color = "red";
        }   
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function wnameValidation(inputTxt){
    
    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("ward");
        
    if(inputTxt.value != '' ){
    
        if(inputTxt.value.length >= 1){
        
            if(inputTxt.value.match(regx)){
                textField.textContent = '';
                textField.style.color = "green";
                    
            }else{
                textField.textContent = 'only characters are allowded to insert!';
                textField.style.color = "red";
            }  
        }else{
            textField.textContent = 'your input must more than two chracters';
            textField.style.color = "red";
        }   
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function lnameValidation(inputTxt){
    
    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("last");
        
    if(inputTxt.value != '' ){
    
        if(inputTxt.value.length >= 1){
        
            if(inputTxt.value.match(regx)){
                textField.textContent = '';
                textField.style.color = "green";
                    
            }else{
                textField.textContent = 'only characters are allowded to insert!';
                textField.style.color = "red";
            }  
        }else{
            textField.textContent = 'your input must me more than two chracters';
            textField.style.color = "red";
        } 
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function placeValidation(inputTxt){
    
    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("pal");
        
    if(inputTxt.value != '' ){
    
        if(inputTxt.value.length >= 2){
        
            if(inputTxt.value.match(regx)){
                textField.textContent = '';
                textField.style.color = "green";
                    
            }else{
                textField.textContent = 'only characters are allowded to insert!';
                textField.style.color = "red";
            }  
        }else{
            textField.textContent = 'your input must me more than two chracters';
            textField.style.color = "red";
        } 
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function bplaceValidation(inputTxt){
    
    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("bplace");
        
    if(inputTxt.value != '' ){
    
        if(inputTxt.value.length >= 2){
        
            if(inputTxt.value.match(regx)){
                textField.textContent = '';
                textField.style.color = "green";
                    
            }else{
                textField.textContent = 'only characters are allowded to insert!';
                textField.style.color = "red";
            }  
        }else{
            textField.textContent = 'your input must me more than two chracters';
            textField.style.color = "red";
        } 
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function bnameValidation(inputTxt){
    
    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("bname");
        
    if(inputTxt.value != '' ){
    
        if(inputTxt.value.length >= 2){
        
            if(inputTxt.value.match(regx)){
                textField.textContent = '';
                textField.style.color = "green";
                    
            }else{
                textField.textContent = 'only characters are allowded to insert!';
                textField.style.color = "red";
            }  
        }else{
            textField.textContent = 'your input must me more than two chracters';
            textField.style.color = "red";
        } 
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
     function relationValidation(inputTxt){
    
    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("relation");
        
    if(inputTxt.value != '' ){
    
        if(inputTxt.value.length >= 2){
        
            if(inputTxt.value.match(regx)){
                textField.textContent = '';
                textField.style.color = "green";
                    
            }else{
                textField.textContent = 'only characters are allowded to insert!';
                textField.style.color = "red";
            }  
        }
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function housenameValidation(inputTxt){
    
    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("hname");
        
    if(inputTxt.value != '' ){
    
        if(inputTxt.value.length >= 2){
        
            if(inputTxt.value.match(regx)){
                textField.textContent = '';
                textField.style.color = "green";
                    
            }else{
                textField.textContent = 'only characters are allowded to insert!';
                textField.style.color = "red";
            }  
        }else{
            textField.textContent = 'your input must more than two chracters';
            textField.style.color = "red";
        }   
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function pfoValidation(inputTxt){
    
    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("poff");
        
    if(inputTxt.value != '' ){
    
        if(inputTxt.value.length >= 2){
        
            if(inputTxt.value.match(regx)){
                textField.textContent = '';
                textField.style.color = "green";
                    
            }else{
                textField.textContent = 'only characters are allowded to insert!';
                textField.style.color = "red";
            }  
        }else{
            textField.textContent = 'your input must more than two chracters';
            textField.style.color = "red";
        }   
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}

function pinValidation(inputTxt){
    // ^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$
    var regx =/[1-9][0-9]{5}$/;
    var textField = document.getElementById("pinc");
        
    if(inputTxt.value != '' ){
        if(inputTxt.value.match(regx)){
            textField.textContent = '';
            textField.style.color = "green";
        }else{
            textField.textContent = 'your are trying to enter wrong input values';
            textField.style.color = "red";
        }  
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function mobileValidation(inputTxt){
    // ^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$
    var regx =/^\d{10}$/;
    var textField = document.getElementById("mob");
        
    if(inputTxt.value != '' ){
        if(inputTxt.value.match(regx)){
            textField.textContent = '';
            textField.style.color = "green";
        }else{
            textField.textContent = 'your are trying to enter wrong input values';
            textField.style.color = "red";
        }  
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function aadharValidation(inputTxt){
   
       var regx = /^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/;
       var textField = document.getElementById("aadhar");
           
       if(inputTxt.value != '' ){
           if(inputTxt.value.match(regx)){
               textField.textContent = '';
               textField.style.color = "green";
           }else{
               textField.textContent = 'Your aadhar number  is not valid!!! please insert a valid one';
               textField.style.color = "red";
           }  
       }else{
           textField.textContent = 'your are not allowed  to leave a field  empty';
           textField.style.color = "red";
       }
   }
   function bnameValidation(inputTxt){
    
    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("nob");
        
    if(inputTxt.value != '' ){
    
        if(inputTxt.value.length >= 2){
        
            if(inputTxt.value.match(regx)){
                textField.textContent = '';
                textField.style.color = "green";
                    
            }else{
                textField.textContent = 'only characters are allowded to insert!';
                textField.style.color = "red";
            }  
        }else{
            textField.textContent = 'your input must more than two chracters';
            textField.style.color = "red";
        }   
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function fathernameValidation(inputTxt){
    
    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("fathername");
        
    if(inputTxt.value != '' ){
    
        if(inputTxt.value.length >= 2){
        
            if(inputTxt.value.match(regx)){
                textField.textContent = '';
                textField.style.color = "green";
                    
            }else{
                textField.textContent = 'only characters are allowded to insert!';
                textField.style.color = "red";
            }  
        }else{
            textField.textContent = 'your input must more than two chracters';
            textField.style.color = "red";
        }   
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function fmobValidation(inputTxt){
    // ^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$
    var regx =/^\d{10}$/;
    var textField = document.getElementById("fmob");
        
    if(inputTxt.value != '' ){
        if(inputTxt.value.match(regx)){
            textField.textContent = '';
            textField.style.color = "green";
        }else{
            textField.textContent = 'your are trying to enter wrong input values';
            textField.style.color = "red";
        }  
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function fadhharValidation(inputTxt){
   
   var regx = /^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/;
   var textField = document.getElementById("faadhar");
       
   if(inputTxt.value != '' ){
       if(inputTxt.value.match(regx)){
           textField.textContent = '';
           textField.style.color = "green";
       }else{
           textField.textContent = 'Your aadhar number  is not valid!!! please insert a valid one';
           textField.style.color = "red";
       }  
   }else{
       textField.textContent = 'your are not allowed  to leave a field  empty';
       textField.style.color = "red";
   }
}
function mothernameValidation(inputTxt){
    
    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("mothername");
        
    if(inputTxt.value != '' ){
    
        if(inputTxt.value.length >= 2){
        
            if(inputTxt.value.match(regx)){
                textField.textContent = '';
                textField.style.color = "green";
                    
            }else{
                textField.textContent = 'only characters are allowded to insert!';
                textField.style.color = "red";
            }  
        }else{
            textField.textContent = 'your input must more than two chracters';
            textField.style.color = "red";
        }   
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function mothermobValidation(inputTxt){
    // ^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$
    var regx =/^\d{10}$/;
    var textField = document.getElementById("mothemob");
        
    if(inputTxt.value != '' ){
        if(inputTxt.value.match(regx)){
            textField.textContent = '';
            textField.style.color = "green";
        }else{
            textField.textContent = 'your are trying to enter wrong input values';
            textField.style.color = "red";
        }  
    }else{
        textField.textContent = 'your are not allowed  to leave a field  empty';
        textField.style.color = "red";
    }
}
function madhharValidation(inputTxt){
   
   var regx = /^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/;
   var textField = document.getElementById("motheraadhar");
       
   if(inputTxt.value != '' ){
       if(inputTxt.value.match(regx)){
           textField.textContent = '';
           textField.style.color = "green";
       }else{
           textField.textContent = 'Your aadhar number  is not valid!!! please insert a valid one';
           textField.style.color = "red";
       }  
   }else{
       textField.textContent = 'your are not allowed  to leave a field  empty';
       textField.style.color = "red";
   }
}
function motherageValidation(inputTxt){
   
   
   var textField = document.getElementById("motherage");
       
   if(inputTxt.value != '' ){
       if(inputTxt.value < 18){
           
           textField.textContent = 'Your age is not valid!!! please insert a valid one';
           textField.style.color = "red";
       }else{
        textField.textContent = '';
           textField.style.color = "green";
       }  
   }else{
       textField.textContent = 'your are not allowed  to leave a field  empty';
       textField.style.color = "red";
   }
}
function bnumValidation(inputTxt){
   
    var regx = /^[a-zA-Z]+$/;
   var textField = document.getElementById("bnum");
       
   if(inputTxt.value != ''){
       if(inputTxt.value < 1){
           
           textField.textContent = ' please enter a valid input';
           textField.style.color = "red";
       }else{
        textField.textContent = '';
           textField.style.color = "green";
       }  
   }else{
       textField.textContent = 'your are not allowed  to leave a field  empty';
       textField.style.color = "red";
   }
}
 </script> 