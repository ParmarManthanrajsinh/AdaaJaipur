<?php
  $currentPage = basename($_SERVER['PHP_SELF']);
  include 'functions.php';
  $cartCount = updateCartCount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adaa Jaipur</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar">
    <div class="container">
      <div class="nav-content">
        <div class="nav-left">
          <button class="menu-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
          </button>
          <h1>Adaa Jaipur</h1>
        </div>
        <div class="nav-middle">
          <a href="index.php" class="<?php if ($currentPage == 'index.php') echo 'active'; ?>">Home</a>
          <a href="about.php" class="<?php if ($currentPage == 'about.php') echo 'active'; ?>">About</a>
          <a href="contact.php" class="<?php if ($currentPage == 'contact.php') echo 'active'; ?>">Contact Us</a>
        </div>
        <div class="nav-right">
          <button id="darkModeToggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
          </button>
          <a href="cart.php">
            <button>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
              <span id="cart-count" class="cart-count"><?= $cartCount ?></span>
            </button>
          </a>
        </div>
      </div>
    </div>
  </nav>
