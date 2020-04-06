<?php

$modif = count(verifpro());
$isGood = false;


function verifpro()
{
  // Je déclare mes RegEx 
  $vref = "/^[0-9A-Za-z\-]+$/";
  $vnum = "/(^[0-9]+$)/";
  $vdes = "/(^[0-9A-Za-zéèêâîïëûçŒœæ\.\,\-\s]+$)/";
  $vpri = "/(^[0-9]+(\.[0-9]{1,2})?$)/";
  // Je recupere mes variables 
  $ref = $_POST["reference"];
  $cat = $_POST["categorie"];
  $lib = $_POST["libelle"];
  $des = $_POST["description"];
  $pri = $_POST["prix"];
  $sto = $_POST["stock"];
  $cou = $_POST["couleur"];
  // Tableaux des valeurs bonne ou mauvaise
  $bon = [];
  $mau = [];

  if (isset($_POST["reference"])) {
    if (preg_match($vref, $ref)) {
      $bon["ref"] = $ref;
    } else if (empty($ref)) {
      $mau["Errref"] = "Cette zone est obligatoire.";
    } else {
      $mau["Errref"] = "Utilisez que des caractères alphabétiques en majuscule.";
    };
  };

  if (isset($_POST["categorie"])) {
    if (preg_match($vnum, $cat)) {
      $bon["cat"] = $cat;
    } else if (empty($cat)) {
      $mau["Errcat"] = "Cette zone est obligatoire.";
    } else {
      $mau["Errcat"] = "Utilisez que des caractères numériques.";
    };
  };

  if (isset($_POST["libelle"])) {
    if (preg_match($vdes, $lib)) {
      $bon["lib"] = $lib;
    } else if (empty($lib)) {
      $mau["Errlib"] = "Cette zone est obligatoire.";
    } else {
      $mau["Errlib"] = "Utilisez que des caractères alphabétiques.";
    };
  };

  if (isset($_POST["description"])) {
    if (preg_match($vdes, $des)) {
      $bon["des"] = $des;
    } else if (empty($des)) {
      $mau["Errdes"] = "Cette zone est obligatoire.";
    } else {
      $mau["Errdes"] = "Utilisez que des caractères alphabétiques.";
    };
  };

  if (isset($_POST["prix"])) {
    if (preg_match($vpri, $pri)) {
      $bon["pri"] = $pri;
    } else if (empty($pri)) {
      $mau["Errpri"] = "Cette zone est obligatoire.";
    } else {
      $mau["Errpri"] = "Utilisez que des caractères alphabétiques.";
    };
  };

  if (isset($_POST["stock"])) {
    if (preg_match($vnum, $sto)) {
      $bon["sto"] = $sto;
    } else if (empty($sto)) {
      $mau["Errsto"] = "Cette zone est obligatoire.";
    } else {
      $mau["Errsto"] = "Utilisez que des caractères numériques.";
    };
  };

  if (isset($_POST["couleur"])) {
    if (preg_match($vdes, $cou)) {
      $bon["cou"] = $cou;
    } else if (empty($cou)) {
      $mau["Errcou"] = "Cette zone est obligatoire.";
    } else {
      $mau["Errcou"] = "Utilisez que des caractères alphabétiques.";
    };
  };
  // Je retourne les erreurs car elles seront utiles pour savoir si tout les champs sont bon
  return $mau;
};

if ($modif == 0) {

  $isGood = true;
  function modif()
  {
    // j'insert les infos recuperer par le formulaire de modif dans un tableau $modif
    // avec leurs caracteristique
    $modif = [];
    if (isset($_POST["ID"]))
      $modif["ID"] = (int) $_POST["ID"];
    if (isset($_POST["reference"]))
      $modif["ref"] = $_POST["reference"];
    if (isset($_POST["categorie"]))
      $modif["cat"] = (int) $_POST["categorie"];
    if (isset($_POST["libelle"]))
      $modif["lib"] = $_POST["libelle"];
    if (isset($_POST["description"]))
      $modif["des"] = $_POST["description"];
    if (isset($_POST["prix"]))
      $modif["pri"] = (float) $_POST["prix"];
    if (isset($_POST["stock"]))
      $modif["sto"] = (int) $_POST["stock"];
    if (isset($_POST["couleur"]))
      $modif["cou"] = $_POST["couleur"];
    if (isset($_POST["modif"]) || empty($_POST["modif"]))
      $modif["mod"] = date("Y-m-d H:i:s");
    if (isset($_POST["bloque"]))
      $modif["blq"] = $_POST["bloque"];
    var_dump($_POST["bloque"]);
    // je prepare une requete que je demanderai d'executer avec les informations recuperer plus haut


    $db = connexionBase();
    $requete = $db->prepare('UPDATE `jdt_produits` SET pro_ref=:pro_ref, pro_cat_id=:pro_cat_id, pro_libelle=:pro_libelle, pro_description=:pro_description, pro_prix=:pro_prix, pro_stock=:pro_stock, pro_couleur=:pro_couleur, pro_d_modif=:pro_d_modif, pro_bloque=:pro_bloque WHERE `jdt_produits`.pro_id=:pro_id');
    $requete->bindValue(":pro_id", $modif["ID"]);
    $requete->bindValue(":pro_ref", $modif["ref"]);
    $requete->bindValue(":pro_cat_id", $modif["cat"]);
    $requete->bindValue(":pro_libelle", $modif["lib"]);
    $requete->bindValue(":pro_description", $modif["des"]);
    $requete->bindValue(":pro_prix", $modif["pri"]);
    $requete->bindValue(":pro_stock", $modif["sto"]);
    $requete->bindValue(":pro_couleur", $modif["cou"]);
    $requete->bindValue(":pro_d_modif", $modif["mod"]);
    $requete->bindValue(":pro_bloque", $modif["blq"]);
    $requete->execute();
    return $modif;
  };
  modif();
};
