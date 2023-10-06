<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>

<div class="test_plan">
	<center>
	<div class="main-plan">
		<form action="<?= site_url("entretien/saveEntretien") ?>" method="post">
		<p class="fin">nun</p>
		<p><h3>Planification d'entretien</h3></p>
		<p>Service:<label for=""><?= $service->nom_service ?></label></p>
		<p class="sentence">Date et heure de debut de l'entretien</p>
			<p><input type="datetime-local" name="dateheure" id=""></p>
		<p class="sentence">Lieu du test</p>
			<p><input type="text" name="lieu" id=""></p>
		<p class="sentence">Durre de l'entretien pour un candidat</p>
			<p><input type="number" min="1" name="duree" id=""></p>
			<p>Nombre de candidats:<label for=""><?= $nbAdmis ?></label></p>
		<input type="hidden" name="idtest" value="<?= $idTest ?>">
		<input type="hidden" name="idrecrutement" value="<?= $idrecrutement ?>">
		<p><center><button>Planifier l'entretien</button></center></p>
		<p class="fin">nun</p>
		</form>
	</div>
	</center>
</div>
