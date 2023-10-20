<?php
$this->load->view('templates/header');
$this->load->view('templates/navbar');
?>

<center>
    <h2>Remplisssez ces informations avant la generation du fiche de paie</h2>
</center>
<div class="container-contratResume">
    <form action="<?= site_url('fichePaie/genererFichePaie') ?>" method="post">
    <input type="hidden" name="idEmploye" value="<?= $employe->id_employe ?>">
    <div class="firstPart">
        <p class="trans">g</p>
        <p>
        <h4><?= $employe->matricule_employe ?> , fiche de paie mois du <?= $moisActuel ?> <?= $anneeActuelle ?></h4>
        </p>
        <?php foreach ($allTypePrime as $key => $prime) { ?>
            <p>Prime <?= $prime->nom_type_prime ?> :
            <p><input type="montant" placeholder="en jour" name="prime_<?= $prime->nom_type_prime ?>" id=""></p>
            </p>
        <?php } ?>
        <?php foreach ($allHsMajoration as $key => $majoration) { ?>
            <p>Heures supplementaires <?= $majoration->nom_majoration ?> % :
            <p><input type="number" placeholder="en heure" name="hsMajoration_<?= $majoration->id_majoration ?>" id=""></p>
            </p>
        <?php } ?>
    </div>
    <div class="secondPart">
        <p class="trans">nunn</p>
        <p class="trans">nunn</p>
        <p>Rappel sur periode anterieur:
        <p><input type="number" placeholder="montant" name="rappelPeriodeAnterieure" id=""></p>
        </p>
        <p>Droits de preavis:
        <p><input type="number" placeholder="montant" name="droitPreavis" id=""></p>
        </p>
        <p>Indamnites de licencement:
        <p><input type="number" placeholder="montant" name="indemniteLicenciement" id=""></p>
        </p>
        <p>Type de virement:
        <p>
            <select name="idTypeVirement" id="">
                <?php foreach ($allTypeVirement as $key => $typeVirement) { ?>
                    <option value="<?= $typeVirement->id_type_virement ?>"><?= $typeVirement->nom_type_virement ?></option>
                <?php } ?>
            </select>
        </p>
        </p>

        <p class="trans">nunn</p>
    </div>

</div>
<p class="trans">nun</p>
<center><button class="embaucher" type="submit">generer fiche de paie</button></center>
</form>
</body>

</html>