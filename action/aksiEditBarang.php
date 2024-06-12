<?php

include '../middleware/isLoggedin.php';
include 'dbcon.php';

if (isset($_POST['id']) && isset($_POST['nama']) && isset($_POST['satuan']) && isset($_POST['harga'])) {

  if ($_POST['id'] == '' || $_POST['nama'] == '' || $_POST['satuan'] == '' || $_POST['harga'] == '') {
    $_SESSION['flash'] = "Data tidak boleh kosong";
    header('Location: ../editBarang.php?id=' . $_POST['id']);
    exit;
  }

  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $satuan = $_POST['satuan'];
  $harga = $_POST['harga'];

  $sql = "UPDATE barang SET nama = '$nama', satuan = '$satuan', harga = '$harga' WHERE id = $id";

  if ($con->query($sql) === TRUE) {
    $_SESSION['success'] = "Data berhasil diubah";
    header('Location: ../home.php');
    exit;
  } else {
    $_SESSION['flash'] = "Error: " . $sql . "<br>" . $con->error;
    header('Location: ../editBarang.php?id=' . $_POST['id']);
    exit;
  }
} else {
  $_SESSION['flash'] = "Data tidak boleh kosong";
  header('Location: ../editBarang.php?id=' . $_POST['id']);
  exit;
}
