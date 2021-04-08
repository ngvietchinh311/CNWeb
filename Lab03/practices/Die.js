function Die(sides) {
    this.numSides = sides; 
    this.numRolls = 0;
    this.roll = roll; // define a pointer to a function
}
function roll() {
    this.numRolls++;
    return Math.floor(Math.random()*this.numSides) + 1;
}