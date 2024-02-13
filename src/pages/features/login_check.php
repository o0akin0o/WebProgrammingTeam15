<?php
// check user login by cookie
$loggedIn = isset($_COOKIE["name"]);

if ($loggedIn) {
    $link = 'menu.php'; // if login then load menu page again
} else {
    $link = 'login.php'; // if not login then redirect to login page
}
?>
<?php $prevPage = $_SERVER['REQUEST_URI'];
setcookie("prev_page", $prevPage, time() + 3600, "/");
?>