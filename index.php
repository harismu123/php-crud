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
      <form action="action/authenticate.php" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit</button>
      </form>
    </div>
  </div>

</div>

<?php

include 'layout/footer.php';
?>