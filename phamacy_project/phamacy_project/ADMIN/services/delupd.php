
<?php

session_start();
include"../config/dbConnection.php";


?>

<?php

if(isset($_GET['delId'])){
    $id=$_GET['delId'];
    $sql="DELETE FROM items WHERE 	itemId='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("Location: itemsmanage.php#tbl");
    }
    else{
        die(mysqli_error($conn));
    }
}



?>