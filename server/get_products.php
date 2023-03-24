<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products");

$stmt->execute();

$get_products = $stmt->get_result();

?>