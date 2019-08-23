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
    <title>Baï-Bao - Accès à votre espace perso</title>
</head>
<body>
<?php include('./inc/header.php') ?>

<section class="connected write">
    <h1>Ajouter un article</h1>

    <form action="#" method="post" enctype="multipart/form-data">

        <p><label for="title">Titre </label>
            <input type="text" name="title" required></p>
        <p>  <label for="image">Image de couverture </label>
            <input type="file" name="image" required></p>
        <p>  <label for="content">Contenu </label>
            <textarea name="content" cols="70" rows="10" required></textarea>
        </p>
        <label for="category">Catégorie</label>
        <select name="category" required>
            <option value="">--Choisissez une catégorie--</option>
            <option value="Vie de l'agence">Vie de l'agence</option>
            <option value="Actualité">Actualités</option>
            <option value="Projets">Projets</option>
        </select>
        <input type="submit" value="Envoyer" name="send">
    </form>
    <?php
    if(isset($_POST['send'])) {
        $news->add($pdo);
    }
    ?>
</section>
</body>

</html>