/*document.addEventListener('DOMContentLoaded',function () {
	const annonceur= document.getElementById('annonceur');
	const annonces= document.querySelector('.annonce');
	annonceur.addEventListener('click', function(e){
		e.preventDefault();
		annonces.classList.toggle('active');
	});
});*/
const annonceur= document.getElementById('annonceur');
const annonces = document.querySelector('.annonce');
annonceur.addEventListener('click', () => {
	annonces.classList.toggle('active');
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

const cveur= document.getElementById('cveur');
const liste = document.querySelector('.listeCv');
cveur.addEventListener('click', () => {
	liste.classList.toggle('active');
});

const demande1= document.getElementById('popupDemande');
const popup = document.querySelector('.popupModule');
demande1.addEventListener('click', () => {
	popup.classList.toggle('active');
});

const quitbutton = document.querySelector('.quit');

quitbutton.addEventListener('click', () => {
	popup.classList.remove('active');
});
const entreteneur= document.getElementById('entreteneur');
const entretiens = document.querySelector('.entretien');
entreteneur.addEventListener('click', () => {
	entretiens.classList.toggle('active');
});
