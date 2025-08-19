document.getElementById("registerForm").addEventListener("submit", function(event) {
  // event.preventDefault(); // <-- I will come back to this later
  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const age = parseInt(document.getElementById("age").value, 10);
  const image = document.getElementById("image").value.trim();
  const msg = document.getElementById("msg");
  msg.innerHTML = "";
  msg.style.color = "red";

  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const imagePattern = /\.(jpg|jpeg|png|gif|webp)$/; // only lowercase!

  // \n == linefeed \t == tab \s == any whitespace char
  // + == 1 or more chars . == anychar  ^$[] <--also meta chars

  if (!name || !email || isNaN(age)) {
    msg.innerHTML = "All fields are required.";
    event.preventDefault();
    return;
  }

  /* A string can be tested with a regular expression in 2 ways in JS:
     aString.match(aPattern); 
     aPattern.test(aString);
  */
  if (!emailPattern.test(email)) {
    msg.innerHTML = "Invalid email format.";
    event.preventDefault();
    return;
  }
  if (age < 18 || age > 99) {
    msg.innerHTML = "Age must be between 18 and 99.";
    event.preventDefault();
    return;
  }
  if (!imagePattern.test(image)) {
    msg.innerHTML = "Invalid image type.";
    event.preventDefault();
    return;
  }

  msg.style.color = "green";
  msg.innerHTML = "Form submitted successfully!";
  
});
