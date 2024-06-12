<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'dev';
$DATABASE_PASS = 'passwordmysql';
$DATABASE_NAME = 'php-crud';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['username'], $_POST['password'])) {
  $_SESSION['flash'] = 'Please fill both the username and password fields!';
  header('Location: ../index.php');
  exit;
} else {
  if ($_POST['username'] == '' || $_POST['password'] == '') {
    $_SESSION['flash'] = 'Please fill both the username and password fields!';
    header('Location: ../index.php');
    exit;
  }

  $sql = "SELECT id, email FROM users WHERE username = '$_POST[username]' AND password = '$_POST[password]'";

  if ($result = mysqli_query($con, $sql)) {
    if (mysqli_num_rows($result) == 1) {
      session_regenerate_id();
      $_SESSION['loggedin'] = true;
      $_SESSION['name'] = $_POST['username'];
      $_SESSION['email'] = mysqli_fetch_assoc($result)['email'];
      header('Location: ../home.php');
    } else {
      $_SESSION['flash'] = 'Invalid username or password!';
      header('Location: ../index.php');
    }
  } else {
    $_SESSION['flash'] = 'Something went wrong!';
    header('Location: ../index.php');
  }
}
