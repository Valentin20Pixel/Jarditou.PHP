<?php
function connexionBase()
{
  $login = "root";     // Votre loggin 
  $password = "";    // Le Password 
  // try est la pour tenter la connection a la bases
  try {
    $db = new PDO('mysql:host=' . "localhost" . ';charset=utf8;dbname=' . "jarditou", $login, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    return $db;
    // catch lui et la pour me retourner une erreur si il est impossible de ci connecter
  } catch (Exception $e) {
    echo 'Erreur:' . $e->getMessage() . '<br>';
    echo 'N°:' . $e->getCode() . '<br>';
    die('Connexion au serveur impossible.');
  }
};
