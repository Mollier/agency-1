<?php require 'assets/config/bootstrap.php';
if($_SESSION['user']['rights'] != 10) {
    header('Location: index.php');
}
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
    <h1>Gestion des clients</h1>
    <a href="clients.php?add">Ajouter un client</a> <br>
   <div class="container__tab">

       <table class="table table-striped table-dark">
           <thead>
           <tr>
               <th scope="col">#</th>
               <th scope="col">Nom du client</th>
               <th scope="col">Numéro de téléphone</th>
               <th scope="col">E-mail</th>
           </tr>
           </thead>
           <tbody>
           <?php
           foreach ($clients->getAll($pdo) as $client) {?>
               <tr>
                   <th scope="row"><?= $client['id_client'];?></th>
                   <td><a href="clients.php?view=<?= $client['id_client'];?>"><?= $client['customer_name'];?></a></td>
                   <td><?= $client['phone'];?></td>
                   <td><a href="mailto:<?= $client['email']; ?>"><?= $client['email'];?></a></td>
               </tr>
           <?php } ?>
           </tbody>
       </table>
       <?php
       if(isset($_GET['add'])) {?>
           <form action="#" method="post">
               <p><label for="first_name">Prénom</label>
                   <input type="text" name="first_name" required></p>

               <p><label for="last_name">Nom</label>
                   <input type="text" name="last_name" required></p>

               <p><label for="password">Mot de passe</label>
                   <input type="text" name="password" required></p>

               <p><label for="customer_name">Nom du client (entreprise)</label>
                   <input type="text" name="customer_name" required></p>

               <p>  <label for="phone">Numéro du client </label>
                   <input type="tel" name="phone" required></p>

               <p>  <label for="email">E-mail du client </label>
                   <input type="email" name="email">
               </p>

               <p>  <label for="email_admin">Identifiant site client</label>
                   <input type="email" name="email_admin">
               </p>
               <p>  <label for="password_admin">Mot de passe site client</label>
                   <input type="text" name="password_admin" id="password_admin">
               </p>
               <input type="submit" value="Ajouter le client" name="send">
               <?php
               if(isset($_POST['send'])) {
                   $clients->add($pdo);
               }?>
           </form>
      <?php
       }

       if(isset($_GET['view']) AND is_numeric($_GET['view'])) {
           ?>
           <form action="#" method="post" enctype="multipart/form-data">
               <p><label for="customer_name">Nom du client </label>
                   <input type="text" name="customer_name" value="<?= $clients->getOne($pdo, $_GET['view'])['customer_name']; ?>" required></p>
               <p>  <label for="phone">Numéro du client </label>
                   <input type="tel" name="phone" value="<?= $clients->getOne($pdo, $_GET['view'])['phone']; ?>" required></p>
               <p>  <label for="email">E-mail du client </label>
                   <input type="email" name="email" value="<?= $clients->getOne($pdo, $_GET['view'])['email']; ?>">
               </p>
               <p>  <label for="email_admin">Identifiant</label>
                   <input type="email" name="email_admin" value="<?= $clients->getOne($pdo, $_GET['view'])['email_admin']; ?>">
               </p>
               <p>  <label for="password_admin">Mot de passe</label>
                   <input type="text" name="password_admin" value="<?= $clients->getOne($pdo, $_GET['view'])['password_admin']; ?>">
               </p>
               <p>  <label for="charte">Charte graphique actuelle</label>
                   <a href="../assets/upload/chartes/<?= $clients->getCharte($pdo, $_GET['view'])['link'];?>" target="_blank">[VOIR]</a>
               </p>

               <p>  <label for="tutoriel">Tutoriel actuel</label>
                       <a href="../assets/upload/tutoriels/<?= $clients->getTutoriel($pdo, $_GET['view'])['link'];?>" target="_blank">[VOIR]</a>
               </p>

               <br>
               <p>  <label for="charte_file">Changer la charte graphique</label></p>
                   <input type="file" name="charte_file"">

               <p>  <label for="charte_file">Changer le tutoriel</label></p>
               <input type="file" name="tutoriel"">

               <input type="submit" value="Modifier le client" name="send">
               <?php
               if(isset($_POST['send'])) {
                  $clients->update($pdo, $_GET['view']);
                   $clients->uploadCharte($pdo, $_GET['view']);
                   $clients->uploadTutoriel($pdo, $_GET['view']);
               }
               ?>
           </form>
      <?php }
       ?>
   </div>

</section>
</body>

</html>