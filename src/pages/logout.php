<?php
// Logout
    // Delete cookie by set time exp to the past
    setcookie("name", "", time() - (86400 * 30), "/");
    // Redirect to prev page
    $prevPage = $_COOKIE['prev_page'];
    header("Location: $prevPage");
    exit;

?>
