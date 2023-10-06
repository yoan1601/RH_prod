<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>

<div class="main-resume">
	<div class="description-entretien">
	<p class="fin">nun</p>
		<p><center><h3>Resume d'entretien</h3></center></p>
		<p>Date et heure de l'entretien: <?= $dateHeure ?></p>
		<p>Lieu de l'entretien: <?= $lieu ?> </p>
		<p>Duree de l'enrtetien pour une personne: <?= $duree ?> minutes </p>
		<p>Nombre de candidats: <?= $nbCandidats ?>  </p>
	</div>
	<div class="table-container">
	<table>
		<tr class="title_text">
			<td>Candidats</td>
			<td>Heure d'entretien</td>
		</tr>
		<?php foreach($candidats as $c){ ?>
		<tr>
			<td><?= $c->nom_info ?></td>
			<td><?= $c->heure ?></td>
		</tr>
		<?php } ?>
	</table>
	<p class="fin">nun</p>
	</div>
</div>
<button class="absolutive-btnR">Exporter PDF</button>
