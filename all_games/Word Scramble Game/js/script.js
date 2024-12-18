
const wordText = document.querySelector(".word"),
hintText = document.querySelector(".hint span"),
timeText = document.querySelector(".time b"),
inputField = document.querySelector("input"),
refreshBtn = document.querySelector(".refresh-word"),
checkBtn = document.querySelector(".check-word");
const messageElement = document.getElementById("message");
const scoreText = document.querySelector(".score b");
let score = 0;
let correctWord, timer;
const scoreWords = [
  "Amazing",
  "Wonderful",
  "Wordlicious",
  "Incredible",
  "Fantastic",
  "Superb",
  "Outstanding",
  "Excellent",
  "Impressive",
  "Spectacular",
];
const initTimer = (maxTime) => {
  clearInterval(timer);
  timer = setInterval(() => {
    if (maxTime > 0) {
      maxTime--;
      return (timeText.innerText = maxTime);
    }
    clearInterval(timer);
    messageElement.innerHTML = `Time off! <span style="color: #39A7FF; background-color: #EEF5FF;">${correctWord.toUpperCase()}</span> was the correct word`;
    inputField.style.display = "none"; 
    setTimeout(() => {
      initGame();
      inputField.style.display = "block"; 
    }, 1500);
  }, 1000);
};

const initGame = () => {
  initTimer(30);
  let randomIndex = Math.floor(Math.random() * words.length);
  let randomObj = words[randomIndex];
  let wordArray = randomObj.word.split("");
  for (let i = wordArray.length - 1; i > 0; i--) {
    let j = Math.floor(Math.random() * (i + 1));
    [wordArray[i], wordArray[j]] = [wordArray[j], wordArray[i]];
  }
  wordText.innerText = wordArray.join("");
  hintText.innerText = randomObj.hint;
  correctWord = randomObj.word.toLowerCase();
  inputField.value = "";
  inputField.setAttribute("maxlength", correctWord.length);
  inputField.className = "";

  let wordClass;
  let wordLength = correctWord.length;
  let repeatingCharacters = /([a-zA-Z]).*?\1/.test(correctWord);
  if (wordLength <= 4 || repeatingCharacters) {
    wordClass = "common";
  } else if (wordLength <= 6) {
    wordClass = "rare";
  } else if (wordLength <= 8) {
    wordClass = "exclusive";
  } else {
    wordClass = "legendary";
  }

  
  let wordClassElement = document.querySelector(".word-class");
  wordClassElement.innerText = wordClass;

  
  switch (wordClass) {
    case "common":
      wordClassElement.style.color = "black";
      wordClassElement.style.backgroundColor = "lightblue";
      break;
    case "rare":
      wordClassElement.style.color = "white";
      wordClassElement.style.backgroundColor = "red";
      break;
    case "exclusive":
      wordClassElement.style.color = "black";
      wordClassElement.style.backgroundColor = "gold";
      break;
    case "legendary":
      wordClassElement.style.color = "white";
      wordClassElement.style.backgroundColor = "purple";
      break;
  }

  messageElement.textContent = "";
};

initGame();

const updateScoreColor = () => {
  const labelElement = document.getElementById("scoreLabel");
  const scoreValueElement = document.getElementById("scoreValue");
  let displayWord;

  if (scoreWords.length > 0) {
    displayWord = scoreWords[Math.floor(Math.random() * scoreWords.length)];
  } else {
    displayWord = "No words available";
  }

  scoreValueElement.classList.add("show-word");

  scoreValueElement.innerHTML = `<span style="font-size: 1.1em">${displayWord}</span>`;
  labelElement.style.display = "none"; 
  setTimeout(() => {
    
    scoreValueElement.innerHTML = score;
    labelElement.style.display = "inline";

    scoreValueElement.classList.remove("show-word");
  }, 1100);
};

window.checkWord = () => {
  let userWord = inputField.value.toLowerCase();
  if (!userWord) {
    messageElement.textContent = "Please enter the word to check!";
    inputField.classList.add("flash");
    setTimeout(() => {
      inputField.classList.remove("flash");
      messageElement.textContent = "";
    }, 2000);
    return;
  }
  if (userWord !== correctWord) {
    inputField.classList.remove("correct");
    inputField.classList.add("incorrect");
    messageElement.textContent = "Oops! Try again.";
    return;
  }
  inputField.classList.remove("incorrect");
  inputField.classList.add("correct");
  messageElement.textContent = `Yay, ${correctWord.toUpperCase()} is the correct word!`;

  let timeLeft = parseInt(timeText.innerText);
  clearInterval(timer);

  if (timeLeft > 25) {
    score += 20;
  } else if (timeLeft > 20) {
    score += 17;
  } else if (timeLeft > 15) {
    score += 14;
  } else if (timeLeft > 10) {
    score += 13;
  } else {
    score += 10;
  }
  scoreText.innerText = score;

  updateScoreColor();
  setTimeout(initGame, 2000);
  inputField.style.display = "block";
};

refreshBtn.addEventListener("click", initGame);
checkBtn.addEventListener("click", checkWord);
