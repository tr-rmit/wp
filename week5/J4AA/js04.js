function calculate(whichOperation) {
  console.log(whichOperation);
  let num1 = Number(document.getElementById("num1").value);
  let num2 = Number(document.getElementById("num2").value);
  console.log(num1+num2);
  let answer = 0;
  switch (whichOperation) {
    case '+':
      answer = num1 + num2;
      break;
    case '-':
      answer = num1 - num2;
      break;
    case '*':
      answer = num1 * num2;
      break;
    case '/':
      answer = num1 / num2;
      break;
    default:
      console.log("Not yet implemented");  
  }
  document.getElementById("answer").value = answer;

}