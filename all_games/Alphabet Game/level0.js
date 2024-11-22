const DraggableElements = document.querySelectorAll(".draggable");
const DropableElements  = document.querySelectorAll(".droppable");
const main              = document.getElementById("main");
let count = 1;
const audioRight=new Audio();
    audioRight.src="(1).wav";

const audioWrong=new Audio();
    audioWrong.src="wrongMusic.wav";

const winAudio=new Audio();
winAudio.src="Win.wav";

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

// For DraggableElements


DraggableElements.forEach(e =>{
    e.addEventListener('dragstart',dragstart);
    e.addEventListener('dragend',dragend);
})

function dragstart(event)
{
    event.dataTransfer.setData("text",event.target.id);
}

function dragend(event)
{
    // event.target.classList.add("image2");
    //    event.target.classList.add("hide");
    
}

// For DropableElements

DropableElements.forEach(e =>{

    e.addEventListener('dragenter',dragenter);
    e.addEventListener('dragleave',dragleave);
    e.addEventListener('drop',drop);
    e.addEventListener("dragover",dragover);

});

function dragenter(event)
{
    event.target.classList.add("change");
}

function dragleave(event)
{
    event.target.classList.remove("change");
}

function dragover(event)
{
    event.preventDefault();
}

function drop(event)
{
    event.preventDefault();
    event.target.classList.remove("change");
    const DraggableElementsData = event.dataTransfer.getData("text");
    const DropableElementsData = event.target.getAttribute("data-draggable-id");
    
    var DraggableImage = document.getElementById(DropableElementsData);
    console.log(DropableElementsData);

    if(DraggableElementsData===DropableElementsData)
    {

        event.target.classList.add("box");
        event.target.innerHTML="";
        images = event.target.insertAdjacentHTML("afterbegin", `<img id="drop${DropableElementsData}" src="${DraggableImage.src}">`);
        idOfDroppedImage="drop"+DropableElementsData
        dropImage=document.getElementById(idOfDroppedImage);
        dropImage.style.width=72+"px";
        dropImage.style.height=72+"px";
        audioRight.play();
        DraggableImage.style.opacity=0.2;
        document.getElementById(DraggableElementsData).draggable = false;
        count++;
    }
    else{
        audioWrong.play();
    }

    checking();
    
}

function checking()
{
    if(count==27)
    {
        ribbon = document.createElement("div");
        ribbon.classList.add('ribbon');
        ribbon.innerHTML = "Click here for next level!";
        ribbon.style.top = window.innerHeight/2 + "px";
        

        img     = document.createElement("img")
        img.src = "./assests/images/happyImage.jpg";
        img.classList.add("happyImage");
        main.style.opacity = "0.2"

        
        body.appendChild(ribbon);
        ribbon.appendChild(img);

        winAudio.play();

        body.onclick = function(){level2()};
    }
}

function level2()
{
    window.location.href = "alphabetDnD.html";
}
