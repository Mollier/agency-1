<?php
require __DIR__ . '/param.php';

require __DIR__ . '/bdd.php';

require __DIR__ . '/classes/User.php';

$user = new User();


session_start();
