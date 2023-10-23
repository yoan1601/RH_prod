<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
?>
<form action="<?= site_url('fichePaie/saveFiche') ?>" method="post">
<div class="fiche-paie-container" id="printable">
   <center>
      <h2>Fiche de paie</h2>
   </center>
   <center>
      <h2>Arrete au <?= $data['dateActuelle'] ?></h2>
   </center>

   <div class="entete-paie">
      <div class="first-entete">
         <p>Nom et prenoms : <?= $data['employe']->nom_info ?> <?= $data['employe']->prenom_info ?></p>
         <p>Matricule : <?= $data['employe']->matricule_employe ?></p>
         <p>Fonction : <?= $data['employe']->nom_poste ?></p>
         <!-- <p>N CNaPS : 05268445687231</p> -->
         <p>Date d'embauche : <?= $data['employe']->dateheure_recrutement ?></p>
         <p>Anciennete : <?= $data['anciennete'] ?></p>
      </div>
      <div class="second-entete">
         <p>Classification : <?= $data['employe']->nom_categorie ?></p>
         <p>Salaire de base : <?= number_format($data['salaire_base'], $data['nbChiffreApresVirugle'], '.', ' ') ?> Ar</p>
         <p>Taux journaliere : <?= number_format($data['taux_journalier'], $data['nbChiffreApresVirugle'], '.', ' '); ?> Ar</p>
         <p>Taux horaires : <?= number_format($data['taux_horaire'], $data['nbChiffreApresVirugle'], '.', ' '); ?> Ar</p>
         <p>Indice : <?= number_format($data['indice'], $data['nbChiffreApresVirugle'], '.', ' '); ?> Ar</p>
      </div>
   </div>

   <div class="container-exel">
      <table border=1>
         <tr>
            <center>
               <td>Designations</td>
               <td>Nombre</td>
               <td>Taux</td>
               <td>Montant</td>
            </center>
         </tr>
         <tr>
            <td>Salaire du <?= $data['datePremierDuMois'] ?> au <?= $data['dateActuelle'] ?></td>
            <td><?= $data['nombreDeJours'] ?> jours</td>
            <td><?= number_format($data['taux_journalier'], $data['nbChiffreApresVirugle'], '.', ' '); ?></td>
            <td><?= number_format($data['salaire_debutMois_now'], $data['nbChiffreApresVirugle'], '.', ' '); ?></td>
         </tr>
         <tr>
            <td>Absence deductibles</td>
            <td><?= $data['nombreAbsenceHeure'] ?> heures</td>
            <td><?= number_format($data['taux_horaire'], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
            <td><?= number_format($data['absence_deductible'], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
         </tr>
         <?php foreach ($data['allTypePrime'] as $key => $prime) { ?>
            <tr>
               <td>Prime <?= $prime->nom_type_prime ?></td>
               <td></td>
               <td></td>
               <td><?= number_format($data[$prime->nom_type_prime], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
            </tr>
         <?php } ?>
         <?php foreach ($data['allHsMajoration'] as $key => $HS) { ?>
            <tr>
               <td>Heure suplementaire <?= $HS->nom_majoration ?> %</td>
               <td><?= $data[$HS->nom_majoration] ?> heures</td>
               <td><?= number_format($data['tauxHS' . $HS->nom_majoration], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
               <td><?= number_format($data['montantHS' . $HS->nom_majoration], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
            </tr>
         <?php } ?>
         <tr>
            <td>Rappel sur periode anterieur</td>
            <td></td>
            <td></td>
            <td><?= number_format($data['rappelPeriodeAnterieure'], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
         </tr>
         <!--<tr>
            <td>Droits de conge</td>
            <td><?php //number_format($data["nbJourCongePaye"], 2)." jours"; ?></td>
            <td><?php //number_format($data['tauxDroitConge'], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
            <td><?php //number_format($data['montantDroitConge'], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
         </tr>-->
         <tr>
            <td>Droits de preavis</td>
            <td></td>
            <td></td>
            <td><?= number_format($data['droitPreavis'], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
         </tr>
         <tr>
            <td>Indemnites de licencement</td>
            <td></td>
            <td></td>
            <td><?= number_format($data['indemniteLicenciement'], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
         </tr>
         <td></td>
         <td></td>
         <td class="salaire">Salire brute</td>
         <td class="salaire"><?= number_format($data['salaire_brut'], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
   </div>
   </table>
   <p class="trans">n</p>
   <table border=1>
      <tr>
         <td>Retenue CNaPS 1%</td>
         <td></td>
         <td><?= number_format($data['cnaps1pourcent'], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
      </tr>
      <tr>
         <td>Retenue sanitaire</td>
         <td></td>
         <td><?= number_format($data['sanitaire'], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
      </tr>
      <?php foreach ($data['allTranche_IRSA'] as $key => $tranche) { ?>
         <?php if ($tranche->max_tranche > 0) { ?>
            <tr>
               <td>Tranche IRSA de <?= $tranche->min_tranche ?> a <?= $tranche->max_tranche ?> </td>
               <td><?= $tranche->pourcentage_irsa ?> %</td>
               <td><?= number_format($data['IRSA'.$tranche->pourcentage_irsa], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
            </tr>
         <?php } else { ?>
            <tr>
               <td>Tranche IRSA SUP <?= $tranche->min_tranche ?></td>
               <td><?= $tranche->pourcentage_irsa ?> %</td>
               <td><?= number_format($data['IRSA'.$tranche->pourcentage_irsa], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
            </tr>
         <?php } ?>
      <?php } ?>
      <tr>
         <td>
            <h3>TOTAL IRSA</h3>
         </td>
         <td></td>
         <td><?= number_format($data['totalIRSA'], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
      </tr>
      <tr>
         <td></td>
         <td></td>
         <td></td>
      </tr>
      <tr>
         <td></td>
         <td>
            <h3>Total des retenues</h3>
         </td>
         <td>
            <h3><?= number_format($data['total_retenue'], $data['nbChiffreApresVirugle'], '.', ' ') ?></h3>
         </td>
      </tr>
      <tr>
         <td></td>
         <td>Avance</td>
         <td> - <?= number_format($data['avance'], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
      </tr>
      <tr>
         <td></td>
         <td></td>
         <td></td>
      </tr>
      <tr>
         <td></td>
         <td>
            <h3>Net a payer</h3>
         </td>
         <td class="salaire"><?= number_format($data['net_a_payer'], $data['nbChiffreApresVirugle'], '.', ' ') ?></td>
      </tr>
   </table>
</div>

<div class="final">
   <p>Avantage en nature : </p>
   <p>Deduction IRSA : </p>
   <p>Montant possible : <?= number_format($data['montant_imposable'], $data['nbChiffreApresVirugle'], '.', ' ') ?></p>
</div>

<p class="trans">n</p>

<div class="entete-paie">
   <center>
      <div>
         <p>Mode de payement : Virement</p>
         <p>Employeur</p>
      </div>
   </center>
   <div>
      <center>
         <p class="trans">n</p>
         <p>Employe(e)</p>
      </center>
   </div>
</div>

</div>

<p class="trans">
   ns
</p>
<p>
   <center><button class="embaucher" id="imprime">Exporter PDF</button></center>
</p>
<p>
   <center><button type="submit" class="embaucher">Enregistrer</button></center>
</p>
</form>
</body>
<script>
	// Fonction pour déclencher l'impression de la partie spécifique
	function imprimerPartie() {
		window.print();
	}

	// Écouteur d'événement pour le bouton
	var boutonImprimer = document.getElementById('imprime');
	boutonImprimer.addEventListener('click', imprimerPartie);
</script>
</html>