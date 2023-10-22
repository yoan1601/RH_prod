<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
	  	<div class="card list">
			<div class="card-body">
				<p></p>
				<p></p>
				<p class="fin">nun</p>
				<p><h3 class="card-title">Demandes de conge en attente</h3></p>
              <div class="list-group">
				<table>
					<tr class="title_text">
						<td>Numero Matricule</td>
						<td>Nom prenom</td>
						<td class="listeAdmis">Actions</td>
					</tr>
					<?php foreach($demandes as $d){ ?>
					<tr>
                        <td><?= $d->matricule_employe ?></td>
                        <td><?= $d->nom_info." ".$d->prenom_info ?></td>
						<td class="listeAdmis"><a href="<?= site_url("conge/detailDemandeConge/".$d->id_demande_conge) ?>"><button class="embauche">Detail</button></a></td>
					</tr>
					<?php } ?>
				</table>
              </div>
            </div>
        </div>

</body>
</html>
