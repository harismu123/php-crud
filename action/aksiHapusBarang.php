<?php

include '../middleware/isLoggedin.php';
include 'dbcon.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "DELETE FROM barang WHERE id = $id";

  if ($con->query($sql) === TRUE) {
    $_SESSION['success'] = "Data berhasil dihapus";
    header('Location: ../home.php');
    exit;
  } else {
    $_SESSION['flash'] = "Error: " . $sql . "<br>" . $con->error;
    header('Location: ../home.php');
    exit;
  }
} else {
  $_SESSION['flash'] = "Data tidak boleh kosong";
  header('Location: ../home.php');
  exit;
}
