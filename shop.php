<?php

include('server/connection.php');

if(isset($_POST['search'])){

  if(isset($_GET['page_no'] ) && $_GET['page_no']!=""){
    $page_no=$_GET['page_no'];
    }else{
        $page_no=1;
    }

    $category = $_POST['category'];
    $price = $_POST['price'];

    $stmt1 = $conn->prepare("SELECT count(*) as total_records FROM products where product_category=? AND product_price<=?");
    $stmt1->bind_param("si", $category, $price);
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();



    $total_records_per_page = 8;
    $offset = ($page_no-1) * $total_pages;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";
    $total_no_of_pages = ceil($total_records / $total_records_per_page);


    $stmt2 = $conn->prepare("SELECT * FROM products where product_category=? AND product_price<=? LIMIT $offset, $total_records_per_page");
    $stmt2->bind_param("si", $category, $price);
    $stmt2->execute();
    $products = $stmt2->get_result();


}else{

  if(isset($_GET['page_no'] ) && $_GET['page_no']!=""){
    $page_no=$_GET['page_no'];
    }else{
        $page_no=1;
    }

    $stmt1 = $conn->prepare("SELECT count(*) as total_records FROM products");
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();



    $total_records_per_page = 8;
    $offset = ($page_no-1) * $total_pages;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";
    $total_no_of_pages = ceil($total_records / $total_records_per_page);


    $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset, $total_records_per_page");
    $stmt2->execute();
    $products = $stmt2->get_result();

}
?>

<!DOCTYPE html>
<html lang="en">
  
<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."header.html"); ?>

  <body>
    <!--Navbar-->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."navbar.html"); ?>

    <style>
      section.left{
        float: left;
      }
    </style>

    <!--Search-->
    <section id="search" class="my-5 py-5 ms-2 col-3 left ">
      <div class="container mt-5 my-5">
        <p>Filter Products</p>
        <hr>
      </div>

      <form action="shop.php" method="POST">
        <div class="row mx-auto container">
          <div class="col-lg-12 cod-md-12 col-sm-12">

            <p>Category</p>
              <div class="form-check">
                <input class="form-check-input" value="Shoes" type="radio" name="category" id="category_one" <?php if(isset($category) && $category=="Shoes"){echo "checked";} ?>>
                <label  class="form-check-lable" for="flexRadioDefault1">
                  Shoes
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" value="Tshirt" type="radio" name="category" id="category_two" <?php if(isset($category) && $category=="Tshirt"){echo "checked";} ?>>
                <label  class="form-check-lable" for="flexRadioDefault2">
                  Tshirt
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" value="Watches" type="radio" name="category" id="category_two" <?php if(isset($category) && $category=="Watches"){echo "checked";} ?>>
                <label  class="form-check-lable" for="flexRadioDefault2">
                  Watches
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" value="Glasses" type="radio" name="category" id="category_two" <?php if(isset($category) && $category=="Glasses"){echo "checked";} ?>>
                <label  class="form-check-lable" for="flexRadioDefault2">
                  Glasses
                </label>
              </div>
          </div>
        </div>

        <div class="row mx-auto container mt-5">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <p>Price</p>
            <input type="range" class="form-range w-50" name="price" value="<?php if(isset($price)){echo $price;}else{echo "1500";} ?>" min="1" max="1500"  id="customRange2">
            <div class="w-50">
              <span style="float: left;">0</span>
              <span style="float: right;">1500</span>
            </div>

          </div>
        </div>

        <div class="form-group my-3 mx-3">
          <input type="submit" name="search" value="Search" class="btn btn-primary">
        </div>


      </form>
    </section>

    <!--Produtcts-->
    <section id="shop" class="my-5 py-5 right">
      <div class="container text-center mt-5 py-5">
        <h3>Products</hr>
      </div>   
      <a href="<?php echo "single_product.php?product_id=".$row['product_id']?>"><div class="row mx-auto">
      <?php while ($row = $products->fetch_assoc()){?>
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

            <li class="page-item" <?php if($page_no<=1){echo 'disabled';}?> ">
              <a class="page-link" href="<?php if($page_no<=1){echo '#';}else{echo "?page_no=".($page_no-1);}?>">Previous</a>
            </li>
            
            
              <li class="page-item"><a class="page-link" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no;?>"><?php echo $page_no;?></a></li>
            

            <li class="page-item" <?php if($page_no >= $total_no_of_pages){echo 'disabled';}?> ">
              <a class="page-link" href="<?php if($page_no >= $total_no_of_pages){echo '#';}else{echo "?page_no=".($page_no+1);}?>">Next</a>
            </li>  

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