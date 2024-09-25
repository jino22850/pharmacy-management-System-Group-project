<?php
session_start();

echo "you are welcome {$_SESSION['fName']} {$_SESSION['lName']}...";

echo"<br><br>";

echo "<a href='home.php'><button type='button'>Login</button></a>";
?>

