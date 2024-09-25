<?php

session_start();
include"../config/dbConnection.php";

?>

<?php

$sql="SELECT * FROM customer";
$result=mysqli_query($conn,$sql);



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"   href="admin.css">
    <title>User</title>
    <style>
     .side_navbar .activeUser{
    border-left: 2px solid rgb(100, 100, 100);
  }


  /* Apply some basic styles to the form container */


/* Style the form heading */
h2 {
  text-align: center;
  color: #333;
}

/* Style the form input container */
.dep {
  margin-bottom: 15px;
}

/* Style the form inputs */
input {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  box-sizing: border-box;
}

/* Style the submit button */
button {
  background-color: #4caf50;
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

/* Change button color on hover */
button:hover {
  background-color: #4caf50;
}




/* Additional styles for the data table container */
.data-table-container {
  margin-top: 20px;
}

/* Style the data table */
.data-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
}

.data-table th, .data-table td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

.data-table th {
  background-color: #4caf50;
  color: white;
}






/* Style the buttons */
td button {
  padding: 8px 12px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  text-decoration: none;
 
  display: inline-block;
}

/* Style the "Update" button with a color other than green */
td button.update {
  background-color: #3498db; /* You can change this color */
  color: white;
}

/* Style the "Delete" button with a red color */
td button.delete {
  background-color: #e74c3c; /* Red color */
  color: white;
}

/* Change button color on hover */
td button:hover {
  filter: brightness(1.2); /* Lighten the color on hover */
}

/* Add spacing between buttons */
td button + button {
  margin-left: 10px;
}

   </style>
</head>
<body>
    <?php include 'adminDash.php'; ?>
    <div class="main">
        

  
       <!--User Management
      <button><a href="deleteItem.php">ok</a></button>
<a href=deleteItem.php><button>ok</button></a>
<input type="text" name="name">-->



<div>

<form  method="post">
 <h2>Manage Users</h2>
 <!-- <label for="username">Username:</label> -->
<br>

 <div class="dep">
 

 <!-- <label for="email">Email:</label> -->
 <input type="text" id="FName" name="FName" placeholder="First Name" required>

 <!-- <label for="address">Address:</label> -->
 <input type="text" id="LName" name="LName" placeholder="Last Name" required>

 <!-- <label for="contactNo">Contact No:</label> -->
 <input type="text" id="Address" name="Address"  placeholder="Address" required>

 <!-- <label for="password">Password:</label> -->
 <input type="text" id="ContactNo" name="ContactNo" placeholder="Contact No" required>

 <!-- <label for="password">Password:</label> -->
 <input type="text" id="Email" name="Email" placeholder="Email" required>

 <!-- <label for="password">Password:</label> -->
 <input type="text" id="Review" name="Review" placeholder="Review" required>

 <!-- <label for="password">Password:</label> -->
 <input type="text" id="Happiness" name="Happiness" placeholder="Happiness" required>

 <!-- <label for="password">Password:</label> -->
 <input type="text" id="Rating" name="Rating" placeholder="Rating" required>


<?php




?>






<!-- <label for="password">Password:</label> 
<input type="file" id="image" name="image" placeholder="Item Image" required>-->

 </div>
 <!--<button type="submit" name ="submit" >Add</button>-->


</form>
</div>



<div class="data-table-container">
<table class="data-table">
<thead>
<tr>
<th>Id</th>
 <th>First Name</th>
 <th>Last Name</th>
 <th>Address</th>
 <th>Contact No</th>
 <th>Email</th>
 <th>Review</th>
 <th>Happiness</th>
 <th>Rating</th>
 <th>Action</th>
 
</tr>
</thead>

<tbody>

<?php


if($result){
while($row=mysqli_fetch_assoc($result)){
$customerId=$row['id'];
$customerFName=$row['firstName'];
$customerLName=$row['lastName'];
$customerAddress=$row['address'];
$customerContactNo=$row['contactNo'];
$customerEmail=$row['email'];
$customerReview=$row['review'];
$customerHapiness=$row['hapiness'];
$customerRating=$row['rating'];




echo"<tr>
<td>$customerId</td>
<td>$customerFName</td>
<td>$customerLName</td>
<td>$customerAddress</td>
<td>$customerContactNo</td>
<td>$customerEmail</td>
<td>$customerReview</td>
<td>$customerHapiness</td>
<td>$customerRating</td>
<td>

<a href='delupd.php?updId= $customerId>'>
<button class='update'>View</button>

<a href='delupd.php?delId= $customerId>'>
<button class='delete'>Remove</button>
</a>
</td>





<tr>";

}


}




else{

}

?>





</tbody>

<!-- Table body will be filled dynamically with data from the database -->
</table>
</div>







       
  
       </div>
</body>
</html>