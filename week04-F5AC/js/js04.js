// Single line
/* Multi line
   second comment line */

/* parseInt() turns a string or float into an integer
   isNaN() checks tosee if something is NOT a number
   Number() constructor creates a number
   typeof operator will tell you what type of variable one is
*/

let name = "Luke Skywalker";
let age = 34.7;
let isJedi = true; // post episode 5

console.log("Are these numbers?");
console.log("name: "+!isNaN(name));
console.log("age: "+!isNaN(age));
console.log("isJedi: "+!isNaN(isJedi));

console.log("Will it 'INT'?");
console.log("name: "+parseInt(name));
console.log("age: "+parseInt(age));
console.log("isJedi: "+parseInt(isJedi));

console.log("Will it 'NUMBER()'?");
console.log("name: "+Number(name));
console.log("age: "+Number(age));
console.log("isJedi: "+Number(isJedi));

console.log("What type of variabelare these?");
console.log("name: "+typeof name);
console.log("age: "+typeof age);
console.log("isJedi: "+typeof isJedi);

