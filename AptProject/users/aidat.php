<!DOCTYPE html>
<html lang="en">

 <?php 
include "checkuserlogin.php";
include "../config.php";

$errors = array(); 

    if (isset($_POST['but_submit'])) {

    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $doornumber = $_SESSION['doornumber'];
    $userid = $_SESSION['id'];
    
    
    if (empty($fname)) { array_push($errors, "First Name is required"); }
    if (empty($lname)) { array_push($errors, "Last Name is required");}
    if (empty($price)) { array_push($errors, "Price is required"); }
   

    if($price <= 0) {
        array_push($errors, "Please enter valid price");
    }


    if (count($errors) == 0) {
    

         $query = "INSERT INTO actions (name, surname, price, doornumber, userid) 
              VALUES('$fname', '$lname', '$price', '$doornumber', '$userid')";
         mysqli_query($con, $query);
         header("location: home.php");
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
                                                        
                                                        <input class="form-control py-4" id="inputFirstName" name="fname" type="text" placeholder="Enter First Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                      
                                                        <input class="form-control py-4" id="inputLastName" name="lname" type="text" placeholder="Enter Last Name" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                             
                                                <input class="form-control py-4" id="inputPrice" name="price" type="number" placeholder="Enter Price" />
                                            </div>
                                            <div class="form-group">
                                              
                                                <input class="form-control py-4" id="inputPrice" name="cardname" type="text" placeholder="Enter Name On Card" />
                                            </div>
                                            <div class="form-group">
                                               
                                                <input class="form-control py-4" id="inputPrice" name="cardnumber" type="number" placeholder="Enter Card Number" />
                                            </div>
                                            <div class="form-row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                       
                                                        <input class="form-control py-4" id="inputFirstName" name="expdate" type="month" placeholder="Expiry Date (MM/YY)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                     
                                                        <input class="form-control py-4" id="inputLastName" name="ccv" type="text" placeholder="CCV" />
                                                    </div>
                                                </div>

                                            <input type="submit" class="btn btn-primary btn-block" value="Pay Now" name="but_submit" id="but_submit" href="login.php"/>
                                    
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