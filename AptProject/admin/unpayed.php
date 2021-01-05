<!DOCTYPE html>
<html lang="en">

 <?php 
include "checkadminlogin.php";
include "../config.php";

        $duesquery = "SELECT SUM(price) FROM actions WHERE paydate >= '2021/01/01' and paydate <= '2021/01/31'";
         $result = mysqli_query($con, $duesquery);
         $row = mysqli_fetch_array($result);
         
         $monthquery = "SELECT SUM(dues) FROM flat ";
         $result1 = mysqli_query($con, $monthquery);
         $row1 = mysqli_fetch_array($result1);
         
         $duesquery1 = "SELECT SUM(price) FROM actions WHERE paydate >= '2021/01/01' and paydate <= '2021/01/31' ";
         $result2 = mysqli_query($con, $duesquery1);
         $row2 = mysqli_fetch_array($result2);

         $subs = $row1[0] - $row2[0];
         
         $doornumber = $_SESSION['doornumber'];

         $monthquery2 = "SELECT dues FROM flat WHERE doornumber='$doornumber'";
         $result3 = mysqli_query($con, $monthquery2);
         $row3 = mysqli_fetch_array($result3);
         
         $duesquery3 = "SELECT SUM(price) FROM expanse WHERE adddate >= '2021/01/01' and adddate <= '2021/01/31'";
         $result4 = mysqli_query($con, $duesquery3);
         $row4 = mysqli_fetch_array($result4);
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
            <a class="navbar-brand" href="home.php">Admin Panel Apartment Management Systems</a>
            
            
            <!-- Navbar-->
            <ul class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-address-card"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="" href="logoutadmin.php">Logout</a>
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
                           
                           
                                    <a class="nav-link" href="unpayed.php">Unpayed Dues</a>
                                    
                                    <a class="nav-link" href="expenses.php">Expenses</a>
                                    <a class="nav-link" href="dueshistory.php">Dues History</a>
                                    <a class="nav-link" href="neighbours.php">Residents List</a>
                                    <a class="nav-link" href="addnewresident.php">Add New Residents </a>
                                    <a class="nav-link" href="moveout.php">Delete Residents</a>
                            
                        </div>
                    </div>
                    
                </nav>
            </div>
			
            <div id="layoutSidenav_content">
                <main>
                  
                     
                      <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card bg-light mb-4  py-3">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                             <h5 class="mt-4"></h5>  <div class="text-xs font-weight-bold text-success text-uppercase mb-3">
                                                All Unpayed Debts</div>
                                           <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $subs . " TL "; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-donate fa-5x text-gray-300"></i>
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