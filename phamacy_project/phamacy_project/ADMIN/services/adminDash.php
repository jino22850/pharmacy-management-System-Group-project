<?php

session_start();
include"../config/dbConnection.php";


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"   href="admin.css">
     
</head>
<body>

<header class="header">
        <div class="logo">
          <a href="#">Admin</a>
          <div class="search_box">
            <input type="text" placeholder="Search EasyPay" >
             <img src="../../IMAGES/se.jpg" alt=""  >
            <!-- <i class="fa-sharp fa-solid fa-magnifying-glass"></i> -->

           
          </div>
        </div>
    
        <div class="header-icons">
          
          <div class="account">
            <a href="update.php"><img src="../../IMAGES/img.jpeg" alt="" ></a>
            <h4><a><?php if(isset($_SESSION['admin'])){echo"{$_SESSION['admin']}".'&nbsp&nbsp'.'<a href="logout.php">Logout</a>';}?></a></h4>
          </div>
        </div>
      </header>
      
      <div class="container">
        <nav>
          <div class="side_navbar">
            <span>Main Menu</span>
            <!--<a href="admindash.php" class="activeDash">Dashboard</a>   -->         
            <a href="itemsmanage.php" class="activeUser" >Items</a>
            <a href="customermanage.php" class="activeProfile">Customer</a>  
            <a href="contactus.php"  class="activeAccount">Contact Us</a>
            <a href="ordermanagement.php" class="activeItems" >Orders</a>
            <a href="update.php" class="activeProfile">Profile</a>
            
    
            <div class="links">
              <span>Quick Link</span>
              <a href="#">Paypal</a>
              <a href="#">EasyPay</a>
              <a href="#">SadaPay</a>
            </div>
          </div>
        </nav>
        </div>
      

       
     

 

    
    
</body>
</html>