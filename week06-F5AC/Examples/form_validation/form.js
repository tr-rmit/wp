document.getElementById("registerForm").addEventListener("submit", function(event) {
  
  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const age = parseInt(document.getElementById("age").value, 10);
  const fileInput = document.getElementById("fileInput").value;
  alert(fileInput);
  const msg = document.getElementById("msg");
  msg.style.color = "red"; // put it back to red
  msg.innerHTML = "";

  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const fileInputPattern = /\.(jpg|jpeg|png|gif|webp)$/; // i == case insensitive

  if (!name || !email || isNaN(age)) {
    msg.innerHTML = "All fields are required."; 
    event.preventDefault(); // comeback to this later
    return;
  }
  if (!emailPattern.test(email)) {
    msg.innerHTML = "Invalid email format.";
    event.preventDefault(); // comeback to this later
    return;
  }
  if (age < 18 || age > 99) {
    msg.innerHTML = "Age must be between 18 and 99.";
    event.preventDefault(); // comeback to this later
    return;
  }

  /*
    Either function works, its the variable types that are different:
    - aString.match(aPattern);
    - aPattern.test(aString);
    
    fileInput.value.match(/\.(jpg|jpeg|png|gif|webp)$/i);
  */

  if (!fileInputPattern.test(fileInput)) {
    msg.innerHTML = "File must conform to types.";
    event.preventDefault(); // comeback to this later
    return;
  }

  msg.style.color = "green";
  msg.innerHTML = "Form submitted successfully!";
  
});
