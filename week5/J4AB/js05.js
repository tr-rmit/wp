const planetsArr = [
  "Mercury", 
  "Venus", 
  "Earth", 
  "Mars", 
  "Jupiter", 
  "Saturn", 
  "Uranus", 
  "Neptune"
];

/* o Mercury is 0.39 AU, to Venus is 0.72 AU, to Earth is 1.00 AU, to Mars is 1.52 AU, to Jupiter is 5.20 AU, to Saturn is 9.54 AU, to Uranus is 19.22 AU, and to Neptune is 30.06 AU. 

Mercury: 3.30×10^23 kilograms (7.27×10^23 pounds)

Mars: 6.41×10^23 kilograms (1.41×10^24 pounds)

Venus: 4.86×10^24 kilograms (1.07×10^25 pounds)

Earth: 5.97×10^24 kilograms (1.31×10^25 pounds)

Uranus: 8.68×10^25 kilograms (1.91×10^26 pounds)

Neptune: 1.02×10^26 kilograms (2.25×10^26 pounds)

Saturn: 5.68×10^26 kilograms (1.25×10^27 pounds)

Jupiter: 1.89×10^27 kilograms (4.17×10^27 pounds)

*/

const planetsObjs = [
  { 
    name: "Mercury",
    distance: 0.39,
    mass: 3.3E23
  },
  { 
    name: "Venus",
    distance: 0.72,
    mass: 4.86E24
  },
  { 
    name: "Earth",
    distance: 1,
    mass: 5.97E24
  },
  {
    name: "Mars",
    distance: 1.52,
    mass: 6.41E23
  },
  {
    name: "Jupiter",
    distance: 5.2,
    mass: 1.89E27
  },
  {
    name: "Saturn",
    distance: 9.54,
    mass: 5.68E26
  },
  {
    name: "Uranus",
    distance: 19.22,
    mass: 8.68E25
  },
  {
    name: "Neptune",
    distance: 30.06,
    mass: 1.02E26
  }
];

console.log(planetsArr);
console.log(planetsObjs);