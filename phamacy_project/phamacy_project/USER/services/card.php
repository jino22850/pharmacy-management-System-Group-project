<?PHP

session_start();
include_once("../config/dbConnection.php");

?>


<?php

$sql = "SELECT * FROM items ORDER BY RAND();";
$result = $conn->query($sql);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/card.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

 <!--header section--> 
 <!--<header>
<input type="checkbox" name="" id="toggler">
<label for="toggler" class="fas fa-bars"></label>

<a href="#" class="logo"><img src="IMAGES/ePharma3.png"><span>.</span></a>

<nav class="navbar">
    <a href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#product">Product</a>
    <a href="#review">Review</a>
    <a href="#contact">Contact</a>
</nav>
<div class="icons">
    <a href="#" class="fas fa-heart"></a>
    <a href="#" class="fas fa-shopping-cart"></a>
    <a href="#" class="fas fa-user"></a>
</div>
</header>-->



  <!--header section end--> 





    <div class="gallery">



    <?php
     while ($row = $result->fetch_assoc()) {
      $imageData = base64_encode($row['image']);

      


    ?>





        <div class="content">
            <?php echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="Image">';?>
            <h3><?php echo $row['itemName']; ?></h3>
            <P><?php echo $row['discription']; ?></P>

            <h6><?php echo $row['price']; ?></h6>
            <ul>


            <?php

                for ($i = 0; $i < $row['rating']; $i++)
                echo"<li> <i class='fa fa-star checked'></i></li>";
            ?>


            
                <!--<li> <i class="fa fa-star checked"></i></li>
                <li> <i class="fa fa-star checked"></i></li>
                <li> <i class="fa fa-star checked"></i></li>
                <li> <i class="fa fa-star checked"></i></li>
                <li> <i class="fa fa-star"></i></li>-->
            </ul>    
            <button class="buy-4">Buy Now</button>
        </div>




        <?php

         }

        ?>







        <!--<div class="content">
            <img src="../../IMAGES/item1.jpg">
            <h3>Medicine 2</h3>
            <P>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt natus odio neque voluptatibus aspernatur possimus molestiae. 
                Provident sint et illum dicta enim nisi, quidem corrupti cupiditate excepturi, quaerat quibusdam rerum.</P>

            <h6>Rs.100.00</h6>
            <ul>
                <li> <i class="fa fa-star checked"></i></li>
                <li> <i class="fa fa-star checked"></i></li>
                <li> <i class="fa fa-star checked"></i></li>
                <li> <i class="fa fa-star "></i></li>
                <li> <i class="fa fa-star"></i></li>
            </ul>    
            <button class="buy-2">Buy Now</button>
        </div>

        <div class="content">
            <img src="../../IMAGES/item3.jpg">
            <h3>Medicine 3</h3>
            <P>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt natus odio neque voluptatibus aspernatur possimus molestiae. 
                Provident sint et illum dicta enim nisi, quidem corrupti cupiditate excepturi, quaerat quibusdam rerum.</P>

            <h6>Rs.100.00</h6>
            <ul>
                <li> <i class="fa fa-star checked"></i></li>
                <li> <i class="fa fa-star checked"></i></li>
                <li> <i class="fa fa-star checked"></i></li>
                <li> <i class="fa fa-star checked"></i></li>
                <li> <i class="fa fa-star"></i></li>
            </ul>    
            <button class="buy-3">Buy Now</button>
        </div>

        <div class="content">
            <img src="../../IMAGES/item4.jpg"">
            <h3>Medicine 4</h3>
            <P>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt natus odio neque voluptatibus aspernatur possimus molestiae. 
                Provident sint et illum dicta enim nisi, quidem corrupti cupiditate excepturi, quaerat quibusdam rerum.</P>

            <h6>Rs.100.00</h6>
            <ul>
                <li> <i class="fa fa-star checked"></i></li>
                <li> <i class="fa fa-star checked"></i></li>
                <li> <i class="fa fa-star checked"></i></li>
                <li> <i class="fa fa-star checked"></i></li>
                <li> <i class="fa fa-star"></i></li>
            </ul>   
            <button class="buy-4">Buy Now</button> 
        </div>-->


    </div>


</body>
</html>