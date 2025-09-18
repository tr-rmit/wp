document.getElementById("registerForm").addEventListener("submit", function(event) {
  
  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const age = parseInt(document.getElementById("age").value, 10);
  const msg = document.getElementById("msg");
  const image = document.getElementById("image").value.trim();
  msg.innerHTML = "";
  msg.style.color = "red";

  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const imagePattern = /\.(jpg|jpeg|png|gif|webp)$/;
  /*
   /^  [^\s@]+  @  [^\s@]+  \.  [^\s@]+  $/
     \n == linefeed; \t == tab char; \s == space char; \. == literal '.' char

     Either works when comparing a string against a pattern
     aString.match(aPattern);
     aPattern.test(aString);
  */

  if (!name || !email || isNaN(age)) {
    msg.innerHTML = "All fields are required.";
    event.preventDefault(); // <-- I'll come back to this later
    return;
  }
  if (!emailPattern.test(email)) {
    msg.innerHTML = "Invalid email format.";
    event.preventDefault(); // <-- I'll come back to this later
    return;
  }
  if (age < 18 || age > 99) {
    msg.innerHTML = "Age must be between 18 and 99.";
    event.preventDefault(); // <-- I'll come back to this later
    return;
  }
  if (!imagePattern.test(image)) {
    msg.innerHTML = "Invalid image extension.";
    event.preventDefault(); // <-- I'll come back to this later
    return;
  }

  msg.style.color = "green";
  msg.innerHTML = "Form submitted successfully!";
});
