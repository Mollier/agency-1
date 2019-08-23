<?php
require __DIR__ . '/param.php';

require __DIR__ . '/bdd.php';

require __DIR__ . '/classes/User.php';
require __DIR__ . '/classes/News.php';
require __DIR__ . '/classes/Realisations.php';
require __DIR__ . '/classes/Clients.php';

$user = new User();
$news = new News();
$realisations = new Realisations();
$clients = new Clients();


session_start();

if(isset($_SESSION['user'])) {
    if(isset($_GET['disconnect'])) {
        $user->disconnect();
    }



}
