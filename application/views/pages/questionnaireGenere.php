<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
?>



<div class="main-quest1" id="printable">
		<p class="fin">nun</p>
		<p>
			<center>
				<h3>Questionnaire</h3>
		</p>
		</center>
		<p>
			<center>Service : <?= $service->nom_service ?></center>
		</p>
		<div class="form-div">
			<?php for ($i = 1; isset($questionsReponses['question' . $i]); $i++) { ?>
				<p><?= $questionsReponses['question' . $i] ?></p>
				<p>
				<ul class="rep">
					<?php for ($k = 1; isset($questionsReponses['reponse' . $i . $k]); $k++) { ?>
						<li class="ans"><input type="checkbox" name="" id=""> <?= $questionsReponses['reponse' . $i . $k] ?></li>
					<?php } ?>
				</ul>
				</p>
			<?php } ?>
		</div>
		<p class="fin">nun</p>
</div>

<button class="absolutive-btn" id="imprimer">Exporter PDF</button>

<script>
	// Fonction pour déclencher l'impression de la partie spécifique
	function imprimerPartie() {
		window.print();
	}

	// Écouteur d'événement pour le bouton
	var boutonImprimer = document.getElementById('imprimer');
	boutonImprimer.addEventListener('click', imprimerPartie);
</script>