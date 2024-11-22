const droopablelements = document.querySelectorAll('.NoImg');
let count = 0;
const gameOverAudio = new Audio('mixkit-game-over-dark-orchestra-633.wav');
const dropAudio = new Audio('mixkit-bubbly-achievement-tone-3193_65vv8y69.wav');
const dragAudio = new Audio('mixkit-game-flute-bonus-2313_w9pYc858.mp3');
const wrongMatchAudio = new Audio('wrongAudio.wav');
const diceRow = document.getElementById('diceRow');
const noRow = document.getElementById('noRow');
let arr = [1,2,3,4,5,6,7,8,9,10];
let flag = false;
const diceRow1 = document.querySelector('.row1');
const diceRow2 = document.querySelector('.row2');

const arrayOfDraggableElements = [];

		displaydiceImg();
		const draggableElements = document.querySelectorAll('.DiceImg');
		for(i=0; i<draggableElements.length;i++){
			arrayOfDraggableElements.push(draggableElements[i].id);
		}



draggableElements.forEach(ele =>{
	ele.addEventListener("dragstart",dragStart);
	ele.addEventListener("drag",drag);
});

droopablelements.forEach(ele =>{
	ele.addEventListener("dragover",dragOver);
	ele.addEventListener("drop",drop);
});

//drag & drop functions

function dragStart(event){
	console.log("drag start");
	event.dataTransfer.setData("text",event.target.id);
	dragAudio.play();
}

function drag(event){
	console.log('drag');
	event.dataTransfer.setData("text",event.target.id);
}

function dragOver(event){
	event.preventDefault();
	console.log("dragOver");
}

function drop(event){
	event.preventDefault();
	var draggableElementsData = event.dataTransfer.getData("text");
	const droopableElementsData = event.target.getAttribute("id");
	if(draggableElementsData === droopableElementsData){
	event.target.src = draggableElements[arrayOfDraggableElements.indexOf(event.target.id)].src
	draggableElements[arrayOfDraggableElements.indexOf(event.target.id)].style.display = "none";
	dropAudio.play();
	if(count == 10){
		var gameOverInterval = setTimeout(gameOver,500);
	}

	count++;
	// 

	}
	else{
		//wrong match popup "OOPS" display
		showPopUp();
		wrongMatchAudio.play();
		
		

	}
}



//other functions


function gameOver(){
	const gameOverImg = '<img src="images.jfif" style = "position: absolute; top: 150px; left:400px;" width="600px">'
	document.write(gameOverImg);
	let button = document.createElement("button");
	button.classList.add('MyBtn');
	button.style.fontFamily = 'monospace';
	button.style.fontWeight = 'bolder';
	button.style.fontSize = '20px';
	button.style.background = 'white';
	button.style.border = 'white';
	button.style.color = 'blue';
	button.style.cursor = 'pointer';
	button.style.position = 'absolute';
	button.style.top = '10vh';
	button.style.left = '45%';
	button.addEventListener('mouseover', ()=>{
		button.style.color = 'blue';
		button.style.border = '1px solid blue';
		button.style.borderRadius = '10px';
	})
	button.addEventListener('mouseout',()=>{
		button.style.background = 'white';
	button.style.border = 'white';
	button.style.color = 'blue';

	})
	button.style.padding = '10px 50px';
	button.addEventListener('click',()=>{
		window.location.reload(true);

	})
	let gameOverBtnText = document.createTextNode("REPLAY");
	button.appendChild(gameOverBtnText);
	console.log(button);
	document.body.appendChild(button);
	gameOverAudio.play();
}

function displayNoImg(){
	for(let i = 0;i<10;i++){
		let random = 5;
		let noBox= document.createElement("div");
		noBox.classList.add('col-sm');
		let noImg = document.createElement("img");
		noImg.classList.add('NoImg');
		noImg.draggable = true;
		noImg.id = random;
		noImg.src = "Img"+(i+1)+"-removebg-preview.png";
		noBox.appendChild(noImg);
		noRow.appendChild(noBox);
	}
	
}

function displaydiceImg(){
	// 
	for(let i = 0;i<5;i++){
		let random = getRandomNo();
		let diceBox = document.createElement("div");
		diceBox.classList.add('col-sm');
		diceBox.classList.add('col-md-2');
		let diceImg = document.createElement("img");
		diceImg.classList.add('DiceImg');
		diceImg.draggable = true;
		diceImg.id = random;
		diceImg.setAttribute('src',"dice"+random+".png");
		diceImg.addEventListener('dragstart',dragStart);
		diceImg.addEventListener('drag',drag);
		diceBox.appendChild(diceImg);
		diceRow2.appendChild(diceBox);
	}
	for(let i = 5;i<10;i++){
		let random = getRandomNo();
		let diceBox = document.createElement("div");
		diceBox.classList.add('col-sm');
		diceBox.classList.add('col-md-2');
		let diceImg = document.createElement("img");
		diceImg.classList.add('DiceImg');
		diceImg.draggable = true;
		diceImg.id = random;
		diceImg.setAttribute('src',"dice"+random+".png");
		diceImg.addEventListener('dragstart',dragStart);
		diceImg.addEventListener('drag',drag);
		diceBox.appendChild(diceImg);
		diceRow1.appendChild(diceBox);
	}
}

function getRandomNo(){	
	let l = arr.length
	let n = Math.floor(Math.random()*l);
	if(n==arr.length){
		n=n-1;
	}
	let number = arr[n];
	arr.splice(n,1);
	return number;	
}

let popupbox = document.createElement("img");
	popupbox.classList.add('PopUpBox');
	popupbox.setAttribute('src',"oops-smiley.jpg");
	popupbox.addEventListener('click', ()=>{
		// console.log("onclick event fire");
		falg = false;
		popupbox.style.visibility = 'hidden';
		flag = true;
	})
	document.body.appendChild(popupbox);
	if(flag == false){
		popupbox.style.visibility = "hidden";
		flag = true;
	}
function showPopUp(){
	console.log(popupbox);
	if(flag==true){
		popupbox.style.visibility = "visible";
		flag = false;
	}
}



