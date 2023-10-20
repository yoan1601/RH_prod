<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
    <form action="<?= site_url("chgtContrat/toResumeContrat") ?>" method="post">
    <div class="container-contrat">
        <p class="trans">nun</p>
        <p><center><h2>Avantage en nature</h2></center></p>
        <avantages id="avantages">
        </avantages>
        <p class="trans">nun</p>
        <input type="hidden" name="dateContratTravail" value="<?= $dateContratTravail ?>">
        <input type="hidden" name="idEmploye" value="<?= $idEmploye ?>">
        <input type="hidden" name="idRecrutement" value="<?= $idRecrutement ?>">
        <input type="hidden" name="duree" value="<?= $duree ?>">
        <input type="hidden" name="cnaps" value="<?= $cnaps ?>">
        <input type="hidden" name="ostie" value="<?= $ostie ?>">
        <input type="hidden" name="salaireBrut" value="<?= $salaireBrut ?>">
    <center><button class="contrat" type="submit">Resume changement du contrat</button></center>
    </div>
    </form>
    <p>Ajout avantage <button class="embaucher" id="ajoutAvantage">+</button></p>
    <script src="../../assets/js/avantages.js"></script>
</body>
</html>