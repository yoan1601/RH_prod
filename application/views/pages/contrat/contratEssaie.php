<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
?>
<form action="<?= site_url('contrat/resumeContratEssai') ?>" method="post">
    <div class="container-contrat">
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
        <p>Salaire brute : <input type="number" name="salaire_brut" id="" min="0" required></p>
        <p>Salaire net : <input type="number" name="salaire_net" id="" min="0" required></p>
        <p>Durree du contrat : <input type="number" name="duree_contrat" id="" min="0" required></p>
        <input type="hidden" name="idInfo" value="<?= $info_user->id_information_user ?>">
        <input type="hidden" name="idRecrutement" value="<?= $recrutement->id_recrutement ?>">
        <input type="hidden" name="dateActuelle" value="<?= $dateActuelle ?>">
        <p class="trans">nunn</p>
    </div>
    <p>
        <center><button type="submit">Valider</button></center>
    </p>
</form>
</body>

</html>