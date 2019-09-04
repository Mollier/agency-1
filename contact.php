<?php include('./inc/header.php') ?>
    <div class="header_secondary header_secondary--team header_secondary--contact">
      <h1>contactez-nous</h1>
      <div class="round"></div>
      <div class="round_middle"></div>
      <div class="round__turquoise"></div>

      <div class="contact_bloc">
        <form action="#" method="post">

          <input type="text" name="name" placeholder="Nom" required>

          <input type="text" name="mail" placeholder="Mail" required>


          <input type="text" name="object" placeholder="Objet" required>

          <textarea name="message" cols="30" rows="10" placeholder="Votre message" required></textarea>


          <input type="submit" value="envoyer" name="send">
        </form>
          <?php if(isset($_POST['send'])) {
              $mail->sendMail();
              $mail->message->showAlert();
          }?>

      </div>
    </div>
  </header>
  <section>
    <div class="contact">

    </div>


  </section>
  <?php include('./inc/footer.php') ?>
