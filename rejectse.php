<?php

include("dbconn.php");
?>

<form action="" method="POST">

<div class="container" style="margin-left:250px;">
<?php
if(isset($_GET['id']))
{
 $lid=$_GET['id'];
  $result=mysqli_query($conn,"UPDATE tbl_caste SET status='Rejected' where Regid=$lid");
  
}
if($result)
{
echo "<script>alert('Your Application Reject Because Of InSufficient Detail. Thank you');window.location='viewapp.php';</script>";
}
?>