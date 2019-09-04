<?php require 'assets/config/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/styles.css">
  <title>Baï-Bao - Accès à votre espace perso</title>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon-16x16.png">
    <link rel="manifest" href="../assets/site.webmanifest">
    <link rel="mask-icon" href="../assets/safari-pinned-tab.svg" color="#040028">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#040028">
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