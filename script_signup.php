<?php


function verifsign()
{
  // ce sont mes RegEx pour mot de passe et Identifiant
  $viden = "/(^[0-9A-Za-zéèêâîïëûçŒœæ\_\-]+$)/";
  $vpass = "/(^[0-9A-Za-zéèêâîïëûçŒœæ\&\/\%\@\.\_\-]+$)/";
  if (isset($_POST["confpasswd"])) {
    $iden = $_POST["Identifiant"];
    $pass = $_POST["passwd"];
    $cpas = $_POST["confpasswd"];
  };

  // j'ouvre 2 tableau pour les retournés si besoin 
  $nook = [];
  $ok = [];

  // je commence a verifier l'identifiant rentrer par l'utilisateur
  //  etsi il est correcte par rapport au RegEx
  if (isset($_POST["Identifiant"])) {
    if (preg_match($viden, $iden)) {
      $ok["Identifiant"] = $iden;
    } else if (empty($iden)) {
      $nook["ErrSID"] = "Cette zone est obligatoire.";
    } else {
      $nook["ErrSID"] = "Identifiant incorrect veuillez recommencer.";
    };
  };

  // puis je verifie le mot de passe par rapport au RegEx
  if (isset($_POST["passwd"])) {
    if (preg_match($vpass, $pass)) {
      $ok["passwd"] = $pass;
    } else if (empty($pass)) {
      $nook["ErrSPW"] = "Cette zone est obligatoire.";
    } else {
      $nook["ErrSPW"] = "Mot de passe incorrect veuillez recommencer.";
    };
  };

    // pour finir je verifie le mot de passe a confirmer par rapport au RegEx
    // et si il est semblable au precedent
  if (isset($_POST["confpasswd"])) {
    if (preg_match($vpass, $cpas) && ($cpas == $pass)) {
      $ok["confpasswd"] = $cpas;
    } else if (empty($cpas)) {
      $nook["ErrSCPW"] = "Cette zone est obligatoire.";
    } else {
      $nook["ErrSCPW"] = "Mot de passe incorrect veuillez recommencer.";
    };
  };
  return $nook;
};

if (isset($_POST["confpasswd"]) && empty(verifsign())) {

  function insertuser()
  {
    $user = [];
    if (isset($_POST["Identifiant"]))
      $user["ide"] = $_POST["Identifiant"];
    if (isset($_POST["passwd"]))
      $user["pas"] = $_POST["passwd"];
    if (isset($_POST["confpasswd"]))
      $user["con"] = $_POST["confpasswd"];

    $user["rol"] = 'client';

    if ($user["pas"] == $user["con"]) {
      
      $db = connexionBase();
      $requete = $db->prepare('INSERT INTO `jdt_users` (`login`, `password`, `role`) VALUES (:login, :password, :role)');
      $requete->bindValue(':login', $user["ide"]);
      $requete->bindValue(':password', $user["con"]);
      $requete->bindValue(':role', $user["rol"]);
      $result = $requete->execute();
    };
    return $result;
  };
  insertuser();
  echo '<script>alert("Vous etes enregistré!")</script>';
};
