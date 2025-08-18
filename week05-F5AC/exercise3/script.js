let counter = 0;
document.getElementById("clickBtn").addEventListener("click", function() {
  counter++;
  document.getElementById("count").textContent = counter;
});
