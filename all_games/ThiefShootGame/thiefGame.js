const cursor = document.querySelector(".cursor");
const bloodSpot = document.querySelector(".bloodspot");
const thief = document.querySelector(".thief");
const score = document.querySelector(".score-game");
const container = document.querySelector(".container");
let backimg = document.querySelector(".backimage");
const startPopUp = document.querySelector(".start-popup");
const levelContainer = document.querySelector(".level-container");
const levelP = document.querySelector(".level");

let levelCounter = 0;
let IncreaseThiefSpeed = 4000;

levelContainer.classList.add("hide-show");

var TimingContainer = document.getElementById("timer");
var TimerPara = document.getElementById("time-para");

let count = 0;
console.log(container);
console.log(score);

window.addEventListener("mousemove" ,  (e) =>{

	cursor.style.top  = e.pageY + "px";
	cursor.style.left = e.pageX + "px";
});

window.addEventListener("click" , (e) =>{

	bloodSpot.style.top  = e.pageY + "px";
	bloodSpot.style.left = e.pageX + "px";
});





// To Move The Thief In RAndom Position

	
const randomThiefPosition = () =>{

	startPopUp.style.display = "none";
	thief.style.visibility = "visible";
	levelContainer.style.zIndex = "-100";

	let randomThiefX = Math.random() * (window.innerWidth - 100);
	let randomThiefY = Math.random() * (window.innerHeight - 100);

	thief.style.top  = randomThiefY + "px";
	thief.style.left = randomThiefX + "px";

console.log("Old Thief Position : " +randomThiefX);
console.log("Old Thief Position : " +randomThiefY);
	
	if(randomThiefX >= window.innerWidth){

		callRandomImage = setInterval(randomImage , 10);
	}

	if(randomThiefY >= window.innerHeight){

		callRandomImage = setInterval(randomImage , 10);
	}

}

// Call Random Thief Function

flag = true;

const callRandomThief = () =>{

	if(flag == true){

		IncreaseThiefSpeed = 300;
		flag = false;
		temp = setInterval(randomThiefPosition , IncreaseThiefSpeed);
		console.log("Old Speed : " + IncreaseThiefSpeed);
		setTimeout( () => {clearInterval(temp); console.log("Here Interval Is Clear");} , 1000);
	}	

	IncreaseThiefSpeed = 5000;
	console.log("New Speed : " + IncreaseThiefSpeed);

	callRandomThiefImage = setInterval(randomThiefPosition , IncreaseThiefSpeed);

}


const scorePluse = () =>{

	bloodSpot.style.visibility = "visible";
	setTimeout(() => {bloodSpot.style.visibility = "hidden";} , 1000);


	// To Increase The Score

	count++;
	score.innerHTML = count;
	console.log("Image Clicked : " + count);

	// To Increase The Level

	// A Levelflag Is Used To Increse Level Only One Time And Show Pop Up One Time 

	levelflag = false;

	if(count == 2 || count == 5 || count == 8 || count == 10 || count == 15){

		levelflag = true;
		console.log("First : " + levelCounter);
		levelCounter++;
		console.log("After Increment : " + levelCounter)
		levelP.innerHTML = "Level " + levelCounter; 
		levelContainer.classList.add("level-animation");
		levelContainer.classList.add("hide-show");
		console.log("Level : " + levelCounter);
		setTimeout( () => {levelContainer.classList.remove("level-animation");} , 10000);
		setTimeout( () => {levelContainer.classList.remove("hide-show");} , 1000);
	}

if(levelflag == true){


	if(levelCounter == 1){

		levelContainer.style.visibility = "visible";
		levelContainer.style.zIndex = "100";
		IncreaseThiefSpeed = 3500;
		c = clearInterval(callRandomThiefImage);
		callRandomThiefImage = setInterval(randomThiefPosition , IncreaseThiefSpeed);
		console.log("Level 1 increse ");
	}

	 if(levelCounter == 2){

	 	levelContainer.style.visibility = "visible";
		IncreaseThiefSpeed = 2800;
		levelContainer.style.zIndex = "100";
		c = clearInterval(callRandomThiefImage);
		callRandomThiefImage = setInterval(randomThiefPosition , IncreaseThiefSpeed);
		console.log("Level 2 increse ");
	}

	 if(levelCounter == 3){

	 	levelContainer.style.visibility = "visible";
		IncreaseThiefSpeed = 2000;
		levelContainer.style.zIndex = "100";
		c = clearInterval(callRandomThiefImage);
		callRandomThiefImage = setInterval(randomThiefPosition , IncreaseThiefSpeed);
		console.log("Level 3 increse ");
	}

	 if(levelCounter == 4){

	 	levelContainer.style.visibility = "visible";
		IncreaseThiefSpeed = 1400;
		levelContainer.style.zIndex = "100";
		c = clearInterval(callRandomThiefImage);
		callRandomThiefImage = setInterval(randomThiefPosition , IncreaseThiefSpeed);
		console.log("Level 4 increse ");
	}

	 if(levelCounter == 5){

	 	levelContainer.style.visibility = "visible";
		IncreaseThiefSpeed = 1000;
		levelContainer.style.zIndex = "100";
		c = clearInterval(callRandomThiefImage);
		callRandomThiefImage = setInterval(randomThiefPosition , IncreaseThiefSpeed);
		console.log("Level 5 increse ");
	}

	 if(levelCounter == 6){

	 	// levelContainer.style.visibility = "visible";
		IncreaseThiefSpeed = 500;
		levelContainer.style.zIndex = "100";
		c = clearInterval(callRandomThiefImage);
		callRandomThiefImage = setInterval(randomThiefPosition , IncreaseThiefSpeed);
		console.log("Level 5 increse ");
	}

	levelflag = false;

}


	// levelContainer.style.visibility = "hidden";	

	setTimeout( () => {levelContainer.style.visibility = "hidden";} , 2000);


}







// To Play Gun Shoot Audio

function playAudio(){

	var audio = new Audio("pistol.mp3");
	audio.play();
}



// To Generate Random Background Image


const RandomImage = () =>{

	var randomImage = (Math.floor(Math.random() * 5) + 1);

	console.log(randomImage);

	backimg.src = "background" + randomImage + ".jpg"
	console.log(backimg.src);

}

let callRandomImage = setInterval(RandomImage , 8000);



	var innerHeightOfScreen = window.innerHeight;
	console.log(innerHeightOfScreen);

	var timer = innerHeightOfScreen;


	function Timing(){

		timer--;
		console.log(timer);

		TimingContainer.style.height = timer + "px";
		TimerPara.innerHTML = Math.floor(timer / 10);

		if(timer == 0){

			clearInterval(c);
			window.location.href = "gameover.html";
			GameOverScore.innerHTML = count;
		}

		if(timer <= 300){

			TimingContainer.classList.add("colorchange");

		}
	}

	function CallTiming(){

		c = setInterval(Timing , 100);
		
	}
	
exports = count;

