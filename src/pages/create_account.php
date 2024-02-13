<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Create Account</title>
    <style>
        .row {
            margin-bottom: 21px; 
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;

        }
        .form-inline label {
            display: block;
            align-items: center;
        }

        .form-inline .form-group {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
<?php
// Kết nối đến cơ sở dữ liệu
include 'db_connection.php';

// Kiểm tra xem form đã được gửi đi hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    // Lấy dữ liệu từ form
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $sql = "INSERT INTO Customers (name, email, phone,address,status,level,password)
            VALUES ('$name','$email','$phone','$address',0,0,'$password')";

    if ($conn->query($sql) === TRUE) {
        $mess="Create Account Success";
    } else {
        $mess="Create Account Fail";
    }

    $conn->close();
}

?>
<?php include 'header.php'; ?>
<div class="booking">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h3 class="booking-title">CREATE ACCOUNT</h3>  
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post" action="" display:flex>
                <fieldset>
                    <div class="form-group row d-flex align-items-center justify-content-between">
                        <label for="name" class="col-md-2 col-form-label">Name</label>
                        <div class="col-md-10">
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                    </div>                
                    <div class="form-group row d-flex align-items-center justify-content-between">
                        <label for="phone" class="col-md-2 col-form-label">Phone</label>
                        <div class="col-md-10">
                            <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center justify-content-between">
                        <label for="email" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-10">
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center justify-content-between">
                        <label for="address" class="col-md-2 col-form-label">Address</label>
                        <div class="col-md-10">
                            <input type="text" id="address" name="address" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center justify-content-between">
                        <label for="password" class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-10">
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center justify-content-between">
                        <label for="retype_password" class="col-md-2 col-form-label">Retype Password</label>
                        <div class="col-md-10">
                            <input type="password" id="retype_password" name="retype_password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary submitaccount">Create Account</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 margin: 20px 0 20px 40%">
                            <?php if (!empty($mess)): ?>
                                <p><?php echo $mess; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
