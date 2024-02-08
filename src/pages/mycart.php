            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="styles.css">
                    <?php include('links.php') ?>
                    <title>Restaurant</title>
                </head>
                <body>
                        <div class="container mx-auto my-4">
                         <?php include 'header.php'; ?>
                       
                       
                       
                       
                       
                        <!-- MY CART -->
                        
                        <div class="container mx-auto my-4">
                        <a id="cart" class="link-success"  href="mycart.php"><i class="fa-solid fa-cart-shopping">My Cart (1)</i></a>
                       </div>
                       
                       <!-- CART -->
                       <div class="container">
                       <form>
    <div class="form-group row">
                       <div class="jumbotron row mx-auto my-4">
                      <h1 class="display-4">My Cart</h1>
                      <hr class="my-4">
                      <table class="table table-bordered table-responsive">
              <thead class="thead-dark">
                <tr>
                  <th scope="" class="col-sm-1">Id</th>
                  <th scope="" class="col-sm-3">Name</th>
                  <th scope="" class="col-sm-2">Price</th>
                  <th scope="" class="col-sm-1">Quantity</th>
                  <th scope="" class="col-sm-3">Total</th>
                  <th scope="" class="col-sm-1">Update</th>
                  <th scope="" class="col-sm-1">Delete</th>
                </tr>
              </thead>
              
              
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>
                  
 
                  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">

                  
                  </td>
                  <td>Mark</td>
                  <td> <input type="submit" class="form-control btn btn-outline-success" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="Update"></td>
                  <td> <input type="submit" class="form-control btn btn-outline-danger" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="Delete"></td>
                </tr>
                <tr>
                <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>Mark</td>
                  <td>Otto</td>
                </tr>
                <tr>
                <th scope="row"></th>
                  <td>Total</td>
                  <td></td>
                  <td></td>
                  <td>$$$</td>
                  <td></td>
                </tr>
              </tbody>
            </table>
            
              
                      <p class="lead">
                        <a class="btn btn-primary btn-lg" href="#" role="button">Complete</a>
                      </p>
                    </div>
                       </div>
        </form>
                    </div> 
                       
                       
                        <?php include 'footer.php'; ?>
                       </div><!-- END OF CONTAINER -->
                    
                   <script
                       src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                       integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
                       crossorigin="anonymous"></script>
                 
               
               </body>
            </html>