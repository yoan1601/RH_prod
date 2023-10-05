<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
?>
<div class="card">
	<div class="card-body">
		<p></p>
		<p></p>
		<p>
		<h3 class="card-title">Liste des CV</h3>
		</p>
		<form class="w-100" action="<?= site_url('test/insertCvSelection') ?>" method="post">
			<input type="hidden" name="idService" value="<?= $idService ?>">
			<div class="list-group">
				<table>
					<tr class="title_text">
						<td>Action</td>
						<td>Postulant</td>
						<td>Date de reception</td>
						<td>Duree</td>
						<td>Note</td>
					</tr>
					<?php if ($liste_cv !== false) { ?>

						<?php foreach ($liste_cv as $cv) { ?>
							<tr>
								<td><input type="checkbox" name="cv[]" value="<?= $cv->id_cv ?>"> <input type="hidden" name="idRecrutement" value="<?= $cv->id_recrutement ?>"></td>
								<td><?= $cv->nom ?> <?= $cv->prenom ?></td>
								<td><?= $cv->reception ?></td>
								<td><?= $cv->duree ?></td>
								<td><?= $cv->note ?></td>
							</tr>
						<?php } ?>


					<?php } else {
						echo 'donnée vide';
					} ?>
				</table>
			</div>

	</div>
	<?php if ($liste_cv !== false) { ?>
		<button type="submit">Selectionner et planifier le test</button>
	<?php } ?>
	</form>
</div>

</body>

</html>