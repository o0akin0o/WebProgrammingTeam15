<?php
// what to do with the data
if (isset($_POST['submit'])){
$Name = $_POST["Name"];
$Phone =$_POST["Phone"];
$Numberofpeople =$_POST["Numberofpeople"];
$Date=$_POST["Date"];
$Time =$_POST["Time"];


// connect to the database server
include 'dbconnection.php';

// write sql statement to insert data
INSERT INTO `Booking` (`id`, `customer_id`, `customer_name`, `Phone`, `booking_date`, `booking_time`, `number_of_guest`, `status`) VALUES (NULL, NULL, $Name, $Phone, $Numberofpeople, $Date, $Time,'Pending');

if ($conn->query($sql)===TRUE){
    echo "Your data was recorded";

}
else {
    echo "Error:" .$sql . "<br>" . $conn->error;
}

// close database connection
$conn->close();
}







?>