document.getElementById("calcBtn").addEventListener("click", function() {
  const price = parseFloat(document.getElementById("price").value);
  const discount = parseFloat(document.getElementById("discount").value);
  const result = document.getElementById("result");

  function getDiscountedPrice(p, d) {
    return p - (p * d / 100);
  }

  if (isNaN(price) || isNaN(discount)) {
    result.textContent = "Please enter valid numbers.";
  } else {
    const final = getDiscountedPrice(price, discount);
    let answer;
    if (final <= 0) {
      answer = confirm("Are you sure you want to apply such a large discount?");
      if(!answer) {
        result.textContent = "Discount too large, transaction cancelled";
        return false;
      }
    }
    result.textContent = "Discounted price: $" + final.toFixed(2);
  }
});