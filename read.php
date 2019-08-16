<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Baï-Bao - Notre équipe</title>
  <link rel="stylesheet" href="./css/basic/style.css">
  <script defer src="./js/app.js"></script>
</head>

<body>
  <header>
    <?php include('./inc/header.php') ?>
    <div class="header_secondary header_secondary--team">
      <h1>titre de l'article</h1>
      <div class="round_middle"></div>
      <div class="round__turquoise">

      </div>
  </header>
  <section>

    <div class="news news--read">
      <div class="news_container">
        <div class="news_item news_item--dark">
          <div class="header_new">
            <img src="./assets/article.png" alt="new">
          </div>
          <p class="intro">
            Début 2018, Google a présenté une mise à jour de son algorithme Speed Update destinée à pénaliser les sites jugés trop lents sur mobile. Devenue effective sur toute la toile en juillet 2018, il convient de relativiser la portée de cette initiative de Google sur les sites les moins performants
            en la matière.
          </p>
          <h4>
            Seules les pages les plus lentes sont sanctionnées
          </h4>
          <p>
            Contrairement à ce qui a été écrit ici ou là, les sites ne sont pas classés par Google en fonction de leur temps de chargement. Seuls les sites dont les performances sont vraiment mauvaises* s’attirent les foudres de l’algorithme. Google lui-même confirme d’ailleurs qu’un petit nombre de requêtes s’en trouvera affecté, avec un très faible pourcentage des sites indexés sur ce moteur de recherche.

            Et le géant de la Silicon Valley en profite pour rappeler que la pertinence d’un résultat par rapport à une requête reste le critère dominant. Ainsi, une page lente pourra ainsi être mieux classée qu’une page rapide si son contenu est meilleur ou tout simplement mieux adapté à l’attente de l’utilisateur.

            Pour tester en conditions réelles la vitesse de votre site et éviter d’être sanctionné par Speed Update, Google propose Lighthouse et PageSpeed Insights, qui se fonde désormais sur le rapport UX de Chrome.
            Et si vous souhaitez un diagnostic suivi d’une préconisation pour optimiser sa vitesse, n’hésitez pas à contacter l’agence.

            * au point de poser problème vis-à-vis des internautes sans même que Google s’y intéresse, car nous sommes tous pareils : inconsciemment, nous ne tolérons pas d’attendre 3 ou 4 secondes l’arrivée d’une page sur le web, encore plus depuis un téléphone mobile, et nous zappons très rapidement.
          </p>
          <div class="share share--dark">
            <img src="./assets/twitter.svg" alt="twitter">
            <img src="./assets/fb.svg" alt="fb">
            <span class="date date--dark">
              posté le 23 janvier 2019
            </span>
          </div>
        </div>
      </div>
    </div>

  </section>
  <?php include('./inc/footer.php') ?>
</body>

</html>