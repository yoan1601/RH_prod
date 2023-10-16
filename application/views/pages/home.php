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
              <p class="title-avant">. Voir les Annonce</p>
              <p class="content-ph">
							  Voyez les annonces que vous avez faites ici, des plus anciens au plus recent.
							</p>
              <p>
                <a href="<?= site_url("recrutement/listeAnnonceAll") ?>"><button>Voir plus</button></a>
              </p>
            </div>

            <div class="skills-content">
              <p>
                <div class="photo-container entretien"></div>
              </p>
              <p class="title-avant">. Selection d'entretients</p>
              <p class="content-ph">
                Selectionner les tests faites pour faire des entretiens chacun a leur services.
              </p>
              <p>
                <a href="<?= site_url("entretien/listTests/".$idDept) ?>"><button>Voir plus</button></a>
              </p>
            </div>
						<!--<div class="skills-content photo-home">
						</div>-->

            <div class="skills-content">
              <p>
                <div class="photo-container entretien"></div>
              </p>
              <p class="title-avant">. Futurs employes</p>
              <p class="content-ph">
                Contracter avec les employes selectionnes par le jury d'entretien.
              </p>
              <form action="<?= site_url("contrat/listeFuturEmployes_eriq") ?>" method="get">
              <p><select name="service" id="">
                <?php foreach($services as $service){ ?>
                <option value="<?= $service->id_service ?>"><?= $service->nom_service ?></option>
                <?php } ?>
              </select></p>
              <p>
                <button type="submit">Voir plus</button></a>
              </p>
              </form>
            </div>
        </div>
        </center>

		<div><h1><a class="linker" href="<?= site_url('front/linker') ?>">Ivii</a></h1></div>
</body>
</html>
