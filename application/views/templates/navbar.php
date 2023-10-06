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
						<p>Listes des Services</p>
						<hr>
						<p><a href="<?= site_url('front/creation')?>">Creer</a></p>
				</div>
			</li>
			<li id="annonceur">	  
				<select name="" id="">
					<option value="">Tests</option>
				<?php foreach ($services as $key => $service) { ?>
						<option value=""><a href="<?= site_url('test/listeCv/'.$service->id_service) ?>"><?= $service->nom_service ?></a></option>
					<?php } ?>
				</select>
			</li>
            <li id="annonceur">				
				<select name="" id="">
					<option value="">Annonce</option>
				<?php foreach ($services as $key => $service) { ?>
						<option value=""><a href="<?= site_url('test/listeCv/'.$service->id_service) ?>"><?= $service->nom_service ?></a></option>
					<?php } ?>
				</select>
			</li>
            <li id="recruteur" >				
				<select name="" id="">
					<option value="">Recruter</option>
				<?php foreach ($services as $key => $service) { ?>
						<option value=""><a href="<?= site_url('test/listeCv/'.$service->id_service) ?>"><?= $service->nom_service ?></a></option>
					<?php } ?>
				</select>
			</li>
            <li><a href="<?= site_url('deconnection') ?>"><button>Deconnection</button></a></li>
          </ul>
        </div>
      </nav> 
