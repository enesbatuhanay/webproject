<!DOCTYPE html>
<html lang="en">

 <?php 
include "checkadminlogin.php";
include "../config.php";
        
		
		$duesquery2 = "SELECT SUM(price) FROM actions WHERE paydate >= '2021/01/01' and paydate <= '2021/01/31'";
         $result12 = mysqli_query($con, $duesquery2);
         $row = mysqli_fetch_array($result12);
            
        $duesquery = "SELECT * FROM flat";
        $result = mysqli_query($con, $duesquery);
        $doornumber = array();
        $result1= array();
        while($row1 = mysqli_fetch_array($result)){           
            $subs = $row1[4] - $row1[5];
            
        
            if($subs > 0) { $duesquery1 = "SELECT * FROM users INNER JOIN flat ON users.doornumber = flat.doornumber where id NOT IN (select userid from actions WHERE paydate >= '2021/01/01' and paydate <= '2021/01/31') AND status = 'active' ORDER BY users.doornumber ASC ";
            $result1 = mysqli_query($con, $duesquery1);
                 
        }
        }
        
        
            
            
            
  ?>





<head><meta charset="utf-8" />
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
                           
                                   <a class="nav-link" href="changerent.php">Rent Update</a>
                                   <a class="nav-link" href="uncollected.php">Unpayed Dues</a>
                                     <a class="nav-link" href="apartmanproject.php">Apartment Projects</a>
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
                   <div class="container-fluid">
                        <h1 class="mt-4">Unpayed Residents List</h1>
                         <div class="card mb-4">
                           
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                       
                                            <tr>
                                                <th>Name</th>
                                                <th>Surname</th>
                                                <th>Username</th>
                                                <th>Door Number</th>
                                                <th>Dues</th>
                                            </tr>
                                      
                                       
                                        <tbody>
                                            <?php
                                            while($row3 = mysqli_fetch_array($result1)){ 
                                            echo "<tr><td>" . $row3['firstname'] . "</td><td>" . $row3['lastname'] . "</td><td>" . $row3['loginname'] ."</td><td>" . $row3['doornumber'] . "</td><td>" . $row3['dues']  . "</td></tr>";  
                                            }

                                            ?>
                                            
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
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