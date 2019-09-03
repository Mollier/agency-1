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
    require('inc/connected.php');
} else {
    require('inc/form_connect.php');
}
?>
</body>

</html>