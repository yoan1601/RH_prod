<?php
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>

	<div class="template-annonce">
		<p class="title"><center><h2>Avis de recrutement</h2></center></p>
		
		<div class="head">
			<div class="description">
				<p><span>Societe:</span><?= $nomSociete ?></p>
				<p><span>Date:</span><?= $dateAnnonce ?></p>
				<p><span>Service:</span><?= $service->nom_service ?></p>
			</div>
			<div class="cl">
				<img src="<?= base_url('assets/img/DS.jpg') ?>" alt="">
			</div>
		</div>

		<div class="main-container">

			<div class="person-props">
				<p>...</p>
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
	</div>

</body>
</html>
