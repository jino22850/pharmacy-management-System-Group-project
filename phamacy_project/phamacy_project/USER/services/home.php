
<?php
session_start();

echo "<script>
    alert('Login Successfull..');
    </script>";

echo"this is home page";
echo "you are welcome {$_SESSION['fName']} {$_SESSION['lName']}...";


?>