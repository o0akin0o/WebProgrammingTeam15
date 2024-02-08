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
                
                <th scope="row"></th>
                  <td><strong>Total</strong></td>
                  <td></td>
                  <td></td>
                  <td><strong>$$$</strong></td>
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
        
        <!-- END CART -->
        <hr class="my-4">
        <!-- CUSTOMER DETAIL FORM -->
        <div class="row">
        
        <div class="col-md-6">
        <div class="jumbotron">
  <h1 class="display-4">Order Details</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  
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
                    <input type="text" id="" class="form-control" placeholder="1">
                  </div>
                  <div class="form-group">
                    <label for="" class="p-2">Note</label>
                    <input type="text" id="" class="form-control" placeholder="Some notes">
                  </div>
                 
                <div class="submit-booking">
                
                  <button type="submit" class="btn btn-primary submit">Complete Order</button></div>
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