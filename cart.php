<?php
include 'header.php';

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<section class="cart-section">
  <div class="container">
    <h1>Shopping Cart</h1>
    <div id="cart-items">
      <?php if (empty($cart)): ?>
        <p class="text-center py-8">Your cart is empty</p>
      <?php else: ?>
        <?php foreach ($cart as $item): ?>
          <div class="cart-item">
            <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>">
            <div class="cart-item-info">
              <h3><?= $item['name'] ?></h3>
              <p class="cart-item-price">₹<?= $item['price'] ?></p>
              <div class="cart-item-quantity">
                <form action="update-quantity.php" method="post">
                  <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                  <button class="quantity-btn" type="submit" name="action" value="decrease">-</button>
                </form>
                <span><?= $item['quantity'] ?></span>
                <form action="update-quantity.php" method="post">
                  <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                  <button class="quantity-btn" type="submit" name="action" value="increase">+</button>
                </form>
              </div>
              <form action="remove-from-cart.php" method="post">
                <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                <button class="cart-item-remove" type="submit">Remove</button>
              </form>
            </div>
            <div class="cart-item-total">
              ₹<?= number_format($item['price'] * $item['quantity'], 2) ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <div class="cart-summary">
      <div class="subtotal">
        <span>Subtotal:</span>
        <span id="cart-subtotal">
          ₹<?= number_format(array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
          }, 0), 2) ?>
        </span>
      </div>
      <button class="checkout-btn">Proceed to Checkout</button>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
