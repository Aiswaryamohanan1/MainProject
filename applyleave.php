<?php include ('dbconn.php');
if(isset($_POST['submit']))
{ 
  
  $f=$_POST["time"];
    $reason=$_POST["reason"];
   
    $date=$_POST["date"];
    
    $user_reg ="INSERT INTO `leave` (`fname`, `reason`, `time`) VALUES ('$fname','$reason','$time')";
        $user_reg_query = mysqli_query($conn,$user_reg);
    
}
?>
<html>
<head><title>Apply Leave</title>
    <link rel="stylesheet" href="css/leave.css"></head>
    <body>
<div class="container">

    <form action="action_page.php">
      <div class="row">
        <div class="col-25">
          <label for="fname">fname</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="fname" placeholder="Your name..">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Reason</label>
        </div>
        <div class="col-75">
          <input type="text" id="reason" name="reason" placeholder="Reason">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="country">Day</label>
        </div>
        <div class="col-75">
          <select id="time" name="time">
            <option value="australia">Full Day</option>
            <option value="canada">FN</option>
            <option value="usa">AN</option>
          </select>
        </div>
      </div>
      
      <div class="row">
        <input type="submit" value="Apply">
      </div>
    </form>
  </div>
</body>
</html>
