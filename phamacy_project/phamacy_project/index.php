<?php

session_start();
    include_once("dbConnection.php");

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
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <!--header section--> 
<header>
<input type="checkbox" name="" id="toggler">
<label for="toggler" class="fas fa-bars"></label>

<a href="#" class="logo"><img src="IMAGES/ePharma3.png"><span>.</span></a>

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
    <a href="USER/services/login.php" class="fas fa-user"></a>
    <a><?php if(isset($_SESSION['fName'])){echo"{$_SESSION['lName']}".'&nbsp&nbsp&nbsp'.'<a href="logout.php">Logout</a>';}?></a>

</div >



</header>



  <!--header section end--> 

  <!--home section start--> 
<section class="home" id="home">
  <div class="content">
    <h3>Join with us</h3>
    <span>Your Health, Our Priority</span>
    <p>24/7 Pharmacy Support – Your Partner in Care. Call us </p>
    <a href="USER/services/card.php" class="btn"> Buy now</a>
  </div>
</section>

  <!--home section end--> 


  <!--about section stary--> 
<section class="about" id="about">
  <h1 class="heading"><span>About</span> Us</h1>
  <div class="row">
  <div class="video-container">
    <video src="IMAGES/about.mp4" loop autoplay muted></video>
    <h3>We Are Best</h3>
  </div>

  <div class="content">
    <h3>Why Choose us?</h3>
    <p>To be the most trusted local provider of pharmaceutical care 
      because we consistently provide a superior experience for prescribers, 
      patients and caregivers through the use of best practices, across all settings:
       in-store, in-home, or within the personal care residence.</p>
     <p>We provide ethical counsel and support to medical professionals and patients in 
      order to enhance the safe use of medications and medical devices.</p>
      
      <a href="#" class="btn">learn more</a>

</div>     
</section>

  <!--about section end-->
  
  <!--icon section start-->
<section class="icon-container">

  <div class="icons">
  <img src="IMAGES/icon2.png" alt="">
  <div class="info">
    <h3>Free delivery</h3>
    <span>on all orders</span>
  </div>
</div>

<div class="icons">
  <img src="IMAGES/icon1.png" alt="">
  <div class="info">
    <h3>Safe Packeges</h3>
    <span>Dilivery To whole country</span>
  </div>
</div>
  
<div class="icons">
  <img src="IMAGES/icon3.png" alt="">
  <div class="info">
    <h3>Offer & Gifts</h3>
    <span>on all orders</span>
  </div>
</div>

<div class="icons">
  <img src="IMAGES/icon4.png" alt="">
  <div class="info">
    <h3>Secure Payment</h3>
    <span>protected by cards</span>
  </div>
</div>
</section>

  <!--icon section end-->  

   <!--product section start-->




   <section class="products" id="products">
    <h1 class="heading">Features<span> products</span></h1>

    <div class="box-container">






    <?php
     while ($row = $itemlist->fetch_assoc()) {
      $imageData = base64_encode($row['image']);

      


    ?>






    
    <div class="box">
      <span class="discount"><?php echo -intval(($row['discount']/$row['price'])*100) . '%'; ?></span>
    <div class="image"> 
    <?php echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="Image">';?>
      <div class="icons">
       <?php $itemId = $row['itemId'];?>
        <!--<a href="itemAddToCart.php?param1='$itemId'" class="fas fa-heart"></a>-->
        <a href="USER/services/itemAddToWishList.php?param1=<?= $itemId ?>" class="fas fa-heart"></a>

        <a href="USER/services/itemAddToWishList.php?param1=<?= $itemId ?>" class="cart-btn">add to cart</a>
        <a href="#" class="fas fa-share"></a>
      </div>
    </div>
    <div class="content">
      <h3><?php echo $row['itemName']; ?> | <?php echo $row['companyName']; ?></h3>
      <div class="price"><?php echo number_format($row['price']-$row['discount'],2) ; ?><span><?php echo $row['price']; ?></span></div>
    </div>
  </div> 

    
    
    


      <?php


     }
      ?>  






   
    <!--<div class="box">
      <span class="discount">-5%</span>
    <div class="image"> 
      <img src="IMAGES/item2.png" alt="">
      <div class="icons">
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="cart-btn">add to cart</a>
        <a href="#" class="fas fa-share"></a>
      </div>
    </div>
    <div class="content">
      <h3>Peppermint Facial Wash | Nature's Beauty Creations Ltd </h3>
      <div class="price">Rs.710<span>Rs.730</span></div>
    </div>
  </div> 

  <div class="box">
    <span class="discount">-15%</span>
  <div class="image"> 
    <img src="IMAGES/item.3png.png" alt="">
    <div class="icons">
      <a href="#" class="fas fa-heart"></a>
      <a href="#" class="cart-btn">add to cart</a>
      <a href="#" class="fas fa-share"></a>
    </div>
  </div>
  <div class="content">
    <h3>Himani Navratna Oil</h3>
    <div class="price">Rs.420<span>Rs.490</span></div>
  </div>
