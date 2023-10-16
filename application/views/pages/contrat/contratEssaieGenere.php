<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>

    <div class="container-contrat">
        <p class="trans">nunn</p>
        <p><center><h2>Contrat d'essaie</h2></center></p>
        <p><label for="">Fais le <?= $dateActuelle ?> Numero matricule:<?= $matricule ?> </label></p>
        <p><h4>Informations personnelles de l'employee</h4></p>
        <p>Nom:<?= $info_user->nom ?></p>
        <p>Prenom:<?= $info_user->prenom ?></p>
        <p>Genre:Homme</p>
        <p>Contact:+261 38 901 90</p>
        <p>Adresse:Lot NeinNeinNein</p>
        <hr>
        <p><h4>Informations sur la fonction</h4></p>
        <p>Poste:</p>
        <p>Mission:</p>
        <p>Salaire brute:100000Ar</p>
        <p>Salaire net:100000Ar</p>
        <p>Durree du contrat: 90 jours</p>
        <p class="trans">nunn</p>
    </div>
    <p><center><button class="contrat">Exporter PDF</button></center></p>
</body>
</html>