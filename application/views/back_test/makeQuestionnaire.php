<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
?>
<div class="question_div">
    <button id="ajoutquestion" onclick="ajoutQuestion()">Ajouter une question</button>
    <div class="creation_form">
        <p><label for="">Creer vos questions</label></p>
        <p class="intro">Cochez la reponse si elle est censée etre vraie</p>
        <form action="<?= site_url('test/save') ?>" method="post">
            <input type="hidden" id="nbQuestions" name="nbQuestions" value="0" placeholder="question">
            <input type="hidden" id="nbReponses" name="nbReponses" value="0">
            <input type="hidden" id="idService" name="idService" value="<?= $idService ?>">
            <ul id="questions">

            </ul>
            <button id="soumission" type="submit">Generer le questionnaire</button>
        </form>
        <button type="button" id="ajoutReponse" onclick="ajoutReponse()" style="display: none;">Ajouter une reponse</button>
    </div>
</div>
<script src="<?= base_url('assets/js/questionnaire.js') ?>"></script>
</body>

</html>