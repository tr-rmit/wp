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
    if (discount > 80 || discount < 0) {
      let answer = confirm("That discount looks a little strange, are you sure it is supposed to be " + discount + "% ?");
      if (!answer) return false;
    }
    result.textContent = "Discounted price: $" + final.toFixed(2);
  }
});
