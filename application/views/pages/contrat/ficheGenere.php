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
    <div class="container-contratResume">
        <div class="firstPart">

            <p>
                <center>
                    <h3><?= $matricule ?></h3>
                </center>
            </p>
            <p>
            <h4>Informations personnelles de l'employee</h4>
            </p>
            <p>Nom : <?= $info_user_recrutement_poste->nom_info ?></p>
            <p>Prenom : <?= $info_user_recrutement_poste->prenom_info ?></p>
            <p>Genre : <?= $info_user_recrutement_poste->sexe_info ?></p>
            <p>Contact : <?= $info_user_recrutement_poste->contact_info ?></p>
            <p>Adresse : <?= $info_user_recrutement_poste->addresse_info ?></p>
            <p>
            <h4>Informations sur la fonction</h4>
            </p>
            <p>Poste : <?= $info_user_recrutement_poste->nom_poste ?></p>
            <p>Mission : <?= $info_user_recrutement_poste->mission ?></p>
            <p>Categorie : <?= $info_user_recrutement_poste->nom_categorie ?></p>
            <p>Date de changement du contrat : <?= $dateActuelle ?></p>
            <p>Affiliation CNAPS : <?= $cnaps ?></p>
            <p>Affiliation Organisme sanitaire : <?= $sanitaire ?></p>
        </div>
        <div class="secondPart">
            <p class="trans">nunn</p>
            <p>
            <h4>Listes des avantages</h4>
            </p>
            <?php foreach ($avantages['nom'] as $key => $avantage) { ?>
                <p><?= $avantage ?></p>
            <?php } ?>
            <p>
            <h4>Superieur hierarchique</h4>
            </p>
            <?php foreach ($superieurs as $key => $sup) { ?>
                <p><?= $sup->nom_info ?> <?= $sup->prenom_info ?></p>
            <?php } ?>
            <p>
            <h4>Subordonnes </h4>
            </p>
            <?php foreach ($inferieurs as $key => $inf) { ?>
                <p><?= $inf->nom_info ?> <?= $inf->prenom_info ?></p>
            <?php } ?>
            <p class="trans">nunn</p>
        </div>

    </div>
    <p class="trans">nun</p>
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