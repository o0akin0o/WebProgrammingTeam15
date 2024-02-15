<?php $prevPage = $_SERVER['REQUEST_URI'];
setcookie("prev_page", $prevPage, time() + 3600, "/");
?>
<?php
    if (!isset($_COOKIE['customersid'])) {
        // if not login redirect to index.php
        header("Location: index.php");
        exit; 
    }
    $customersid = $_COOKIE['customersid'];
    if ($customersid) {
        include 'db_connection.php';
        $sql = "SELECT * FROM Customers where id='$customersid'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $name= $row["name"];
        $email= $row["email"];
        $phone= $row["phone"];
        $address= $row["address"];
    } else {
        $prevPage = $_COOKIE['prev_page'];
        header("Location: $prevPage"); 
    }
?>
<?php
ob_start(); 
if (isset($_POST['update_click'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $errors = array();

    // check name not null
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    // check email not null and valid
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // check phone not nut and is number
    if (empty($phone)) {
        $errors[] = "Phone is required.";
    } elseif (!is_numeric($phone)) {
        $errors[] = "Phone must be a number.";
    }

    // check address not null
    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    // if error get alert and not update
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    } else {
        // Update table Customers
        $sqlUpdate = "UPDATE Customers SET name='$name', email='$email', phone='$phone', address='$address' WHERE id='$customersid'";
        if ($conn->query($sqlUpdate) === TRUE) {
            // show success and redirect
            echo "<script>
                alert('Update successful!');
                setTimeout(function() {
                    window.location.href = 'profile.php';
                }, 1000);
            </script>";
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

ob_end_flush(); 
?>


<?php include('top_header.php'); ?>
    <body>
        <div class="container mx-auto my-4">
            <!-- NAV BAR -->
            <?php include ('header.php'); ?>
            <?php include ('second_nav.php'); ?>
            <!-- END OF NAV BAR -->
            <form id="cart-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                       <div class="form-group row">
                       <div class="jumbotron row mx-auto my-4">
                      <h1 class="display-4">Information</h1>
                      <hr class="my-4">
                      <table class="table table-bordered table-responsive table-striped">
                <tbody>
                <?php
                    echo '<tr>
                        <th scope="row">Name</th>
                        <td>
                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-name-sm" name="name" value="' . $name . '">
                        </td>              
                        </tr>';
                ?>
                <?php
                    echo '<tr>
                        <th scope="row">Phone</th>
                        <td>
                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-phone-sm" name="phone" value="' . $phone . '">
                        </td>              
                        </tr>';
                ?>
                <?php
                    echo '<tr>
                        <th scope="row">Email</th>
                        <td>
                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-email-sm" name="email" value="' . $email . '">
                        </td>              
                        </tr>';
                ?>
                <?php
                    echo '<tr>
                        <th scope="row">Address</th>
                        <td>
                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-address-sm" name="address" value="' . $address . '">
                        </td>              
                        </tr>';
                ?>
              </tbody>
            </table>
            <div class="submit-booking">
                <input type="submit" class="btn btn-primary submit" name="update_click" value="Update"></input>
            </div>
          </div>
        </form>
         <!-- END FORM -->
            <?php include 'footer.php'; ?>
        </div>       
    </body>
