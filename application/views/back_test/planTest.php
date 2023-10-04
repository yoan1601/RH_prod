<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Planification test</h1>
    <h2>Service : <?= $service->nom_service ?></h2>
    <form action="<?= site_url('test/setTestInSession') ?>" method="post">
        <input type="hidden" name="idRecrutement" value="<?= $idRecrutement ?>">
        <input type="hidden" name="idService" value="<?= $service->id_service ?>">
        <label for="date_heure_test">Date et heure du test</label>
        <input type="date" name="date_test" id="" required>
        <input type="time" name="heure_test" id="" required>
        <label for="lieu_test">Lieu du test</label>
        <input type="text" name="lieu_test" id="" required>
        <input type="submit" value="Etablir le questionnaire">
    </form>
</body>

</html>