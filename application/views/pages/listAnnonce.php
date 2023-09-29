<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
	  	<div class="card">
			<div class="card-body">
				<p></p>
				<p></p>
				<p><h3 class="card-title">Liste des annonces</h3></p>
              <div class="list-group">
				<table>
					<tr class="title_text">
						<td>Debut d'annonce</td>
						<td>Services</td>
						<td>Date</td>
						<td>Action</td>
					</tr>
					<?php foreach($recrutements as $r){ ?>
					<tr>
						<td ><?= $r->besoins[0]->homme_jour." homme/jour ;".$r->criteres[0]->descri_critere." : ".$r->criteres[0]->choix[0]->choix_critere.". . ." ?></td>
						<td><?= $r->service->nom_service ?></td>
						<td><?= $r->dateheure_recrutement ?></td>
						<td><a href='<?= site_url('recrutement/genererAnnonceFromListe?idRecrutement='.$r->id_recrutement) ?>'><button>Publier</button></a></td>
					</tr>
					<?php } ?>
				</table>
              </div>
            </div>
        </div>

</body>
</html>
