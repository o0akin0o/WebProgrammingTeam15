<?php
include 'db_connection.php';
// Kiểm tra nếu người dùng đã gửi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form đăng nhập
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM Customers where email='$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $passwddb= $row["password"];
    $name= $row["name"];
    // Kiểm tra thông tin đăng nhập
    if ($passwddb==$password) {
        // Nếu đăng nhập thành công, thiết lập cookie và chuyển hướng đến trang chính
        setcookie("name", $name, time() + (86400 * 30), "/"); // Cookie có hiệu lực trong 30 ngày
        header("Location: index.php");
        exit;
    } else {
        // Nếu đăng nhập không thành công, hiển thị thông báo lỗi
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Create Account</title>
    <style>
        .row {
            margin-bottom: 21px; /* Khoảng cách giữa các dòng */
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
<?php include 'header.php'; ?>
<div class="booking">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h3 class="booking-title">LOGIN</h3>  
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post" action="" display:flex>
                <fieldset>
                    <div class="form-group row d-flex align-items-center justify-content-between">
                        <label for="email" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-10">
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center justify-content-between">
                        <label for="password" class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-10">
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary loginbtn">Login</button>
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
