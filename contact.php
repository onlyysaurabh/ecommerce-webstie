<!DOCTYPE html>
<html lang="en">

<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."header.html"); ?>

<body>
  <!--Navbar-->
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."navbar.html"); ?>

  <!--Contact-->
  <section id="contact" class="container my-5 py-5">
    <div class="container text-center mt-5">
      <h3>Contant Us</h3>
      <hr class="mx-auto" />
      <p class="w-50 mx-auto">Phone number : <span>(+91)9532691866</span></p>
      <p class="w-50 mx-auto">
        Email address : <span>rgitshop@gmail.com</span>
      </p>
      <p class="w-50 mx-auto">We work 24/7 to answer your questions</p>
    </div>
  </section>

  <!--footer-->
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."footer.html"); ?>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>