<?php

session_start();
    include_once("../config/dbConnection.php");

?>


<?php

$sql = "SELECT * FROM customer WHERE review IS NOT NULL ORDER BY id DESC LIMIT 3";
$result = $conn->query($sql);


?>

<?php

$itemsql = "SELECT * FROM items ORDER BY RAND() ;";
$itemlist= $conn->query($itemsql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.ePharma.lk</title>
    <!--font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!--css file link-->
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
  <!--header section--> 
<header>
<input type="checkbox" name="" id="toggler">
<label for="toggler" class="fas fa-bars"></label>

<a href="#" class="logo"><img src="../../IMAGES/ePharma3.png"><span>.</span></a>

<nav class="navbar">
    <a href="#home">Home</a>
    <a href="#about">About</a>
    <a href="USER/services/card.php">Product</a>
    <a href="#review">Review</a>
    <a href="#contact">Contact</a>
</nav>
<div class="icons">
    <a href="USER/services/wishList.php" class="fas fa-heart"></a>
    <a href="#" class="fas fa-shopping-cart"></a>
    <a href="#" class="fas fa-user"></a>

</div >



</header>



  <!--header section end--> 


  
 
  






       <!--footer section start-->
       <section class="footer">
        

        <div class="credit">Created by <span>Mr. Koyya</span>| all rights reserved</div>
       </section>
       
      <!--footer section end-->  
</body>
</html>


