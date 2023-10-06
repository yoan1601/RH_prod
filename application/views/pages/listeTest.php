<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
	  	<div class="card list">
			<div class="card-body">
				<p></p>
				<p></p>
				<p class="fin">nun</p>
				<p><h3 class="card-title">Tests pour <?= $departement->nom_dept ?></h3></p>
              <div class="list-group">
				<table>
					<tr class="title_text">
						<td>ID</td>
						<td>Service</td>
						<td>Date et heure</td>
						<td>Lieu</td>
						<td class="listeAdmis">Action</td>
					</tr>
					<?php foreach($tests as $test){ ?>
					<tr>
						<td><?= $test->id_test ?></td>
						<td><?= $test->nom_service ?></td>
						<td><?= $test->dateheure_test ?></td>
						<td><?= $test->lieu_test ?></td>
						<td class="listeAdmis"><a href="<?= site_url("entretien/listPersonnesTest/".$test->id_test) ?>"><button>Liste des admis</button></td></a>
					</tr>
					<?php } ?>
				</table>
              </div>
            </div>
        </div>

</body>
</html>
