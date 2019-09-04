<?php require 'assets/config/bootstrap.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon-16x16.png">
    <link rel="manifest" href="../assets/site.webmanifest">
    <link rel="mask-icon" href="../assets/safari-pinned-tab.svg" color="#040028">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#040028">
    <title>Baï-Bao - Gestion des clients</title>
</head>
<body>
<?php include('./inc/header.php') ?>
<section class="connected write">
    <?php
    if(isset($_GET['charte'])) {?>
        <h1>Votre charte graphique</h1>
        <embed src=../assets/upload/chartes/<?= $_SESSION['user']['customer_name'];?>.pdf type='application/pdf'/>
        <?php
    }
    if(isset($_GET['tutoriel'])) {?>
        <h1>Votre tutoriel</h1>
        <embed src=../assets/upload/tutoriels/<?= $_SESSION['user']['customer_name'];?>.pdf type='application/pdf'/>
        <?php
    }

    if(isset($_GET['facture'])) {

        ?>
        <h1>Votre facture <?= $_SESSION['user']['customer_name']; ?></h1>
        <div class="container__tab">
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">Facture</th>
                    <th scope="col">Date</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($clients->getFactures($pdo, $_SESSION['user']['customer_name']) as $fact) {?>
                    <tr>
                        <td><a href="../assets/upload/factures/<?= $fact['facture'];?>" target="_blank"><?= $fact['facture'];?></a></td>
                        <td><?= $fact['date'];?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
        $alert->showAlert();
    } ?>
</section>
</body>

</html>