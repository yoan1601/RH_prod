<?php
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>

<div class="cv-container">
	<p class="trans">...</p>
	<p class="h2"><h4>Detail du CV</h4></p>
		<p>Nom : <?= $detailCv[0]->nom_info ?></p>
		<p>Prenom : <?= $detailCv[0]->prenom_info ?></p>
		<p>Sexe : <?= $detailCv[0]->sexe_info ?></p>
		<p>Adresse : <?= $detailCv[0]->addresse_info ?></p>
		<p>Contact : <?= $detailCv[0]->contact_info ?></p>
		<p>Date de naissance : <?= $detailCv[0]->date_naissance_info ?></p>
		<h3><p>Criteres de selection</p></h3>
		<?php foreach ($detailCv as $key => $critereChoix) { ?>
		<p><?= $critereChoix->critere ?> : <?= $critereChoix->choix ?></p>
		<?php } ?>
	<p class="trans">...</p>
</div>
