// overlay

'use strict'

const container = document.getElementById('container')

const moveOverlay = () => container.classList.toggle('move')

document.getElementById('open-login').addEventListener('click', moveOverlay)
document.getElementById('open-register').addEventListener('click', moveOverlay)

// registered message

document.addEventListener("DOMContentLoaded", () => {
	const successMessage = document.getElementById("success-message");

	if (successMessage.textContent.trim() !== "") {
		successMessage.classList.remove("hidden");
		successMessage.classList.add("visible");
	}
	
	setTimeout (() =>{
		successMessage.classList.remove("visible");
		successMessage.classList.add("hidden");
	}, 2000);
})
