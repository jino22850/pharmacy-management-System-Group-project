
<?php

session_start();
include"../config/dbConnection.php";


?>

<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
    
$itemName = $_POST["itemName"];
$companyName = $_POST["company"];
$price = $_POST["price"];
$discount = $_POST["discount"];
$itemDiscription = $_POST["discription"];
//$itemImage = $_POST["image"];

$image = $_POST['image'];
    //$imgContent = addslashes(file_get_contents($image));


$sql="INSERT INTO items (itemName,companyName,price,discount,discription) values ('$itemName','$companyName','$price','$discount','$itemDiscription','$image');";
$result=mysqli_query($conn,$sql);
if($result){
    header("Location: itemsmanage.php#tbl");
}
else{
    die(mysqli_error($conn));
}


}















?>