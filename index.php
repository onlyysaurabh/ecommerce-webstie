<!DOCTYPE html>
<html lang="en">

<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."header.html"); ?>

<body>
  <!--Navbar-->
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."navbar.html"); ?>

  <!--Home-->
  <section id="home">
    <div class="container-fluid">
      <h5>NEW ARRIVALS</h5>
      <h1>Best prices this season</h1>
      <p>INSTASHOP offers the best products for the most affordable prices</p>
      <a href="shop.php"><button>Shop Now!!!</button></a>
    </div>
  </section>

  <!--Section-->
  <section id="new" class="w-100">
    <div class="row p-0 m-0">
      <!--one-->
      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
      <a href="shop.php"><img class="img-fluid" src="./assets/imgs/1.jpg" />
        <div class="details">
          <h2>50% off on hoodies</h2>
          <button>Shop Now!!!</button>
        </div>
        </a>
      </div>
      <!--two-->
      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
      <a href="shop.php"><img class="img-fluid" src="./assets/imgs/5.jpg" />
        <div class="details">
          <h2>Brand new backpacks</h2>
          <button>Shop Now!!!</button>
        </div>
        </a>
      </div>
      <!--three-->
      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
      <a href="shop.php"><img class="img-fluid" src="./assets/imgs/4.jpg" />
        <div class="details">
          <h2>Awesome Watches!!!!</h2>
          <button>Shop Now!!!</button>
        </div>
        </a>
      </div>
    </div>
  </section>

  <!--featured-->
  <section id="featured" class="my-3 pb-3">
    <div class="container-fluid text-center mt-3 py-2">
      <h3>Our Featured</h3>
      <hr class="mx-auto" />
      <p1>here you can checkout our featured products</p1>
    </div>
    <div class="row mx-auto container-fluid">
      <?php include('server/get_featured_products.php'); ?>
      <?php while ($row = $featured_products->fetch_assoc()){?>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <a href="<?php echo "single_product.php?product_id=".$row['product_id']?>"><img class="img-fluid mb-3" src="./assets/imgs/<?php echo $row['product_image']; ?>" />
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h3 class="p-name"><?php echo $row['product_name']; ?></h3>
        <h4 class="p-price">$ <?php echo $row['product_price']; ?></h4>
        <a href="<?php echo "single_product.php?product_id=".$row['product_id']?>"><button class="buy-btn">Buy Now</button></a>
      </a>
      </div>
      <?php } ?>
    </div>
  </section>

  <!--Banner-->
  <section id="banner">
    <div class="container-fluid">
      <h5>NEW ARRIVALS</h5>
      <h1>Best prices this season</h1>
      <p>INSTASHOP offers the best products for the most affordable prices</p>
      <a href="shop.php"><button>Shop Now!!!</button></a>
    </div>
  </section>

  <!--footer-->
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."footer.html"); ?>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>