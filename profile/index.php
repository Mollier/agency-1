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
    <div class="back">
        <a href="../index.php">
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
        </a>
    </div>

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