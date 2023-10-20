<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
<form action="<?= site_url('chgtContrat/genererFichePoste') ?>" method="post">
    <p><center><h2>Fiche de poste</h2></center></p>
    <div class="container-contratResume">
    <div class="firstPart">
    <p><center><h3><?= $employe->matricule_employe ?></h3></center></p>
        <p><h4>Informations personnelles de l'employee</h4></p>
        <p>Nom : <?= $employe->nom_info ?></p>
        <p>Prenom : <?= $employe->prenom_info ?></p>
        <p>Genre : <?= $genre ?></p>
        <p>Contact : <?= $employe->contact_info ?></p>
        <p>Adresse : <?= $employe->addresse_info ?></p>
        <p><h4>Informations sur la fonction</h4></p>
        <p>Poste : <?= $recrutement->nom_poste ?></p>
        <p>Mission : <?= $recrutement->mission ?></p>
        <p>Categorie : <?= $recrutement->nom_categorie ?></p>
        <p>Date de changement du contrat :  <?= $dateContratTravail ?></p>
        <p>Affiliation CNAPS : <?= $cnaps_string ?></p>
        <p>Affiliation Organisme sanitaire : <?= $ostie_string ?></p>
    </div>
    <div class="secondPart">
        <p><h4>Listes des avantages</h4></p>
        <?php for($i=1;$i<=count($avantages);$i++) { ?>
            <p><?= $avantages[$i-1]["nom"] ?> : <?= $avantages[$i-1]["prix_string"]." ".$devise ?></p>
            <input type="hidden" name="nom_avantage<?= $i ?>" value="<?= $avantages[$i-1]["nom"] ?>">
            <input type="hidden" name="prix_avantage<?= $i ?>" value="<?= $avantages[$i-1]["prix"] ?>">
        <?php } ?>
        <p><h4>Superieur hierarchique</h4></p>
        <?php foreach ($superieurs as $key => $sup) { ?>
        <p><input type="checkbox" name="superieurs[]" id="" value="<?= $sup->id_employe ?>"><?= $sup->nom_poste ?> - <?= $sup->nom_info ?> <?= $sup->prenom_info ?></p>
        <?php } ?>
        <p><h4>Subordonnes </h4></p>
        <?php foreach ($subalternes as $key => $inf) { ?>
        <p><input type="checkbox" name="inferieurs[]" id="" value="<?= $inf->id_employe ?>"><?= $inf->nom_poste ?> - <?= $inf->nom_info ?> <?= $inf->prenom_info ?></p>
        <?php } ?>
        <p class="trans">nunn</p>
    </div>

    </div>
        <p class="trans">nunn</p>
    <input type="hidden" name="dateContratTravail" value="<?= $dateContratTravail ?>">
    <input type="hidden" name="idEmploye" value="<?= $idEmploye ?>">
    <input type="hidden" name="idRecrutement" value="<?= $idRecrutement ?>">
    <input type="hidden" name="duree" value="<?= $duree ?>">
    <input type="hidden" name="cnaps" value="<?= $cnaps ?>">
    <input type="hidden" name="ostie" value="<?= $ostie ?>">
    <input type="hidden" name="salaireBrut" value="<?= $salaireBrut ?>">
    <center><button type="submit" class="contrat">Genere le fiche de poste</button></center>
    </form>
</body>
</html>