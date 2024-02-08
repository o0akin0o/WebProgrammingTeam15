<?php
// Logout
    // Delete cookie by set time exp to the past
    setcookie("name", "", time() - (86400 * 30), "/");
    // Redirect to index page
    header("Location: index.php");
    exit;

?>
