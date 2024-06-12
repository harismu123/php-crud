<?php
include 'middleware/isLoggedin.php';
include 'action/dbcon.php';

include 'layout/header.php';
include 'layout/nav.php';

$id = $_GET['id'];
$sql = "SELECT * FROM barang WHERE id = $id";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  $barang = $result->fetch_assoc();
} else {
  $barang = [];
}
?>


<div class="container mt-5">
  <h1>Edit Barang</h1>
  <p>Edit Data Barang</p>
  <?php if (isset($_SESSION['flash'])) : ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $_SESSION['flash']; ?>
    </div>
    <?php unset($_SESSION['flash']) ?>
  <?php endif; ?>
  <form action="action/aksiEditBarang.php" method="post">
    <input type="hidden" name="id" value="<?= $barang['id'] ?>">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Barang</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama'] ?>">
    </div>
    <div class="mb-3">
      <label for="satuan" class="form-label">Satuan</label>
      <input type="text" class="form-control" id="satuan" name="satuan" value="<?= $barang['satuan'] ?>">
    </div>
    <div class="mb-3">
      <label for="harga" class="form-label">Harga</label>
      <input type="number" class="form-control" id="harga" name="harga" value="<?= $barang['harga'] ?>">
    </div>
    <button type="submit" class="btn btn-primary w-100">Edit</button>
  </form>
</div>


<?php
include 'layout/footer.php';
