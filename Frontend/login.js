// Get the form element
const loginForm = document.getElementById('loginForm');

// Function to handle form submission
function handleSubmit(event) {
  event.preventDefault(); 
  showSuccessMessage();
}

// Function to display the success message
function showSuccessMessage() {
  const successMessage = document.createElement('div');
  successMessage.classList.add('success-message');
  successMessage.textContent = 'Logged in successfully!';
  loginForm.appendChild(successMessage);

  // Remove the success message after 3 seconds (adjust time as needed)
  setTimeout(() => {
    loginForm.removeChild(successMessage);
  }, 3000);
}

// Event listener for form submission
loginForm.addEventListener('submit', handleSubmit);
