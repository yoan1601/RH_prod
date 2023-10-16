<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
    <p><center><h2>Changement de contrat</h2></center></p>
    <p><center><h3><?= $matricule ?> type de contrat <?= $type_contrat ?></h3></center></p>
    <div class="container-contratResume">
    <div class="firstPart">

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
        <p class="trans">nunn</p>
    </div>

    </div>
    <p class="trans">nun</p>
    <center><button class="contrat">Enregistrer et creer la fiche de poste</button></center>
</body>
</html>