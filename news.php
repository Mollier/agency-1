
    <?php include('./inc/header.php') ?>
    <div class="header_secondary header_secondary--team">
      <h1>actualités</h1>
      <div class="round_middle"></div>
      <div class="round__turquoise">

      </div>
    </div>
  </header>
  <section>
    <div class="news_filter">
      <form action="#news" method="post">
        <input type="text" name="search" placeholder="rechercher" value="<?= $_POST['search']?>">
          <?php
          if(isset($_POST['search'])) {
              $post = strip_tags(trim(addslashes($_POST['search'])));
              echo  "<p class='paragraph'>" . $news->count($pdo, $post)['nb'] . ' news trouvées pour : ' . $_POST['search'] ."</p>";
          }
          ?>
      </form>

      <span>Filtres</span>
      <div class="filters_clef">
          <a href="news.php#news"> <div id="all" class="button">Toutes</div></a>
          <a href="news.php?filter=Agence&#news"><div id="Agence" class="button">Vie de l’agence</div></a>
          <a href="news.php?filter=Actualites&#news"><div id="Actualites" class="button">Actualités</div></a>
          <a href="news.php?filter=Projets&#news"> <div id="Projets" class="button">Projets</div></a>

      </div>
    </div>
    <div class="news" id="news">
      <h1>DERNIÈRES ACTUALITÉS</h1>
      <div class="news_container">
      <?php
     if(isset($_GET['filter'])) {
         foreach ($news->filter($pdo, $_GET['filter']) as $new) {?>
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
              posté le <?= $new['date']; ?>
            </span>
                 </div>
             </div>
         <?php }
     }

     else if(isset($_POST['search'])) {
         $post = strip_tags(trim(addslashes($_POST['search'])));

              foreach ($news->search($pdo, $post) as $new) {
                  ?>
                  <div class="news_item">
                      <div class="header_new">
                          <a href="read.php?id=<?= $new['id_news']; ?>"><img
                                      src="./assets/upload/news/<?= $new['image'] ?>" alt="new"></a>
                      </div>
                      <h3><?= $new['title'] ?></h3>
                      <p><?= substr($new['content'], 0, 20) ?></p>
                      <div class="share">
                          <img src="./assets/twitter.svg" alt="twitter">
                          <img src="./assets/fb.svg" alt="fb">
                          <span class="date">
              posté le <?= $new['date']; ?>
            </span>
                      </div>
                  </div>
              <?php }
     }
     else {
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
     }


      ?>


      </div>
    </div>

  </section>
  <?php include('./inc/footer.php') ?>
