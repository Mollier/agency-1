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
               <th scope="col">Tutoriel</th>
               <th scope="col">Charte graphique</th>
           </tr>
           </thead>
           <tbody>
           <?php
           foreach ($clients->getAll($pdo) as $client) {?>
               <tr>
                   <th scope="row"><?= $client['id_client'];?></th>
                   <td><a href="clients.php?view=<?= $client['id_client'];?>"><?= $client['name'];?></a></td>
                   <td><?= $client['phone'];?></td>
                   <td><a href="mailto:<?= $client['email']; ?>"><?= $client['email'];?></a></td>
                   <td><a href="#">[TUTORIEL DE <?= $client['name'];?>]</a></td>
                   <td><a href="#">[CHARTE GRAPHIQUE DE <?= $client['name'];?>]</a></td>
               </tr>
           <?php } ?>
           </tbody>
       </table>
       <?php
       if(isset($_GET['add'])) {?>
           <form action="#" method="post">
               <p><label for="name">Nom du client </label>
                   <input type="text" name="name" required></p>
               <p>  <label for="phone">Numéro du client </label>
                   <input type="tel" name="phone" required></p>
               <p>  <label for="email">E-mail du client </label>
                   <input type="email" name="email">
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
               <p><label for="name">Nom du client </label>
                   <input type="text" name="name" value="<?= $clients->getOne($pdo, $_GET['view'])['name']; ?>" required></p>
               <p>  <label for="phone">Numéro du client </label>
                   <input type="tel" name="phone" value="<?= $clients->getOne($pdo, $_GET['view'])['phone']; ?>" required></p>
               <p>  <label for="email">E-mail du client </label>
                   <input type="email" name="email" value="<?= $clients->getOne($pdo, $_GET['view'])['email']; ?>">
               </p>
               <p>  <label for="charte">Charte graphique actuelle</label>
                   <a href="../assets/upload/chartes/<?= $clients->getCharte($pdo, $_GET['view'])['link'];?>" target="_blank"><?= $clients->getCharte($pdo, $_GET['view'])['link'];?></a>
               </p>
               <p>  <label for="charte">Tutoriel actuel</label>
                   <a href="../assets/upload/tutoriels/<?= $clients->getTutoriel($pdo, $_GET['view'])['link'];?>" target="_blank"><?= $clients->getTutoriel($pdo, $_GET['view'])['link'];?></a>
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
               }
               ?>
           </form>
      <?php }
       ?>
   </div>

</section>
</body>

</html>