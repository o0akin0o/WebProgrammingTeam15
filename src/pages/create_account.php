<?php
// Connect db
include 'db_connection.php';
// Check form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from form
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $sql = "INSERT INTO Customers (name, email, phone, address, status, level, password)
            VALUES ('$name', '$email', '$phone', '$address', 0, 0, '$password')";

    if ($conn->query($sql) === TRUE) {
        // Close the connection
        $conn->close();
        echo "<script>
                alert('Account creation successful!');
                setTimeout(function() {
                    window.location.href = 'index.php';
                });
            </script>";

    } else {
        echo "<p class='alert alert-danger'>Account creation Failed: " . $conn->error . "</p>";
    }
}
?>

<script>
    function validateForm() {
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var retypePassword = document.getElementById("retype_password").value;
        var phone = document.getElementById("phone").value;

        // check phone is number
        if (isNaN(phone)) {
            alert("Phone must be a number.");
            return false;
        }
        // check email
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        // check password at least 6 characters
        if (password.length < 6) {
            alert("Password must be at least 6 characters long.");
            return false;
        }
        // check password and retypepassword
        if (password !== retypePassword) {
            alert("Password and Retype Password do not match.");
            return false;
        }
        return true; // Form valid
    }
</script>
<?php include('top_header.php'); ?>
    <body>
        <div class="container mx-auto my-4">
            <!-- NAV BAR -->
            <?php include ('header.php'); ?>
            <?php include ('second_nav.php'); ?>
            <div class="booking">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="margin-bottom: 15px;">
            <h3 class="booking-title">CREATE ACCOUNT</h3>  
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <form method="post" action="" display:flex onsubmit="return validateForm();">

                <fieldset>
                    <div class="form-group row d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
                        <label for="name" class="col-md-3 col-form-label">Name</label>
                        <div class="col-md-9">
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                    </div>                
                    <div class="form-group row d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
                        <label for="phone" class="col-md-3 col-form-label">Phone</label>
                        <div class="col-md-9">
                            <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
                        <label for="email" class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-9">
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
                        <label for="address" class="col-md-3 col-form-label">Address</label>
                        <div class="col-md-9">
                            <input type="text" id="address" name="address" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
                        <label for="password" class="col-md-3 col-form-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
                        <label for="retype_password" class="col-md-3 col-form-label">Retype Password</label>
                        <div class="col-md-9">
                            <input type="password" id="retype_password" name="retype_password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px;">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary submitaccount">Create Account</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
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

