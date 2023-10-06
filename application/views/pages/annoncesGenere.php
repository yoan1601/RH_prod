<?php
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>


	<div id="printable" class="template-annonce">
	<p class="trans">...</p>
		<p class="title"><center><h2>Avis de recrutement</h2></center></p>
		<div class="head">
			<div class="description">
				<p><span>Societe:</span><?= $nomSociete ?></p>
				<p><span>Date:</span><?= $dateAnnonce ?></p>
				<p><span>Service:</span><?= $service->nom_service ?></p>
			</div>
			<div class="cl">
				<img src="<?= base_url('assets/img/DS (1).jpg') ?>" alt="">
			</div>
		</div>

		<div class="main-container">

			<div class="person-props">
				<p class="trans">...</p>
				<p class="info">Nous vous informons que nous lancons un avie de recrutement d'employer ayant ces qualites 
					,plus precisement ces criteres.</p>
				<?php for($i=1;isset($criteresOptions["critere".$i]);$i++){ ?>
					<p><h3><?= $criteresOptions["critere".$i] ?>:</h3></p>
					<ul>
					<?php for($j=1;isset($criteresOptions["option".$i.$j]);$j++){ ?>
						<li><?= $criteresOptions["option".$i.$j] ?></li>
					<?php } ?>
					</ul>
				<?php } ?>
			</div>
		</div>
		<p class="trans">...</p>
	</div>

	<div ><a href="javascript:void(0);"><button id="imprimer">exporter en PDF</button></a></div>

	<script>
        // Fonction pour déclencher l'impression de la partie spécifique
        function imprimerPartie() {
            window.print();
        }

        // Écouteur d'événement pour le bouton
        var boutonImprimer = document.getElementById('imprimer');
        boutonImprimer.addEventListener('click', imprimerPartie);
    </script>

</body>
</html>
