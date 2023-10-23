<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
        
        <center><h2>Etat de paie</h2></center>
	  	<div class="list">
			<div class="card">
				<p></p>
				<p></p>
				<p class="fin">nun</p>
				<p><h3 class="card-title">Devise : ariary</h3></p>
              <div class="teny">
				<table class="etat" >
					<tr class="title_tex">
                    <td>Date</td>
                    <td>Matricule</td>
                    <td>Nom prenom</td>
                    <td>Date embauche</td>
                    <td>CAT</td>
                    <td>Fonction</td>
                    <td>Salaire de base</td>
                    <td>HSUP</td>
                    <td>Primes</td>
                    <td>Total retenues</td>
                     <td>Salaire net</td>
                     <td>Avance</td>
                     <td>Net a payer</td>
                    <td>Autres indemnites</td>
                    <td>Net du mois</td>
                     <!-- <td>Actions</td> -->
					</tr>
                    <?php foreach ($allFichePaie as $key => $fichePaie) { ?> 
                    <tr>
                        <td><?= $fichePaie->date_fiche_paie ?></td> 
                        <td><?= $fichePaie->matricule_employe ?></td> 
                        <td><?= $fichePaie->nom_info ?> <?= $fichePaie->prenom_info ?></td> 
                        <td><?= $fichePaie->date_contrat_essai ?></td> 
                        <td><?= $fichePaie->nom_categorie_travail ?></td>
                        <td><?= $fichePaie->nom_poste_essai ?></td> 
                        <?php if($fichePaie->id_contrat_travail != null) { ?>
                        <td><?= number_format($fichePaie->salaire_brut, $nbChiffreVirgule, '.', ' ') ?></td> 
                        <?php } else { ?>
                        <td><?= number_format($fichePaie->salaire_brut_essai, $nbChiffreVirgule, '.', ' ') ?></td> 
                        <?php } ?>
                        <td><?= number_format($dataFichePaie['somme'.$fichePaie->id_fiche_paie]->total_hs, $nbChiffreVirgule, '.', ' ') ?></td> 
                        <td><?= number_format($dataFichePaie['somme'.$fichePaie->id_fiche_paie]->total_prime, $nbChiffreVirgule, '.', ' ') ?></td> 
                        <td><?= number_format($dataFichePaie['somme'.$fichePaie->id_fiche_paie]->total_retenue, $nbChiffreVirgule, '.', ' ') ?></td> 
                        <td><?= number_format($dataFichePaie['salaire_net'.$fichePaie->id_fiche_paie], $nbChiffreVirgule, '.', ' ') ?></td> 
                        <td><?= number_format($dataFichePaie['somme'.$fichePaie->id_fiche_paie]->total_avance, $nbChiffreVirgule, '.', ' ') ?></td> 
                        <td><?= number_format($dataFichePaie['net_a_payer'.$fichePaie->id_fiche_paie], $nbChiffreVirgule, '.', ' ') ?></td> 
                        <td><?= number_format($dataFichePaie['somme'.$fichePaie->id_fiche_paie]->total_indemnite, $nbChiffreVirgule, '.', ' ') ?></td> 
                        <td><?= number_format($dataFichePaie['net_mois'.$fichePaie->id_fiche_paie], $nbChiffreVirgule, '.', ' ') ?></td> 
                        <!-- <td>
                            <center>
                                <button class="embauche">Detail</button>
                            </center>
                        </td> -->
                    </tr>
                    <?php } ?>
                    <tr>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td></td>
                        <th>Total</th> 
                        <td><?= number_format($somme["salaire_base"], $nbChiffreVirgule, '.', ' ') ?></td>
                        <td><?= number_format($somme["HSUP"], $nbChiffreVirgule, '.', ' ') ?></td> 
                        <td><?= number_format($somme["Primes"], $nbChiffreVirgule, '.', ' ') ?></td> 
                        <td><?= number_format($somme["Retenues"], $nbChiffreVirgule, '.', ' ') ?></td> 
                        <td><?= number_format($somme["net"], $nbChiffreVirgule, '.', ' ') ?></td> 
                        <td><?= number_format($somme["avance"], $nbChiffreVirgule, '.', ' ') ?></td> 
                        <td><?= number_format($somme["net_a_payer"], $nbChiffreVirgule, '.', ' ') ?></td> 
                        <td><?= number_format($somme["autres_indemnites"], $nbChiffreVirgule, '.', ' ') ?></td> 
                        <td><?= number_format($somme["net_mois"], $nbChiffreVirgule, '.', ' ') ?></td> 
                    </tr>
				</table>
              </div>
            </div>
        </div>

</body>
</html>
