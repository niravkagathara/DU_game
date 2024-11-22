const WebsiteDevTeamMembers = [
    {
      name: "Harshil Savjadiya",
      imageUrl: "Skyline web/assests/Images/Image(H).jpg",
      game: "S.P.S & Snake Game",
      linkedInUrl: "https://www.linkedin.com/in/harshil-savajadiya-668039223/"
    },
    {
      name: "Maulik Bhatt",
      imageUrl: "Skyline web/assests/Images/Image(M).jpg",
      game: "Car Chase",
      linkedInUrl: "https://www.linkedin.com/in/maulikbhatt07/"
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
    }
  ];
  
  function generateTeamItems() {
    const webTeamList = document.getElementById('webTeamList');
    const fragment = document.createDocumentFragment();
  
    // Loop through team members array
    WebsiteDevTeamMembers.forEach(member => {
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
            <span>Web Developer</span><br />
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
  
    // Append the fragment to the teamListDiv
    webTeamList.appendChild(fragment);
  }
  
  // Call the function to generate team items
  generateTeamItems();