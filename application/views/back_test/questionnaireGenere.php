<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>Service : <?= $service->nom_service ?></center>
    <ul>
        <?php for($i = 1; isset($questionsReponses['question'.$i]); $i++) { ?>
            <li><?= $questionsReponses['question'.$i] ?></li>  
            <?php for($k = 1; isset($questionsReponses['reponse'.$i.$k]); $k++) { ?>
            <ul>
            <input type="checkbox" name="" id=""><?= $questionsReponses['reponse'.$i.$k] ?>
            </ul>  
            <?php } ?>
        <?php } ?>
    </ul>
</body>
</html>