</div>

<div class="box">
  <span class="discount">-10%</span>
<div class="image"> 
  <img src="IMAGES/item4.jpg" alt="">
  <div class="icons">
    <a href="#" class="fas fa-heart"></a>
    <a href="#" class="cart-btn">add to cart</a>
    <a href="#" class="fas fa-share"></a>
  </div>
</div>
<div class="content">
  <h3> Pink Lotus - Body Lotion 250ml</h3>
  <div class="price">Rs.3970<span>Rs.4250</span></div>
</div>
</div> 





<div class="box">
  <span class="discount">-5%</span>
<div class="image"> 
  <img src="IMAGES/item7jpg.jpg" alt="">
  <div class="icons">
    <a href="#" class="fas fa-heart"></a>
    <a href="#" class="cart-btn">add to cart</a>
    <a href="#" class="fas fa-share"></a>
  </div>
</div>
<div class="content">
  <h3>Pawatta Talsookiri Syrup</h3>
  <div class="price">Rs.570<span>Rs.600</span></div>
</div>
</div> 

<div class="box">
  <span class="discount">-15%</span>
<div class="image"> 
  <img src="IMAGES/item8.png" alt="">
  <div class="icons">
    <a href="#" class="fas fa-heart"></a>
    <a href="#" class="cart-btn">add to cart</a>
    <a href="#" class="fas fa-share"></a>
  </div>
</div>
<div class="content">
  <h3>Ingini Milk Powder</h3>
  <div class="price">Rs.1870<span>Rs.2200</span></div>
</div>
</div> 

<!--<div class="box">
  <span class="discount">-5%</span>
<div class="image"> 
  <img src="IMAGES/item9.png" alt="">
  <div class="icons">
    <a href="#" class="fas fa-heart"></a>
    <a href="#" class="cart-btn">add to cart</a>
    <a href="#" class="fas fa-share"></a>
  </div>
</div>
<div class="content">
  <h3>BETADINE Gargle And Mouthwash</h3>
  <div class="price">Rs.830<span>Rs.900</span></div>
</div>
</div> 

<div class="box">
  <span class="discount">-5%</span>
<div class="image"> 
  <img src="IMAGES/item9.png" alt="">
  <div class="icons">
    <a href="#" class="fas fa-heart"></a>
    <a href="#" class="cart-btn">add to cart</a>
    <a href="#" class="fas fa-share"></a>
  </div>
</div>
<div class="content">
  <h3>BETADINE Gargle And Mouthwash</h3>
  <div class="price">Rs.830<span>Rs.900</span></div>
</div>
</div> 


<div class="box">
  <span class="discount">-5%</span>
<div class="image"> 
  <img src="IMAGES/item6.png" alt="">
  <div class="icons">
    <a href="#" class="fas fa-heart"></a>
    <a href="#" class="cart-btn">add to cart</a>
    <a href="#" class="fas fa-share"></a>
  </div>
</div>
<div class="content">
  <h3>Siddhalepa Balm 50g</h3>
  <div class="price">Rs.192<span>Rs.200</span></div>
</div>
</div> -->


