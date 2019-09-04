<?php require 'assets/config/bootstrap.php';
if($_SESSION['user']['rights'] != 10) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Baï-Bao - Ajout d'un réalisation</title>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon-16x16.png">
    <link rel="manifest" href="../assets/site.webmanifest">
    <link rel="mask-icon" href="../assets/safari-pinned-tab.svg" color="#040028">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#040028">
</head>
<body>
<?php include('./inc/header.php') ?>

<section class="connected write">
    <h1>Ajouter une réalisation</h1>

    <form action="#" method="post" enctype="multipart/form-data">

        <p><label for="title">Titre </label>
            <input type="text" name="title" required></p>
        <p>  <label for="abstract">Sous-texte </label>
            <input type="text" name="abstract" required></p>
        <p>  <label for="link">Lien </label>
            <input type="text" name="link" value="http://www."required></p>
        </p>
        <label for="color">Couleur</label>
        <select name="color" required>
            <option value="">--Choisissez une couleur--</option>
            <option value="#040028">Bleu nuit</option>
            <option value="#F9D7C8">Beige</option>
            <option value="#A3FFD3">Turquoise</option>
        </select>

        <label for="category">Catégorie</label>
        <select name="category" required>
            <option value="">--Choisissez une catégorie--</option>
            <option value="Artistes">Artistes</option>
            <option value="Institutions">Institutions</option>
            <option value="#A3FFD3">Éducation</option>
            <option value="Education">IT</option>
            <option value="Associations">Associations</option>
            <option value="Cabinets">Cabinets</option>
        </select>
        <input type="submit" value="Envoyer" name="send">
        <?php $alert->showAlert();?>
    </form>
    <?php
    if(isset($_POST['send'])) {
        $realisations->add($pdo);
    }
    ?>
</section>
</body>

</html>