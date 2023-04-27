<?php

session_start();

if(!empty($_SESSION['cart'])){

}
else{
  header('location: index.php');
}



?>




<!DOCTYPE html>
<html lang="en">

<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."header.html"); ?>

<body>
  <!--Navbar-->
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."navbar.html"); ?>

  <!--Checkout-->
  <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
      <h2 class="form-weight-bold">Checkout</h2>
      <hr class="mx-auto" />
    </div>
    <div class="mx-auto container">
      <form id="checkout-form" method="POST" action="server/place_order.php">
        <p class="text-center" style="color:red;">
          <?php if(isset($_GET['message'])){echo $_GET['message'];} ?>
          <?php if(isset($_GET['message'])) {?>
            <a href="login.php" class="btn btn-primary">Login</a>
          <?php } ?>
        </p>
        <div class="form-group checkout-large-element">
          <label for="">Name</label>
          <input type="text" name="name" id="checkout-name" class="form-control" placeholder="Name" required />
        </div>
        <div class="form-group checkout-small-element">
          <label for="">Email</label>
          <input type="text" name="email" id="cheackout-email" class="form-control" placeholder="Email" required />
        </div>
        <div class="form-group checkout-small-element">
          <label for="">Phone Number</label>
          <input type="tel" name="phone" id="cheackout-phone" class="form-control" placeholder="Phone Number" required />
        </div>
        <div class="form-group checkout-large-element">
          <label for="">Address</label>
          <input type="text" name="address" id="checkout-address" class="form-control" placeholder="Address" required />
        </div>
        <div class="form-group checkout-small-element">
          <label for="">City</label> 
          <input type="text" name="city" id="checkout-city" class="form-control" placeholder="City" required />
        </div>
        <div class="form-group checkout-small-element">
          <label for="">Pin Code</label> 
          <input type="text" name="pincode" id="checkout-pincode" class="form-control" placeholder="Pin code" required />
        </div> 
        <div>
          
        </div>

        <div class="form-group checkout-btn-container">
          <p>Total amount: $ <?php echo $_SESSION['total']; ?></p>
          <input type="submit" id="checkout-btn" name="place_order" value="Place order" class="btn" />
      </form>
    </div>
  </section>

  <!--footer-->
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."footer.html"); ?>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>