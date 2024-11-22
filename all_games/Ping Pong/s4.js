function restart(){
    ball.x = can.width/2;
    ball.y = can.height/2;
    ball.velX = -ball.velX;
    ball.speed = 5;
}

can.addEventListener("mousemove", getMousePos);

function getMousePos(evt){
    let rect = can.getBoundingClientRect();
    user.y = evt.clientY - rect.top - user.height/2;
}
function detect_collision(ball,player){
    player.top = player.y;
    player.bottom = player.y + player.height;
    player.left = player.x;
    player.right = player.x + player.width;

    ball.top = ball.y - ball.radius;
    ball.bottom = ball.y + ball.radius;
    ball.left = ball.x - ball.radius;
    ball.right = ball.x + ball.radius;
}
function cpu_movement(){
    if(cpu.y<ball.y)
        cpu.y+=5;
    else
        cpu.y-=5;
}

Mathematics:
        cpu.y += ((ball.y - (cpu.y + cpu.height/2)));

Random:
        cpu.y = Math.random()*can.height;