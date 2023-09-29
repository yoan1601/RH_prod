<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/navbar');
?>

	<div class="template-annonce">
		<p class="title"><center><h2>Avis de recrutement</h2></center></p>
		
		<div class="head">
			<div class="description">
				<p><span>Societe:</span>Dev soft</p>
				<p><span>Date:</span>10/09/2023</p>
				<p><span>Service:</span>Marketing</p>
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
				<p><h3>Diplome:</h3></p>
				<ul>
					<li>BEPC</li>
					<li>CEPE</li>
					<li>BACC</li>
				</ul>
				<p><h3>Experience:</h3></p>
				<ul>
					<li>12 ans Info</li>
					<li>2 ans desing</li>
				</ul>
				<p><h3>Situation matrimoniale:</h3></p>
				<ul>
					<li>Celibataire</li>
				</ul>
			</div>
		</div>
	</div>

</body>
</html>
