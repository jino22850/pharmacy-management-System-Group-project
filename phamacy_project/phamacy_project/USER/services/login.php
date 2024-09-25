<?php
    session_start();
    include_once("../config/dbConnection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

    <div class="login-container">
        <div class="login-header">
            <h2>Login</h2>
        </div>
        <form  method="post">
            <div class="login-form">
                <div class="form-group">
                    <label for="username">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your Email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                </div>
                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
            </div>
        </form>

        <div class="register">
            <label for="Register">You Don't Have an Account!</label>
        </div>
        <div class="form-group">
            <a href="registration.php" target="_self"><button>Register</button></a>
        </div>
    </div>


    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $email= $_POST["email"];
        $password= $_POST["password"];
        
        $sql="SELECT * FROM customer WHERE email='$email' && password='$password' ";
        
        $result=$conn->query($sql);
        if ($result->num_rows >0) {
           $row=$result->fetch_assoc();
        
           $email=$row["email"];
           $password=$row["password"];
           $id=$row["id"];
           $fname=$row["firstName"];
           $lname=$row["lastName"];

           $_SESSION['user'] = 'user';
           $_SESSION['id'] = $id;
           $_SESSION['fName'] = $fname;
           $_SESSION['lName'] = $lname;
           $_SESSION['email'] = $email;
           $_SESSION['password'] = $password;

           header("Location: ../../index.php");
            
           }
        
        else{
           echo "<script>
            alert('incorrect Email or passsword');
            </script>";
        
           //header("Location: ../services/login.php");
        }


    }
    ?>

</body>
</html>
