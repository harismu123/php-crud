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
  <h1>Home</h1>
  <h2>Selamat datang, <?php echo $_SESSION['name']; ?></h2>

  <a href="action/logout.php" class="btn btn-danger">Logout</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Satuan</th>
        <th scope="col">Harga</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($barang as $brg) : ?>
        <tr>
          <th scope="row"><?= $brg['id'] ?></th>
          <td><?= $brg['nama'] ?></td>
          <td><?= $brg['satuan'] ?></td>
          <td><?= $brg['harga'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>



<?php
include 'layout/footer.php';
?>