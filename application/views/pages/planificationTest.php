<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>

<div class="test_plan">
	<center>
	<div class="main-plan">
		<form action="<?= site_url('test/setTestInSession') ?>" method="post">
		<input type="hidden" name="idRecrutement" value="<?= $idRecrutement ?>">
        <input type="hidden" name="idService" value="<?= $service->id_service ?>">
		<p class="fin">nun</p>
		<p><h3>Planification de test</h3></p>
		<p>Service:<label for=""><?= $service->nom_service ?></label></p>
		<p class="sentence">Date et heure de test</p>
			<!-- <p><input type="datetime-local" name="" id=""></p> -->
			<p><input type="date" name="date_test" id="" required></p>
			<p><input type="time" name="heure_test" id="" required></p>
		<p class="sentence">Lieu du test</p>
			<p><input type="text" name="lieu_test" id="" required></p>
			
		<p><center><button type="submit">Etablir le questionnaire</button></center></p>
		<p class="fin">nun</p>
		</form>
	</div>
	</center>
</div>
