const messages = [
  "You are capable of amazing things!",
  "Keep going—you're almost there!",
  "Believe in yourself!",
  "Every step counts!",
  "You’ve got this!"
];

document.getElementById("surpriseBtn").addEventListener("click", function() {
  const index = Math.floor(Math.random() * messages.length);
  console.log(index);
  document.getElementById("message").textContent = messages[index];
});
