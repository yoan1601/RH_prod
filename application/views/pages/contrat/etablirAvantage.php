<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
    <form action="<?= site_url("chgtContrat/saveAvantages") ?>" method="post">
    <div class="container-contrat">
        <p class="trans">nun</p>
        <p><center><h2>Avantage en nature</h2></center></p>
        <avantages id="avantages">
        </avantages>
        <p class="trans">nun</p>
        <input type="hidden" name="idContratTravail" value="<?= $idContratTravail ?>">
    <center><button class="contrat" type="submit">Resume changement du contrat</button></center>
    </div>
    </form>
    <p>Ajout avantage <button class="embaucher" id="ajoutAvantage">+</button></p>
    <script src="../../assets/js/avantages.js"></script>
</body>
</html>