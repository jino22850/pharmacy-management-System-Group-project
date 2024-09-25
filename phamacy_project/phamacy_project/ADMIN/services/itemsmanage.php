<?php

session_start();
include"../config/dbConnection.php";


?>



<?php

$sql="SELECT * FROM items";
$result=mysqli_query($conn,$sql);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"   href="admin.css">
    <title>Items</title>
    
    
    <style>
      
     .side_navbar .activeItems{
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

.Main{
  width: 1300px;
height: 1100px;
margin-left: 200px;
margin-right: 0;
display: block;
  
}




   </style>
</head>
<body>
    <?php include 'adminDash.php'; ?>

  
    <div class="Main">

        <div>
       <form action="" method="post">
        <h2>Manage Items</h2>
        <!-- <label for="username">Username:</label> -->
      <br>

        <div class="dep">
        

        <!-- <label for="email">Email:</label> -->
        <input type="text" id="itemName" name="itemName" placeholder="Item Name" required>

        <!-- <label for="address">Address:</label> -->
        <input type="text" id="company" name="company" placeholder="Company Name" required>

        <!-- <label for="contactNo">Contact No:</label> -->
        <input type="text" id="price" name="price"  placeholder="Item Price" required>

        <!-- <label for="password">Password:</label> -->
        <input type="text" id="discount" name="discount" placeholder="Discount" required>

        <!-- <label for="password">Password:</label> -->
        <input type="text" id="discription" name="discription" placeholder="Item Discription" required>

       <!-- <label for="password">Password:</label> -->
       <input type="file" id="image" name="image" placeholder="Item Image" required>

        </div>
        <button type="submit" name ="submit" >Add</button>
        


    </form>
</div>



<div class="data-table-container" id="tbl">
  <table class="data-table">
    <thead>
      <tr>
      <th>Item Id</th>
        <th>Item Name</th>
        <th>Company Name</th>
        <th>Item Price</th>
        <th>Discount</th>
        <th>Item Description</th>
        <th>Action</th>
        
      </tr>
    </thead>

    <tbody>

    <?php

    
if($result){
  while($row=mysqli_fetch_assoc($result)){
    $itemId=$row['itemId'];
    $itemName=$row['itemName'];
    $companyName=$row['companyName'];
    $price=$row['price'];
    $discount=$row['discount'];
    $discription=$row['discription'];
    

   echo"<tr>
   <td>$itemId</td>
   <td>$itemName</td>
   <td>$companyName</td>
   <td>$price</td>
   <td>$discount</td>
   <td>$discription</td>
   <td>
  
   <a href='#?updId=$itemId,updname=$itemName,updcom=$companyName,updprice=$price,upddiscount=$discount,upddiscription=$discription'>
    <button class='update' onclick='setvalue()'>Update</button>
  </a>

  <!--<button class='update' '>Update</button>-->

  <a href='delupd.php?delId=$itemId'>
  <button class='delete'>Delete</button>


  


  
</a>


</td>

  

   

    <tr>";
   



    /*<a href='deleteItem.php?param=$itemId'>
    <button class='update'>Update</button>
  </a>
  
  <a href='deleteItem.php?deleteId= $itemId;>'>
    <button class='delete'>Delete</button>
  </a>*/


  

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


<!--<script>

function setvalue(){
  document.getElementById('itemName').value='$itemName';
  document.getElementById('company').value='$companyName';
  document.getElementById('price').value='$price';
  document.getElementById('discount').value='$discount';
  document.getElementById('discription').value='$discription';
  
}

</script>-->