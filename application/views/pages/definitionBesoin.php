<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>

	  <center>
        <form action="<?= site_url('critere') ?>" method="post">
            <div class="service-creation-form">
                <h3>Besoin en homme jour</h3>
                <input type="number" name="hommeJour" placeholder="Taper le nombre ici" id="">
                <input class="button" type="submit" value="Valider">
            </div>
        </form>
      </center>
      </div>
</body>
</html>
