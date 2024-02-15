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

<div class="container mx-auto my-4">
    <!-- NAV BAR -->
    <?php include ('admin_header.php'); ?>
    <!-- END OF NAV BAR -->

    <div class="container">
        <h1 class="my-4">Admin Page</h1>

        <!-- Display order list table and buttons -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    
                    <br>
                    
                        <!-- A.Fetch order list from the database -->

                     <?php
                        include 'db_connection.php';
                        // Check if 'id' parameter is set in the URL
                        if (isset($_GET['id'])) {
                            $a = $_GET['id'];
                            $result = mysqli_query($conn, "SELECT * FROM Orders WHERE id = '$a'");
                            $row = mysqli_fetch_array($result);
                        } else {
                            
                            echo "No order ID specified.";
                            exit; 
                        }
                    ?>
                        

                        <h2> Update Order: </h2>
                        <br>
                        <form name= "form1" method="post" action="">
                            <div class="row">
                                <div class="col">
                                <label for="formControlInput" class="form-label">Customer Name:</label>
                                <input type="text" class="form-control" placeholder="Customer Name" name="name" required value=" <?php echo $row['name']; ?>" required minlength = "3" maxilength = "15" id ="name" >
                                </div>
                                <div class="col">
                                <label for="formControlInput" class="form-label">Total Orders:</label>
                                <input type="text" class="form-control" placeholder="Total Orders" name="total" required value="<?php echo $row['total']; ?>" >
                             </div>

                        <br> 
                        <br> 
                            <div class="row">
                                <div class="col">
                                <label for="formControlInput" class="form-label">Order Status:</label>
                                <select class="form-select" name="Status" required>
                                <option value="">Select Status</option>
                                <option value="Pending" <?php if($row['Status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                                <option value="Processing" <?php if($row['Status'] == 'Processing') echo 'selected'; ?>>Processing</option>
                                <option value="Completed" <?php if($row['Status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                                </select>
                                <br>
                            </div>

                                <div class="col">
                                <label for="formControlInput" class="form-label">Order's note: </label>
                                <input type="text" class="form-control" placeholder="Update note" name="note" required value="<?php echo $row['note']; ?>">    
                                </div>

                            </div>
                        <br>
                        <br>
                            <div class="row">
                            <div class="col"><button type="submit" class="btn btn-primary me-5" name="UpdateOrder">Update Order</button></div>
                            
                            <br>
                            <br>
                        
                           <p><a href="admin.php">Back to Order list</a></p>

                            </div>
                        </form> 
                        <br>
                        <br>

                        



                        <script>
                         //fuction to validate name

                        function validateName (){
                        const name = document.getElementById ("name").value;
                        const nameError = document.getElementById ("nameError");
                        }

                        if(name.length<3 || name.length >15){
                            nameError.innerHTML = "Name must be 3 & 30 characters";
                            return false;
                        }else{
                            nameError.innerHTML = "";
                            return true;
                        }


                        // event listeners for real time validation
                         documnent.getElementById("name").addEventListener ("input", validateName);   

                        </script>





                    <?php
                        // check if update suceffully or not
                        if (isset($_POST['UpdateOrder'])){
                            
                            $OrderStatus = $_POST['Status'];
                            $CustomerName = $_POST['name'];
                            $Note = $_POST['note'];

                            $query = mysqli_query($conn,"UPDATE Orders set name='$CustomerName', Status='$OrderStatus', note = '$Note' where id='$a'");
                        if($query){
                            echo "<span style='font-size: larger;'><b>Your information is updated Successfully</b></span>"; // inform when record sucessfully
                            
                           
                        }
                        else { echo "Record Not modified";}
                        }

                        

                        $conn->close();

                    ?>
            <br>
            <br>

    <?php include ('footer.php'); ?>




</body>
</html>
