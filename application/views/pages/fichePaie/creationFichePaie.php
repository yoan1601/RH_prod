<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
        <center><h2>Creer ou mettre a jour un fiche de poste</h2></center>
	  	<div class="card list">
			<div class="card-body">
				<p></p>
				<p></p>
				<p class="fin">nun</p>
				<p><h3 class="card-title">Date actuelle : <?= $dateActuelle ?></h3></p>
              <div class="list-group">
				<table>
					<tr class="title_text">
						<td>Numero Matricule</td>
						<td>Nom prenom</td>
						<td class="listeAdmis">Actions</td>
					</tr>
					<?php foreach ($listeEmp as $key => $emp) { ?>
					<tr>
                        <td>EMP0067</td>
                        <td>Rakoto Doe</td>
						<td class="listeAdmis"><a href="<?= site_url('fichePaie/creationMajFichePaie/'.$emp->id_employe) ?>"><button class="embauche">creer/maj fiche de paie</button></a></td>
					</tr>
					<?php } ?>
				</table>
              </div>
            </div>
        </div>

</body>
</html>
