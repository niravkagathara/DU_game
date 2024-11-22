document.addEventListener('DOMContentLoaded', function () {
  const games = [
    {
      name: "2048",
      imageUrl: "./Skyline web/assests/Images/2048.png",
      playUrl: "./2048/index.html",
      platform: "desktop",
      developer: "Het Bhalani"
    },
    {
      name: "Car Chase",
      imageUrl: "./Skyline web/assests/Images/CRicon.png",
      playUrl: "./Car Game/indexCarGame.html",
      platform: "desktop",
      developer: "Maulik Bhatt"
    },
    {
      name: "Flappy Bird",
      imageUrl: "./Skyline web/assests/Images/FlappyBird2.webp",
      playUrl: "./Flappy-Bird/index.html",
      platform: "desktop",
      developer: "Niravkumar Kagathara"
    },
    {
      name: "Match Numbers",
      imageUrl: "./Skyline web/assests/Images/MNicon.jpeg",
      playUrl: "./Match Box/indexMB.html",
      platform: "mobile",
      developer: "Devika Khunt"
    },
    {
      name: "Break Bricks",
      imageUrl: "./Skyline web/assests/Images/BBicon.png",
      playUrl: "./Bricks Breaker/indexBBGame.html",
      platform: "desktop",
      developer: "Rhydham Gundigara"
    },
    {
      name: "S.P.S",
      imageUrl: "./Skyline web/assests/Images/SPSicon.png",
      playUrl: "./Stone Paper Scissors/indexSPSGame.html",
      platform: "desktop",
      developer: "Harshil Savjadiya"
    },
    {
      name: "Alphabet Game",
      imageUrl: "https://i.pinimg.com/originals/fb/fa/03/fbfa030c5eb22a5c848a085a551ef98f.jpg",
      playUrl: "./Alphabet Game/level0.html",
      platform: "mobile",
      developer: "Rhydham Gundigara"
    },
    {
      name: "Thief Shooter",
      imageUrl: "./assets/img/theifGame.jpg",
      playUrl: "./ThiefShootGame/start.html",
      platform: "desktop",
      developer: "Smit Bhut"
    },
    {
      name: "Snake Game",
      imageUrl: "https://tse1.mm.bing.net/th?id=OIP.4eWBWGWKODtLglSBXi_AAgHaHa&pid=Api&P=0",
      playUrl: "./Snake Game/Snake.html",
      platform: "desktop",
      developer: "Harshil Savjadiya"
    },
    {
      name: "Memory Game",
      imageUrl: "./assets/img/Memory Game.png",
      playUrl: "./Memory game/index.html",
      platform: "desktop",
      developer: "Krisha Kalola"
    },
    {
      name: "Word Scramble",
      imageUrl: "./Skyline web/assests/Images/Word scramble.jpeg",
      playUrl: "./Word Scramble Game/index.html",
      platform: "desktop",
      developer: "Ghanshyamsinh Zala"
    },
    {
      name: "Ping Pong",
      imageUrl: "./Skyline web/assests/Images/Ping-pong.jpg",
      playUrl: "./Ping Pong/index.html",
      platform: "desktop",
      developer: "Ayushi Patel"
    }
  ];

  function generateGameItems() {
    const gamesListDiv = document.getElementById('gamesList');
    const loadingIndicator = document.getElementById('loadingIndicator');

    // Hide loading indicator and show games container
    loadingIndicator.style.display = 'none';

    games.sort((a, b) => a.name.localeCompare(b.name));

    const fragment = document.createDocumentFragment();

    // Loop through games array
    games.forEach(game => {
      // Create elements for each game
      const gameItemDiv = document.createElement('div');
      gameItemDiv.classList.add('games-item', game.platform, 'game-card');
      gameItemDiv.setAttribute('data-aos', 'fade-up');
      gameItemDiv.setAttribute('data-tippy-content', `Developer: ${game.developer}`);
      gameItemDiv.innerHTML = `
              <div class="games-single-item img-contain-isotope">
                <div class="games-thumb">
                  <div class="games-thumb-image">
                    <a href="#">
                      <img src="${game.imageUrl}" alt="${game.name}" lazy="true">
                    </a>
                  </div>
                </div>
                <div class="games-desc">
                  <div class="game-title">
                    <h3 style="font-size: 23px;"><a href="#">${game.name}</a></h3>
                  </div>
                  <div class="game-action demo">
                    <div class="game-buy">
                      <a href="${game.playUrl}" class="fag-btn-outline">Play</a>
                    </div>
                  </div>
                </div>
              </div>
            `;

      // Append each game's div to the fragment
      fragment.appendChild(gameItemDiv);
    });

    // Append fragment to gamesListDiv at once for better performance
    gamesListDiv.appendChild(fragment);

    // Initialize tooltips
    tippy('[data-tippy-content]',{
      theme: 'custom'
    });
  }

  // Call generateGameItems to initially render the games
  generateGameItems();
});