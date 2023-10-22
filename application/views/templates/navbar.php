<nav class="navbar">
        <video id="background-video" class="brand-title" autoplay loop muted >
            <source src="<?= base_url('assets/video/DS (1).mp4') ?>" type="video/mp4">
        </video>
        <a href="#" class="toggle-button">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </a>
        <div class="navbar-links">
          <ul>
            <li><a class="active" href="<?= site_url('recrutement/index'); ?>">Accueil</a></li>
            <li id="serveur">Services
				<div class="Layout service">
						<!--<p>Listes des Services</p>
						<hr>-->
						<p><a href="<?= site_url('service/creerService')?>">Creer</a></p>
				</div>
			</li>
			<li><a href="<?= site_url('fichePaie'); ?>">Fiche paie</a>
			<li><a href="<?= site_url('fichePaie/listeFichePaie'); ?>">Etat paie</a>
			</li>
			<li id="cveur">Liste CV	  
				<div class="Layout listeCv">
					<?php foreach ($services as $key => $service) { ?>
						<p ><a href="<?= site_url('test/listeCv/'.$service->id_service) ?>"><?= $service->nom_service ?></a></p>
						<hr>
					<?php } ?>
				</div>
			</li>
            <li id="annonceur">Annonces	  
				<div class="Layout annonce">
					<?php foreach ($services as $key => $service) { ?>
						<p ><a href="<?= site_url('recrutement/listeAnnonce/'.$service->id_service) ?>"><?= $service->nom_service ?></a></p>
						<hr>
					<?php } ?>
				</div>
			</li>
            <li id="recruteur" >Recruter
			<div class="Layout recrutement">
						<?php foreach ($services as $key => $service) { ?>
						<p ><a href="<?= site_url('recrutement/hommeJour/'.$service->id_service)?>"><?= $service->nom_service ?></a></p>
						<hr>
					<?php } ?>
				</div>
			</li>
			<li id="entreteneur" >Entretiens
			<div class="Layout entretien">
						<?php foreach ($services as $key => $service) { ?>
						<p ><a href="<?= site_url('entretien/listeEntretien/'.$service->id_service)?>"><?= $service->nom_service ?></a></p>
						<hr>
					<?php } ?>
				</div>
			</li>
            <li><a href="<?= site_url('deconnection') ?>"><button>Deconnection</button></a></li>
          </ul>
        </div>
      </nav> 
