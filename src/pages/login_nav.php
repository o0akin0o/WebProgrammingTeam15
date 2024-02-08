<?php include('links.php'); ?>
<div class="container">
<div class="container mx-auto my-4 login_nav">
        <a id="login" class="p-3 link-success"  href="login.php"><i class="fa sign-in">Login</i></a>
        <a href="#" class="p-3 link-secondary" ><i class="fa fa-sign-out">Logout</i></a> 
    </div>
</div>


<?php $prevPage = $_SERVER['REQUEST_URI']; 
setcookie("prev_page", $prevPage, time() + 3600, "/");
?>