<?php

session_start();
include_once("../config/dbConnection.php");

?>

<?php

if (!isset($_SESSION['user'])) {
    echo "<script>
        alert('User is not Logged in..');
        window.location.href='../../index.php #products'
    </script>";
} else {

    echo "you are welcome {$_SESSION['id']}";

?>



<?php
$USER=$_SESSION['id'];

$sql="SELECT items.* FROM items JOIN wishList ON items.itemId=wishList.itemId WHERE wishList.customerId ='$USER' ;";
$result = $conn->query($sql);






?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .vistCard {
        position: relative;
        width: 900px;
        height: 150px;
        display: flex;
        border-radius: 10px;
        cursor: pointer;
        /* background-color: red;*/
        box-shadow: 1px 1px 7px 1px darkgray;
    }

    .vistCard:hover {
        transition: .5s;

        transform: scale(1.002);
    }

    .vistCard:after {
        transition: .1s;
    }

    .vistCard form {
        display: flex;
    }

    .vistCard img {
        /* border: 1px solid black;*/
        border-bottom-left-radius: 10px;
        border-top-left-radius: 10px;
    }

    .vistCard .detail {

        display: flex;
        flex-direction: column;
        justify-content: center;
        /* background-color: blue; */
        margin: 5px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .vistCard .detail h2,
    h3,
    p {
        margin: 3px;
    }

    .vistCard .detail p {
        width: 100%;

    }

    .vistCard .btn {
        /* background-color: green; */
        margin: 5px;
        width: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: stretch;

    }

    .vistCard .btn button {
        width: 100%;
        border: none;
        height: 40px;
        margin-top: 4px;
        border-radius: 5px;
        cursor: pointer;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        transition: .1s;
        color: white;

    }

    #view {
        background-color: seagreen;
    }

    #view:hover {
        color: green;
        background-color: whitesmoke;
        border: 0.5px solid darkgrey;
    }

    #addToCart {
        background-color: skyblue;
    }

    #addToCart:hover {
        color: green;
        background-color: whitesmoke;
        border: 0.5px solid darkgrey;
    }

    #remove {
        background-color: salmon;
    }

    #remove:hover {
        color: green;
        background-color: whitesmoke;
        border: 0.5px solid darkgrey;
    }
    </style>
</head>

<body>

    <?php
     while ($row = $result->fetch_assoc()) {
      $imageData = base64_encode($row['image']);

      


    ?>


    <div class="vistCard">

        <form  method="post">





            <!-- Image Left Column -->
            <!--<img src="../../IMAGES/aa.jpg" alt="Medi-item-img" height="150px" width="150px">-->
            <?php echo '<img src="data:image/jpeg;base64,' . $imageData . '" height="150px" width="150px" alt="Image">';?>

            <!-- Center Details Column -->
            <div class="detail">
                <h2>
                    <?php echo $row['itemName']; ?>
                </h2>
                <h3>
                    <?php echo $row['price']; ?>
                </h3>
                <p><?php echo $row['discription']; ?>
                </p>
            </div>

            <!-- Button Right Column -->
            <div class="btn">
                <button id="view">View</button>
                <button id="addToCart" type="submit">ADD TO CART</button>
                <!--<button id="remove">Remove</button>-->
                <a href="../USER/services/itemRemoveFromWishList.php" target="_self"><button id="remove">Remove</button></a>
            </div>


     





        </form>
    </div>




    <?PHP

}
   ?>


</body>

</html>


<?php

    }

?>