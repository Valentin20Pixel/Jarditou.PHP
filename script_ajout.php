<?php
$ajouts = 1;
$isGood = false;

if (isset($_POST["ajout"])) {

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
  $ajouts = count(verifpro());
};
if ($ajouts == 0) {

  $isGood = true;

  function ajoutpro()
  {
  
    // j'insert les infos recuperer par le formulaire d'ajout dans un tableau $prod
    // avec leurs caracteristique
    $prod = [];
    if (isset($_POST["ID"]))
      $prod["ID"] = $_POST["ID"];
    if (isset($_POST["reference"]))
      $prod["ref"] = $_POST["reference"];
    if (isset($_POST["categorie"]))
      $prod["cat"] = (int) $_POST["categorie"];
    if (isset($_POST["libelle"]))
      $prod["lib"] = $_POST["libelle"];
    if (isset($_POST["description"]))
      $prod["des"] = $_POST["description"];
    if (isset($_POST["prix"]))
      $prod["pri"] = (float) $_POST["prix"];
    if (isset($_POST["stock"]))
      $prod["sto"] = (int) $_POST["stock"];
    if (isset($_POST["couleur"]))
      $prod["cou"] = $_POST["couleur"];
    if (isset($_POST["ajout"]))
      $prod["ajo"] = date("Y-m-d H:i:s");
    if (isset($_POST["modif"]) || empty($_POST["modif"]))
      $prod["mod"] = NULL;
    if (isset($_POST["bloque"]))
      $prod["blo"] = (int) $_POST["bloque"];

    // je prepare une requete que je demanderai d'executer avec les informations recuperer plus haut
    if (verifpro() == null) {
      $db = connexionBase();
      $requete = $db->prepare('INSERT INTO `jdt_produits` (`pro_ref`, `pro_cat_id`, `pro_libelle`, `pro_description`, `pro_prix`, `pro_stock`, `pro_couleur`, `pro_d_ajout`, `pro_d_modif`, `pro_bloque`) VALUES
  (:pro_ref, :pro_cat_id, :pro_libelle, :pro_description, :pro_prix, :pro_stock, :pro_couleur, :pro_d_ajout, :pro_d_modif, :pro_bloque);');
      // $requete->bindValue(":pro_id",$prod["ID"]);
      $requete->bindValue(":pro_ref", $prod["ref"]);
      $requete->bindValue(":pro_cat_id", $prod["cat"]);
      $requete->bindValue(":pro_libelle", $prod["lib"]);
      $requete->bindValue(":pro_description", $prod["des"]);
      $requete->bindValue(":pro_prix", $prod["pri"]);
      $requete->bindValue(":pro_stock", $prod["sto"]);
      $requete->bindValue(":pro_couleur", $prod["cou"]);
      $requete->bindValue(":pro_d_ajout", $prod["ajo"]);
      $requete->bindValue(":pro_d_modif", $prod["mod"]);
      $requete->bindValue(":pro_bloque", $prod["blo"]);
      $result = $requete->execute();
      return $result;
    };
  };
  ajoutpro();
};
