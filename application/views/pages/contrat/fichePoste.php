<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
<form action="<?= site_url('chgtContrat/genererFichePoste') ?>" method="post">
    <p><center><h2>Fiche de poste</h2></center></p>
    <div class="container-contratResume">
    <div class="firstPart">
    <p><center><h3><?= $matricule ?></h3></center></p>
        <p><h4>Informations personnelles de l'employee</h4></p>
        <p>Nom : <?= $info_user_recrutement_poste->nom_info ?></p>
        <p>Prenom : <?= $info_user_recrutement_poste->prenom_info ?></p>
        <p>Genre : <?= $info_user_recrutement_poste->sexe_info ?></p>
        <p>Contact : <?= $info_user_recrutement_poste->contact_info ?></p>
        <p>Adresse : <?= $info_user_recrutement_poste->addresse_info ?></p>
        <p><h4>Informations sur la fonction</h4></p>
        <p>Poste : <?= $info_user_recrutement_poste->nom_poste ?></p>
        <p>Mission : <?= $info_user_recrutement_poste->mission ?></p>
        <p>Categorie : <?= $info_user_recrutement_poste->nom_categorie ?></p>
        <p>Date de changement du contrat :  <?= $dateActuelle ?></p>
        <p>Affiliation CNAPS : <?= $cnaps ?></p>
        <p>Affiliation Organisme sanitaire : <?= $sanitaire ?></p>
    </div>
    <div class="secondPart">
        <p><h4>Listes des avantages</h4></p>
        <?php foreach ($avantages['nom'] as $key => $avantage) { ?>
        <p><?= $avantage ?></p>
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
    <center><button type="submit" class="contrat">Genere le fiche de poste</button></center>
    </form>
</body>
</html>