<?php

session_start();

if (isset($_SESSION['loggedin'])) {
  header('Location: home.php');
  exit;
}

include 'layout/header.php';
?>


<div class="container mt-5">
  <div class="card w-50 mx-auto">
    <div class="card-header">
      <h1>Login</h1>
    </div>
    <div class="card-body">
      <?php if (isset($_SESSION['flash'])) : ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION['flash']; ?>
        </div>
        <?php unset($_SESSION['flash']) ?>
      <?php endif; ?>
      <?php if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success" role="alert">
          <?php echo $_SESSION['success']; ?>
        </div>
        <?php unset($_SESSION['success']) ?>
      <?php endif; ?>
      <form action="action/authenticate.php" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
        <p class="form-text mt-2">Belum punya akun ? <a href="register.php" class="text-decoration-none">daftar disini</a></p>
      </form>
    </div>
  </div>

</div>

<?php

include 'layout/footer.php';
?>