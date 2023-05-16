<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="alogin.css">
    <title>Login Page</title>
</head>
 
<body>
    <form action="" method="post">
        <div class="login-box">
            <h1>Login</h1>
 
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username"
                         name="email" value="">
            </div>
 
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password"
                         name="password" value="">
            </div>

            <input class="button" type="submit"
                     name="login" value="Sign In">

                     <br><a href="forgot.php">Forgot password</a>Not an User?<a href="userreg.php">Register Now</a>
        </div>
    </form>
</body>
 
</html>
<?php
session_start(); 
include 'dbconn.php';
if(isset($_POST['login'])){
    $user = $_POST['email'];
    $password = $_POST['password'];
    //$abc=md5($_POST['password']);
    $login_check = "SELECT * FROM u_login where email='$user' and password='$password'";
	$login_check_result = mysqli_query($conn, $login_check);
    $row = mysqli_fetch_array($login_check_result);
    if($row>0){
        $type=$row["typeno"];
        echo $type;
        if($type==3){
            $_SESSION["email"] = $row["email"];
            
            header("location: userdash.php");
        }
        else if($type==2){
            $_SESSION["email"] = $row["email"];
           
            header("location:..\staffdash.php");
        }
        else if($type==1){
          $_SESSION["email"] = $row["email"];
          
          header("location: adminindex.php");
      }
      
    
    else{
        echo '<script> alert ("Invalid credentials");</script>';
	    echo'<script>window.location.href="akogin.php";</script>';
    }
    }
    else{
        echo '<script> alert ("Invalid credentials");</script>';
	    echo'<script>window.location.href="akogin.php";</script>';
    
    }
}
?>