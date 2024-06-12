<?php
include 'middleware/isLoggedin.php';

echo 'Welcome ' . $_SESSION['name'] . '!';
?>

<a href="action/logout.php">Logout</a>