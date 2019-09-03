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

<?php
if(isset($_SESSION['user'])) {
    header('Location: connect.php');
} else {
?>


  <section class="selection">
    <div class="selection__item">
      <span class="selection_i-am">Je suis</span>
      <h3><a href="connect.php">UN CLIENT</a></h3>
      <p class="selection_intro">Coactique aliquotiens persequendos scandere clivos sublimes</p>
    </div>
    <div class="round"></div>
    <div class="selection__item"><span class="selection_i-am">Je suis</span>
      <h3><a href="connect.php">UN BAÏ-BAO</a></h3>
      <p class="selection_intro">Coactique aliquotiens persequendos scandere clivos sublimes</p>
    </div>
   <?php $alert->showAlert(); ?>
  </section>
</body>

</html>

<?php } ?>