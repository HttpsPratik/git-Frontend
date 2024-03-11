document.addEventListener("DOMContentLoaded", () => {
  const searchButton = document.getElementById("searchButton");
  const popupLabel = document.querySelector(".popup-label");

  searchButton.addEventListener("click", () => {
    if (popupLabel.style.display === "block") {
      popupLabel.style.display = "none";
    } else {
      popupLabel.style.display = "block";
    }
  });

  // Popup will be closed if clicked outside of it //
  document.addEventListener("click", (event) => {
    if (!popupLabel.contains(event.target) && event.target !== searchButton) {
      popupLabel.style.display = "none";
    }
  });
});






