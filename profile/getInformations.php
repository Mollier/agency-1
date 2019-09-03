<?php require 'assets/config/bootstrap.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Baï-Bao - Ajout d'un réalisation</title>
</head>
<body>
<?php include('./inc/header.php') ?>

<section class="connected write">
    <h1>Vos identifiants</h1>

    <?php
        if(isset($_GET['getIdentifiants'])) {
            if (isset($_SESSION['user'])) {


                ?>

                <p>Identifiant : <?= $clients->getIdentifiants($pdo, $_SESSION['user']['customer_name'])['email_admin'] ?></p>
                <hr>
                <p>Mot de passe : <?= $clients->getIdentifiants($pdo, $_SESSION['user']['customer_name'])['password_admin'] ?></p>
                <?php
            } else {
                header("Location :  ../index.php");
            }

        }
    $alert->showAlert();
    ?>
</section>
</body>

</html>