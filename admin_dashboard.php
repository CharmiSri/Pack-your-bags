<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourist Details</title>
    
    <style>
        table {
    width: 80%; 
    margin: 50px auto; 
    border-collapse: collapse;
    margin-top: 50px;
  }
  
  table,
  th,
  td {
    border: 1px solid #ddd; 
  }
  
  th,
  td {
    padding: 8px; 
    text-align: left; 
  }
  
  th {
    background-color: #394f8a;
    color: white;
    text-align: center;
  }
  
  tr:nth-child(even) {
    background-color: rgb(133, 175, 235); 
    text-align: center;
  }
  
  tr:nth-child(odd) {
    background-color: rgb(133, 175, 235); 
    text-align: center;
  }
  
  tr:hover {
    background-color:  rgb(57, 79, 138);
  }
  .top-background h3{
    font-size: 30px;
  }
    </style>
</head>
<body>
    <div class="top-background">
       <center>
       <h3>Tourists Details</h3>
       </center>
    </div>
    
    <table>
    
        <tr>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>ADDRESS</th>
            <th>LOCATION</th>
            <th>GUESTS</th>
            <th>ARRIVALS</th>
            <th>LEAVINGS</th>
    
            <!-- <th>Status</th> -->
        </tr>
        <?php
     
    
     $db_user = "root";
     $db_password = "";
     $db_name = "book_db";

     $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

     $sql = "SELECT * FROM book_form";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
             echo "<tr>";
             echo "<td>" . $row['name'] . "</td>";
             echo "<td>" . $row['email'] . "</td>";
             echo "<td>" . $row['phone'] . "</td>";
             echo "<td>" . $row['address'] . "</td>";
             echo "<td>" . $row['location'] . "</td>";
             echo "<td>" . $row['guests'] . "</td>";
             echo "<td>" . $row['arrivals'] . "</td>";
             echo "<td>" . $row['leavings'] . "</td>";
            
          
             echo "</tr>";
         }
     } else {
         echo "0 results";
     }
     ?>
    </table>


    
</body>
</html>