let can = document.getElementById("table");
let draw_ = can.getContext('2d');

draw_.fillStyle = "red";
draw_.fillRect(100,100,30,30);

draw_.fillStyle = "orange";
draw_.beginPath();
draw_.arc(200,200,10,0,Math.PI*2,false); //0-start angle & fasle-clockwise direction
draw_.closePath();
draw_.fill();