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

    <title>Baï-Bao - Gestion des clients</title>
</head>
<body>
<?php include('./inc/header.php') ?>
<section class="connected write">
<?php $clients->generateDocument()?>

</section>
</body>

</html>