<?php

session_start();
include("server/connection.php");

if(!isset($_SESSION['logged_in'])){
    header("Location: login.php");
    exit();
}

if(isset($_GET['logout'])){
    session_destroy();
    header("Location: login.php");
    exit();
}

if(isset($_POST['change_password'])){
    $password = $_POST['Password'];
    $confirm_password = $_POST['Confirm Password'];
    $user_email = $_SESSION['user_email'];

    if($password != $confirm_password){
        header("Location: account.php?error=Password does not match");
    }
    elseif(strlen($password)<6){
      header("Location: account.php?error=Password must be at least 6 characters");
    }
    else
    {
      $stmt = $conn->prepare("UPDATE users SET user_password = ? WHERE user_email = ?");
      $stmt->bind_param('ss',$password,$user_email);

      if($stmt->execute()){
        header("Location: account.php?message=Password changed successfully");
      }
      else{
        header("Location: account.php?error=Something went wrong");
      }
    }
}

//get user orders
if(isset($_SESSION['logged_in'])){
  $user_id = $_SESSION['user_id'];
  $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = ?");
  $stmt->bind_param('i',$user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $orders = $result->fetch_all(MYSQLI_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="en">

<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."header.html"); ?>

<body>
  <!--Navbar-->
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."navbar.html"); ?>

  <!--Account-->
  <section class="my-5 py-5">
    <div class="row container mx-auto">
      <div class="text-center mt-3 pt-5 col-lg-6 col-12">
        <h3 class="font-weight-bold">Account Info</h3>
        <hr class="mx-auto" />
        <div class="account-info">
          <p>Name : <span><?php echo $_SESSION['user_name']; ?></span></p>
          <p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
          <p><a href="" id="orders-btn">Your Orders</a></p>
          <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <form id="account-form" method="POST" action="account.php">
          <p class="text-center" style="color:red""><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
          <p class="text-center" style="color:red""><?php if(isset($_GET['message'])){ echo $_GET['message']; } ?></p>
          <h3>Change Password</h3>
          <hr class="mx-auto" />
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="Password" id="account-password" placeholder="Password" required />
          </div>
          <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" class="form-control" name="Confirm Password" id="account-password-confirm" placeholder="Password" required />
          </div>
          <div class="form-group">
            <input type="submit" value="Change Password" name="change_password" class="btn" id="change-pass-btn" />
          </div>
        </form>
      </div>
    </div>
  </section>

  <!--Orders-->
  <section class="orders container my-5 py-3">
    <div class="container mt-2">
      <h2 class="font-weight-bolde text-center">Your Orders</h2>
      <hr class="mx-auto">
    </div>
    <table class="mt-5 pt-5">
      <tr>
        <th>Order ID</th>
        <th>Order Cost</th>
        <th>Order Status</th>
        <th>Order Date</th>
        <th>Order Info</th>
      </tr>

      <?php while($row = $orders->fetch_assoc()){?>
      <tr>
          <td>
            <span><?php echo $row['order_id']; ?></span>
          </td>
          <td>
            <span><?php echo $row['order_cost']; ?></span>
          </td> 
          <td>
            <span><?php echo $row['order_status']; ?></span>
          </td>
          <td>
            <span><?php echo $row['order_date']; ?></span>
          </td>
          <td>
            <form action="">
              <input class="btn order-details-button" type="submit" value="details">
            </form>
          </td>    
      </tr>
      <?php } ?>

    </table>

  </section>

  <!--footer-->
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."footer.html"); ?>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>