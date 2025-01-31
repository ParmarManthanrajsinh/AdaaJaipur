<?php
include 'functions.php';

if (isset($_GET['id'])) {
  $productId = $_GET['id'];
  $product = getProductById($productId, $products);

  if ($product) {
    // Add a description to the product (you can fetch this from a database in a real application)
    $product['description'] = "This is a beautiful " . $product['name'] . ". Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
    
    header('Content-Type: application/json');
    echo json_encode($product);
  } else {
    http_response_code(404);
    echo json_encode(['error' => 'Product not found']);
  }
} else {
  http_response_code(400);
  echo json_encode(['error' => 'Product ID is required']);
}
?>
