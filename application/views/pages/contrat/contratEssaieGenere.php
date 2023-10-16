<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>

    <div id="printable" class="container-contrat">
        <p class="trans">nunn</p>
        <p>
            <center>
                <h2>Contrat d'essaie</h2>
            </center>
        </p>
        <p><label for="">Fais le <?= $dateActuelle ?></label></p>
        <p>
        <h4>Informations personnelles de l'employee</h4>
        </p>
        <p>Nom : <?= $info_user->nom_info ?></p>
        <p>Prenom : <?= $info_user->prenom_info ?></p>
        <p>Genre : <?= $info_user->sexe_info ?></p>
        <p>Contact : <?= $info_user->contact_info ?></p>
        <p>Adresse : <?= $info_user->addresse_info ?></p>
        <hr>
        <p>
        <h4>Informations sur la fonction</h4>
        </p>
        <p>Poste : <?= $recrutement->nom_poste ?></p>
        <p>Mission : <?= $recrutement->mission ?> </p>
        <p>Salaire brute : <?= $salaire_brut ?> Ar</p>
        <p>Salaire net : <?= $salaire_net ?> Ar</p>
        <p>Durree du contrat : <?= $duree_contrat ?> jour(s)</p>
        <p class="trans">nunn</p>
    </div>
    <p><center><button class="contrat" id="imprimer">Exporter PDF</button></center></p>

    <script>
        // Fonction pour déclencher l'impression de la partie spécifique
        function imprimerPartie() {
            window.print();
        }

        // Écouteur d'événement pour le bouton
        var boutonImprimer = document.getElementById('imprimer');
        boutonImprimer.addEventListener('click', imprimerPartie);
    </script>
</body>
</html>