<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('assets\css\navbar.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets\css\home.css') ?>">
	<script src="<?=base_url('assets/js/navbar.js') ?>" defer></script>
	<title>Document</title>
</head>
<body>
<nav class="navbar">
        <video id="background-video" class="brand-title" autoplay loop muted poster="e.png">
            <source src="<?= base_url('assets/video/DS.mp4') ?>" type="video/mp4">
        </video>
        <a href="#" class="toggle-button">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </a>
        <div class="navbar-links">
          <ul>
            <li><a class="active" href="#">Accueil</a></li>
            <li id="serveur">Services
				<div class="Layout service">
						<p>Listes des Services</p>
						<hr>
						<p><a href="<?= site_url('front/creation')?>">Creer</a></p>
				</div>
			</li>
            <li id="annonceur">Annonces	  
				<div class="Layout annonce">
						<p >Finance</p>
						<hr>
						<p >Plantation</p>
						<hr>
						<p >Fabrique</p>
						<hr>
						<p >Emballage</p>
						<hr>
						<p >Generer Annonce</p>
				</div>
			</li>
            <li id="recruteur" >Recruter
			<div class="Layout recrutement">
						<p ><a href="<?= site_url('front/besoin')?>">Finance</a></p>
						<hr>
						<p >Plantation</p>
						<hr>
						<p >Fabrique</p>
						<hr>
						<p >Emballage</p>
				</div>
			</li>
            <li><button>Deconnection</button></li>
          </ul>
        </div>
      </nav>

	  <center>
        <div class="skill-container">
            <div class="skills-content">
                <p>
                  <div class="photo-container annonceImg"></div>
                </p>
              <p class="title">. Publier Annonce</p>
              <p class="content-ph">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem fugit nostrum tempore saepe laborum aspernatur explicabo? Iste asperiores.
              </p>
			  <p>
				<a href="<?= site_url('front/listAnnonce') ?>"><button>Voir plus</button></a>
			  </p>
            </div>
            <div class="skills-content">
              <p>
                <div class="photo-container CV"></div>
              </p>
            <p class="title">. Selection de CV</p>
            <p class="content-ph">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente aspernatur quas quasi, assumenda
				, vero fuga saepe dolor totam 
            </p>
			<p>
				<a href=""><button>Voir plus</button></a>
			</p>
            </div>
            <div class="skills-content">
              <p>
                <div class="photo-container entretien"></div>
              </p>
            <p class="title">. Selection d'entretients</p>
            <p class="content-ph">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, cum consectetur? Impedit nemo necessitatibus temporibus! Eligendi hic.
            </p>
			<p>
				<a href=""><button>Voir plus</button></a>
			</p>
            </div>
        </div>
        </center>

		<div><h1><a href="<?= site_url('front/generation') ?>">Ivii</a></h1></div>
</body>
</html>
