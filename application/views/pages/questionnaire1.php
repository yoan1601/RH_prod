<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
?>



<div class="main-quest1">
	<button id="ajoutquestion" onclick="ajoutQuestion()">Ajouter une question</button>
	<form action="<?= site_url('test/save') ?>" method="post">
		<input type="hidden" id="nbQuestions" name="nbQuestions" value="0" placeholder="question">
		<input type="hidden" id="nbReponses" name="nbReponses" value="0">
		<input type="hidden" id="idService" name="idService" value="<?= $idService ?>">
		<p class="fin">nun</p>
		<p>
			<center>
				<h3>Questionnaire</h3>
		</p>
		</center>
		<div class="form-div" id="questions">
				<!-- <p><input type="text" name="" id=""><input type="number" placeholder="Note" name="" id=""></p>
				<p>
				<ul class="rep">
					<li class="ans"><input type="checkbox" name="" id=""> <input type="text" name="" id=""></li>
					<li class="ans"><input type="checkbox" name="" id=""> Ans 2</li>
					<li class="ans"><input type="checkbox" name="" id=""> Ans 3</li>
				</ul>
				</p>
				<p>Question 1<input type="number" placeholder="Note" name="" id=""></p>
				<p>
				<ul class="rep">
					<li class="ans"><input type="checkbox" name="" id=""> Ans 1</li>
					<li class="ans"><input type="checkbox" name="" id=""> Ans 2</li>
					<li class="ans"><input type="checkbox" name="" id=""> Ans 3</li>
				</ul>
				</p>
				<p>Question 1<input type="number" placeholder="Note" name="" id=""></p>
				<p>
				<ul class="rep">
					<li class="ans"><input type="checkbox" name="" id=""> Ans 1</li>
					<li class="ans"><input type="checkbox" name="" id=""> Ans 2</li>
					<li class="ans"><input type="checkbox" name="" id=""> Ans 3</li>
				</ul>
				</p> -->
		</div>
		<button id="soumission" type="submit">Generer le questionnaire</button>
		<p class="fin">nun</p>
	</form>
	<button type="button" id="ajoutReponse" onclick="ajoutReponse()" style="display: none;">Ajouter une reponse</button>
</div>
<script src="<?= base_url('assets/js/questionnaire.js') ?>"></script>