
  /* 
  var - global scope, created problems if variables have the same name
  let - local scope, more like Java's scoped methodology - recommended
  const - like static final in Java, can't be changed is primitive int or float etc but can be changed for objects like arrays.
  */

  let greeting = "hello";
  //alert(greeting);
  {
    greeting = "goodbye";
    //alert(greeting);
  }
  //alert(greeting);

  // Types of variables (eg String, float, boolean)

let characterName = "Luke Skywalker";
let height = 34.7;
let isJedi = true;

console.log(characterName);
console.log(height);
console.log(isJedi);

document.write("<p>Hi, my name is " + characterName + ", it is " + isJedi + " to say that I am a Jedi and I am " + height + " jojobacs tall</p>");

document.write(`<p>Hi, my name is ${characterName}, it is ${isJedi} to say that I am a Jedi and I am ${height} jojobacs tall</p>`);