// Show the arrow button when the user scrolls down 20px from the top
window.onscroll = function () {
    showArrowButton();
  };
  
  function showArrowButton() {
    const arrowButton = document.getElementById("arrowButton");
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop >20) {
      arrowButton.style.display = "block";
    } else {
      arrowButton.style.display = "none";
    }
  }
  
  // Scroll to the top when the arrow button is clicked
  document.getElementById("arrowButton").addEventListener("click", function () {
    scrollToTop();
  });
  
  function scrollToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
  