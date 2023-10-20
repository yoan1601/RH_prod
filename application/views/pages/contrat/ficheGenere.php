<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
?>
<div id="printable">
    <p>
        <center>
            <h2>Fiche de poste</h2>
        </center>
    </p>
    <form action="<?= site_url("chgtContrat/saveChangementContrat") ?>" method="post">
    <div class="container-contratResume">
        <div class="firstPart">
            <p>
                <center>
                    <h3><?= $employe->matricule_employe ?></h3>
                </center>
            </p>
            <p>
            <h4>Informations personnelles de l'employee</h4>
            </p>
            <p>Nom : <?= $employe->nom_info ?></p>
            <p>Prenom : <?= $employe->prenom_info ?></p>
            <p>Genre : <?= $genre ?></p>
            <p>Contact : <?= $employe->contact_info ?></p>
            <p>Adresse : <?= $employe->addresse_info ?></p>
            <p>
            <h4>Informations sur la fonction</h4>
            </p>
            <p>Poste : <?= $recrutement->nom_poste ?></p>
            <p>Mission : <?= $recrutement->mission ?></p>
            <p>Categorie : <?= $recrutement->nom_categorie ?></p>
            <p>Date de changement du contrat : <?= $dateContratTravail ?></p>
            <p>Affiliation CNAPS : <?= $cnaps_string ?></p>
            <p>Affiliation Organisme sanitaire : <?= $ostie_string ?></p>
        </div>
        <div class="secondPart">
            <p class="trans">nunn</p>
            <p><h4>Listes des avantages</h4></p>
            <?php for($i=1;$i<=count($avantages);$i++) { ?>
                <p><?= $avantages[$i-1]["nom"] ?> : <?= $avantages[$i-1]["prix_string"]." ".$devise ?></p>
                <input type="hidden" name="nom_avantage<?= $i ?>" value="<?= $avantages[$i-1]["nom"] ?>">
                <input type="hidden" name="prix_avantage<?= $i ?>" value="<?= $avantages[$i-1]["prix"] ?>">
            <?php } ?>
            <p><h4>Superieur hierarchique</h4></p>
            <?php for($i=1;$i<=count($superieurs);$i++) { ?>
                <p><?= $superieurs[$i-1]->nom_info ?> <?= $superieurs[$i-1]->prenom_info ?></p>
                <input type="hidden" name="id_superieur<?= $i ?>" value="<?= $superieurs[$i-1]->id_employe ?>">
            <?php } ?>
            <p><h4>Subalternes</h4></p>
            <?php for($i=1;$i<=count($subalternes);$i++) { ?>
                <p><?= $subalternes[$i-1]->nom_info ?> <?= $subalternes[$i-1]->prenom_info ?></p>
                <input type="hidden" name="id_subalterne<?= $i ?>" value="<?= $subalternes[$i-1]->id_employe ?>">
            <?php } ?>
            <p class="trans">nunn</p>
        </div>
        <input type="hidden" name="dateContratTravail" value="<?= $dateContratTravail ?>">
        <input type="hidden" name="idEmploye" value="<?= $idEmploye ?>">
        <input type="hidden" name="idRecrutement" value="<?= $idRecrutement ?>">
        <input type="hidden" name="duree" value="<?= $duree ?>">
        <input type="hidden" name="cnaps" value="<?= $cnaps ?>">
        <input type="hidden" name="ostie" value="<?= $ostie ?>">
        <input type="hidden" name="salaireBrut" value="<?= $salaireBrut ?>">
        <center><button class="contrat" type="submit">Enregistrer</button></center>
    </div>
    </form>
</div>
<center><button class="contrat" id="imprimer">Exporter PDF</button></center>
</body>
<script>
    // Fonction pour déclencher l'impression de la partie spécifique
    function imprimerPartie() {
        window.print();
    }
    // Écouteur d'événement pour le bouton
    var boutonImprimer = document.getElementById('imprimer');
    boutonImprimer.addEventListener('click', imprimerPartie);
</script>
</html>