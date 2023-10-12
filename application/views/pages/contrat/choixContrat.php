<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>
    <center>
        <h2>Choix de contrat</h2>
        <h3>Choisissez le type de contrat</h3>
    </center>
    
    <div class="container-type">
        <div class="CD">
            <div class="photo-choix1"></div>
            <center><h2><input type="radio" name="" id=""> CDI</h2>
            <p>Contrat a duree indeterminee</p></center>
        </div>
        <div class="CD">
            <div class="photo-choix2"></div>
            <center><h2><input type="radio" name="" id=""> CDD</h2>
            <p>Contrat a duree determinee</p></center>
        </div>
    </div>
    <p class="trans">nun</p>
    <center><button>Valider</button></center>
</body>
</html>