<?php
require __DIR__ . '/param.php';

require __DIR__ . '/bdd.php';

require __DIR__ . '/classes/User.php';
require __DIR__ . '/classes/News.php';
require __DIR__ . '/classes/Realisations.php';
require __DIR__ . '/classes/Clients.php';
require __DIR__ . '/classes/Mail.php';
require __DIR__ . '/classes/Alert.php';

$user = new User();
$news = new News();
$realisations = new Realisations();
$clients = new Clients();
$mail = new Mail();
$alert = new Alert();

session_start();

if(isset($_SESSION['user'])) {
    if(isset($_GET['disconnect'])) {
        $user->disconnect();
    }



}
