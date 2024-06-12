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
  exit('Please fill both the username and password fields!');
} else {
}
