<!-- MOCKUP DATA FOR MENU -->


<?php
                    // Your menu items array (replace this with your actual menu data)
                    $menuItems = [
                        ['title' => 'Grilled Steak Kabobs', 'category' => 'Main Dishes', 'image' => './img/barbeque.jpg'],
                        ['title' => 'Honey Sesame Tofu', 'category' => 'Main Dishes', 'image' => './img/food7.jpg'],
                        ['title' => 'Coconut & Citrus Green', 'category' => 'Drinks', 'image' => './img/food6.jpg'],
                        ['title' => 'Blackberry Apple', 'category' => 'Drinks', 'image' => './img/food5.jpg'],
                    ];

                    // Iterate through menu items and generate dynamic content
                    foreach ($menuItems as $menuItem) {
                        ?>
                        <div class="card text-center shadow p-3 mb-5 bg-white rounded" style="width: 14rem; height: auto;">
                            <img class="card-img-top index-food" src="<?php echo $menuItem['image']; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $menuItem['title']; ?></h5>
                                <p class="card-text"><?php echo $menuItem['category']; ?></p>
                                <!-- Dynamic Order button link -->
                                <a href="#" class="btn btn-primary">Order</a>
                            </div>
                        </div>
                    <?php } ?>