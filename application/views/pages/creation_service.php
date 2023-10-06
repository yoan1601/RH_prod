<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>

	  <center>
        <form name="min-form" action="<?= site_url("service/saveService") ?>" method="post">
            <div class="service-creation-form">
                <h3>Creation de Service</h3>
                <input class="nomService" type="text" name="serviceName" placeholder="Taper le nom ici" id="">
                <input type="hidden" name="iddepartement" value="1">
                <input class="button" type="submit" value="CREER">
                <p style="color:green"><?= $message ?></p>
            </div>
        </form>
      </center>
      </div>
</body>
</html>
