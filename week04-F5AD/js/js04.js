let name = "Luke Skywalker";
let age = "34.7 years old";
age = parseInt(age);
let doubleAge = age + age;
console.log(doubleAge);
let condition = true;

/* Debug Code
let isAgeOK = !isNaN(parseInt(age)) // <-- isNaN == is Not a Number
console.log(isAgeOK);

console.log(typeof name);
console.log(typeof(age));
console.log(doubleAge + " is has type " + typeof doubleAge);
console.log(typeof condition);

alert("Debugging"); */

let a=0;
// parseInt will pick only integer value     
alert(a + " is a " + typeof a);
a = parseInt(10.34);
alert(a + " is a " + typeof a);
// check more details of parseInt from w3schools
let b = 20;
let sum = a + b;
let sub = a - b;
let product = a * b;
let div = a / b;
console.log(sum);
console.log(sub);
console.log(product);
console.log(div);