<?php 
$pdo = new PDO('mysql:host=localhost;dbname=site-photo', 'root', '');

//$pdo = new PDO('mysql:host=localhost;dbname=site-photo', 'VotreIdentifiant', 'VotrePassword');
$pdo->exec('SET NAMES UTF8');

if(session_status() == PHP_SESSION_NONE) {
    // Démarrage du module PHP de gestion des sessions.
  session_start();
}
    