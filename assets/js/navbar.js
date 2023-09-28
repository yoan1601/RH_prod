const annonceur= document.getElementById('annonceur');
const annonces= document.querySelector('.annonce');
let isAnnonce = false;

annonceur.addEventListener('click', () => {
	if (!isAnnonce) {
		annonces.style.opacity = 1;
		isAnnonce = true;
	} else {
		annonces.style.opacity = 0;
		isAnnonce = false;
	}
});

const recruteur= document.getElementById('recruteur');
const recrutements = document.querySelector('.recrutement');
let isRecrutement = false;

recruteur.addEventListener('click', () => {
	if (!isRecrutement) {
		recrutements.style.opacity = 1;
		isRecrutement = true;
	} else {
		recrutements.style.opacity = 0;
		isRecrutement = false;
	}
});

const serveur= document.getElementById('serveur');
const services = document.querySelector('.service');
let isService = false;

serveur.addEventListener('click', () => {
	if (!isService) {
		services.style.opacity = 1;
		isService = true;
	} else {
		services.style.opacity = 0;
		isService = false;
	}
});
