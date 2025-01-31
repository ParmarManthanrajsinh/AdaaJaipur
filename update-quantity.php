<?php
include 'functions.php';

if (isset($_POST['product_id']) && isset($_POST['action'])) {
  $productId = $_POST['product_id'];
  $action = $_POST['action'];

  if ($action === 'increase') {
    updateQuantity($productId, 1);
  } elseif ($action === 'decrease') {
    updateQuantity($productId, -1);
  }
}

header('Location: cart.php');
exit;
?>
