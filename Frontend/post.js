// Get the form element
const postForm = document.getElementById('postForm');

// Function to handle form submission
function handleSubmit(event) {
  event.preventDefault(); 
  showSuccessMessage();
}

// Function to display the success message
function showSuccessMessage() {
  const successMessage = document.createElement('div');
  successMessage.classList.add('success-message');
  successMessage.textContent = 'Posted successfully!';
  postForm.appendChild(successMessage);

  // Remove the success message after 3 seconds (adjust time as needed)
  setTimeout(() => {
    postForm.removeChild(successMessage);
  }, 3000);
}

// Event listener for form submission
postForm.addEventListener('submit', handleSubmit);
