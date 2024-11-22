const draggableElements = document.querySelectorAll(".draggables");
const droppableElements = document.querySelectorAll(".droppable");
const main = document.getElementById("main");
const body = document.getElementById("body");
let count = 1;

const audioRight=new Audio();
    audioRight.src="(1).wav";

const audioWrong=new Audio();
    audioWrong.src="wrongMusic.wav";

const winAudio=new Audio();
winAudio.src="Win.wav";

// For able to drag draggable elements

draggableElements.forEach(e=>{
    e.addEventListener('dragstart',dragstart);
    e.addEventListener('dragend',dragstart);
})


function dragstart(event)
{
    // console.log("drag started");
    event.dataTransfer.setData("text",event.target.id);
}

function dragend()
{
    // console.log("drag ended");
}

// For Dropable Elements

droppableElements.forEach(e=>{
    e.addEventListener('dragenter',dragenter);
    e.addEventListener('dragleave',dragleave);
    e.addEventListener('drop',drop);
    e.addEventListener('dragover',dragover);
})

function dragenter(event)
{
    // console.log(event);
    event.target.classList.add("change");
}

function dragleave(event)
{
    // console.log(event);
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
        dropImage.classList.add("image");
        dropImage.style.marginTop = -15 + "px";
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
    if(count==10)
    {
        ribbon = document.createElement("div");
        ribbon.classList.add('ribbon');
        ribbon.innerHTML = "Well Done!! <br>"+ "Click here to replay";
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