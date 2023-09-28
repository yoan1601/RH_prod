<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button id="ajoutCritere" onclick="ajoutCritere()">Ajouter critere</button>
    <input type="hidden" id="nbCriteres" name="nbCriteres" value="0">
    <input type="hidden" id="nbOptions" name="nbOptions" value="0">
    <div>
        <ul id="criteres">

        </ul>
        <button id="ajoutOption" onclick="ajoutOption()" style="display: none;">Ajouter option</button>
    </div>
    <script src="criteres.js"></script>
</body>
</html>