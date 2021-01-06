<!DOCTYPE html>
<html lang="en">

 <?php 
include "checkadminlogin.php";
include "../config.php";

$errors = array(); 

    if (isset($_POST['but_submit'])) {

    $expense = mysqli_real_escape_string($con, $_POST['expense']);
	 $dn = mysqli_real_escape_string($con, $_POST['dn']);
	  
	  $detail = mysqli_real_escape_string($con, $_POST['detail']);
  

    
    
    if (empty($expense)) { array_push($errors, "First Name is required"); }
   
   

    if($dn <= 0) {
        array_push($errors, "Please enter valid price");
    }


    if (count($errors) == 0) {
    

        $query = "UPDATE flat SET expense1 = '$expense' WHERE doornumber = '$dn'";
			$query2 = "UPDATE flat SET details = '$detail' WHERE doornumber = '$dn'";
	
         mysqli_query($con, $query);
		   mysqli_query($con, $query2);
        
		 
		 
		 
  }
}

	$neigquery = "SELECT * FROM flat ";
  	$result = mysqli_query($con, $neigquery);


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
                	 <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <?php include('errors.php'); ?>
                                            <div class="form-row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        
                                                        <input class="form-control py-4" id="inputFirstName" name="expense" type="number" placeholder="Enter Expense" />
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group">
                                             
                                                <input class="form-control py-4" id="inputPrice" name="dn" type="number" placeholder="Enter Doornumber" />
                                            </div>
                                            <div class="form-group">
                                                 <div class="form-group">
                                               
                                                <input class="form-control py-4" id="inputPhoneNumber" name="detail" type="text" placeholder="Enter Detail" />
                                            </div>
                                               
                                                   
                                                </div>
                                              

                                            <input type="submit" class="btn btn-primary btn-block" value="Pay Now" name="but_submit" id="but_submit" href="login.php"/>
                                    
                                        </form>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>



 <div id="layoutSidenav_content">
                <main>
                	 
                	 <div class="container-fluid">
                        <h1 class="mt-4">Espenses List</h1>
                        
                        
                        <div class="card mb-4">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      
                                            <tr>
                                                <th>Doornumber</th>
                                                <th>Price</th>
                                                <th>Details</th>
                                              
                                            </tr>
                                       
                                     
                                        <tbody>
                                        	<?php
                                        	while($row = mysqli_fetch_array($result)){   
											echo "<tr><td>" . $row['doornumber'] . "</td><td>" . $row['expense1'] . "</td><td>" . $row['details'] . "</td></tr>";  
											}
											?>
                                            
                                          
                                        </tbody>
                                    </table>
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