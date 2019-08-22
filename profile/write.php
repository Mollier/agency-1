<?php require 'assets/config/bootstrap.php'; ?>
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
<header class="header__connected">
    <div class="disconnect">
        <a href="connect.php?disconnect"> <svg id="Calque_2" data-name="Calque 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10.15 12"><defs><style>.cls-3{fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;}  .cls-4{fill:#fff;fill-rule:evenodd;}</style></defs><title>Sans titre - 1</title><line class="cls-3" x1="5.12" y1="0.5" x2="5.12" y2="6.88"/><path class="cls-4" d="M13.61,370.78a5.07,5.07,0,1,0,3,.07v1.07a4.08,4.08,0,1,1-3-.09Z" transform="translate(-9.92 -368.74)"/></svg>
        </a>
    </div>
    <div class="header__logo">
        <a href="../index.php">
            <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 61.08 89.53">
                <defs>
                </defs>
                <title>Logo</title>
                <g id="Calque_1-2" data-name="Calque 1-2">
                    <path class="cls-1" d="M0,7.12a7.12,7.12,0,1,1,7.12,7.12A7.12,7.12,0,0,1,0,7.12ZM27.38,31.8V89C15.67,87,6.88,78.83,6.67,65.82h0V21H27.38Zm.2-17.56A7.12,7.12,0,1,1,34.7,7.12a7.12,7.12,0,0,1-7.12,7.12Zm6.87,75.29H33.33V71.81a5.25,5.25,0,0,0,.79.06,6.67,6.67,0,0,0,0-13.31,5.25,5.25,0,0,0-.79.06V41.18h1.12c14.71,0,26.63,8.81,26.63,24.19S49.16,89.53,34.45,89.53Z" transform="translate(0 0)" />
                </g>
            </svg></a>
    </div>
    <p class="bold">Bienvenue</p>
    <div class="line"></div>
    <p class="username"><?= $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name'] . " (" . $_SESSION['user']['customer_name'] . ")";?></p>

</header>
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