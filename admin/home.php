<!DOCTYPE html>
<html lang="en">

 <?php 
include "checkadminlogin.php";
include "../config.php";

        $errors = array();

        $duesquery = "SELECT SUM(price) FROM transaction WHERE MONTH(paydate) = MONTH(CURRENT_DATE()) AND YEAR(paydate) = YEAR(CURRENT_DATE())";
         $result = mysqli_query($con, $duesquery);
         $row = mysqli_fetch_array($result);

         $duesquery22 = "SELECT SUM(amount) FROM dues WHERE MONTH(ddate) = MONTH(CURRENT_DATE()) AND YEAR(ddate) = YEAR(CURRENT_DATE()) AND isactivedue = '0'";
         $result22 = mysqli_query($con, $duesquery22);
         $row22 = mysqli_fetch_array($result22);
         
         $monthquery = "SELECT SUM(amount) FROM dues WHERE MONTH(ddate) = MONTH(CURRENT_DATE()) AND YEAR(ddate) = YEAR(CURRENT_DATE()) ";
         $result1 = mysqli_query($con, $monthquery);
         $row1 = mysqli_fetch_array($result1);
         
    

         $subs = $row1[0] - $row22[0];
         
         $userid = $_SESSION['id'];
         $doornumber = $_SESSION['doornumber'];
         
         $monthquery2 = "SELECT amount FROM dues WHERE flatid='$doornumber' AND MONTH(ddate) = MONTH(CURRENT_DATE()) AND YEAR(ddate) = YEAR(CURRENT_DATE())";
         $result3 = mysqli_query($con, $monthquery2);
         $row3 = mysqli_fetch_array($result3);
         
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
                           
                                  
                                  
                                   
								
									 <a class="nav-link" href="adddues.php">Add Monthly Dues</a>
                                    <a class="nav-link" href="detduesdoornumber.php">Determine Dues(Door Number)</a>
                                    <a class="nav-link" href="detdues.php">Determine Dues(Block)</a>
                                    <a class="nav-link" href="dueshistory.php">Dues History</a>
                                    <a class="nav-link" href="paymenthistory.php">Payment History</a>
									
									 <a class="nav-link" href="expenses.php">Expense</a>
                                    <a class="nav-link" href="expenselist.php">Expense List</a>
									 <a class="nav-link" href="neighbours.php">Residents List(Active)</a>
									 <a class="nav-link" href="addnewresident.php">Add New Resident</a>
									  <a class="nav-link" href="moveout.php"> Move Out Resident</a>
									  <a class="nav-link" href="neighboursall.php">Residents List(All)</a>
									  <a class="nav-link" href="uncollected.php">Uncollected Dues List</a>
									 
									 
                            
                        </div>
                    </div>
                    
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <div class="row">
                     
                                 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
						
                         
                       
                        
                    <div class="container-fluid">
                        <h1 class="mt-4">Hello Admin!</h1>
                        <div class="card mb-4">
                            
                        </div>
						 <div class="container-fluid">
                        <h1 class="mt-4">Attention!</h1>
                        
                        
                        <div class="card mb-4">
                        
                            
                              
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      
                                            
                                                <th>Date</th>
                                                <th>Announcement</th>       

                                       
                                        <tbody>
                                            <?php
                                            while($row21 = mysqli_fetch_array($result21)){   
                                            echo "<tr><td>" . $row21['date'] . "</td><td>" . $row21['annodetail']  . "</td></tr>";  
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                               
                          
                        </div>
                    </div>
                    </div>
					      
                    <div class="container-fluid">
                        <h1 class="mt-5"><?php $row33 ?></h1>
                        <div class="card mb-5">
                            
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