const form = document.getElementById('loginForm');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');

form.addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form from submitting normally
  const email = emailInput.value.trim();
  const password = passwordInput.value.trim();

  // Simulate login logic
  if (email && password) {
    alert(`Logged in as ${email}`);
  } else {
    alert('Please enter both email and password.');
  }
});
