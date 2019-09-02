<?php require './profile/assets/config/bootstrap.php'; ?>
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
    <div class="header_secondary header_secondary--team header_secondary--contact">
      <h1>contactez-nous</h1>
      <div class="round"></div>
      <div class="round_middle"></div>
      <div class="round__turquoise"></div>

      <div class="contact_bloc">
        <form action="#" method="post">

          <input type="text" name="name" placeholder="Nom">

          <input type="text" name="mail" placeholder="Mail">


          <input type="text" name="object" placeholder="Objet">

          <textarea name="message" cols="30" rows="10" placeholder="Votre message"></textarea>


          <input type="submit" value="envoyer" name="send">
        </form>
          <?php if(isset($_POST['send'])) {
              $mail->sendMail();
          }?>

      </div>
  </header>
  <section>
    <div class="contact">

    </div>


  </section>
  <?php include('./inc/footer.php') ?>
</body>

</html>