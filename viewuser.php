<?php
    session_start(); 
    include 'dbconn.php';
     if(isset($_SESSION['typename']))
     {
                                      // echo 'inside';                          
                            // echo '<a href="profile.php">'      
                                          // echo '<h2> welcome'.$_SESSION['username'].'</h2>';
                                  }
    ?>


<html>
    <head>
           <style>
#approve {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #approve td, #approve th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        /* #builder tr:nth-child(even){background-color: #f2f2f2;} */

        #approve tr:hover {background-color: #ddd;}

        #approve th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: grey;
        color: white;
        }
        </style>
        <body>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <table id ="approve"  class="content-table">

                                            <tr>
                                                <th>Slno</th>
                                                <th>First Name</th>&nbsp;&nbsp;
                                                <th>Last Name</th>&nbsp;&nbsp;
                                                <th>Mobile</th>&nbsp;&nbsp;
                                                <th>Email</th>&nbsp;&nbsp;
                                                <th>Aadhar</th>&nbsp;&nbsp;
                                                <th>Address</th>&nbsp;&nbsp;
                                                <th>Street</th>&nbsp;&nbsp;
                                                
                                                
                                                
                                                

                                               
                                            </tr>
                                            <?php 

                                            
                                            $query="SELECT * From userreg ORDER BY Rid ASC";
                                            $result=mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_array($result))
                                            {
                                    
                                            ?>
                                    
                                            <tr>
                                                <td><?php echo $row['Rid'];?></td>
                                                <td><?php echo $row['fname'];?></td>
                                                <td><?php echo $row['lastname'];?></td>
                                                <td><?php echo $row['mobile'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['Aadhar'];?></td>
                                                <td><?php echo $row['address'];?></td>
                                                <td><?php echo $row['street'];?></td>
                                               
                                                
	
                                                
                                                
                                                
                                                
                                             
                                               
                                            </td>
                                            </tr>
                                       
                                        <?php
                                        }
                                        ?>
                                         </table>
                                        </div>              