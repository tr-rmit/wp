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
    if (discount < 0 || discount > 80 ) {
      let answer = confirm("That discount looks strange, are you sure it is " + discount + "% ?");
      if (!answer) 
        return false;
    }
    result.textContent = "Discounted price: $" + final.toFixed(2);
  }
});
