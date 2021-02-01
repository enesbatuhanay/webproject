<!DOCTYPE html>
<html lang="en">

 <?php 
require "checkuserlogin.php";
include "../config.php";

        $errors = array();

        $userid = $_SESSION['id'];
         $doornumber = $_SESSION['doornumber'];

        $monthquery2 = "SELECT amount FROM dues WHERE flatid='$doornumber' AND MONTH(ddate) = MONTH(CURRENT_DATE()) AND YEAR(ddate) = YEAR(CURRENT_DATE())";
         $result3 = mysqli_query($con, $monthquery2);
         $row3 = mysqli_fetch_array($result3);


         $duesquery22 = "SELECT SUM(amount) FROM dues WHERE  isactivedue = '1' AND flatid = '$doornumber' ";
         $result22 = mysqli_query($con, $duesquery22);
         $row22 = mysqli_fetch_array($result22);

         $duesquery = "SELECT SUM(price) FROM transaction WHERE MONTH(paydate) = MONTH(CURRENT_DATE()) AND YEAR(paydate) = YEAR(CURRENT_DATE())";
         $result = mysqli_query($con, $duesquery);
         $row = mysqli_fetch_array($result);
         

         $duesquery3 = "SELECT SUM(price) FROM expanse WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())";
         $result4 = mysqli_query($con, $duesquery3);
         $row4 = mysqli_fetch_array($result4);

         $exquery = "SELECT * FROM announcement WHERE isactive = '1'";
         $result21 = mysqli_query($con, $exquery);
  ?>



      <head>
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
                            <a class="nav-link" href="debtcheck.php">Dues Control</a>
                            <a class="nav-link" href="aidat.php">Dues</a>
                                    <a class="nav-link" href="dueshistory.php">Dues History</a>
                                    <a class="nav-link" href="paymenthistory.php">Payment History</a>
									 <a class="nav-link" href="expenselist.php">Expense List</a>
									  <a class="nav-link" href="apartproject.php">Apartment Project</a>
									  <a class="nav-link" href="neighbours.php">Neighnours</a>
									  
                                 
                            
                        </div>
                    </div>
                  
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                	<div class="row">
                	 
                      
                        
                         
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card bg-light mb-4  py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success  text-uppercase mb-3">
                                             Your debt ! </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row22[0] . " TL "; ?></div>
											
											
											
											
											
											
											
											
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-money-bill-wave fa-5x text-gray-300 "  ></i>
											
											
											<a class=" text-xs font-weight-bold  text-danger  nav-link" href="aidat.php">Click to Pay!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						 <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card bg-light mb-4  py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success  text-uppercase mb-3">
                                                Apartment Cost With Expanses! </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row4[0] . " TL "; ?></div>
											
											
											
											
											
											
											
											
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-money-bill-wave fa-5x text-gray-300 "  ></i>
											
											
											<a class=" text-xs font-weight-bold  text-danger  nav-link" href="aidat.php">Click to Pay!</a>
                                        </div>
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
    </body>
</html>