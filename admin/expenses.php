<!DOCTYPE html>
<html lang="en">

 <?php 
include "checkadminlogin.php";
include "../config.php";

    $errors = array();
    $userid = $_SESSION['id']; 

    if (isset($_POST['but_submit'])) {
        
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $price = mysqli_real_escape_string($con, $_POST['price']);
        $details = mysqli_real_escape_string($con, $_POST['details']);
        $date = mysqli_real_escape_string($con, $_POST['date']);

        if (empty($name)) { array_push($errors, "Name is required"); }
        if (empty($price)) { array_push($errors, "Price is required");}
        if (empty($details)) { array_push($errors, "Details is required"); }
        if (empty($date)) { array_push($errors, "Date is required"); }

         if($price <= 0) {
        array_push($errors, "Please enter valid price");
    }

    if (count($errors) == 0) {
        

         $query = "INSERT INTO expanse (name, price, details, adminid, date) 
              VALUES('$name', '$price', '$details', '$userid', '$date')";
         mysqli_query($con, $query);
         
         }
     }
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
                   <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Expense</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                        <form method="post" action="" id="form1">
                                            <?php include('errors.php'); ?>
                                             <div class="form-group">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputUsername">Who spent?</label>
                                                <input class="form-control py-4" id="inputPrice" name="name" type="text" placeholder="Enter Name " />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputUsername">Price</label>
                                                <input class="form-control py-4" id="inputPrice" name="price" type="text" placeholder="Enter Price" />
                                            </div>
                                            <div class="form-group">
                                            <label class="small mb-1" for="inputUsername">Details</label>
                                            <textarea  class="form-control" name="details" id="form1" rows="5" placeholder="Enter Details"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputUsername">Date</label>
                                                <input class="form-control py-4" id="inputPrice" name="date" type="date" placeholder="Enter Price" />
                                            </div>

                                            <input type="submit" class="btn btn-primary btn-block" value="Confirm" name="but_submit" id="but_submit"/>
                                    
                                        </form>
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