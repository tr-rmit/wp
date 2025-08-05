/*  
  var <-- the variable will have global scope
  let <-- ditto                  local  scope
  Number() will turn a string into a number
  parseInt() will [do its best to] turn something into a int
  isNaN() detects that it is not a number
*/

let name = "Luke Skywalker";
{
  let name = "Anakin Skywalker";
  console.log(name);
}
let age = "34.7";
let isJedi = true;

console.log(name);
console.log(age);
console.log(isJedi);

console.log(typeof name);
console.log(typeof age);
console.log(typeof isJedi);

console.log(parseInt(name));
console.log(parseInt(age + isJedi));
console.log(parseInt(isJedi));

console.log("Are these numbers?")
console.log(!isNaN(name));
console.log(!isNaN(age));
console.log(!isNaN(isJedi));
