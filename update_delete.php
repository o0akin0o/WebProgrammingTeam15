<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin Page</title>
</head>
<body>

<?php include "header.php"?>

<?php

include 'db.php';
$a = $_GET['ID'];
$result = mysqli_query($conn,"SELECT * FROM Orders WHERE ID = '$a'");
$row= mysqli_fetch_array($result);
?>

<h2> Update Order: </h2>
<form name= "form1" method="post" action="">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Customer Name" name="CustomerName" required value="<?php echo $row['CustomerName']; ?>" >
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
    <select class="form-select" name="OrderStatus" required>
      <option value="">Select Status</option>
      <option value="Pending" <?php if($row['OrderStatus'] == 'Pending') echo 'selected'; ?>>Pending</option>
      <option value="Processing" <?php if($row['OrderStatus'] == 'Processing') echo 'selected'; ?>>Processing</option>
      <option value="Completed" <?php if($row['OrderStatus'] == 'Completed') echo 'selected'; ?>>Completed</option>
    
    </select>
  </div>

    <div class="col">
      <input type="date" class="form-control" placeholder="Order Date" name="OrderDate" required value="<?php echo $row['OrderDate']; ?>">    
    </div>

  </div>
<br>
  <div class="row">
  <div class="col"><button type="submit" class="btn btn-primary me-5" name="UpdateOrder">Update Order</button></div>
  <div class="col"><button type="submit" class="btn btn-primary me-5" name="DeleteOrder">Delete Order</button></div>
</div>
</form> 
   


<br>
<br>


<?php

if (isset($_POST['UpdateOrder'])){
    
  $OrderStatus = $_POST['OrderStatus'];
  $CustomerName = $_POST['CustomerName'];
  $OrderDate = $_POST['OrderDate'];

  $query = mysqli_query($conn,"UPDATE Orders set CustomerName='$CustomerName', OrderStatus='$OrderStatus', OrderDate= '$OrderDate' where ID='$a'");
  if($query){
      echo "<h2>Your information is updated Successfully</h2>";
      // if you want to redirect to update page after updating
  }
  else { echo "Record Not modified";}
  }

  if (isset($_POST['DeleteOrder'])){
      $query = mysqli_query($conn,"DELETE FROM Orders where ID='$a'");
      if($query){
          echo "Record Deleted with id: $a <br>";
          // if you want to redirect to update page after updating
          //header("location: update.php");
      }
      else { echo "Record Not Deleted";}
      }

$conn->close();

?>
<?php include "footer.php"?>