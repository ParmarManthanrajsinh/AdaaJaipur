<?php
include 'header.php';

if (isset($_GET['add_to_cart']) && isset($_GET['product_id'])) {
  addToCart($_GET['product_id'], $products);
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
        <div class="product-card" data-bs-toggle="modal" data-bs-target="#productModal" data-product-id="<?= $product['id'] ?>">
          <div class="product-image">
            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
            <div class="product-actions">
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

<!-- Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Product details will be loaded here -->
      </div>
      <div class="modal-footer">
        <form action="index.php" method="get">
          <input type="hidden" name="add_to_cart" value="true">
          <input type="hidden" name="product_id" value="">
          <button type="submit" class="btn btn-primary add-to-cart">Add to Cart</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
