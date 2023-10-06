document.addEventListener('DOMContentLoaded',function () {
	const annonceur= document.getElementById('annonceur');
	const annonces= document.querySelector('.annonce');
	annonceur.addEventListener('click', function(e){
		e.preventDefault();
		annonces.classList.toggle('active');
	});
});

const recruteur= document.getElementById('recruteur');
const recrutements = document.querySelector('.recrutement');
recruteur.addEventListener('click', () => {
	recrutements.classList.toggle('active');
});

const serveur= document.getElementById('serveur');
const services = document.querySelector('.service');

serveur.addEventListener('click', () => {
	services.classList.toggle('active');
});
