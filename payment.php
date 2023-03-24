<?php

session_start();

?>




<!DOCTYPE html>
<html lang="en">

<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."header.html"); ?>

<body>
  <!--Navbar-->
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."navbar.html"); ?>

  <!--Payment-->
  <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
      <h2 class="form-weight-bold">Payment</h2>
      <!--<hr class="mx-auto" />-->
    </div>
    <div class="mx-auto container text-center">
      <p><php echo $_GET['order_status'];?></p>
      <p>Total payment: $<?php echo $_SESSION['total'];?></p>
      <input class="btn btn-primary" type="sumbit" value="Pay Now" />
    </div>
  </section>

  <!--footer-->
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."footer.html"); ?>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>