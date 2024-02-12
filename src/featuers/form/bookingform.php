<?php include 'header.php'; ?>
<?php
// what to do with the data
if (isset($_POST['submit'])){
$BookingID = $_POST["BookingID"];
$Name = $_POST["Name"];
$ContactNumber =$_POST["ContactNumber"];
$BookingDate =$_POST["BookingDate"];
$BookingTime =$_POST["BookingTime"];
$Email =$_POST["Email"];
$NumberofGuests =$_POST["NumberofGuests"];

// connect to the database server
include 'db_connections.php';

// write sql statement to insert data
$sql = "insert into customertable(BookingId,Name,ContactNumber,BookingDate,BookingTime,Email,NumberofGuests)
value ('$BookingID','$Name','$ContactNumber','$BookingDate','$BookingTime','$Email','$NumberofGuests')";

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
 <?php include 'footer.php'; ?>