</div> 
   </section>
   <!--product section end-->  


   <!--review section start-->
   <section class="review" id="review">


    <h1 class="heading">customer's <span>review</span></h1>
    <div class="box-container">


    <?php
     while ($row = $result->fetch_assoc()) {
      $imageData = base64_encode($row['image']);

      


    ?>


      <div class="box">
        <div class="stars">

        <?php

       for ($i = 0; $i < $row['rating']; $i++)
          echo"<i class='fas fa-star'></i>";
        ?>

       
        </div>
        <p><?php echo $row['review'];  ?></p>
           <div class="user">
            <?php echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="Image">';?>
            <div class="user-info">
              <h3><?php echo $row['firstName'] . $row['lastName'];  ?></h3>
              <span><?php echo $row['hapiness'];  ?></span>
            </div>
           </div>
           <span class="fas fa-quote-right"></span>
      </div>





      <?php
     }
      ?>
      
    </div>
   </section>

   <!--review section end-->  

      <!--contact section start--> 
      <section class="contact" id="contact">
        <h1 class="heading"><span>Contact</span>Us</h1>
        <div class="row">
          <form  method="POST">
            <input type="text" name="name" placeholder="name" class="box">
            <input type="email"name="email" placeholder="email" class="box">
            <input type="text" name="number" maxlength="10" placeholder="number" class="box">
            <textarea name="message" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn">
          </form>

          <div class="image">
            <img src="IMAGES/bbb.jpg" alt="">
          </div>


        </div>
      </section>
      
      <!--contact section end-->  

       <!--footer section start-->
       <section class="footer">
        <div class="box-container">
          <div class="box">
            <h3>Quick links</h3>
            <a herf="#">Home</a>
            <a herf="#">About</a>
            <a herf="#">Product</a>
            <a herf="#">Review</a>
            <a herf="#">Contact</a>
          </div>

          <div class="box">
            <h3>Extra links</h3>
            <a herf="#">My Account</a>
            <a herf="#">My Order</a>
            <a herf="#">My Favorite</a>
           
          </div>

          <div class="box">
            <h3>Location</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.64663961793!2d80.03339142575582!3d7.166784415352255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2e337442df937%3A0x29f5149e8578851d!2sAdvanced%20Technological%20Institute%20Gampaha!5e0!3m2!1sen!2slk!4v1702221312731!5m2!1sen!2slk" 
            width="400" height="300" style="border:0;" 
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

          <div class="box">
            <h3>Contact Informations</h3>
            <a herf="#">+94 78 000-1230</a>
            <a herf="#">esaypharmachy@gmail.com</a>
            <a herf="#">Gampaha, Sri Lanka</a>
            <img src="IMAGES/card.png" alt="">
           
          </div>

        </div>

        <div class="credit">Created by <span>Mr. Koyya</span>| all rights reserved</div>
       </section>
       
      <!--footer section end-->  
</body>
</html>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST["name"];
$email = $_POST["email"];
$number = $_POST["number"];
$message = $_POST["message"];

if(empty($name) || empty($email) || empty($number) || empty($message)){

  echo "<script>
            alert('fill all the text fields...');
            </script>";
            echo"<a href='#contact'</a>";
            die();
}
else{


  if (empty($number) && strlen($number) < 10) {
    echo "<script>
    alert('Contact number is wrong...');
    </script>";
    echo"<a href='#contact'</a>";
    die();
}
else{
    for ($i = 0; $i < strlen($number); $i++) {
        if (!ctype_digit($number[$i])) {
            //return false;
            echo "<script>
    alert('Phone number can not include letters...');
    </script>";

    echo"<a href='#contact'</a>";
            die("");
            
        }
    }

}

echo"redy to data insert.....";

 // $sqlInsert = $conn->prepare("INSERT INTO contactus VALUES (?,?,?,?,?)");
//$sqlInsert->bind_param("issss",'', $name, $email, $number, $message);
//$sqlInsert->execute();

$sqlInsert = "INSERT INTO contactus (name,email,number,message)VALUES ('$name','$email','$number','$message');";
//$result=$conn->query($sqlInsert);
$r=mysqli_query($conn, $sqlInsert);

//echo "Data inserted successfully..";

echo "<script>
    alert('Our team will contact soon.\\nThank you for contacting us.');
</script>";

            echo"inserted successsfully...";

//$sqlInsert->close();
$conn->close();
//exit();

}
}

?>