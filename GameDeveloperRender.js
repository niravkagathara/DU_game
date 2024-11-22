const GameDevTeamMembers = [
    {
      name: "Devika Khunt",
      imageUrl: "Skyline web/assests/Images/Image(D).jpg",
      game: "Match Box",
      linkedInUrl: "https://www.linkedin.com/in/devika-khunt-44787a222/"
    },
    {
      name: "Harshil Savjadiya",
      imageUrl: "Skyline web/assests/Images/Image(H).jpg",
      game: "S.P.S & Snake Game",
      linkedInUrl: "https://www.linkedin.com/in/harshil-savajadiya-668039223/"
    },
    {
      name: "Rhydham Gundigara",
      imageUrl: "Skyline web/assests/Images/Image(R).jpg",
      game: "B.B. & Alphabet",
      linkedInUrl: "https://www.linkedin.com/in/rhydham-gundigara-81b62621b/"
    },
    {
      name: "Smit Bhut",
      imageUrl: "Skyline web/assests/Images/Image2(S).jpg",
      game: "Thief Shooter",
      linkedInUrl: "https://www.linkedin.com/in/smit-bhut-533865223/"
    },
    {
      name: "Maulik Bhatt",
      imageUrl: "Skyline web/assests/Images/Image(M).jpg",
      game: "Car Chase",
      linkedInUrl: "https://www.linkedin.com/in/maulikbhatt07/"
    },
    {
      name: "Ghanshyamsinh Zala",
      imageUrl: "Skyline web/assests/Images/Image(G).jpg",
      game: "Word Scramble",
      linkedInUrl: "https://www.linkedin.com/in/ghanshyamsinh-zala-1a1b9924b"
    },
    {
      name: "Krisha Kalola",
      imageUrl: "Skyline web/assests/Images/Image(K).jpg",
      game: "Memory Game",
      linkedInUrl: "https://www.linkedin.com/in/krisha-kalola-803953252"
    },
    {
      name: "Niravkumar Kagathara",
      imageUrl: "Skyline web/assests/Images/Image(N).JPG",
      game: "Flappy-Bird",
      linkedInUrl: "https://www.linkedin.com/in/nirav-kagathara-80978124b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
    },
    {
      name: "Het Bhalani",
      imageUrl: "Skyline web/assests/Images/Image(H).jpeg",
      game: "2048",
      linkedInUrl: "https://www.linkedin.com/in/het-bhalani-20403b2a8/"
    },
    {
      name: "Ayushi Patel",
      imageUrl: "Skyline web/assests/Images/Image(A).jpg",
      game: "Word Scramble",
      linkedInUrl: "https://www.linkedin.com/in/ayushi-patel-00ab382a9?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
    },
    {
      name: "Vijay Shekhat",
      imageUrl: "Skyline web/assests/Images/Image(V).jpg",
      game: "Mentor",
      linkedInUrl: "https://www.linkedin.com/in/vijayshekhat/"
    }
  ];
  
  function generateTeamItems() {
    const gameTeamList = document.getElementById('gameTeamList');
    const fragment = document.createDocumentFragment();

    GameDevTeamMembers.sort((a, b) => a.name.localeCompare(b.name));
  
    // Loop through team members array
    GameDevTeamMembers.forEach(member => {
      // Create elements for each team member
      const colDiv = document.createElement('div');
      colDiv.classList.add('col-lg-3', 'col-sm-6');
      colDiv.setAttribute('data-aos', 'fade-up');
      colDiv.innerHTML = `
        <div class="team-item">
          <div class="team-image">
            <img src="${member.imageUrl}" alt="${member.name}">
          </div>
          <div class="team-details">
            <div class="team-mem">
              <h3>${member.name}</h3>
            </div>
            <span>Game Developer</span><br />
            <span style="font-size: 18px; color: white">Game: ${member.game}</span>
            <div class="team-social">
              <div class="game-buy">
                <a href="${member.linkedInUrl}" class="fag-btn-outline">LinkedIn Profile</a>
              </div>
            </div>
          </div>
        </div>
      `;
      fragment.appendChild(colDiv);
    });
  
    // Append the fragment to the gameTeamList
    gameTeamList.appendChild(fragment);
  }
  
  // Call the function to generate team items
  generateTeamItems();