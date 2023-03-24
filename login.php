<?php
session_start();
include('server/connection.php');

if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT user_id, user_name, user_email, user_password FROM users WHERE user_email = ? AND user_password = ? LIMIT 1");
    $stmt->bind_param("ss", $email, $password);
    if($stmt->execute()){
      $stmt->bind_result($user_id, $user_name, $user_email, $user_password);
      $stmt->store_result();
      if($stmt->num_rows() == 1){
        $stmt->fetch();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name'] = $user_name;
        $_SESSION['user_email'] = $user_email;
        $_SESSION['logged_in'] = true;

        header('location: index.php?message=login success');
      }else{
        header('location: login.php?error=wrong email or password');}
    }else{
      header('location: login.php?error=something went wrong');
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."header.html"); ?>

<body>
  <!--Navbar-->
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."navbar.html"); ?>

  <!--Login-->
  <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
      <h2 class="form-weight-bold">Login</h2>
      <hr class="mx-auto" />
    </div>
    <div class="mx-auto container">
      <form id="login-form"  method="POST" action="login.php">
        <p style="color: red;" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error']; }?></p>
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" name="email" id="login-email" class="form-control" placeholder="Email" required />
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" id="login-password" class="form-control" placeholder="Password" required />
        </div>
        <div class="form-group">
          <input type="submit" id="login-btn" class="btn"  name="login_btn" value="Login" />
        </div>
        <div class="form-group">
          <a id="register-url" href="register.php" class="btn">Don't have account? Register</a>
        </div>
      </form>
    </div>
  </section>

  <!--footer-->
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."footer.html"); ?>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>