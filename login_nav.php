<?php
    $loggedIn = isset($_COOKIE["name"]);
    $isAdmin = isset($_COOKIE["Admin"]) && $_COOKIE["Admin"] === "admin";

    if ($loggedIn) {
        echo '<span class="p-3 link-success">Welcome, ' . $_COOKIE['name'] . '</span>';
        echo '<a id="profile" class="p-3 link-secondary" href="profile.php"><i class="fa fa-user"></i> Profile</a>';
        if ($isAdmin) {
            echo '<a id="admin" class="p-3 link-secondary" href="admin.php"><i class="fa fa-user-shield"></i> Admin</a>';
        }
        echo '<a id="logout" class="p-3 link-secondary" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>';
        
    } else {
        echo '<a id="login" class="p-1 link-success" href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Login</a>';
        echo '/';
        echo '<a id="login" class="p-1 link-success text-muted" href="create_account.php"><i class="fa-solid fa-user-plus"></i> Create Account</a>';
    }
?>
