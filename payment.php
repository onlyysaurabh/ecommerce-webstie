<?php

session_start();

if( isset($_POST['order_pay_btn'])){
    $order_status = $_POST['order_status'];
    $order_total_price = $_POST['order_total_price'];
}



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


      <?php if(isset($_SESSION['total']) && $_SESSION['total'] != 0){ ?>
            <?php $amount = strval($_SESSION['total']); ?>
            <p>Total Payment $ <?php echo $_SESSION['total']; ?></p>
            <div id="paypal-button-container"></div>

      <?php } else if(isset($_POST['order_status']) && $_POST['order_status']=='on_hold'){?>

            <?php $amount = strval($_POST['order_total_price']); ?>
            <p>Total Payment $ <?php echo $_POST['order_total_price']; ?></p>
            <div id="paypal-button-container"></div>

      <?php } else { ?>

          <p>There is no order to pay</p>

      <?php } ?>

      

    </div>
  </section>

 <!-- Replace "test" with your own sandbox Business account app client ID -->

 <script src="https://www.paypal.com/sdk/js?client-id=ATzX5ok2KHYC01hgHUYlNsJMUV5GYV8VAOIFPZzaN_o4wv27-nkal4_FXwPOWII_lFAn_T93F0-wQ1GR&currency=USD"></script>

<!-- Set up a container element for the button -->



<script>

  paypal.Buttons({

    // Order is created on the server and the order id is returned

    createOrder() {

      return fetch("/my-server/create-paypal-order", {

        method: "POST",

        headers: {

          "Content-Type": "application/json",

        },

        // use the "body" param to optionally pass additional order information

        // like product skus and quantities

        body: JSON.stringify({

          cart: [

            {

              sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",

              quantity: "YOUR_PRODUCT_QUANTITY",

            },

          ],

        }),

      })

      .then((response) => response.json())

      .then((order) => order.id);

    },

    // Finalize the transaction on the server after payer approval

    onApprove(data) {

      return fetch("/my-server/capture-paypal-order", {

        method: "POST",

        headers: {

          "Content-Type": "application/json",

        },

        body: JSON.stringify({

          orderID: data.orderID

        })

      })

      .then((response) => response.json())

      .then((orderData) => {

        // Successful capture! For dev/demo purposes:

        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

        const transaction = orderData.purchase_units[0].payments.captures[0];

        alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

        // When ready to go live, remove the alert and show a success message within this page. For example:

        // const element = document.getElementById('paypal-button-container');

        // element.innerHTML = '<h3>Thank you for your payment!</h3>';

        // Or go to another URL:  window.location.href = 'thank_you.html';

      });

    }

  }).render('#paypal-button-container');

</script>


  <!--footer-->
  <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/"; include($IPATH."footer.html"); ?>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>