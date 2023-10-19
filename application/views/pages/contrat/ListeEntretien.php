<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
	  	<div class="card list">
			<div class="card-body">
				<p></p>
				<p></p>
				<p class="fin">nun</p>
				<p><h3 class="card-title">Liste des entretiens en Finance</h3></p>
              <div class="list-group">
				<table>
					<tr class="title_text">
						<td>Date et heure d'entretien</td>
						<td>Mission recrutement</td>
						<td class="listeAdmis">Action</td>
					</tr>
					<?php foreach($entretiens as $e){ ?>
					<tr>
						<td><?= $e->dateheure_entretien ?></td>
                        <td><?= $e->mission ?></td>
						<td class="listeAdmis"><a href="<?= site_url("entretien/detailEntretien/".$e->id_entretien) ?>"><button>Detail</button></a><a href="<?= site_url("contrat/choixEmbauche/".$e->id_entretien) ?>"><button class="embauche">Choix d'embauche</button></a></td>
					</tr>
					<?php } ?>
				</table>
              </div>
            </div>
        </div>

</body>
</html>
