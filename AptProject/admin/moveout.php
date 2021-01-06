<!DOCTYPE html>
<html lang="en">








<?php 
include "checkadminlogin.php";
include "../config.php";

        $movequery = "SELECT id, doornumber FROM users WHERE status='active'  ORDER BY doornumber ASC ";
         $result = mysqli_query($con, $movequery);
         
         

         if (isset($_POST['but_submit'])) {

            $selectOption = $_POST['moveout'];
            
            $updatequery = "UPDATE users SET quit_date = CURRENT_TIMESTAMP, status = 'inactive' WHERE id='$selectOption'";
            mysqli_query($con, $updatequery);
            header('location: home.php');

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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Delete Resident</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                         <div class="form-group">
                                  
                                 <select name="moveout" class="c-form-profession form-control" id="c-form-profession">
                                    <?php
                                            while($row = mysqli_fetch_array($result)){   
                                                    unset($id, $name);
                                                    $id = $row['id'];
                                                     $doornumber = $row['doornumber']; 
                                                      echo '<option value="'.$id.'">'.$doornumber.'</option>';
                                            }
                                            ?>
                                 </select>
                            </div>
                         <input type="submit" class="btn btn-primary btn-block" value="Confirm" name="but_submit" id="but_submit" href="home.php"/>                            
                    </form>
                </main>
               
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>