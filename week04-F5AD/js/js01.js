console.log("Hello World");
alert("Hello to you");
let answer = confirm("Are you ok?"); // let, var, const
console.log(answer);
if(!answer) {
  answer = prompt("Why aren't you ok?");
  console.log("I'm sorry to hear that (" + answer + ")");
}
