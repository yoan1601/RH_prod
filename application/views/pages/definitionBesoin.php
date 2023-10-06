<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>

	  <center>
        <form class="form-min" action="<?= site_url('critere') ?>" method="post">
            <div class="service-creation-form">
				<p class="trans">...</p>
                <h3>Besoin en homme jour</h3>
                <input type="number" class="hommeJour" name="hommeJour" placeholder="Taper le nombre ici" id="">
                <input class="button" type="submit" value="Valider">
            </div>
        </form>
      </center>
      </div>
</body>
</html>
