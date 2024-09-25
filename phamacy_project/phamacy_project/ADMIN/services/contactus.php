<?php

session_start();
include"../config/dbConnection.php";

?>

<?php

$sql="SELECT * FROM contactus";
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
 <h2>Customer Messages</h2>
 <!-- <label for="username">Username:</label> -->
<br>

 <div class="dep">
 

 <!-- <label for="email">Email:</label> -->
 <input type="text" id="Name" name="Name" placeholder="Customer Name" required>

 <!-- <label for="address">Address:</label> -->
 <input type="text" id="Email" name="Email" placeholder="Customer Email" required>

 <!-- <label for="contactNo">Contact No:</label> -->
 <input type="text" id="number" name="number"  placeholder="Customer Contact Number" required>

 <!-- <label for="password">Password:</label> -->
 <input type="textarea" id="message" name="message" placeholder="Customer Message" required>



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

 <th>Customer Name</th>
 <th>Customer Email</th>
 <th>Contact Numbe</th>
 <th>Customer Message</th>
 <th>State</th>
 <th>Action</th>

 
</tr>
</thead>

<tbody>

<?php


if($result){
while($row=mysqli_fetch_assoc($result)){
  $customerId=$row['no'];
  $customerName=$row['name'];
$customerEmail=$row['email'];
$customerNumber=$row['number'];
$customerMessage=$row['message'];





echo"<tr>
<td>$customerName</td>
<td>$customerEmail</td>
<td>$customerNumber</td>
<td>$customerMessage</td>
<td>
replied
</td>

<td>

<a href='deleteItem.php?deleteId= $customerId>'>
<button class='update'>Replied</button>

<a href='deleteItem.php?deleteId= $customerId>'>
<button class='delete'>Undoo</button>
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