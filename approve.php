<?php

include("../dbconn.php");
?>

<form action="" method="POST">

<div class="container" style="margin-left:250px;">
<?php
if(isset($_GET['id']))
{
 $lid=$_GET['id'];
  $result=mysqli_query($conn,"UPDATE tbl_leave SET leavestatus='1' where tid=$lid");
  
}
if($result)
{
echo "<script>alert('leave details has been accepted successfully. Thank you');window.location='viewleave.php';</script>";
}
?>