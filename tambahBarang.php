<?php
include 'middleware/isLoggedin.php';
include 'action/dbcon.php';

include 'layout/header.php';
include 'layout/nav.php';

// get data from table bara
$sql = "SELECT * FROM barang";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  $barang = $result->fetch_all(MYSQLI_ASSOC);
} else {
  $barang = [];
}


?>

<div class="container mt-5">
  <h1>Tambah Barang</h1>
  <p>Tambah Data Barang</p>
  <?php if (isset($_SESSION['flash'])) : ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $_SESSION['flash']; ?>
    </div>
    <?php unset($_SESSION['flash']) ?>
  <?php endif; ?>
  <form action="action/aksiTambahBarang.php" method="post">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Barang</label>
      <input type="text" class="form-control" id="nama" name="nama">
    </div>
    <div class="mb-3">
      <label for="satuan" class="form-label">Satuan</label>
      <input type="text" class="form-control" id="satuan" name="satuan">
    </div>
    <div class="mb-3">
      <label for="harga" class="form-label">Harga</label>
      <input type="number" class="form-control" id="harga" name="harga">
    </div>
    <button type="submit" class="btn btn-primary w-100">Tambah</button>
  </form>

</div>



<?php
include 'layout/footer.php';
?>