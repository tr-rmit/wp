// Single line
/* Multi line
   second comment line */

/* var name <-- this has global scope   
   let name <-- this has local scope
   const name <-- this cannot be changed */

let name = "Luke Skywalker";
let age = 34.7;
let isJedi = true; // post episode 5

{
  let name="Anakin Skywalker";
  console.log("name: "+name);
}

console.log("name: "+name);
console.log("age: "+age);
console.log("isJedi: "+isJedi);

