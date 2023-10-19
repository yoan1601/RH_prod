<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
    <center>
        <h2>Choix de contrat</h2>
        <h3>Choisissez le type de contrat</h3>
    </center>
    <form action="<?= site_url("chgtContrat/changementContrat") ?>" method="post">
    <div class="container-type">
        <?php foreach($types_contrat as $type){ ?>
        <div class="CD">
            <div class="photo-choix1"></div>
            <center><h2><input type="radio" name="type_contrat" value="<?= $type->code_type_contrat.":".$type->nom_type_contrat ?>" id=""><?= $type->nom_type_contrat ?></h2></center>
        </div>
        <?php } ?>
        <!--<div class="CD">
            <div class="photo-choix2"></div>
            <center><h2><input type="radio" name="" id=""> CDD</h2>
            <p>Contrat a duree determinee</p></center>
        </div>-->
    </div>
    <input type="hidden" name="idContratEssai" value="<?= $idContratEssai ?>">
    <p class="trans">nun</p>
    <center><button type="submit" class="contrat">Valider</button></center>
    </form>
</body>
</html>