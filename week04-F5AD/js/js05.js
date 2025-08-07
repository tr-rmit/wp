// Array is a set of similar values under one variable name
let planets = ["Mercury", "Venus", "Earth", "Moon", "Mars", "Ceres", "Jupiter", "Saturn", "Uranus", "Neptune", "Pluto"];
const msg = document.getElementById("msg");
msg.innerHTML='';
// console.log(msg.innerHTML);

// we need for loop to print every element of the array
for (let i = 0; i < planets.length; i++) {
	console.log(planets[i]);
  msg.innerHTML += planets[i] + "<br>";
  if (planets[i] == "Pluto" || planets[i] == "Moon" || planets[i] == "Ceres") {
    msg.innerHTML += "<i>- " + planets[i] + " is not a planet anymore!</i><br>";
  }
}