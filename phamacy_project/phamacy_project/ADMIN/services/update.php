<?php
session_start();
include_once("../config/dbConnection.php");

if (!isset($_SESSION['admin'])) {
    echo "<script>
        alert('Admin is not Logged in..');
        window.location.href='  adminDash.php';
    </script>";
} else {
    //echo "you are welcome {$_SESSION['admin']}";
    echo <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Admin</title>
        <link rel="stylesheet" type="text/css" href="../css/registration.css">
    </head>
    <body>
        <form method="post">
            <h2>Update Admin</h2>
            <div class="dep">
                <input type="email" id="oldemail" name="oldemail" placeholder="old E-mail" required>
                <input type="password" id="oldpassword" name="oldpassword" minlength="6" placeholder="old Password" required>
                <hr>
                <br>
                <input type="email" id="newemail" name="newemail" minlength="6" placeholder="new email" required>
                <input type="password" id="newpassword" name="newpassword" minlength="6" placeholder="new Password" required>
                <input type="password" id="Connewpassword" name="Connewpassword" minlength="6" placeholder="Confirm new Password" required>
            </div>
            <button type="submit" name="submit">Update</button>
        </form>
    </body>
    </html>
HTML;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $oldemail = strtolower($_POST["oldemail"]);
    $oldpassword = $_POST["oldpassword"];
    $newemail = strtolower($_POST["newemail"]);
    $newpassword = $_POST["newpassword"];
    $Conpassword = $_POST["Connewpassword"];


//echo $oldemail." ".$oldpassword;
//echo $_SESSION["adminemail"].$_SESSION["adminpassword"];

    

    if($oldpassword != $_SESSION['adminpassword']  || $oldemail != $_SESSION['adminemail']) {

        echo "<script>
        alert('old password or email is does not match..');
    </script>";
    die();
    }
    else{
        if($newemail==$_SESSION["adminemail "] ) {
            echo "<script>
        alert('Cant use current email.. use an other one..');
    </script>";
    die();
    }
    if($newpassword!=$Conpassword && $newpassword<6){
    
        echo "<script>
        alert('Conform the Correct password...');
        </script>";
          die();
    }

    $sqlUPDATE = "UPDATE admin SET email='$newemail', password='$newpassword' WHERE no='1' ";

    $result = mysqli_query($conn,$sqlUPDATE);
    $_SESSION['adminemail'] = $newemail;
    $_SESSION['adminpassword'] = $newpassword;


    echo "<script>
        alert('Data updated successfully..');
        window.location.href='admindash.php';
        
        </script>";

        //header("Location: admindash.php");

    $conn->close();
    exit();

    }

}
?>
