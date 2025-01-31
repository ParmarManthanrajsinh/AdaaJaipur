<?php
include 'functions.php';

if (isset($_POST['product_id'])) {
  removeFromCart($_POST['product_id']);
}

header('Location: cart.php');
exit;
?>
