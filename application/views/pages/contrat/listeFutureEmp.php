<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
?>
<center>
	<h2>Liste des futures employees</h2>
</center>
<div class="card list">
	<div class="card-body">
		<p></p>
		<p></p>
		<p class="fin">nun</p>
		<p>
		<h3 class="card-title"><?= $entretien_recrutement_service->nom_service ?> <?= $entretien_recrutement_service->mission ?></h3>
		</p>
		<div class="list-group">
			<table>
				<tr class="title_text">
					<td>Non et prenom employe</td>
					<td class="listeAdmis">Action</td>
				</tr>
				<?php foreach ($futurEmployes as $key => $emp) { ?>
					<tr>
						<td><?= $emp->nom_info  ?> <?= $emp->prenom_info ?></td>
						<td class="listeAdmis"><a href="<?= site_url('contrat/contracter/'.$emp->id_information_user.'/'.$entretien_recrutement_service->id_recrutement) ?>"><button class="embauche">Choix d'embauche</button></a></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>

</body>

</html>