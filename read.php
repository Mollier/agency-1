<?php require './profile/assets/config/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Baï-Bao - Actualités</title>
  <link rel="stylesheet" href="./css/basic/style.css">
  <script defer src="./js/app.js"></script>
</head>

<body>


        <header>
            <?php include('./inc/header.php') ?>
            <div class="header_secondary header_secondary--team">
                <h1><?= $news->getOne($pdo, $_GET['id'])['title']; ?></h1>
                <div class="round_middle"></div>
                <div class="round__turquoise">
                </div>
        </header>
        <section>

            <div class="news news--read">
                <div class="news_container">
                    <div class="news_item news_item--dark">
                        <div class="header_new">
                            <a href="read.php"> <img src="./assets/upload/news/<?= $news->getOne($pdo, $_GET['id'])['image'];?>" alt="new"></a>
                        </div>
                        <p class="intro">
                            Début 2018, Google a présenté une mise à jour de son algorithme Speed Update destinée à pénaliser les sites jugés trop lents sur mobile. Devenue effective sur toute la toile en juillet 2018, il convient de relativiser la portée de cette initiative de Google sur les sites les moins performants
                            en la matière.
                        </p>

                        <p>
                            <?= $news->getOne($pdo, $_GET['id'])['content'];?>
                        </p>
                        <div class="share share--dark">
                            <img src="./assets/twitter.svg" alt="twitter">
                            <img src="./assets/fb.svg" alt="fb">
                            <span class="date date--dark">
              posté le <?= $news->getOne($pdo, $_GET['id'])['date'] ?>
            </span>
                        </div>
                    </div>
                </div>
            </div>

        </section>


  <?php include('./inc/footer.php') ?>
</body>

</html>