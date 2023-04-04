<?php

include("dbconn.php");
?>

<form action="" method="POST">

<div class="container" style="margin-left:250px;">
<?php
if(isset($_GET['id']))
{
 $lid=$_GET['id'];
  $result=mysqli_query($conn,"UPDATE applyleave SET status='Rejected' where lid=$lid");
  
}
if($result)
{
echo "<script>alert('leave details has been removed successfully. Thank you');window.location='viewleave.php';</script>";
}
?>