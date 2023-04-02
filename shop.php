
<!DOCTYPE html>
<html lang="en">
  
<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."header.html"); ?>

  <body>
    <!--Navbar-->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."navbar.html"); ?>

    <!--featured-->
    <section id="featured" class="my-5 pb-5">
      <div class="container text-center mt-5 py-5">
        <h3>Our Products</hr>

      </div>
      <a href="<?php echo "single_product.php?product_id=".$row['product_id']?>"><div class="row mx-auto">
      <?php include('server/get_products.php'); ?>
      <?php while ($row = $get_products->fetch_assoc()){?>
        <div onclick="window.location.href='single_product.php'" class="product text-center col-lg-3 col-md-4 col-sm-12">
          <a href="<?php echo "single_product.php?product_id=".$row['product_id']?>"><img class="img-fluid mb-3"  src="./assets/imgs/<?php echo $row['product_image' ]; ?>" /></a>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <a href="<?php echo "single_product.php?product_id=".$row['product_id']?>"><h3 class="p-name"><?php echo $row['product_name']; ?></h3>
          <h4 class="p-price">$<?php echo $row['product_price']; ?></h4></a>
          <a href="<?php echo "single_product.php?product_id=".$row['product_id']?>"><button class="buy-btn">Buy Now</button></a>
        </div>
        <?php } ?>

        
        <!--Pagination-->

        <nav aria-label="Page navigation example">
          <ul class="pagination my-5">
            <li class="page-item"><a class="page-link" href="#">Prev</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>
      </div>
    </section>

    <!--footer-->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."footer.html"); ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
