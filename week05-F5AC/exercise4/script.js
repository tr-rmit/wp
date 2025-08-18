document.getElementById("calc").addEventListener("click", function() {
  const num1 = parseFloat(document.getElementById("num1").value);
  const num2 = parseFloat(document.getElementById("num2").value);
  const operator = document.getElementById("operator").value;
  const output = document.getElementById("output");

  if (isNaN(num1) || isNaN(num2)) {
    output.textContent = "Please enter valid numbers.";
    return;
  }

  let result;
  switch (operator) {
    case "+": result = num1 + num2; break;
    case "-": result = num1 - num2; break;
    case "*": result = num1 * num2; break;
    case "/": result = num2 !== 0 ? num1 / num2 : "Cannot divide by zero"; break;
/* ternary operator is like a mini if - then - else
  if (num2 !== 0) {
    result = num1 / num2;
  } else {
    result = "Cannot divide by zero";
  }
*/

  }

  output.textContent = "Result: " + result;
});
