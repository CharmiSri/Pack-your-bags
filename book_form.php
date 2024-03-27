<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $location=$_POST['location'];
    $guests=$_POST['guests'];
    $arrivals=$_POST['arrivals'];
    $leavings= $_POST['leaving'];

  
$connection = new mysqli('localhost','root','','book_db');
    if($connection->connect_error){
        die("Connection Failed : ". $connection->connect_error);
    } else {
        $stmt = $connection->prepare("INSERT INTO `book_form` (`name`,`email`,`phone`,`address`,`location`,`guests`,`arrivals`,`leavings`) VALUES(?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssisssss", $name, $email, $phone, $address, $location, $guests, $arrivals, $leavings);

        $execval = $stmt->execute();
        if ($execval) {
            echo "<script>alert('Hello $name,Your trip has been booked successfully. Thank you for choosing our service.Have a great trip!');</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }
        $stmt->close();
        $connection->close();
    }
}
?>