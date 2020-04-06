<!DOCTYPE html>
<html lang="fr">
<!-- Bon voici mon header qui me sert aussi de page de connexion -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Jarditou</title>

  <link rel="stylesheet" href="assets/CSS/css.css">
  <link rel="stylesheet" href="assets/CSS/csscircle.css">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather|Nosifer|Rock+Salt&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<?php
require "script_connexion.php";
// je pose mes conditions pour l'affichage des informations et liens vers d'autre page
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
  $admin = true;
  $user = false;
} else if (isset($_SESSION['role']) && $_SESSION['role'] == "user") {
  $admin = false;
  $user = true;
} else {
  $admin = false;
  $user = false;
};
if ($admin || $user) {
$login = $_POST["login"];
$db = connexionBase();
$requete = $db->prepare('SELECT * FROM `jdt_users` WHERE `jdt_users`.`login`=:login');
$requete->bindValue(":login", $login);
$requete->execute();
$resultat = $requete->fetch(PDO::FETCH_OBJ);
$reslogin = $resultat->login;
};
?>

<body class="bg">
  <div class="container-md bg_container">
    <!-- Navbar -->
    <header>
      <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><img src="assets/img/jarditou_logo2.png" alt="" title="Logo Jarditou" id="Logo" height="70" class="d-inline-block align-top">2.0</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse <?php if (!$admin || !$user) echo 'row justify-content-end mr-1' ?>" id="navbarSupportedContent">
          <?php if ($admin || $user) { ?>
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="formulaire.php">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="liste.php">Liste</a>
              </li>
            </ul>
            <span class="navbar-text">
              Vous êtes connecté, Félicitation  <?= $reslogin ?>!
            </span>
            </li>
            </ul>
            <a href="signup.php"></a>
          <?php };
          if ($user || $admin) { ?>
            <!-- Ceci est mon bouton de deconnexion -->
            <form method="POST" action="">
              <button class="btn btn-danger position-relative" name="deconnexion" id="deconnexion" type="submit" value="deconnexion">
                Déconnexion
              </button>
            </form>
          <?php } else { ?>
            <div class="">
              <!-- et celui la mon bouton de qui permet de d'ouvrir un effondrer pour la connexion au site  -->
              <span class="navbar-text">
                Connectez vous !
              </span>
              <button class="btn btn-danger position-relative" id="btnco" name="formconn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Connexion
              </button>
            </div>
          <?php }; ?>
        </div>
      </nav>
      <!-- Voici mon formulaire de connxion au site qui determinera avec une autre page PHP qu'elle est leurs roles -->
      <form action="" method="POST">
        <div class="collapse" id="collapseExample">
          <div class="card card-body bg-dark">
            <div class="form-row">
              <div class="form-group col-6">
                <label for="login"> Identifiant :</label>
                <input type="text" id="login" name="login" class="form-control" value="">
                <small id="ErrID" class="form-text text-danger"><?php if (isset($nook['ErrID'])) echo $nook['ErrID']; ?></small>
              </div>
              <div class="form-group col-6">
                <label for="password">Mot de passe :</label>
                <input type="text" id="password" name="password" class="form-control" value="">
                <small id="Errpassword" class="form-text text-danger"><?php if (isset($nook['Errpassword'])) echo $nook['Errpassword']; ?></small>
              </div>
            </div>
            <input type="submit" id="connexion" name="connexion" class="btn btn-success" value="connecter">
            <a href="signup.php" class="btn btn-warning mt-2">S'incrire</a>
          </div>
        </div>
      </form>
      <a href="tableau.php"><?php if (!$admin) echo ' <img src="assets/img/promotion.jpg" alt="Promo" class="w-100 rounded">' ?></a>
    </header>