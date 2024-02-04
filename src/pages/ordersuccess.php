<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('links.php'); ?>
    <title>Thank You for Your Order</title>
</head>
<body>

    <div class="container mx-auto my-4 text-center">
        <!-- NAV BAR -->
        <?php include ('header.php'); ?>
        <!-- END OF NAV BAR -->

        <div class="container">
            <h1 class="my-4">Thank You for Your Order!</h1>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Order Summary</h3>
                            <p class="card-text">Peperroni Pizzas: 3</p>
                            <p class="card-text">Price: 15 euros each</p>
                            <p class="card-text">Raspberry Cocktails: 1</p>
                            <p class="card-text">Price: 10 euros each</p>
                            <p class="card-text">Salads: 1</p>
                            <p class="card-text">Price: 5 euros each</p>
                            <p class="card-text">Total Amount: 70 euros</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include ('footer.php'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
</body>
</html>
