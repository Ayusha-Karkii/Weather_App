
<?php
// Database connections
 $servername="localhost";
 $username="root";
 $password="";
// create a new mysqli connection
 $conn = new mysqli($servername, $username, $password,"ayushadb");
 //check if the conection is successful
 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 
 
?>