<?php
include "../dbconn.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        #admin-heading {
  display: inline;
  
}

        </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="styles.css">
    <title>Admin panel</title>
</head>


<body>
    <div class="container">
        <div class="topbar">
            <div class="logo">
                <h2>E-Taluk</h2>
               
                
               
</div>
                
           <!-- <div class="search">
                <a href="phpSearch.php">
                <input type="text" name="search" placeholder="search here">
                <label for="search"><i class="fas fa-search"></i></label>
            </div>-->
            
                
         
           <!-- <div class="search">
                <a href="phpSearch.php">
                <input type="text" name="search" placeholder="search here">
                <label for="search"><i class="fas fa-search"></i></label>
            </div>-->
           

            <h4 id="admin-heading"  style="text-align: right;">Welcome Admin</h4> 
        </div>
        <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  &nbsp; <a href="..\logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        
        <div class="sidebar">
            <ul>
                <li>
                    <a href="index.php">
                        <i class="fas fa-th-large"></i>
                        <div>Dashboard</div>
                    </a>
                
                <li>
                    <a href="stafreg.php">
                        <i class="fas fa-user-graduate"></i>
                        <div>Register Staff</div>
                        
                        
                    </a>
                </li>
                <li>
                    <a href="alertnoti.php">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <div>Alert User </div>
      
                      
                    </a>
</li>
                    <li>
                    <a href="survey.php">
                        <i class="fas fa-users"></i>
                        <div>Assign Duty</div>
                    </a>
                </li>
              
                
                <li>
                    <a href="viewleave.php">
                        <i class="fas fa-users"></i>
                        <div>Course</div>
                    </a>
                </li>
                <li>
                    <a href="addsubject.php">
                        <i class="fas fa-chart-bar"></i>
                        <div>Subjects</div>
                    </a>
                </li>
                <li>
                    <a href="addclsteacher.php">
                        <i class="fa fa-info-circle"></i>
                        <div>Teacher allocation</div>
                    </a>
                </li>
                <li>
                    <a href="tattendance.php">
                        <i class="fa fa-info-circle"></i>
                        <div>Take Attendance</div>
                    </a>
                </li>
                <li>
                    <a href="tvattendance.php">
                        <i class="fa fa-info-circle"></i>
                        <div>View Attendance</div>
                    </a>
                </li>
                <li>
                    <a href="attendancereport.php">
                        <i class="fa fa-info-circle"></i>
                        <div>Attendance Report</div>
                    </a>
                </li>
               
                <li>
                    <a href="logout.php">
                        <i class="fa fa-power-off"></i>
                        <div>Logout</div>
                    </a>
                </li>
               
            </ul>
        </div>
        <div class="main">
            <div class="cards">
                <div class="card">
                    <div class="card-content">
                        <div class="number"></div>
                        <div class="card-name">Students</div>
                        
                        <br>
                        
   
    <div class="dropdown-content">
      <a href="sreg.php">Register</a>&nbsp;
      
      
    </div>
  </li>


                    </div>
                    <div class="icon-box">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number"></div>
                        <div class="card-name">Teachers</div><br>
                        <a href="treg.php">Register</a>&nbsp;
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                </div>

                <div class="card">
                    <div class="card-content">
                        <div class="number"></div>
                        <div class="card-name">parent</div><br>
                        <a href="preg.php">Register</a>&nbsp;
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                </div>
                
               
                   
              
</body>

</html>