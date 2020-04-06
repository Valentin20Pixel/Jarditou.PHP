<?php
require_once "connexion_bdd.php";
// Je démarre une nouvelle session
session_start();


$connexion = false;

if (isset($_POST["deconnexion"])) {
  $_SESSION["role"] = "";
  $connexion = false;
  header("location:index.php");
};
if (isset($_POST["connexion"])) {
  // fonction de verification de connexion 
  function verifconn()
  {
    // ce sont mes RegEx pour mot de passe et Identifiant
    $viden = "/(^[0-9A-Za-zéèêâîïëûçŒœæ\_\-]+$)/";
    $vpass = "/(^[0-9A-Za-zéèêâîïëûçŒœæ\.\_\-]+$)/";
    $iden = null;
    if (isset($_POST["login"])) {
      $iden = $_POST["login"];
      $pass = $_POST["password"];
    };
    // j'ouvre 2 tableau pour les retournés si besoin 
    $nook = [];
    $ok = [];
    // je commence a verifier l'identifiant rentrer par l'utilisateur
    // si il est correcte par rapport au RegEx
    if (isset($_POST["login"])) {
      if (preg_match($viden, $iden)) {
        $ok["login"] = $iden;
      } else if (empty($iden)) {
        $nook["ErrID"] = "Cette zone est obligatoire.";
      } else {
        $nook["ErrID"] = "Identifiant incorrect veuillez recommencer.";
      };
    };
    // puis je verifie le mot de passe par rapport au RegEx
    if (isset($_POST["password"])) {
      if (preg_match($vpass, $pass)) {
        $ok["password"] = $pass;
      } else if (empty($pass)) {
        $nook["Errpassword"] = "Cette zone est obligatoire.";
      } else {
        $nook["Errpassword"] = "Mot de passe incorrect veuillez recommencer.";
      };
    };
    //  je retourne mon tableau d'erreurs pour pouvoir controler si la connexion est possible
    return $nook;
  };
  verifconn();
  if(count(verifconn())==0){
  $connexion = true;
  };
};


// Je fais en sorte que chaque utilisateur est son propre role en verifiant dans ma base de donnée

if ($connexion == true) {
  if ($_SESSION["role"]=="") {
  function connection()
  {
    // Je me connecte a la base de donnée
    $login = (string) $_POST["login"];
    $db = connexionBase();
    // Je fais une requete pour recuperer les informations de ma table users 
    $requete = $db->prepare('SELECT * FROM `jdt_users` WHERE `jdt_users`.`login`=:login');
    $requete->bindValue(":login", $login);
    $requete->execute();
    $reslog = $requete->fetch(PDO::FETCH_OBJ);
    // j'attribut une variable a chaque OBJ de ma table
    $reslogi = $reslog->login;
    $respass = $reslog->password;
    $resrole = $reslog->role;
    //  J'attribut a une variable golable $_SESSION un role pour pouvoir gerer mes autres pages PHP
    if ($resrole == "admin" && $respass == $_POST["password"]) {
      $_SESSION["role"] = "admin";
      echo '<script>alert("Vous etes connecté!")</script>';
    } else if ($resrole == "client" && $respass == $_POST["password"]) {
      $_SESSION["role"] = "user";
      echo '<script>alert("Vous etes connecté!")</script>';
    };
    return $reslogi;
  };
  connection();
  $connecter=true;
};
};