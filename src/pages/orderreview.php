<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('links.php'); ?>
    <title>Cart</title>
</head>
<body>

    <div class="container mx-auto my-4">
        <!-- NAV BAR -->
        <?php include ('header.php'); ?>
        <!-- END OF NAV BAR -->

        <div class="container">
            <h1 class="my-4">Order Review</h1>

            <?php
            // Assume the customer has added 3 pizzas, each priced at 15 euros, 1 cocktail priced at 10 euros, and 1 salad priced at 5 euros
            $numberOfPizzas = 3;
            $pizzaPrice = 15;
            $numberOfCocktails = 1;
            $cocktailPrice = 10;
            $numberOfSalads = 1;
            $saladPrice = 5;

            $totalAmount = ($numberOfPizzas * $pizzaPrice) + ($numberOfCocktails * $cocktailPrice) + ($numberOfSalads * $saladPrice);
            ?>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Customer Information</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">First Name:</label>
                                    <input type="text" class="form-control" id="firstName" value="John" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="lastName" class="form-label">Last Name:</label>
                                    <input type="text" class="form-control" id="lastName" value="Doe" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone:</label>
                                    <input type="text" class="form-control" id="phone" value="415-123-1234" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address:</label>
                                    <input type="text" class="form-control" id="address" value="12 Lesmurine, Hammelinna 1311" readonly>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Order Summary</h3>
                            <p class="card-text">Peperroni Pizzas: <?php echo $numberOfPizzas; ?></p>
                            <p class="card-text">Price: <?php echo $pizzaPrice; ?> euros</p>
                            <p class="card-text">Rasberry Cocktails: <?php echo $numberOfCocktails; ?></p>
                            <p class="card-text">Price: <?php echo $cocktailPrice; ?> euros</p>
                            <p class="card-text">Salads: <?php echo $numberOfSalads; ?></p>
                            <p class="card-text">Price: <?php echo $saladPrice; ?> euros</p>
                            <p class="card-text">Total Amount: <?php echo $totalAmount; ?> euros</p>
                            <button class="btn btn-primary">Complete Order</button>
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
