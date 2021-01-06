<!DOCTYPE html>
<html lang="en">

 <?php 
include "checkuserlogin.php";
include "../config.php";



         $duesquery = "SELECT SUM(price) FROM actions WHERE paydate >= '2021/01/01' and paydate <= '2021/01/31'";
         $result = mysqli_query($con, $duesquery);
         $row = mysqli_fetch_array($result);

         $doornumber = $_SESSION['doornumber'];

         $monthquery = "SELECT dues FROM flat WHERE doornumber='$doornumber'";
         $result1 = mysqli_query($con, $monthquery);
         $row1 = mysqli_fetch_array($result1);
         
         $duesquery1 = "SELECT SUM(price) FROM actions WHERE paydate >= '2021/01/01' and paydate <= '2021/01/31' and doornumber='$doornumber'";
         $result2 = mysqli_query($con, $duesquery1);
         $row2 = mysqli_fetch_array($result2);

         $duesquery2 = "SELECT SUM(price) FROM expanse WHERE adddate >= '2021/01/01' and adddate <= '2021/01/31'";
         $result3 = mysqli_query($con, $duesquery2);
         $row3 = mysqli_fetch_array($result3);
		 
		 $monthquery4 = "SELECT projedetails FROM flat WHERE doornumber='1'";
         $result111 = mysqli_query($con, $monthquery4);
         $det = mysqli_fetch_array($result111);
		 
		 $det['projedetails'];
		 
		 $monthquery5 = "SELECT projecost FROM flat WHERE doornumber='1'";
         $result1111 = mysqli_query($con, $monthquery5);
         $cost = mysqli_fetch_array($result1111);
		 
		 
		 $cost['projecost'];

         $subs = $row1['dues'] - $row2[0];
		 
		 $final= $row[0]-$cost['projecost'];
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
                           
                             <a class="nav-link" href="yourdebt.php">Your Debt</a>
							  <a class="nav-link" href="ekstralar.php">Expense Detail</a>
                                   <a class="nav-link" href="joker.php">Apartment's Money</a>
                                    <a class="nav-link" href="aidat.php">Dues</a>
                                    <a class="nav-link" href="dueshistory.php">Dues History</a>
                                    <a class="nav-link" href="neighbours.php">Residents List</a>
                                  
                            
                        </div>
                    </div>
                  
                </nav>
            </div>
<div id="layoutSidenav_content">
                <main>
                	<div class="row">
                	  <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Apartman Income
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row[0] . " USD "; ?></div>
                                        </div>
                                        <div class="col-auto">
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $det['projedetails'] . " Costs ". $cost['projecost']. " USD "; ?></div>
                                        </div>
                                        <div class="col-auto">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               Remaining Money </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $final. " USD "; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>