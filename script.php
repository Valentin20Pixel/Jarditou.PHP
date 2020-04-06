<?php
if ($_POST) {
  $coo = coord();
  $ver = verif();
}
function verif()
{

  if ($_POST) {
    // Je déclare mes RegEx 
    $alpha = "/(^[A-Z]+[A-Za-zéèêâîïëûçŒœæ\-\s]+$)/";
    $adresse = "/(^[0-9]+[A-za-zéèêâîïëûçŒœæ\-\s]+$)|^$/";
    $mail = "/(^[A-Za-z0-9éèêâîïëûçŒœæ\-_\.]+@{1}[a-zéèêâîïëûçŒœæ\-_]+[\.]{1}[a-z]+$)/";
    $date = "/(^[1-2][0-9][0-9][0-9][\-]{1}[0-1][0-9]+[\-]{1}[0-3][0-9]+$)/";
    $code = "/(^([0-9]{5})$)|^$/";
    $alphaN = "/(^[A-Z]+[A-Za-zéèêâîïëûçŒœæ\-\s]+$)|^$/";
    $alphaQ = "/([0-9]+[A-Za-zéèêâîïëûçŒœæ\-\s]+$)/";
    // Je vais chercher mes variables 
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $naiss = $_POST["naissance"];
    $CP = $_POST["code"];
    $adrs = $_POST["adresse"];
    $city = $_POST["ville"];
    $email = $_POST["email"];
    $sujet = $_POST["choix"];
    $question = $_POST["question"];
    // Tableaux des valeurs du formulaire
    $true = [];
    $_SESSION = [];
    // Je verifie que le nom est valide
    if (isset($_POST["nom"])) {
      if (preg_match($alpha, $nom)) {
        $true["nom"] = $nom;
      } else if (empty($nom)) {
        $_SESSION["Errnom"] = "Cette zone est obligatoire.";
      } else {
        $_SESSION["Errnom"] = "Utilisez que des caractères alphabétiques.";
      };
    };
    // Je verifie que le prenom est valide

    if (preg_match($alpha, $prenom)) {
      $true["prenom"] = $prenom;
    } else if (empty($prenom)) {
      $_SESSION["Errprenom"] = "Cette zone est obligatoire.";
    } else {
      $_SESSION["Errprenom"] = "Utilisez que des caractères alphabétiques.";
    };
    // Je verifie que le sexe soit bien selectionner
    if (isset($_POST['sex'])) {
      $true["sex"] = $_POST["sex"];
    } else {
      $_SESSION["Errsex"] = "Cette zone est obligatoire. Selectionnez votre sexe.";
    };
    // Je verifie que la date de naissance est valide
    if (preg_match($date, $naiss)) {
      $true["naissance"] = $naiss;
    } else if (empty($naiss)) {
      $_SESSION["Errnaissance"] = "Cette zone est obligatoire.";
    } else {
      $_SESSION["Errnaissance"] = "Date de naissance non valide.";
    };
    // Je verifie que le code postale est valide
    if (!preg_match($code, $CP)) {
      $_SESSION["Errcode"] = "Utilisez que des caractères numeriques.";
    } else {
      $true["code"] = $CP;
    };
    // Je verifie que l'adresse est valide
    if (!preg_match($adresse, $adrs)) {
      $_SESSION["Erradrs"] = "Adresse incorrect.";
    } else {
      $true["adrs"] = $adrs;
    };
    // Je verifie que la ville est valide
    if (!preg_match($alphaN, $city)) {
      $_SESSION["Errville"] = "Utilisez que des caractères alphabétiques.";
    } else {
      $true["ville"] = $city;
    };
    // Je verifie que le mail est valide
    if (preg_match($mail, $email)) {
      $true["mail"] = $email;
    } else if (empty($email)) {
      $_SESSION["Errmail"] = "Cette zone est obligatoire.";
    } else {
      $_SESSION["Errmail"] = "Adresse mail non valide.";
    };
    // Je verifie que le sujet soit bien selectionner
    if ($sujet == "sujet") {
      $_SESSION["Errsujet"] = "Cette zone est obligatoire. Sélectionnez un sujet.";
    } else {
      $true["sujet"] = $sujet;
    };
    // Je verifie que la zone question est valide
    if (preg_match($alphaQ, $question)) {
      $true["question"] = $question;
    } else if (empty($question)) {
      $_SESSION["Errquestion"] = "Cette zone est obligatoire.";
    } else {
      $_SESSION["Errquestion"] = "Utilisez que des caractères alphanumérique.";
    };
    // Je verifie que le formulaire soit bien coché
    if (!isset($_POST["check"])) {
      $_SESSION["Erraccpt"] = "Cette zone est obligatoire. Cochez pour valider le formulaire.";
    };
    // Je retourne $_SESSION
    return $_SESSION;
};
};

function coord()
{
  //  Cette fonction me sert a recuperer les informations que je pourrais envoyer plutard
  global $vrai, $nom;
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $naiss = $_POST["naissance"];
  $CP = $_POST["code"];
  $adrs = $_POST["adresse"];
  $city = $_POST["ville"];
  $email = $_POST["email"];
  $sujet = $_POST["choix"];
  $question = $_POST["question"];
  $vrai = [];

  if (isset($nom))
    $vrai["nom"] = $nom;

  if (isset($prenom))
    $vrai["prenom"] = $prenom;

  if (isset($sex))
    $vrai["sex"] = $_POST["sex"];

  if (isset($naiss))
    $vrai["naissance"] = $naiss;

  if (isset($CP))
    $vrai["code"] = $CP;

  if (isset($adrs))
    $vrai["adrs"] = $adrs;

  if (isset($city))
    $vrai["ville"] = $city;

  if (isset($email))
    $vrai["mail"] = $email;

  if (isset($sujet))
    $vrai["sujet"] = $sujet;

  if (isset($question))
    $vrai["question"] = $question;

  return $vrai;
};