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
