<?php
include 'db_connection.php';
// CHECK USER FORM
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // GET USER INPUT
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM Customers where email='$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $passwddb= $row["password"];
    $name= $row["name"];
    $customersid=$row["id"];
    // VALIDATE INPUT INFO
    if ($passwddb==$password) {
        // IF SUCCESS, REDIRECT
        setcookie("name", $name, time() + (86400 * 30), "/");
        setcookie("customersid", $customersid, time() + (86400 * 30), "/"); // COOKIE VALIDS IN 30 DAYS
        $sql1="select * from Customers c inner join Admin a on c.id=a.customer_id and a.role='Admin' and c.id='$customersid'";
        $result = $conn->query($sql1);
        $row = $result->fetch_assoc();
        if ($result->num_rows > 0) {
            setcookie("Admin", 'admin', time() + (86400 * 30), "/");
        }
        $prevPage = $_COOKIE['prev_page'];
        header("Location: $prevPage");
        exit;
    } else {
        // SHOWS ERROR IF FAIL TO LOG IN
        echo "<p class='alert alert-danger'>Wrong password or don't have account </p>";
    }
}
?>
<?php include('top_header.php'); ?>
    <body>
        <div class="container mx-auto my-4">
            <!-- NAV BAR -->
            <?php include ('header.php'); ?>
            <?php include ('second_nav.php'); ?>
            <div class="login">
    <div class="row" style="margin-top: 25px;">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
            <h3 class="login-title">LOGIN</h3>  
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row" style="margin-top: 25px;">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post" action="" display:flex>
                <fieldset>
                    <div class="form-group row d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
                        <label for="email" class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-9">
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
                        <label for="password" class="col-md-3 col-form-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 25px;">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary loginbtn">Login</button>
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
        <div class="form-group" style="margin-bottom: 25px;">
            <div class="col-md-12 d-flex justify-content-end">
                <label class="col-md-4 col-form-label text-right"></label>
                <label class="col-md-3 col-form-label text-right">******** If you don't have an account, please</label>
                <a href="create_account.php" class="col-md-5 col-form-label">create new account</a>
            </div>
        </div>
    </div>
</div>

            <?php include 'footer.php'; ?>

