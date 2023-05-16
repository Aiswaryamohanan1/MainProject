<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Display PDF</title>
    <style media="screen">
      embed{
        border: 2px solid black;
        margin-top: 30px;
      }
      .div1{
        margin-left: 170px;
      }
    </style>
  </head>
  <body>
    <div class="div1">
      <?php
      include '../dbconn.php';
      $id=$_REQUEST['id'];
      $sql="SELECT pdf from tbl_nativity WHERE email='$id'";
      $query=mysqli_query($conn,$sql);
      while ($info=mysqli_fetch_array($query)) {
        ?>
      <embed type="application/pdf" src="../pdfcas/<?php echo $info['pdf'] ; ?>" width="1300" height="550">
    <?php
      }

      ?>

    </div>

  </body>
</html>
