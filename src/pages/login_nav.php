<?php
    $loggedIn = isset($_COOKIE["name"]);
    $isAdmin = isset($_COOKIE["Admin"]) && $_COOKIE["Admin"] === "admin";

    if ($loggedIn) {
        echo '<span class="p-3 link-success">Welcome, ' . $_COOKIE['name'] . '</span>';
        echo '<a id="profile" class="p-3 link-secondary" href="profile.php"><i class="fa fa-user icon-hover"></i> Profile</a>';
        if ($isAdmin) {
            echo '<a id="admin" class="p-3 link-secondary" href="admin.php"><i class="fa fa-user-shield icon-hover"></i> Admin</a>';
        }
        echo '<a id="logout" class="p-3 link-secondary" href="logout.php"><i class="fa fa-sign-out icon-hover"></i> Logout</a>';
        
    } else {
        echo '<a id="login" class="p-1 link-success" href="login.php"><i class="fa-solid fa-right-to-bracket icon-hover"></i> Login</a>';
        echo '/';
        echo '<a id="login" class="p-1 link-success text-muted" href="create_account.php"><i class="fa-solid fa-user-plus icon-hover"></i> Create Account</a>';
    }
?>
