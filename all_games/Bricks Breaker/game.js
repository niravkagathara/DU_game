// console.log(window.innerHeight,window.innerWidth); = 714 1536
const container                       = document.getElementById("container");
const head                            = document.querySelector("head");
const container2                      = document.querySelector(".container2");
const blockHeight                     = 40;
var blockWidth                        = 120;
const bottomLeft                      =0;
const bottomRight                     =0;
const topRight                        =0; 
const topLeft                         =0; 
const userBlockWidth                  = 100;
const userBlockHeigth                 = 20;
var xDirection                        = 2;
var yDirection                        = 2;
var temp2                             =0; 
var count                             =0;
var score2,startDiv,levelup           =0;
var Xcoordinate                       =0;  
const body=document.getElementById("body");
const bodyDetails = body.getBoundingClientRect();

// MUSIC 
const loseMusic = new Audio();
loseMusic.src   = "lose.wav";

const collision = new Audio();
collision.src = "collision.wav";

const wallBlock = new Audio();
wallBlock.src = "wall.wav";

const winMusic = new Audio();
winMusic.src = "win.wav";

// Creating div for wining and lose/refreash
const win = document.createElement("div");
const lose = document.createElement("div");

if(bodyDetails.width<1000){
  body.innerHTML="";
  imgUC = document.createElement("img");
  imgUC.src="../Skyline web/assests/Images/Soon.png";
  imgUC.style.height="100%";
  imgUC.style.width="100%";
  body.appendChild(imgUC);
}

const backBtn = document.getElementById("Back-btn");
backBtn.style.marginTop = parseInt(window.innerHeight-100)+"px";

function start()
{
    startDiv = document.createElement('div');
    startDiv.classList.add("startDiv");
    startDiv.style.width = window.innerWidth*1 + "px";
    startDiv.style.top = (window.innerHeight/2)-72 + "px";
    startDiv.innerHTML = "Welcome, to the game! <br> Click  here to continue";
    container.appendChild(startDiv);
    startDiv.onclick = function(){startGame()};
}

function startGame()
{
    startDiv.style.opacity = 0;
    Header();
}

function Header()
{
    score = document.createElement("div");
    score.classList.add("box");   

    score.innerHTML = "Points :"
    score.style.marginTop="450px";
    score.style.marginLeft="50px";
    container.appendChild(score);

    score2 = document.createElement("div");
    score2.classList.add("box");
    container.appendChild(score2);
    score2.style.marginTop="450px";
    score2.style.left = "160px";
    score2.innerHTML = temp2;

    // level = document.createElement('div');
    // level.classList.add("box");
    // level.innerHTML = "LEVEL 1"
    // level.style.left = (window.innerWidth/2)-51 + "px";
    // level.style.marginTop = "30px";
    // top = level.style.marginTop = "30px"
    // level.style.color = "white";
    // container.appendChild(level);

    addBlocks()
}

class Block
{
    constructor(xAxis,yAxis)
    {
        this.bottomLeft  = [xAxis, yAxis]
        this.bottomRight = [xAxis + blockWidth, yAxis]
        this.topRight    = [xAxis + blockWidth, yAxis + blockHeight]
        this.topLeft     = [xAxis, yAxis + blockHeight]
    }
}

// ARRAY OF BLOCKS OF OBJECT BLOCK
var noBlocks = parseInt(window.innerWidth/192);
var temp=0;
var temp3=100,count2 = 1;
console.log(noBlocks);

const blocks = [
    new Block(temp,500),
    new Block(temp+=200,500),
    new Block(temp+=200,500),
    new Block(temp+=200,500),
    new Block(temp+=200,500),
    new Block(temp+=200,500),
    new Block(temp+=200,500),
    new Block(temp+=200,500),
    new Block(temp3,430),
    new Block(temp3+=200,430),
    new Block(temp3+=200,430),
    new Block(temp3+=200,430),
    new Block(temp3+=200,430),
    new Block(temp3+=200,430),
    new Block(temp3+=200,430)
]

// FUNCTION FOR BUILDING ALL BLOCKS 


function addBlocks()
{
    container2.classList.add("container2"); 


    for(let i=0;i<blocks.length;i++)
    {
        
        if(count2<=noBlocks-1 && count>=noBlocks)
        {
            const divOfBlock = document.createElement("div");
            divOfBlock.classList.add("block");
            divOfBlock.style.backgroundColor = "#FF8888";
            divOfBlock.style.left = blocks[i].bottomLeft[0] + 'px'
            divOfBlock.style.bottom = blocks[i].bottomLeft[1] + 'px'  
            container2.appendChild(divOfBlock);
            count2++;
        }
        else 
        {   if(count<=noBlocks-1)
            {
                const divOfBlock = document.createElement("div");
                divOfBlock.classList.add("block");
                divOfBlock.style.left = blocks[i].bottomLeft[0] + 'px'
                divOfBlock.style.bottom = blocks[i].bottomLeft[1] + 'px'  
                container2.appendChild(divOfBlock);
                count++;
            }
           
        }
       
    } 
    container2.appendChild(user);
    container2.appendChild(ball);
}

// DRAWING USER BLOCK

const user = document.createElement('div');
user.classList.add('user');
user.style.bottom = 30+ "px";
user.style.left = window.innerWidth/2 - 33+ "px";
currentPosition = [];
currentPosition[0] = window.innerWidth/2 - 33;
currentPosition[1] = 30;

