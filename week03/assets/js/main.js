// When the page loads
document.addEventListener('DOMContentLoaded', function () {
    
    const galleryImages = document.querySelectorAll('.gallery-img');
    const modalImage = document.getElementById('modalImage');

    // For each small gallery image
    /*
    for(let i=0; i<galleryImages.length; ++i) {
      galleryItems[i] ... <-- this is what "img" is
    }
    */
    galleryImages.forEach(img => {
        img.addEventListener('click', function () {
            // Update the modal image to match the clicked image
            modalImage.src = this.src;
            modalImage.alt = this.alt;
        });
    });
    // Show the modal when an image is clicked
    



    // This manages the error message
    if (document.getElementById('uploadForm')) {
        document.getElementById('uploadForm').addEventListener('submit', function (event) {
            const publishedInput = document.getElementById('published');
            const errorMessage = document.getElementById('error-message');

            // Hide any previous error message
            errorMessage.classList.add('d-none');
            errorMessage.textContent = '';

            const currentYear = new Date().getFullYear();
            const publishedYear = parseInt(publishedInput.value, 10);


            if (isNaN(publishedYear) || publishedYear < 1900 || publishedYear > currentYear) {
                errorMessage.textContent = "Published year must be between 1900 and " + currentYear;
                errorMessage.classList.remove('d-none');
                event.preventDefault();
                return;
            }
        });
    }
});
