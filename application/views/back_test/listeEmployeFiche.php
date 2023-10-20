<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back test</title>
</head>
<body>
    <h1>Creation de fiche de poste</h1>
    <h3>Date actuelle <?= $dateActuelle ?></h3>
    <table>
        <tr>
            <th>Matricule</th>
            <th>Nom prenom</th>
            <th>Action</th>
        </tr>
        <?php foreach ($listeEmp as $key => $emp) { ?>
            <tr>
                <td><?= $emp->matricule_employe ?></td>
                <td><?= $emp->nom_info ?> <?= $emp->prenom_info ?></td>
                <td><a href="<?= site_url('fichePaie/creationMajFichePaie/'.$emp->id_employe) ?>">creer fiche de poste</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>