<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button id="ajoutCritere" onclick="ajoutCritere()">Ajouter critere</button>
    <div>
        <form action="<?= site_url('critere/setInSessionAndSave') ?>" method="post">
            <input type="hidden" id="nbCriteres" name="nbCriteres" value="0">
            <input type="hidden" id="nbOptions" name="nbOptions" value="0">
            <ul id="criteres">

            </ul>
            <button type="submit">Enregistrer et publier l'annonce</button>
        </form>
        <button type="button" id="ajoutOption" onclick="ajoutOption()" style="display: none;">Ajouter option</button>
    </div>
    <script src="<?= base_url('assets/js/criteres.js') ?>"></script>
</body>

</html>