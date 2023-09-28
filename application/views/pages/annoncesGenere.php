<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('assets\css\navbar.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets\css\creation.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets\css\listeAnnonce.css') ?>">
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
		  <li><a href="<?= site_url('front/home')?>">Accueil</a></li>
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

</body>
</html>
