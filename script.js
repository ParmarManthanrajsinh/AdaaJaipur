// Mobile menu toggle
const menuBtn = document.querySelector('.menu-btn');
const navMiddle = document.querySelector('.nav-middle');

menuBtn.addEventListener('click', () => {
  navMiddle.style.display = navMiddle.style.display === 'flex' ? 'none' : 'flex';
});

// Dark mode toggle
const darkModeToggle = document.getElementById('darkModeToggle');
const body = document.body;

const enableDarkMode = () => {
  body.classList.add('dark-mode');
  localStorage.setItem('darkMode', 'enabled');
}

const disableDarkMode = () => {
  body.classList.remove('dark-mode');
  localStorage.setItem('darkMode', 'disabled');
}

darkModeToggle.addEventListener('click', () => {
  if (body.classList.contains('dark-mode')) {
    disableDarkMode();
  } else {
    enableDarkMode();
  }
});

// Check if dark mode was previously enabled
if (localStorage.getItem('darkMode') === 'enabled') {
  enableDarkMode();
}

// Product Modal Logic
const productModal = document.getElementById('productModal');
productModal.addEventListener('show.bs.modal', function (event) {
  const button = event.relatedTarget;
  const productId = button.getAttribute('data-product-id');

  // Set the product ID to the hidden field in the modal's "Add to Cart" form
  const addToCartForm = productModal.querySelector('.modal-footer form');
  addToCartForm.querySelector('[name="product_id"]').value = productId;

  // Use AJAX to fetch product details
  fetch(`get-product.php?id=${productId}`)
    .then(response => response.json())
    .then(product => {
      const modalTitle = productModal.querySelector('.modal-title');
      const modalBody = productModal.querySelector('.modal-body');

      modalTitle.textContent = product.name;
      modalBody.innerHTML = `
        <img src="${product.image}" alt="${product.name}" class="img-fluid">
        <p class="mt-3">${product.description || 'No description available.'}</p>
        <p><strong>Price:</strong> ₹${product.price}</p>
      `;
    })
    .catch(error => {
      console.error('Error fetching product details:', error);
      const modalBody = productModal.querySelector('.modal-body');
      modalBody.innerHTML = '<p>Error loading product details.</p>';
    });
});
