<?php

include("dbconn.php");
?>

<form action="" method="POST">

<div class="container" style="margin-left:250px;">
<?php
if(isset($_GET['id']))
{
 $lid=$_GET['id'];
  $result=mysqli_query($conn,"UPDATE tbl_nativity SET status='Approved' where email=$lid");
 }
if($result)
{
echo "<script>alert('For request has Been Approved. Thank you');window.location='viewapp.php';</script>";
}
?>