let can = document.getElementById("table");
let draw_ = can.getContext('2d');

const ball = {
    x : can.width/2,
    y : can.height/2,
    radius : 10,
    velX : 5,
    velY : 5,
    speed : 5,
    color : "green" 
}
const user = {
    x : 0,
    y : (can.height - 100)/2,
    width : 10,
    height : 100,
    score : 0,
    color : "red"
}
const cpu = {
    x : can.width - 10,
    y : (can.height- 100)/2,
    width : 10,
    height : 100,
    score : 0,
    color : "red"
}
const sep = {
    x : (can.width - 2)/2,
    y : 0,
    height : 10,
    width : 2,
    color : "orange"
}

function drawRectangle(x,y,w,h,color){
    draw_.fillStyle = color;
    draw_.fillRect(x,y,w,h);
}

function drawCircle(x,y,r,color){
    draw_.fillStyle = color;
    draw_.beginPath();
    draw_.arc(x,y,r,0,Math.PI*2,true);
    draw_.closePath();
    draw_.fill();
}

function drawScore(text,x,y){
    draw_.fillStyle = "white";
    draw_.font = "60px Arial";
    draw_.fillText(text,x,y);
}

function drawSeparator(){
    for(let i = 0; i <=can.height; i+=20){
        drawRectangle(sep.x,sep.y+i,sep.width,sep.height,sep.color);
    }
}
function helper(){
    drawRectangle(0,0,can.width,can.height,"black");
    drawScore(0,can.width/4,can.height/5);
    drawScore(0,3*can.width/4,can.height/5);
    drawSeparator();
    drawRectangle(user.x,user.y,user.width,user.height,"red");
    drawRectangle(cpu.x,cpu.y,cpu.width,cpu.height,"red");
    drawCircle(ball.x,ball.y,ball.radius,ball.velX,ball.velY,ball.speed,"green ");
}
function call_back(){
    //updates();
    helper();
}
let fPS = 50;
let looper = setInterval(call_back,1000/fPS);