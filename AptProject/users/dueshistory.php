<!DOCTYPE html>
<html lang="en">


 <?php 
include "checkuserlogin.php";
include "../config.php";

	$id = $_SESSION['id'];

	$duesquery = "SELECT doornumber, userid, name, surname, price, paydate FROM actions WHERE userid='$id'";
  	$result = mysqli_query($con, $duesquery);
  	
  	
?>


 <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>AMS</title>
        <link href="styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-white bg-dark">
            <a class="navbar-brand" href="home.php">Menu of Apartment Management Systems For Residents</a>
            
            
            <!-- Navbar-->
            <ul class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-address-card"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="logoutcustomer.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                           
                            <a class="nav-link" href="home.php">
                    
                                <h5 class="mt-4">HOME PAGE</h5>
                            </a>
                           
                             <a class="nav-link" href="yourdebt.php">Your Debt</a>
                          <a class="nav-link" href="joker.php">Apartment's Money</a>
                                    <a class="nav-link" href="aidat.php">Dues</a>
                                    <a class="nav-link" href="dueshistory.php">Dues History</a>
                                    <a class="nav-link" href="neighbours.php">Residents List</a>
                                    <a class="nav-link" href="flathistory.php">History</a>
                            
                        </div>
                    </div>
                  
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                	 
                	 <div class="container-fluid">
                        <h1 class="mt-4">Dues History</h1>
                        <div class=>
                           
                            <div class=>
                               
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      
                                            <tr>
                                                <th>Name</th>
                                                <th>Surname</th>
                                                <th>Door Number</th>
                                                <th>Price</th>
                                                <th>Pay Date</th>
                                                
                                            </tr>
                                      
                                       
                                        <tbody>
                                        	<?php
                                        	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
											echo "<tr><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $row['doornumber'] ."</td><td>" . $row['price'] . "</td><td>" . $row['paydate'] . "</td></tr>";  //$row['index'] the index here is a field name
											}
											?>
                                            
                                          
                                        </tbody>
                                   
                                </div>
                            </div>
                        </div>
                    </div>


                    
                </main>
                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-demo.js"></script>
    </body>
</html>