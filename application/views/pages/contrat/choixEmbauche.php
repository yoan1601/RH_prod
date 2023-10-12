<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
?>

<center>
    <h2>Choix d'embauche</h2>
</center>
<div class="card list">
    <div class="card-body">
        <p></p>
        <p></p>
        <p class="fin">nun</p>
        <p>
        <h3 class="card-title"><?= $entretien_recrutement_service->nom_service ?> <?= $entretien_recrutement_service->mission ?></h3>
        </p>
        <form action="<?= site_url('contrat/saveChoixEmbauche') ?>" method="post">
            <div class="list-group">
                <input type="hidden" name="idEntretien" value="<?= $entretien_recrutement_service->id_entretien ?>">
                <table>
                    <tr class="title_text">
                        <td></td>
                        <td>Nom et Prenom</td>
                        <td>Note entretien</td>
                    </tr>
                    <?php foreach ($choix as $key => $emp) { ?>
                        <tr>
                            <td><?php if ($emp->id_entretien_entretien_selection === null) { ?> <input type="checkbox" name="idInfoSelected[]" id="" value="<?= $emp->id_information_user  ?>"> <?php } else { ?> <center style="color:green;">Déjà selectionné</center> <?php } ?></td>
                            <td><?= $emp->nom_info  ?> <?= $emp->prenom_info ?></td>
                            <td><?= $emp->note_entretien  ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
    </div>
</div>
<p>
    <center><button class="contrat" type="submit">Valider</button></center>
</p>
</form>
</body>

</html>