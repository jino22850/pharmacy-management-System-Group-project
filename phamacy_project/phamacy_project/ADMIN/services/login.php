<?php

session_start();
include"../config/dbConnection.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

   

    <link rel="stylesheet" type="text/css" href="../css/login.css">



</head>
<body>


<form  method="post">
        <h2>Admin Login</h2>


        <div class="dep">
        

        <!-- <label for="email">Email:</label> -->
        <input type="email" id="email" name="email" placeholder="E-mail" required>


        <!-- <label for="password">Password:</label> -->
        <input type="password" id="password" name="password" minlength="6" placeholder="Password" required>

        <button type="submit" name ="submit">Login</button>

        </div>
        
    </form>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $email= $_POST["email"];
        $password= $_POST["password"];
        
        $sql="SELECT * FROM admin WHERE email='$email' && password='$password' ";
        
        $result=$conn->query($sql);
        if ($result->num_rows >0) {
           $row=$result->fetch_assoc();
        
           $email=$row["email"];
           $password=$row["password"];

           $_SESSION['admin'] = "Admin";
           $_SESSION['adminemail'] = $email;
           $_SESSION['adminpassword'] = $password;


           header("Location: itemsmanage.php");
            
           }
        
        else{
           echo "<script>
            alert('incorrect Email or passsword');
            </script>";
        
           //header("Location: ../services/login.php");
        }


    }
    ?>