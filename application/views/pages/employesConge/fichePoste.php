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
                    <h3><?= $contratTravail->matricule_employe ?></h3>
                </center>
            </p>
            <p>
            <h4>Informations personnelles de l'employee</h4>
            </p>
            <p>Nom : <?= $contratTravail->nom_info ?></p>
            <p>Prenom : <?= $contratTravail->prenom_info ?></p>
            <p>Genre : <?= $genre ?></p>
            <p>Contact : <?= $contratTravail->contact_info ?></p>
            <p>Adresse : <?= $contratTravail->addresse_info ?></p>
            <p>
            <h4>Informations sur la fonction</h4>
            </p>
            <p>Poste : <?= $contratTravail->nom_poste ?></p>
            <p>Mission : <?= $contratTravail->mission ?></p>
            <p>Categorie : <?= $contratTravail->nom_categorie ?></p>
            <p>Date de changement du contrat : <?= $contratTravail->date_debut_contrat_travail ?></p>
            <p>Affiliation CNAPS : <?= $cnaps_string ?></p>
            <p>Affiliation Organisme sanitaire : <?= $ostie_string ?></p>
        </div>
        <div class="secondPart">
            <p class="trans">nunn</p>
            <p><h4>Listes des avantages</h4></p>
            <?php for($i=1;$i<=count($contratTravail->avantages);$i++) { ?>
                <p><?= $contratTravail->avantages[$i-1]->nom_avantage ?> : <?= $contratTravail->avantages[$i-1]->prix_string." ".$devise ?></p>
            <?php } ?>
            <p><h4>Superieur hierarchique</h4></p>
            <?php for($i=1;$i<=count($collaborateurs["superieurs"]);$i++) { ?>
                <p><?= $collaborateurs["superieurs"][$i-1]->nom_info ?> <?= $collaborateurs["superieurs"][$i-1]->prenom_info ?></p>
            <?php } ?>
            <p><h4>Subalternes</h4></p>
            <?php for($i=1;$i<=count($collaborateurs["subalternes"]);$i++) { ?>
                <p><?= $collaborateurs["subalternes"][$i-1]->nom_info ?> <?= $collaborateurs["subalternes"][$i-1]->prenom_info ?></p>
            <?php } ?>
            <p class="trans">nunn</p>
        </div>
    </div>
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