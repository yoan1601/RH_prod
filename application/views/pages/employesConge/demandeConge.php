<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>

    
<form action="" method="get">
	  	<div class="demande-card">
			<div class="demande-body">
				<p></p>
				<p></p>
				<p class="fin">nun</p>
				<p><h3 class="card-title">Demande de conge</h3></p>
                <div class="demande-group">
                    <p class="container-demande">
                        Nombre de jour restant : 5
                    </p>
                    <p class="container-demande">
                        <p class="content-demande">Date de debut</p>
                        <p class="input-demande"><input type="date" name="" id=""></p>
                    </p>
                    <p class="container-demande">
                        <p class="content-demande">Date de fin</p>
                        <p class="input-demande"><input type="date" name="" id=""></p>
                    </p>
                    <p class="container-demande">
                        <p class="content-demande">Type de conge</p>
                        <select name="" id="" class="input-demande">
                                <option value="">Materinite</option>
                        </select>
                    </p>
                    <p class="container-demande">
                        <p class="content-demande">Motif</p>
                        <input type="text" name="" id="">
                    </p>
                    <p class="container-demande">
                        <div class="demande-span">
                            <span id="popupDemande">Demander</span>
                        </div>
                    </p>
                    <p class="fin">nun</p>
                </div>
            </div>
        </div>

        <div class="popupModule">
        <p class="fin">nun</p>
            <div class="gold">           
                <div class="validation">
                <p class="fin">nun</p>
                <img class="quit" src="<?= base_url('assets/img/icons8-cross-60.png') ?>" alt="" srcset="">
                <p class="content-demande">Nombres de jours conge demandes :5</p>
                <p class="content-demande">Nombres de jours de conge restant:6</p>
                <p class="content-demande">NB:les exces de conge seront decuits de votre salaire </p>
                <p class="fin">nun</p>
                <center><button type="submit">Confirmer la demande</button></center>
                <p class="fin">nun</p>
                <p class="fin">nun</p>
                </div>
            </div>
        </div>

</form>

</body>
</html>
