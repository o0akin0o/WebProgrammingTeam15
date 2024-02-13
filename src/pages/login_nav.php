<?php include('links.php');?>
<div class="container">
<div class="container">
    <div class="row justify-content-end">
        <div class="col-md-auto">
            <div class="container mx-auto my-4 login_nav">
            <?php
                $loggedIn = isset($_COOKIE["name"]);
                if ($loggedIn) {
                    echo '<span class="p-3 link-success">Welcome, ' . $_COOKIE['name'] . '</span>';
                    echo '<a id="logout" class="p-3 link-secondary" href="logout.php"><i class="fa fa-sign-out">Logout</i></a>';
                } else {
            
                echo '<a id="login" class="p-3 link-success" href="login.php"><i class="fa sign-in">Login</i><span class="p-1"></span><i class="fa-solid fa-right-to-bracket "></i></a>';
                }
            ?>
            </div>
        </div>
    </div>
</div>
</div>
