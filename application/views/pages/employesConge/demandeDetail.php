<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>

    <form action="<?= site_url("conge/validerConge") ?>" method="post">
    <div class="container-contrat">
        <p class="trans">nunn</p>
        <p>
            <center>
                <h2>Detail de la demande</h2>
            </center>
        </p>
        <p><?= $demande->matricule_employe ?></p>
        <p><?= $demande->nom_info." ".$demande->prenom_info ?></p>
        <p>Service:<?= $demande->nom_service ?></p>
        <!--<p>Type de conge: Maternite</p>-->
        <p>Motif du conge:<?= $demande->motif_demande_conge ?></p>
        <p>Date de debut du conge :<?= $demande->debut_demande_conge ?></p>
        <p>Date de fin du conge :<?= $demande->fin_demande_conge ?></p>
        <p>Dure de la demande:<?= $demande->duree ?> jours</p>
        <p class="trans">nunn</p>
    </div>
    <input type="hidden" name="id_demande" value="<?= $demande->id_demande_conge ?>">
    <input type="hidden" name="id_service" value="<?= $demande->id_service ?>">
    <p><center><button class="contrat" >Valider</button></center></p>
    </form>
</body>
</html>