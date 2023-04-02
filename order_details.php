<?php 

include("server/connection.php");

if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){
  $order_id = $_POST['order_id'];
  $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
  $stmt->bind_param('i',$order_id);
  $stmt->execute();
  $order_details = $stmt->get_result();
}else{
  header("Location: account.php");
}   

?>


<!DOCTYPE html>
<html lang="en">

<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."header.html"); ?>

<body>
  <!--Navbar-->
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."navbar.html"); ?>


  <!--Order details-->
  <section class="orders container my-5 py-3">
    <div class="container mt-5">
      <h2 class="font-weight-bolde text-center">Order details</h2>
      <hr class="mx-auto">
    </div>
    <table class="mt-5 pt-5">
      <tr>
        <th>Product </th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Order date</th>
        <th>Product Page</th>

      </tr>


      <?php while($row = $order_details->fetch_assoc()){?>
      <tr>
        <td><img src="assets/imgs/<?php echo $row['product_image']; ?>" alt="product image" width="100px"></td>
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['product_price']; ?></td>
        <td><?php echo $row['product_quantity'];?></td>
        <td><?php echo $row['order_date'];?></td>
        <td>
        <a href="<?php echo "single_product.php?product_id=".$row['product_id']?>"><button class="buy-btn">Product Page</button></a>
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