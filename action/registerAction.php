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

if (!isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['conf_password'])) {
  $_SESSION['flash'] = 'Please fill all the fields!';
  header('Location: ../register.php');
  exit;
} else {
  if ($_POST['username'] == '' || $_POST['password'] == '' || $_POST['email'] == '' || $_POST['conf_password'] == '') {
    $_SESSION['flash'] = 'Please fill all the fields!';
    header('Location: ../register.php');
    exit;
  }

  if ($_POST['password'] != $_POST['conf_password']) {
    $_SESSION['flash'] = 'Password dan konfirmasi password tidak sama!';
    header('Location: ../register.php');
    exit;
  }

  $sql = "SELECT id FROM users WHERE username = '$_POST[username]'";
  if ($result = mysqli_query($con, $sql)) {
    if (mysqli_num_rows($result) > 0) {
      $_SESSION['flash'] = 'Username sudah terdaftar!';
      header('Location: ../register.php');
      exit;
    } else {
      $sql = "INSERT INTO users (username, email, password) VALUES ('$_POST[username]', '$_POST[email]', '$_POST[password]')";
      if ($con->query($sql) === TRUE) {
        $_SESSION['success'] = 'Registrasi berhasil!';
        header('Location: ../index.php');
      } else {
        $_SESSION['flash'] = 'Registrasi gagal!';
        header('Location: ../register.php');
      }
    }
  } else {
    $_SESSION['flash'] = 'Something went wrong!';
    header('Location: ../register.php');
  }
}
