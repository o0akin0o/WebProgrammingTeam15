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
                        <a id="cart" class="link-success"  href="cart.php"><i class="fa-solid fa-cart-shopping">My Cart (1)</i></a>
                       </div>
                       
                       <!-- CART -->
                       <div class="container">
                       <?php 
                      if(isset($_GET['action'])){
                        var_dump($_POST); exit;
                      
                      }
            
                       ?>
                       <!-- FORM -->
                       <form id="cart-form" action="cart.php?action=submit" method="POST">
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
                
                  <th scope="" class="col-sm-1">Delete</th>
                </tr>
              </thead>
              
              
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Spinach, Tuna, and Egg Salad</td>
                  <td>15.00$</td>
                  <td>
                  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="quantity[]">
                  </td>
                  <td>15.00€</td>
                 
                  <td> <input type="submit" class="form-control btn btn-outline-danger" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="Delete" name="delete_click"></td>
                </tr>
                
                <tr>
                  <th scope="row">2</th>
                  <td>Teriyaki Salmon</td>
                  <td>19.25€</td>
                  <td>
                  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="quantity[]">
                  </td>
                  <td>19.25€</td>
                  
                  <td> <input type="submit" class="form-control btn btn-outline-danger" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="Delete" name="delete_click"></td>
                </tr>
                
                <tr>
                  <th scope="row">3</th>
                  <td>Lemon Herb Chicken</td>
                  <td>17.50€</td>
                  <td>
                  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="quantity[]">
                  </td>
                  <td>19.25€</td>
                  
                  <td> <input type="submit" class="form-control btn btn-outline-danger" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="Delete" name="delete_click"></td>
                </tr>
              
                <th scope="row"></th>
                  <td><strong>Total</strong></td>
                  <td></td>
                  <td></td>
                  <td><strong>51.75€</strong></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
            <div class="submit-booking">
                
                <input type="submit" class="btn btn-primary submit" name="update_click" value="Update"></input></div>
            </div>
          </div>
        </form>
        
        <!-- END CART -->
        <hr class="my-4">
        <!-- CUSTOMER DETAIL FORM -->
        <div class="row">
        
        <div class="col-md-6">
        <div class="jumbotron">
  <h1 class="display-4">Order Review</h1>
  <p class="lead">Spinach, Tuna, and Egg Salad (1)</p>
  <p class="lead">Lemon Herb Chicken (1)</p>
  <p class="lead">Teriyaki Salmon (1)</p>
  <p class="lead">Shipping: 5€</p>
  <p class="lead">Tax: 5%</p>
  <hr class="my-4">
  <h3>Total: 51.75€</h3>
   
</div>
        </div>
      
        <div class="col-md-6">
        <form id="cart-form" action="cart.php?action=submit" >
                <fieldset>
                  <div class="form-group">
                    <label for="" class="p-2">Name</label>
                    <input type="text" id="" class="form-control" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="" class="p-2">Phone</label>
                    <input type="text" id="" class="form-control" placeholder="Phone">
                  </div>
                  <div class="form-group">
                    <label for="" class="p-2">Address</label>
                    <input type="text" id="" class="form-control" placeholder="123 Lesmurine">
                  </div>
                  <div class="form-group">
                    <label for="" class="p-2">Note</label>
                    <input type="text" id="" class="form-control" placeholder="Some notes">
                  </div>
                 
                <div class="submit-booking">
                
                  <input type="submit" class="btn btn-primary submit" name="order_click"></input></div>
                </fieldset>
              </form>
            </div>
            
            <div class="col-md-1"></div>
            </div>
        
        
       <!-- END OF CUSTOMER DETAIL FORM  -->
        
        
        
        
        
        
                    </div> 
                       
                       
                        <?php include 'footer.php'; ?>
                       </div><!-- END OF CONTAINER -->
                    
                   <script
                       src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                       integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
                       crossorigin="anonymous"></script>
                 
               
               </body>
            </html>