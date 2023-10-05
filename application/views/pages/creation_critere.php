<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
	<div class="critere_div">
    <button id="ajoutCritere" onclick="ajoutCritere()">Ajouter critere</button>
    <div class="creation_form">
	<p><label for="">Creer vos criteres de Selection</label></p>
	<p class="intro">Pour le vos preferences particuliere en terme d'embauche.</p>
        <form  action="<?= site_url('critere/setInSession') ?>" method="post">
            <input type="hidden" id="nbCriteres" name="nbCriteres" value="0" placeholder="Nom critere">
            <input type="hidden" id="nbOptions" name="nbOptions" value="0">
            <ul id="criteres">

            </ul>
            <button id="soumission" type="submit">Enregistrer et publier l'annonce</button>
        </form>
        <button type="button" id="ajoutOption" onclick="ajoutOption()" style="display: none;">Ajouter option</button>
    </div>
	</div>
    <script src="<?= base_url('assets/js/criteres.js') ?>"></script>
</body>

</html>
