<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
	  	<div class="card list">
			<div class="card-body">
				<p></p>
				<p></p>
				<p class="fin">nun</p>
				<p><h3 class="card-title">Liste des employes du service: <?= $service->nom_service ?></h3></p>
              <div class="list-group">
				<table>
					<tr class="title_text">
						<td>Numero Matricule</td>
						<td>Nom prenom</td>
                        <td>Poste</td>
						<td class="listeAdmis">Actions</td>
					</tr>
					<?php foreach($employes as $e){ ?>
					<tr>
                        <td><?= $e->matricule_employe ?></td>
                        <td><?= $e->nom_info." ".$e->prenom_info ?></td>
						<td><?= $e->nom_poste ?></td>
						<td class="listeAdmis"><a href="<?= site_url("conge/afficheFichePosteForEmploye/".$e->id_contrat_travail) ?>"><button>Fiche de poste</button></a><button class="embauche">demande conge</button></td>
					</tr>
					<?php } ?>
				</table>
              </div>
            </div>
        </div>

</body>
</html>
