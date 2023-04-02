<!DOCTYPE html>
<html lang="en">

<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."header.html"); ?>

<body>
  <!--Navbar-->
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."navbar.html"); ?>


  <!--Order details-->
  <section class="orders container my-5 py-3">
    <div class="container mt-2">
      <h2 class="font-weight-bolde text-center">Your Orders</h2>
      <hr class="mx-auto">
    </div>
    <table class="mt-5 pt-5">
      <tr>
        <th>Product </th>
        <th>Quantity</th>
        <th>Price</th>

      </tr>

      <?php while($row = $orders->fetch_assoc()){?>
        <tr>      
            <td>
                <div class="product-info">
                    
                </div>
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