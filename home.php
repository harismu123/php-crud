<?php
include 'middleware/isLoggedin.php';
include 'action/dbcon.php';

include 'layout/header.php';
include 'layout/nav.php';

// get data from table barang
$sql = "SELECT * FROM barang";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  $barang = $result->fetch_all(MYSQLI_ASSOC);
} else {
  $barang = [];
}
?>

<div class="container mt-5">
  <h1>Home</h1>
  <h2>Selamat datang, <?php echo $_SESSION['name']; ?></h2>

  <a href="action/logout.php" class="btn btn-danger" onclick="return confirm('yakin ingin logout ?') ">Logout</a>
  <div class="mt-4">
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['success']; ?>
      </div>
      <?php unset($_SESSION['success']) ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['flash'])) : ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['flash']; ?>
      </div>
      <?php unset($_SESSION['flash']) ?>
    <?php endif; ?>
    <div class="d-flex justify-content-between align-items-center">
      <h2>Data Barang</h2>
      <a href="tambahBarang.php" type="button" class="btn btn-secondary ">+ Tambah Data</a>
    </div>
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Satuan</th>
          <th scope="col">Harga</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($barang as $brg) : ?>
          <tr>
            <th scope="row"><?= $brg['id'] ?></th>
            <td><?= $brg['nama'] ?></td>
            <td><?= $brg['satuan'] ?></td>
            <td><?= $brg['harga'] ?></td>
            <td>
              <a href="editBarang.php?id=<?= $brg['id'] ?>" class="btn btn-warning">Edit</a>
              <a href="action/aksiHapusBarang.php?id=<?= $brg['id'] ?>" class="btn btn-danger" onclick="return confirm('yakin ingin hapus ?')">Hapus</a>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>



<?php
include 'layout/footer.php';
?>