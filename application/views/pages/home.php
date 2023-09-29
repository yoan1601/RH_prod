<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>

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
