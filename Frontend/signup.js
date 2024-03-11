// Get the form element
const signupForm = document.getElementById('signupForm');

// Function to handle form submission
function handleSubmit(event) {
  event.preventDefault(); 
  showSuccessMessage();
}

// Function to display the success message
function showSuccessMessage() {
  const successMessage = document.createElement('div');
  successMessage.classList.add('success-message');
  successMessage.textContent = 'Signed up successfully!';
  signupForm.appendChild(successMessage);

  // Remove the success message after 3 seconds (adjust time as needed)
  setTimeout(() => {
    signupForm.removeChild(successMessage);
  }, 3000);
}

// Event listener for form submission
signupForm.addEventListener('submit', handleSubmit);
