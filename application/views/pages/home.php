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
              <p class="title">. Voir les Annonce</p>
              <p class="content-ph">
							Voyez les annonces que vous avez faites ici, des plus anciens au plus recent.
							</p>
			  <p>
				<a href="#"><button>Voir plus</button></a>
			  </p>
            </div>
						<div class="skills-content photo-home">

						</div>

            <div class="skills-content">
              <p>
                <div class="photo-container entretien"></div>
              </p>
            <p class="title">. Selection d'entretients</p>
            <p class="content-ph">
						Selectionner les tests faites pour faire des entretiens chacun a leur services.
					  </p>
						<p>
						<a href=""><button>Voir plus</button></a>
						</p>
            </div>
        </div>
        </center>

		<div><h1><a href="<?= site_url('front/linker') ?>">Ivii</a></h1></div>
</body>
</html>
