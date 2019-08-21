<?php
try {
  $pdo = new PDO(
    DB_SGBD . ':host=' . DB_HOST . ';dbname=' . DB_DBNAME . ';',
    DB_USER,
    DB_PASS,
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    ]
  );
} catch (Exception $e) {
  die('Erreur de connexion à la base de données: ' . $e->getMessage());
}
