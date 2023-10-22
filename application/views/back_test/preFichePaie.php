<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pre fiche paie</title>
</head>

<body>
    <h3>Pre fiche paie</h3>
    <form action="<?= site_url('fichePaie/genererFichePaie') ?>" method="post">
        <input type="hidden" name="idEmploye" value="<?= $employe->id_employe ?>">
        <h4><?= $employe->matricule_employe ?> , fiche de paie du mois de <?= $moisActuel ?> <?= $anneeActuelle ?></h4>
        <?php foreach ($allTypePrime as $key => $prime) { ?>
            <p>prime de <?= $prime->nom_type_prime ?> <input type="number" name="prime_<?= $prime->nom_type_prime ?>" id=""></p>
        <?php } ?>
        <?php foreach ($allHsMajoration as $key => $majoration) { ?>
            <p>Heures supplementaires <?= $majoration->nom_majoration ?> % <input type="number" placeholder="en jour" name="hsMajoration_<?= $majoration->id_majoration ?>" id=""></p>
        <?php } ?>
        <p>Rappel sur periodes anterieures <input type="number" name="rappelPeriodeAnterieure" id=""></p>
        <p>Droit de preavis <input type="number" name="droitPreavis" id=""></p>
        <p>Indemnite de licencement <input type="number" name="indemniteLicenciement" id=""></p>
        <p>
            Type de virement
            <select name="idTypeVirement" id="">
                <?php foreach ($allTypeVirement as $key => $typeVirement) { ?>
                    <option value="<?= $typeVirement->id_type_virement ?>"><?= $typeVirement->nom_type_virement ?></option>
                <?php } ?>
            </select>
        </p>
        <button type="submit">generer fiche de paie</button>
    </form>
</body>

</html>