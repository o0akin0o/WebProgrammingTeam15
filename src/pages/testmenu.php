<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('links.php'); ?>
    <title>Restaurant</title>
</head>
<body>

    <div class="container mx-auto my-4">

        <!-- NAV BAR -->
        <?php include('header.php'); ?>
        <!-- END OF NAV BAR -->
      

        <div class="container">

            <?php
            // Include your database connection code
            include('db_connection.php'); 

            // Fetch menu items from the database
            $sql = "SELECT * FROM menu_table";
            $result = $conn->query($sql);

            // Check if there are rows in the result
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Display each menu item dynamically
                    echo '<div class="row my-4 mt-4">';
                    echo '<div class="col-sm-1 col-md-1"></div>';
                    echo '<div class="col-sm-5 col-md-5">';
                    echo '<img class="imgmenu" src="' . $row['image_path'] . '" alt="Card image cap">';
                    echo '</div>';
                    echo '<div class="col-sm-5 col-md-5 bn-content">';
                    echo '<p class="">' . $row['name'] . '</p>';
                    echo '<p class="">' . $row['description'] . '</p>';
                    echo '<p class="">' . $row['price'] . '$</p>';
                    echo '<div class="card-body">';
                    echo '<a href="#" class="btn btn-primary">Order Now</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="col-sm-1 col-md-1"></div>';
                    echo '</div>';
                }
            } else {
                echo 'No menu items available.';
            }

            // Close the database connection
            $conn->close();
            ?>

        </div>

        <?php include('footer.php'); ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
</body>
</html>
