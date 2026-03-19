document.getElementById("profileForm").addEventListener("submit", function(event) {
  event.preventDefault();

  const name = document.getElementById("name").value.trim();
  const age = parseInt(document.getElementById("age").value, 10);
  const photo = document.getElementById("photo").value;
  const errorDiv = document.getElementById("errorMsg");
  const successDiv = document.getElementById("successMsg");  

  errorDiv.innerHTML = "";
  successDiv.innerHTML = "";

  let errors = [];  

  if (!name) {
    errors.push("Name is required.");
  }
  if (isNaN(age) || age < 18 || age > 99) {
    errors.push("Age must be between 18 and 99.");
  }
  if (!photo.match(/\.(jpg|jpeg|png|gif|webp)$/i)) {
    errors.push("Profile picture must be a valid image file (jpg, jpeg, png, gif, webp).");
  }

  if (errors.length > 0) {
    errorDiv.innerHTML = errors.join("<br>");
  } else {
    // successDiv.innerHTML = "Form submitted!";
    event.target.submit(); // this.submit();
  }

});