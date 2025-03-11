var planets = ["Mercury","Venus","Earth","Mars","Jupiter","Saturn","Uranus","Neptune"];

function printAllPlanets() {
  for(let p=0; p<planets.length; p++) {
    document.write("  <li>" + planets[p] + "</li>\n")
  }
}