<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> &nbsp; <a href="..\logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                    </li>


                    <li>
                        <a class="active-menu" href="index.html"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="stafreg.php"><i class="fa fa-plus fa-3x"></i>Add Staff</a>
                    </li>
                    <li>
                    <a  href="viewapplication.php"><i class="fa fa-eye fa-3x"></i>View</a>
                    </li>
                    <li>
                        <a href="alertpnot.php"><i class="fa fa-bar-chart-o fa-3x"></i>Notification To User</a>
                    </li>
                    <li>
                        <a href="viewleave.php"><i class="fa fa-eye fa-3x"></i>View Leave Application</a>
                    </li>
                    <li>
                        <a href="table.php"><i class="fa fa-table fa-3x"></i>Table Places</a>
                    </li>
                    <li>
                        <a href="predict.php"><i class="fa fa-table fa-3x"></i>Predict</a>
                    </li>
                    <li>
                        <a href="viewapp.php"><i class="fa fa-square-o fa-3x"></i>View Applications</a>
                    <li><a href="viewapp.php">Caste</a></li>
                    <li><a href="viewiapp.php">Income</a></li>
                    <li><a href="viewpk.php">Pokkuvaravu</a></li>
                    <li><a href="viewnativity.php">Nativity</a></li>

                    </ol>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Death Prediction</h2>
                        <h5>Welcome Tahasildar </h5>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                ----------
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <label for="month">Select a disease:</label>
                                    <select id="disease-select">
                                        <option value="" selected disabled>-Select Disease-</option>
                                        <option value="Stroke">Stroke</option>
                                        <option value="Cancer">Cancer</option>
                                        <option value="Heart Disease">Heart Disease</option>
                                        <option value="Pneumonia">Pneumonia</option>
                                        <option value="Flu">Flu</option>
                                    </select>
                                    <br><br>
                                    <div id="result"></div>
                                    <div id="accuracy"></div>


                                </div>
                            </div>

                        </div>

                        </section>
                        <!-- footer -->

                        <!-- / footer -->
                        </section>

                        <!--main content end-->
                        </section>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="js/bootstrap.js"></script>
                        <script src="js/jquery.dcjqaccordion.2.7.js"></script>
                        <script src="js/scripts.js"></script>
                        <script src="js/jquery.slimscroll.js"></script>
                        <script src="js/jquery.nicescroll.js"></script>
                        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
                        <script src="js/jquery.scrollTo.js"></script>
                        <script>
                            $(document).ready(function() {
                                // When the select input value changes
                                $('#disease-select').on('change', function() {
                                    // Get the selected disease value
                                    var selectedDisease = $(this).val();
                                    // Send an AJAX request to the Flask server
                                    $.ajax({
                                        type: 'POST',
                                        url: 'http://localhost:5000/predict_death_percentage',
                                        data: {
                                            disease: selectedDisease
                                        },
                                        success: function(result) {
                                            console.log(result);
                                            // Display the result on the webpage
                                            $('#result').text("Chances of " + result.disease + " in the 2023 of total population: " + result.result + "%");
                                            $('#accuracy').text('Accuracy: ' + result.accuracy);
                                        },
                                        error: function() {
                                            // Display an error message if the request fails
                                            $('#result').text('Error: Failed to get the prediction result.');
                                        }
                                    });
                                });
                            });
                        </script>
</body>

</html>