<?php

session_start();

if (isset($_SESSION['loggedin'])) {
  header('Location: home.php');
  exit;
}

include 'layout/header.php';
?>


<div class="mt-5">
  <div class="card w-50 mx-auto">
    <div class="card-header">
      <h1>Login</h1>
    </div>
    <div class="card-body">
      <?php if (isset($_SESSION['flash'])) : ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION['flash']; ?>
        </div>
      <?php endif; ?>
      <form action="action/registerAction.php" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
          <label for="conf_password" class="form-label">Konfirmasi Password</label>
          <input type="password" class="form-control" id="conf_password" name="conf_password">
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit</button>
        <p class="form-text mt-2">Sudah punya akun ? <a href="index.php" class="text-decoration-none">masuk disini</a></p>
      </form>
    </div>
  </div>

</div>

<?php

include 'layout/footer.php';
?>