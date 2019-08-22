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
      <h1>actualités</h1>
      <div class="round_middle"></div>
      <div class="round__turquoise">

      </div>
  </header>
  <section>

    <div class="news_filter">
      <form action="#" method="post">
        <input type="text" name="search" placeholder="rechercher">
      </form>
      <span>Filtres</span>
      <div class="filters_clef">
        <div class="button">Vie de l’agence</div>
        <div class="button">Actualités</div>
        <div class="button">Projets</div>
      </div>
    </div>
    <div class="news">
      <h1>DERNIÈRES ACTUALITÉS</h1>
      <div class="news_container">
      <?php
      foreach ($news->getAll($pdo) as $new) {?>
          <div class="news_item">
              <div class="header_new">
                  <a href="read.php?id=<?= $new['id_news']; ?>"><img src="./assets/upload/news/<?= $new['image'] ?>" alt="new"></a>
              </div>
              <h3><?= $new['title'] ?></h3>
              <p><?= substr($new['content'], 0, 20) ?></p>
              <div class="share">
                  <img src="./assets/twitter.svg" alt="twitter">
                  <img src="./assets/fb.svg" alt="fb">
                  <span class="date">
              posté le <?= $new['date'] ?>
            </span>
              </div>
          </div>
     <?php }
      ?>


      </div>
    </div>

  </section>
  <?php include('./inc/footer.php') ?>
</body>

</html>