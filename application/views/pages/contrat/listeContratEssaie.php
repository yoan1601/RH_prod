<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
	  	<div class="card list">
			<div class="card-body">
				<p></p>
				<p></p>
				<p class="fin">nun</p>
				<p><h3 class="card-title">Liste des contrats d'essaie</h3></p>
              <div class="list-group">
				<table>
					<tr class="title_text">
						<td>Numero Matricule</td>
						<td>Nom prenom</td>
                        <td>Fin du contrat</td>
                        <td>Jours restants</td>
						<td class="listeAdmis">Actions</td>
					</tr>
					<?php foreach($contrats as $c){ ?>
					<tr>
                        <td><?= $c->matricule_employe ?></td>
                        <td><?= $c->nom_info." ".$c->prenom_info ?></td>
						<td><?= $c->fin_contrat_essai ?></td>
                        <td><?= $c->jours_restant ?> jours</td>
						<td class="listeAdmis"><a href="<?= site_url("contrat/detailContratEssai/".$c->id_contrat_essai) ?>"><button>Detail</button></a><a href="<?= site_url("chgtContrat/choixContrat/".$c->id_contrat_essai) ?>"><button class="embauche">changement de contrat</button></a></td>
					</tr>
					<?php } ?>
				</table>
              </div>
            </div>
        </div>

</body>
</html>
