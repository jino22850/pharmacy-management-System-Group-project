
<?php

session_start();
include_once("../config/dbConnection.php");

?>


<?php

if (!isset($_SESSION['user'])) {
    echo "<script>
        alert('User is not Logged in..');
    </script>";
} else {

    echo "you are welcome {$_SESSION['lName']}. for Add to cart";


    // your_php_file.php

// Retrieve parameter values from the URL
$param1 = isset($_GET['param1']) ? $_GET['param1'] : '';


$id=$_GET['param1'];
// Use the parameter values as needed
echo "Parameter 1: ". $id;


$userID=$_SESSION['id'];

$checkSql="SELECT * FROM wishlist WHERE itemId='$id' && customerId='$userID';";

$sql="INSERT INTO wishlist (itemId,customerId) VALUES ('$id','$userID')";

$result=mysqli_query($conn,$checkSql);
if(mysqli_num_rows($result)== 0) {

    $insertResult=mysqli_query($conn,$sql);

    echo "<script>
    alert('Item Added to the Wish List Successfully...');
    window.location.href='../../index.php #products'
    </script>";



} else {
    echo "<script>
    alert('Item Already has been in Wish List..');
    window.location.href='../../index.php #products'
    </script>";

}






}
?>
