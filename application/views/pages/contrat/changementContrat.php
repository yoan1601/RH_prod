<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
    <form action="<?= site_url("contrat/etablirAvantages") ?>" method="post">
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
        <p>Date de changement du contrat:<?= $dateActuelle ?></p>
        <p style="display:<?= $dureeHTML ?>">Date de duree du contrat<input type="number" name="dureeContratChange" value="0" id=""></p>
        <p>Affiliation CNAPS:<input type="radio" name="cnaps" value="1" id="">OUI<input type="radio" name="cnaps" value="0" id="">NON</p>
        <p>Affiliation Organisme sanitaire:<input type="radio" name="ostie" value="1" id="">OUI<input type="radio" name="ostie" value="0" id="">NON</p>
        <p class="trans">nunn</p>
    </div>
    <center><button type="submit" class="contrat">Etablir les avantages</button></center>
    </form>
</body>
</html>