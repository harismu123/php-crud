<?php

include '../middleware/isLoggedin.php';
include 'dbcon.php';

if (isset($_POST['nama']) && isset($_POST['satuan']) && isset($_POST['harga'])) {

  if ($_POST['nama'] == '' || $_POST['satuan'] == '' || $_POST['harga'] == '') {
    $_SESSION['flash'] = "Data tidak boleh kosong";
    header('Location: ../tambahBarang.php');
    exit;
  }

  $nama = $_POST['nama'];
  $satuan = $_POST['satuan'];
  $harga = $_POST['harga'];

  $sql = "INSERT INTO barang (nama, satuan, harga) VALUES ('$nama', '$satuan', '$harga')";

  if ($con->query($sql) === TRUE) {
    $_SESSION['success'] = "Data berhasil ditambahkan";
    header('Location: ../home.php');
    exit;
  } else {
    $_SESSION['flash'] = "Error: " . $sql . "<br>" . $con->error;
    header('Location: ../tambahBarang.php');
    exit;
  }
} else {
  $_SESSION['flash'] = "Data tidak boleh kosong";
  header('Location: ../tambahBarang.php');
  exit;
}