function moveUser(e) {
    switch (e.key) {
      case 'ArrowLeft':
        if (currentPosition[0] > 0) {
          currentPosition[0] -= 30
          drawUser()   
        }
        break
      case 'ArrowRight':
        if (currentPosition[0] < (window.innerWidth-102)) {
          currentPosition[0] += 30
          drawUser()   
        }
        break
    }
  }
  document.addEventListener('keydown', moveUser)
  document.addEventListener('mousemove',mouseMovement)
 
  function mouseMovement(event)
  {
    {
        if(event.clientX>Xcoordinate)
        {
            if(event.clientX>=window.innerWidth-blockWidth)
            {
                currentPosition[0] = window.innerWidth-blockWidth
                drawUser() 
            }
            else
            {
                currentPosition[0] = event.clientX 
                drawUser() 
            }
            
        }
        else if(event.clientX<Xcoordinate)
        {
            if(currentPosition[0]==window.innerWidth-blockWidth)
            {
                currentPosition[0] = window.innerWidth-blockWidth- 200;
                drawUser() 
            }
            else
            {
                currentPosition[0] = event.clientX 
              drawUser() 
            }
            
        }
        Xcoordinate = event.clientX;
      };
  }
  
  //draw User
  function drawUser() {
    user.style.left = currentPosition[0] + 'px'
    user.style.bottom = currentPosition[1] + 'px'
  }

// draw  ball 
   const ball = document.createElement('div');
   ball.classList.add("ball");
   ball.style.left = window.innerWidth/2 + "px";
   ball.style.bottom = "50px";
   ballCurrentPosition = []
   ballCurrentPosition[0] = window.innerWidth/2;
   ballCurrentPosition[1] = 50;
   var time=10;
   var TimeID = setInterval(balls,time);
  
   function balls()
   {
        ballCurrentPosition[0] += xDirection;
        ballCurrentPosition[1] += yDirection;
        setPositionOfBall();
        checking();
   }

   function setPositionOfBall()
   {
       ball.style.left  = ballCurrentPosition[0] + "px";
       ball.style.bottom = ballCurrentPosition[1] + "px";
   }

   function checking()
   {
    // For ball speed
    {
        if(score2==60)
        {
            console.log(TimeID=9)
        }
        if(score2==100)
        {
            console.log(TimeID=9)
        }
    }

    // For wall collision 
    if(ballCurrentPosition[0] >= window.innerWidth - 32
       || ballCurrentPosition[0] <= 0
       || ballCurrentPosition[1] >= window.innerHeight - 31)
       {
        wallBlock.play();
        changeDirection();
       }

    //    For game end
    if(ballCurrentPosition[1] <= 0)
    {
        clearInterval(TimeID);
        document.removeEventListener('keydown',moveUser);
        document.removeEventListener('mousemove',mouseMovement);

        loseMusic.play()
        lose.classList.add("startDiv");
        lose.style.width = window.innerWidth*1 + "px";
        lose.style.top = (window.innerHeight/2)-72 + "px";
        
        lose.innerHTML = "Oops!,Better Luck Next Time <br> Click here play again";
        container.appendChild(lose);

        lose.onclick =  function(){refreash()}
    }
   

    // For block collision
     for(i=0;i<blocks.length;i++)
     {
        if
        (
          (ballCurrentPosition[0] > blocks[i].bottomLeft[0] && ballCurrentPosition[0] < blocks[i].bottomRight[0]) &&
          ((ballCurrentPosition[1] + 31) > blocks[i].bottomLeft[1] && ballCurrentPosition[1] < blocks[i].topLeft[1]) 
        )
        {
            collision.play();
            const allBlocks = Array.from(document.querySelectorAll('.block'))
            allBlocks[i].classList.remove('block')
            blocks.splice(i,1)
            temp2 += 10;
            score2.innerHTML = temp2;
            changeDirection()   
        } 
        if(temp2 == 150)
        {
            clearInterval(TimeID);
            document.removeEventListener('keydown',moveUser); 

            winMusic.play();
            win.classList.add("startDiv");
            win.style.width = window.innerWidth *1  + "px";
            win.style.top = (window.innerHeight/2)-72 + "px";

            ball.style.opacity = 0;
            user.style.opacity = 0;
        
            win.innerHTML = "Level 2 coming soon! <br> Chick here to replay";
            container.appendChild(win);

            win.onclick =  function(){refreash()}
        }
     } 

    //  For userblock

    if(ballCurrentPosition[0] >= currentPosition[0] + 3 && ballCurrentPosition[1] > 5 && ballCurrentPosition[1] < 50)
    {
        wallBlock.play();
        xDirection = 2;
        yDirection = -2;
        ball.style.bottom = ballCurrentPosition[1] + xDirection + "px";
        ball.style.left = ballCurrentPosition[0] +  yDirection + "px";
    }
    
     if
   (
    (ballCurrentPosition[0] > currentPosition[0] && ballCurrentPosition[0] <= currentPosition[0] + blockWidth) &&
    (ballCurrentPosition[1] + 20 > currentPosition[1]  && ballCurrentPosition[1] + 20 <= currentPosition[1] + blockHeight ) 
  )
  {
    wallBlock.play();
    changeDirection();
  }

   }

   function changeDirection()
{
   
   
    if(xDirection === 2 && yDirection ===2)
    {
        xDirection = -2;
        return
    }

    if(xDirection === -2 && yDirection === 2)
    {
        yDirection = -2;
        return
    }
    if(xDirection === -2 && yDirection === -2)
    {
        xDirection = 2;
        return
    }
    if(xDirection === 2 && yDirection === -2)
    {
        yDirection = 2;
        return
    } 
}

// REFRESH

function refreash()
{
    document.location.reload(); 
}



