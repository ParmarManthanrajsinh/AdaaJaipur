<?php
session_start();

$products = [
  [
    "id" => 1,
    "name" => "Classic White Chikankari Kurta",
    "price" => 7500,
    "image" => "img/1.jpeg"
  ],
  [
    "id" => 2,
    "name" => "Embroidered Blue Kurta",
    "price" => 10800,
    "image" => "img/2.jpeg"
  ],
  [
    "id" => 3,
    "name" => "Designer Pink Anarkali",
    "price" => 13200,
    "image" => "img/3.jpeg"
  ],
  [
    "id" => 4,
    "name" => "Festive Collection Kurta",
    "price" => 16500,
    "image" => "img/4.jpeg"
  ],
  [
    "id" => 5,
    "name" => "Printed Cotton Kurta",
    "price" => 6600,
    "image" => "img/5.jpeg"
  ],
  [
    "id" => 6,
    "name" => "Silk Blend Kurta",
    "price" => 12400,
    "image" => "img/6.jpeg"
  ],
  [
    "id" => 7,
    "name" => "Hand Block Print Kurta",
    "price" => 8200,
    "image" => "img/7.jpeg"
  ],
  [
    "id" => 8,
    "name" => "Embroidered Silk Kurta",
    "price" => 19000,
    "image" => "img/8.jpeg"
  ],
  [
    "id" => 9,
    "name" => "Linen Kurta",
    "price" => 9900,
    "image" => "img/9.jpeg"
  ],
  [
    "id" => 10,
    "name" => "Pathani Kurta Set",
    "price" => 20700,
    "image" => "img/10.jpeg"
  ]
];

function getProductById($productId, $products) {
  foreach ($products as $product) {
    if ($product['id'] == $productId) {
      return $product;
    }
  }
  return null;
}

function updateCartCount() {
  if (isset($_SESSION['cart'])) {
    return array_reduce($_SESSION['cart'], function ($carry, $item) {
      return $carry + $item['quantity'];
    }, 0);
  }
  return 0;
}

function addToCart($productId, $products) {
  $product = getProductById($productId, $products);
  if (!$product) return;

  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
  }

  $cart = &$_SESSION['cart'];
  $found = false;
  foreach ($cart as &$item) {
    if ($item['id'] == $productId) {
      $item['quantity']++;
      $found = true;
      break;
    }
  }

  if (!$found) {
    $product['quantity'] = 1;
    $cart[] = $product;
  }

  showNotification('Item added to cart');
}

function removeFromCart($productId) {
  if (!isset($_SESSION['cart'])) return;

  $cart = &$_SESSION['cart'];
  foreach ($cart as $key => $item) {
    if ($item['id'] == $productId) {
      unset($cart[$key]);
      break;
    }
  }

  $_SESSION['cart'] = array_values($cart); // Re-index the array
}

function updateQuantity($productId, $change) {
  if (!isset($_SESSION['cart'])) return;

  $cart = &$_SESSION['cart'];
  foreach ($cart as &$item) {
    if ($item['id'] == $productId) {
      $item['quantity'] = max(1, $item['quantity'] + $change);
      break;
    }
  }
}

function showNotification($message) {
  echo "<script>
    const notificationContainer = document.createElement('div');
    notificationContainer.style.cssText = `
      position: fixed;
      bottom: 20px;
      right: 20px;
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 0.5rem;
    `;
    document.body.appendChild(notificationContainer);

    function showNotification(message) {
      const notification = document.createElement('div');
      notification.textContent = message;
      notification.style.cssText = `
        background: #10B981;
        color: white;
        padding: 1rem 2rem;
        border-radius: 0.375rem;
        animation: slideIn 0.3s ease-out;
        margin-bottom: 0.5rem;
      `;
      notificationContainer.appendChild(notification);

      setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => notification.remove(), 300);
      }, 2000);
    }

    showNotification('$message');
  </script>";
}
?>
