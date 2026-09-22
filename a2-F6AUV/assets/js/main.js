// When the page loads
document.addEventListener("DOMContentLoaded", function () {
  const galleryImages = document.querySelectorAll(".gallery-img");
  const modalImage = document.getElementById("modalImage");
  const addForm = document.getElementById("addForm");
  const merchFilter = document.getElementById("merchFilter");
  const merchSpots = document.querySelectorAll("#gallery > div");

  // If galleryImages exist, show the modal when an image is clicked
  // For each small gallery image
  if (galleryImages) {
    galleryImages.forEach((img) => {
      img.addEventListener("click", function () {
        // Update the modal image to match the clicked image
        modalImage.src = this.src;
        modalImage.alt = this.alt;
      });
    });
  }

  // If the add page form exists, validate the form fields
  if (addForm) {
    addForm.addEventListener("submit", function (event) {
      const publishedInput = document.getElementById("published");
      const errorMessage = document.getElementById("error-message");

      // Hide any previous error message
      errorMessage.classList.add("d-none");
      errorMessage.textContent = "";

      const currentYear = new Date().getFullYear();
      const publishedYear = parseInt(publishedInput.value, 10);

      if (isNaN(publishedYear) || publishedYear < 1900 || publishedYear > currentYear) {
        errorMessage.textContent = "Published year must be between 1900 and " + currentYear;
        errorMessage.classList.remove("d-none");
        event.preventDefault();
        return;
      }
    });
  }
  
  // If there is a merchFilter, showcase the relevant merchSpot cards. 
  if (merchFilter) {
    merchFilter.addEventListener("onchange", function (event) {
      console.log(selected); 
      console.log(merchSpots);
      merchSpots.forEach((merchSpot) => {
        // console.log(selected + "|" + spot.dataset.status);
        if (selected == '' || selected == merchSpot.dataset.status)
          merchSpot.classList.remove("deselected");
        else
          merchSpot.classList.add("deselected");
      });
    });
  }
  
});




