let body = document.getElementById("body");
let bodyDetails = body.getBoundingClientRect();
// console.log(bodyDetails.width);
let toggleBtn = document.querySelector(".toggle-btn");
let navbarNav = document.getElementById("navbarNav");
let navbarNav2=document.getElementById("navbar-nav")
toggleBtn.setAttribute("onclick","Navbar()");

function Navbar() {
	navbarNav.style.marginTop=30+"px";
	navbarNav2.style.marginTop=30+"px";
	if(bodyDetails.width<480){
		navbarNav.style.marginRight=-350+"px";
		navbarNav.style.marginRight=-350+"px";
	}
	else if(bodyDetails.width<580){
		navbarNav.style.marginRight=-500+"px";
		navbarNav.style.marginRight=-500+"px";
	}
	else if(bodyDetails.width<770){
		navbarNav.style.marginRight=-270+"px";
		navbarNav.style.marginRight=-270+"px";
	}
	
	else{
		navbarNav.style.marginRight=-350+"px";
		navbarNav.style.marginRight=-350+"px";
	}
	navbarNav.style.display="flex";
	navbarNav2.style.display="flex";
	navbarNav.style.flexDirection="column";
	navbarNav2.style.flexDirection="column";
	navbarNav.style.justifyContent="space-between";
	navbarNav2.style.justifyContent="space-between";
	navbarNav.style.alignItems="right";
	navbarNav2.style.alignItems="right";
	navbarNav.style.visibility="visible";

}







