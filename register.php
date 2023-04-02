<?php
session_start();
include("server/connection.php");

if(isset($_SESSION['logged_in'])){
  header('Location: account.php');
  exit;
}

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if($password != $confirmpassword){
        header('Location: register.php?error=Password and Confirm Password does not match');
    }
    else if(strlen($password) < 4){
        echo '<script> alert("Password must be 8 characters long"); </script>';
    }
    else{
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $num_rows = $result->num_rows;

        if($num_rows > 0){
            header('Location: register.php?error=Email already exists');
        }else{
            $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, md5($password));
            if($stmt->execute()){
              $user_id = $stmt->insert_id;
              $_SESSION['user_id'] = $user_id;
              $_SESSION['user_name'] = $name;
              $_SESSION['user_email'] = $email;
              $_SESSION['logged_in'] = true;
              header('Location: login.php?success=Account created successfully');
            }
            else{
                header('Location: register.php?error=Something went wrong');
            }
        }
    }


}

?>

<!DOCTYPE html>
<html lang="en">

<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."header.html"); ?>
<body>
  <!--Navbar-->
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."navbar.html"); ?>

  <!--Register-->
  <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
      <h2 class="form-weight-bold">Register</h2>
      <hr class="mx-auto" />
    </div>
    <div class="mx-auto container">
      <form id="register-form" method="POST" action="register.php">
        <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error']; }?></p>
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" id="register-name" class="form-control" placeholder="Name" required />
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" name="email" id="register-email" class="form-control" placeholder="Email" required />
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" id="register-password" class="form-control" placeholder="Password" required />
        </div>
        <div class="form-group">
          <label for="">Confirm Password</label>
          <input type="password" name="confirmpassword" id="register-password" class="form-control" placeholder="Password" required />
        </div>

        <div class="form-group">
          <input type="submit" name="register" id="register-btn" class="btn" value="Register" />
        </div>
        <div class="form-group">
          <a href="login.php" id="Login-url" class="btn">Already have an account? Login</a>
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