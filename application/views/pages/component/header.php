<nav class="navbar">
        <video id="background-video" class="brand-title" autoplay loop muted >
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
