document.getElementById("categoryFilter").addEventListener("change", function () {
  const selected = this.value;
  const pets = document.querySelectorAll(".pet");
  /* document.getElementsByClassName("pet"); */

  pets.forEach(pet => {
    // classList.contains checks if the pet has the selected class
    // If "all" is selected, show all pets
    // Otherwise, show only pets that match the selected category
    if (selected === "all" || pet.classList.contains(selected)) {
      pet.style.display = "inline-block";
      /*
      pet.style.visibility = "visible";  
      pet.style.opacity = 1; 
      */
    } else {
      pet.style.display = "none";
      /* 
      pet.style.visibility = "hidden";  
      pet.style.opacity = 0.2; 
      */
    }
  });
});
