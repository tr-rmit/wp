/*
  var a = 5; <-- global scope 
  const pi = 3.14; <-- it will be final double
  const students = [ ... ];

  let b = 5; <-- local scope, more like a Java variable's scope
*/
let greeting = "Hello";
alert(greeting);
{
  greeting = "Goodbye";
  alert(greeting);
}
alert(greeting);
