<?php
include 'header.php';

if (isset($_GET['add_to_cart']) && isset($_GET['product_id'])) {
  addToCart($_GET['product_id'], $products);
  // Redirect to the same page to prevent form resubmission
  header("Location: index.php#featured-products");
  exit;
}
?>

<!-- Hero Section -->
<section class="hero">
  <img src="https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?auto=format&fit=crop&q=80" alt="Hero">
  <div class="hero-content">
    <div class="container">
      <h2>Elegant Kurtas</h2>
      <p>Discover our new collection of handcrafted kurtas</p>
      <div class="shop-now-container">
        <a href="#featured-products"><button>Shop Now</button></a>
      </div>
    </div>
  </div>
</section>

<!-- Featured Products -->
<section class="products" id="featured-products">
  <div class="container">
    <h2>Featured Products</h2>
    <div class="products-grid" id="products-container">
      <?php foreach ($products as $product): ?>
        <div class="product-card">
          <div class="product-image">
            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
            <div class="product-actions">
              <!-- Use a form to submit the product ID -->
              <form action="index.php" method="get">
                <input type="hidden" name="add_to_cart" value="true">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <button type="submit" class="add-to-cart">Add to Cart</button>
              </form>
            </div>
          </div>
          <div class="product-info">
            <h3><?= $product['name'] ?></h3>
            <p>₹<?= $product['price'] ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
