<?php include("header.php"); ?>
<?php

require_once("script.php");

?>
<hr>
<p id="zone">* Ces zones sont obligatoire </p>
<!-- Début du formulaire -->
<form action="#" method="POST">
  <fieldset>
    <legend>Vos coordonnées</legend>
    <div class="form-row">
      <!-- Le nom -->
      <div class="form-group col-md-6">
        <label for="nom"> Votre nom*: </label>
        <input type="text" id="nom" name="nom" class="form-control" value="<?php if (isset($_POST['nom'])) echo $_POST['nom']; ?>">
        <small id="Errnom" class="form-text text-danger"><?php if (isset($_SESSION['Errnom'])) echo $_SESSION['Errnom']; ?></small>
      </div>
      <!-- Le prénom -->
      <div class="form-group col-md-6">
        <label for="prenom"> Votre prénom*: </label>
        <input type="text" name="prenom" class="form-control" id="prenom" value="<?php if (isset($_POST['prenom'])) echo $_POST['prenom']; ?>">
        <small id="Errprenom" class="form-text text-danger "><?php if (isset($_SESSION['Errprenom'])) echo $_SESSION['Errprenom']; ?></small>
      </div>
    </div>
    <!-- Le sexe -->
    <div class="form-row">
      <label class="col-form-label" for="sex">Sexe*:</label>
      <div class="custom-control custom-radio custom-control-inline">
        <input class="custom-control-input" type="radio" name="sex" id="feminin" value="femme" <?php if (isset($_POST['sex']) && $_POST['sex'] == "femme") echo "checked"; ?>>
        <label class="custom-control-label" for="feminin">Féminin</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input class="custom-control-input" type="radio" name="sex" id="masculin" value="homme" <?php if (isset($_POST['sex']) && $_POST['sex'] == "homme") echo "checked"; ?>>
        <label class="custom-control-label" for="masculin">Masculin</label>
      </div>
      <small id="Errsexe" class="form-text text-danger"><?php if (isset($_SESSION['Errsex'])) echo $_SESSION['Errsex']; ?></small>
    </div>
    <!-- La date de naissance -->
    <div class="form-group">
      <label for="naissance"> Date de naissance*: </label>
      <input type="date" id="naissance" name="naissance" class="form-control" value="<?php if (isset($_POST['naissance'])) echo $_POST['naissance']; ?>">
      <small id="Errnaissance" class="form-text text-danger"><?php if (isset($_SESSION['Errnaissance'])) echo $_SESSION['Errnaissance']; ?></small>
    </div>
    <!-- Le code postale -->
    <div class="form-group">
      <label for="code"> Code Postal: </label>
      <input type="text" pattern="^[0-9]+$" id="code" name="code" class="form-control" value="<?php if (isset($_POST['code'])) echo $_POST['code']; ?>">
      <small id="Errcode" class="form-text text-danger"><?php if (isset($_SESSION['Errcode'])) echo $_SESSION['Errcode']; ?></small>
    </div>
    <!-- L'adresse -->
    <div class="form-group">
      <label for="adresse"> Adresse: </label>
      <input type="text" id="adresse" class="form-control" name="adresse" placeholder="123 rue du deve" value="<?php if (isset($_POST['adresse'])) echo $_POST['adresse']; ?>">
      <small id="Erradrs" class="form-text text-danger"><?php if (isset($_SESSION['Erradrs'])) echo $_SESSION['Erradrs']; ?></small>
    </div>
    <!-- La ville -->
    <div class="form-group">
      <label for="ville"> Ville: </label>
      <input type="text" id="ville" name="ville" class="form-control" value="<?php if (isset($_POST['ville'])) echo $_POST['ville']; ?>">
      <small id="Errville" class="form-text text-danger"><?php if (isset($_SESSION['Errville'])) echo $_SESSION['Errville']; ?></small>
    </div>
    <!-- L'email -->
    <div class="form-group">
      <label for="email"> Email*: </label>
      <input type="email" id="mail" class="form-control" name="email" placeholder="dave.loper@afpa.fr" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
      <small id="Errmail" class="form-text text-danger"><?php if (isset($_SESSION['Errmail'])) echo $_SESSION['Errmail']; ?></small>
    </div>
  </fieldset>
  <fieldset>
    <legend>Votre demande</legend>
    <!-- Le sujet -->
    <div class="form-row">
      <label for="choix"> Sujet*: </label>
      <select name="choix" id="choix" class="form-control">
        <option value="sujet" <?php if (isset($_POST['choix']) && $_POST['choix'] == "sujet") echo "selected"; ?>>Sujet</option>
        <option value="commandes" <?php if (isset($_POST['choix']) && $_POST['choix'] == "commandes") echo "selected"; ?>>Mes commandes</option>
        <option value="produit" <?php if (isset($_POST['choix']) && $_POST['choix'] == "produit") echo "selected"; ?>>Question sur un produit</option>
        <option value="reclamation" <?php if (isset($_POST['choix']) && $_POST['choix'] == "reclamation") echo "selected"; ?>>Reclamation</option>
        <option value="autres" <?php if (isset($_POST['choix']) && $_POST['choix'] == "autres") echo "selected"; ?>>Autres</option>
      </select>
      <small id="Errsujet" class="form-text text-danger"><?php if (isset($_SESSION['Errsujet'])) echo $_SESSION['Errsujet']; ?></small>
    </div>
    <!-- La question -->
    <div class="form-group">
      <label for="question"> Votre question*: </label>
      <textarea class="form-control" name="question" id="question" cols="20" rows="3"><?php if (isset($_POST['question'])) echo $_POST['question']; ?></textarea>
      <small id="Errquestion" class="form-text text-danger"><?php if (isset($_SESSION['Errquestion'])) echo $_SESSION['Errquestion']; ?></small>
    </div>
  </fieldset>
  <!-- Check de formulaire -->
  <div class="custom-control custom-checkbox">
    <input class="custom-control-input" name="check" type="checkbox" id="accepte" value="info" <?php if (isset($_POST['check']) && $_POST['check'] == "info") echo "checked"; ?>>
    <label class="custom-control-label" for="accepte">J'accepte le traitement informatique de ce formulaire.*</label>
    <small id="Erraccpt" class="form-text text-danger"><?php if (isset($_SESSION['Erraccpt'])) echo $_SESSION['Erraccpt']; ?></small>
  </div>
  <hr>
  <!-- Les boutons Envoyer et Annuler -->
  <div class="form-group">
    <input type="submit" value="Envoyer" id="Envoyer" class="btn btn-primary" name="Envoyer"></input>
    <button type="reset" value="Annuler" name="annuler" class="btn btn-danger">Annuler</button>
  </div>
</form>
<?php include("footer.php"); ?>