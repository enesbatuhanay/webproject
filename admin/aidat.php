<!DOCTYPE html>
<html lang="en">

 <?php 
include "checkadminlogin.php";
include "../config.php";
 $duesquery1 = "SELECT * FROM dues ORDER BY ddate";
    $result1 = mysqli_query($con, $duesquery1);
       
    $errors = array(); 
    $doornumber = $_SESSION['doornumber'];
    $userid = $_SESSION['id'];

    

         
    if (isset($_POST['but_submit'])) {

    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $duesid = mysqli_real_escape_string($con, $_POST['duesid']);
    
    $monthquery2 = "SELECT amount FROM dues WHERE duesid='$duesid' ";
         $result3 = mysqli_query($con, $monthquery2);
         $row3 = mysqli_fetch_assoc($result3);

    $price = $row3['amount'];
    
      
    if (empty($fname)) { array_push($errors, "First Name is required"); }
    if (empty($lname)) { array_push($errors, "Last Name is required");}
   


    if (count($errors) == 0) {


         $query = "INSERT INTO transaction (name, surname, price, doornumber, userid, tduesid) 
              VALUES('$fname', '$lname', '$price', '$doornumber', '$userid', '$duesid')";
         mysqli_query($con, $query);
         
         $query1 = "UPDATE dues SET isactivedue = '0' WHERE duesid = '$duesid'";
         mysqli_query($con, $query1);
         
         header("location: dueshistory.php");

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
                </main>
                <div class="container-fluid">
                        <h1 class="mt-4">Dues History</h1>
                      
                           
                            <div class="card-body">
                               
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Dues Date</th>
                                                <th>Door Number</th>
                                                <th>Amount</th>
                                                <th>Details</th>
                                                <th>Is Paid</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <?php
                                            while($row1 = mysqli_fetch_array($result1)){
                                                if($row1['isactivedue'] == '1'){
                                                    $ispaid = "No";
                                                } else {
                                                    $ispaid = "Yes";
                                                }

                                            echo "<tr><td>" . $row1['ddate'] . "</td><td>" . $row1['flatid'] . "</td><td>" . $row1['amount'] ."</td><td>" . $row1['details'] . "</td><td>" 
                                             . $ispaid. "</td></tr>";  //$row['index'] the index here is a field name
                                            }
                                            ?>
                                            
                                          
                                        </tbody>
                                    </table>
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