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
                <p><input type="text-area" class="hommeJour" name="mission" placeholder="Mission" id=""></p>
                <p><select name="poste" id="">
                    <?php foreach($postes as $poste){ ?>
                    <option value="<?= $poste->id_poste ?>"><?= $poste->nom_poste ?></option>
                    <?php } ?>
                </select>
                    <button class="contrat">Creer un nouveau poste</button>
                </p>
                <input class="button" type="submit" value="Valider">
                <p class="trans">..</p>
            </div>
        </form>
      </center>
      </div>
</body>
</html>
