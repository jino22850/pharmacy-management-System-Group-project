<?php
session_start();
include_once("../config/dbConnection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    
        <link rel="stylesheet" href="../css/registration.css">
    
</head>
<body>
<!--/config/registrationDBconnection.php-->
    <form  method="post">
        <h2>Customer Registration</h2>
        <!-- <label for="username">Username:</label> -->
        <div class="name">
        <input type="text" id="fname" name="fname" placeholder="First Name" required>
        <input type="text" id="lname" name="lname" placeholder="Last Name" required>  
        </div>

        <div class="dep">
        

        <!-- <label for="email">Email:</label> -->
        <input type="email" id="email" name="email" placeholder="E-mail" required>

        <!-- <label for="address">Address:</label> -->
        <input type="text" id="address" name="address" placeholder="Address" required>

        <!-- <label for="contactNo">Contact No:</label> -->
        <input type="text" id="contactNo" name="contactNo" maxlength="10" placeholder="Contact No" required>

        <!-- <label for="password">Password:</label> -->
        <input type="password" id="password" name="password" minlength="6" placeholder="Password" required>

        <!-- <label for="password">Password:</label> -->
        <input type="password" id="Conpassword" name="Conpassword" minlength="6" placeholder="Conform Password" required>
        </div>
        <button type="submit" name ="submit" >Register</button>
    </form>



    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $firstName = $_POST["fname"];
$lastName = $_POST["lname"];
$email = $_POST["email"];
$address = $_POST["address"];
$contact = $_POST["contactNo"];
$password = $_POST["password"];
$Conpassword = $_POST["Conpassword"];

$newUserID;
$finalPassword;


if (empty($firstName) || empty($lastName) || strlen($firstName) < 3 || strlen($lastName) < 3) {
    echo "<script>
    alert('Name is Not Valid...');
    </script>";
    die();
}


if (empty($address) || strlen($address) < 6) {
    echo "<script>
    alert('Address is Not Valid...');
    </script>";
    die();
}

if (empty($contact) && strlen($contact) < 10) {
    echo "<script>
    alert('Contact number is wrong...');
    </script>";
    die();
}
else{
    for ($i = 0; $i < strlen($contact); $i++) {
        if (!ctype_digit($contact[$i])) {
            //return false;
            echo "<script>
    alert('Phone number can not include letters...');
    </script>";
            die("");
            
        }
    }

}

if (empty($password) && empty($Conpassword) && $password != $Conpassword && strlen($password) >= 16 && strlen($password) <= 6) {
    

    echo "<script>
    alert('Password does not match or does not meet the length criteria...');
    </script>";
    die();

  
    



} else {

    global $finalPassword;
 
    $finalPassword = $password;
   
}


$sql = "SELECT email FROM customer WHERE email='$email';";

$result = $conn->query($sql);
if ($result->num_rows != 0) {
    
    echo "<script>
    alert('This Email was alredy has been taken..Use An other one');
    </script>";
    die();
}



$sql = "SELECT id FROM customer ORDER BY id DESC";

$result = $conn->query($sql);
if ($result->num_rows == 0) {
    global $newUserID;
    $newUserID = 1;
} else {
    $userID = $result->fetch_assoc()["id"];
    global $newUserID;
    $newUserID = $userID;
    $newUserID +=1;
}


$sqlInsert = $conn->prepare("INSERT INTO customer VALUES (?,?,?,?,?,?,?);");
$sqlInsert->bind_param("issssis", $newUserID, $firstName, $lastName, $email, $address, $contact, $finalPassword);
$sqlInsert->execute();
//echo "Data inserted successfully..";
    $_SESSION['fName'] = $firstName;
    $_SESSION['lName'] = $lastName;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    header("Location: welcome.php");

$sqlInsert->close();
$conn->close();
exit();



    }

    ?>



</body>
</html>
