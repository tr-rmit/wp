function calculate(operator){
  console.log(operator);
  let num1 = Number(document.getElementById('num1').value);
  let num2 = Number(document.getElementById('num2').value);

  // let answer = num1 + num2;
  let answer = 0;
  switch (operator) {
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
  }

  document.getElementById('answer').value = answer;

}