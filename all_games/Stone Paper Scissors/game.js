// const backBtn = document.getElementById("back-btn");
// backBtn.style.bottom = parseInt(window.innerHeight-200)+"px";

const game = () => {

  const win = new Audio();
  win.src = "./assests/Audio/Game Winning.mp3";

  const tie = new Audio();
  tie.src = "./assests/Audio/Tie.mp3";

  const over = new Audio();
  over.src = "./assests/Audio/Game Over.wav";

  const playMatch = () => {
  const options = document.querySelectorAll("button");
  const playerHand = document.querySelector(".user-choice");
  const computerHand = document.querySelector(".computer-choice");
  const hands = document.querySelectorAll(".img-box img");
  const body=document.getElementById("body");
  const bodyDetails = body.getBoundingClientRect();

  if(bodyDetails.width<1000){
    body.innerHTML="";
    body.style.backgroundColor="#292929"
    body.style.display="flex";  
    body.style.justifyContent="center";
    body.style.alignItems="center";
    imgDiv = document.createElement("div");
    imgDiv.style.height="700px";
    imgDiv.style.width="700px";
    imgUC = document.createElement("img");
    imgUC.style.height="100%"
    imgUC.style.width="100%"
    imgUC.src="../Skyline web/assests/Images/Soon.png";
    body.appendChild(imgDiv);
    imgDiv.appendChild(imgUC);
    
  }
 
  const computerOptions = ["Stone", "Paper", "Scrissors"];
 
  options.forEach(option => {
    option.addEventListener("click", function() {
 
      const computerNumber = Math.floor(Math.random() * 3);
      console.log(computerNumber);
      const computerChoice = computerOptions[computerNumber];
 
        compareHands(this.textContent, computerChoice);
        console.log("kbuds")
        console.log(this.textContent)
        playerHand.src = `./assests/${this.textContent}.png`;
        computerHand.src = `./assests/${computerChoice}.png`;
    });
  });
 };
 
 const compareHands = (playerChoice, computerChoice) => {
 
  const result = document.querySelector(".result");
  console.log(playerChoice)
  console.log(computerChoice)
  if (playerChoice === computerChoice) {
   result.textContent = "It is a tie";
   tie.play();
    return;
  }
 
  if (playerChoice === "Stone") {
    if (computerChoice === "Scrissors") {
     result.textContent = "Player Wins";
     win.play();
      return;
    } else {
     result.textContent = "Computer Wins";
     over.play();
      return;
    }
  }
 
  if (playerChoice === "Paper") {
    if (computerChoice === "Scrissors") {
     result.textContent = "Computer Wins";
     over.play();
      return;
    } else {
     result.textContent = "Player Wins";
     win.play();
      return;
    }
  }
 
  if (playerChoice === "Scrissors") {
    if (computerChoice === "Stone") {
     result.textContent = "Computer Wins";
     over.play();
      return;
    } else {
     result.textContent = "Player Wins";
     win.play();
      return;
    }
  }
 };

 playMatch();

}

game();