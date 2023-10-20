<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
    <form action="<?= site_url("chgtContrat/etablirAvantages") ?>" method="post">
    <div class="container-contrat">
        <p class="trans">nunn</p>
        <p><center><h2>Changement de contrat</h2></center></p>
        <p><center><h3><?= $contratEssai->matricule_employe ?> <?= $typeContrat ?></h3></center></p>
        <p><h4>Informations personnelles de l'employee</h4></p>
        <p>Nom:<?= $contratEssai->nom_info ?></p>
        <p>Prenom:<?= $contratEssai->prenom_info ?></p>
        <p>Genre:<?= $genre ?></p>
        <p>Contact:<?= $contratEssai->contact_info ?></p>
        <p>Adresse:<?= $contratEssai->addresse_info ?></p>
        <hr>
        <p><h4>Informations sur la fonction</h4></p>
        <p>Poste:<?= $contratEssai->nom_poste ?></p>
        <p>Mission:<?= $contratEssai->mission ?></p>
        <p>Categorie:<?= $contratEssai->nom_categorie ?></p>
        <p>Date de changement du contrat:<?= $dateActuelleAffiche ?></p>
        <p style="display:<?= $dureeHTML ?>">Duree du contrat<input type="number" name="dureeContratChange" value="0" min="0" id=""></p>
        <p>Affiliation CNAPS:<input type="radio" name="cnaps" value="1" id="" required>OUI<input type="radio" name="cnaps" value="0" id="">NON</p>
        <p>Affiliation Organisme sanitaire:<input type="radio" name="ostie" value="1" id="" required>OUI<input type="radio" name="ostie" value="0" id="">NON</p>
        <p>Salaire brut: <input type="number" step="0.01" name="salaire_brut" min="0"></p>
        <p class="trans">nunn</p>
    </div>
    <input type="hidden" name="dateActuelle" value="<?= $dateActuelleValeur ?>">
    <input type="hidden" name="idEmploye" value="<?= $contratEssai->id_employe ?>">
    <input type="hidden" name="idRecrutement" value="<?= $contratEssai->id_recrutement ?>">
    <center><button type="submit" class="contrat">Etablir les avantages</button></center>
    </form>
</body>
</html>