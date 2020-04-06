<?php include "header.php";
require "script_signup.php";
$ver=verifsign();
?>
<div class="row">
  <div class="col-lg-8 col-sm-6">
    <div class="text-danger mt-3">
      <small><strong>* Ces champs sont obligatoire</strong></small>
    </div>
    <form id="FSign" action="" method="POST" class="mt-3">
      <div class="form-group col-10">
        <label for="Identifiant">Entrez un identifiant : *</label>
        <input type="text" name="Identifiant" id="Identifiant" class="form-control form-control-sm" data-toggle="tooltip" data-placement="right" title="Entrez un nom d'utilisateur.">
        <small id="ErrSID" class="form-text text-danger"><?php if (isset($ver['ErrSID'])) echo $ver['ErrSID']; ?></small>
      </div>
      <div class="form-group col-10">
        <label for="passwd">Entrez un mot de passe : *</label>
        <input type="text" name="passwd" id="passwd" class="form-control form-control-sm" data-toggle="tooltip" data-placement="right" title="Entrez une combinaison d'au moins 6 caractères pouvant contenir de la ponctuation (_, ., etc).">
        <small id="ErrSPW" class="form-text text-danger"><?php if (isset($ver['ErrSPW'])) echo $ver['ErrSPW']; ?></small>
      </div>
      <div class="form-group col-10">
        <label for="confpasswd"> Comfirmez le mot de passe : *</label>
        <input type="text" name="confpasswd" id="confpasswd" class="form-control form-control-sm" data-toggle="tooltip" data-placement="right" title="Saisissez à nouveau votre mot de passe pour confirmer.">
        <small id="ErrSCPW" class="form-text text-danger"><?php if (isset($ver['ErrSCPW'])) echo $ver['ErrSCPW']; ?></small>
      </div>
      <button type="submit" class="btn btn-success ml-4 mt-3" id="sign">Valider</button>
  </div>
  </form>


  <div class="col-lg-4 col-sm-6 position-relative">
    <img src="assets/img/landscape_logo.jpg" class="LoGo" alt="Pelle">
    <div class="row justify-content-center">
      <a href="https://www.instagram.com/"><img src="assets/img/insta.png" class="insta mr-2" alt=""></a>
      <a href="https://www.youtube.com/"><img src="assets/img/youtube.png" class="you mr-2" alt=""></a>
      <a href="https://twitter.com/"><img src="assets/img/twitter.png" class="twit ml-2" alt=""></a>
      <a href="https://www.pinterest.fr/lapassionvertepro/"><img src="assets/img/pinterest.png" class="pinte ml-2" alt=""></a>
      <a href="https://www.facebook.com/"><img src="assets/img/facebook.png" class="face ml-2" alt=""></a>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>