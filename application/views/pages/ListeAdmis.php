<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>

<div class="main-list">
<p><center><h3 class="card-title">Liste des admis</h3></center></p>
<form action="<?= site_url("entretien/planEntretien") ?>" method="POST">
<div class="card">
			<div class="card-body">
				<p class="fin">nun</p>
				<p><h3 class="card-title"><?= $service->nom_service ?></h3></p>
              <div class="list-group">
				<table>
					<tr class="title_text">
						<td></td>
						<td>Postulant</td>
						<td>Note</td>
					</tr>
					<?php foreach($personnes as $person){ ?>
					<tr>
						<td><input type="checkbox" name="CVselected[]" value="<?= $person->id_info_user ?>"></td>
						<td><?= $person->nom_info." ".$person->prenom_info ?></td>
						<td><?= $person->note ?></td>
					</tr>
					<?php } ?>
				</table>
              </div>
            </div>
        </div>
</div>
<input type="hidden" name="idservice" value="<?= $service->id_service ?>">
<input type="hidden" name="idrecrutement" value="<?= $test->id_recrutement_test ?>">
<input type="hidden" name="idtest" value="<?= $test->id_test ?>">
<button type="submit" class="absolutive-btnL">Selectionner</button>
</form>
</body>
</html>

