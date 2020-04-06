<?php include "header.php"; 

$result = false;

if (isset($_POST["submit"])) {

  $nomtype = array('image/gif', 'image/jpg', 'image/jpeg', 'image/png', 'image/x-png');
  $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
  $surnomtype = finfo_file($fileinfo, $_FILES['file']['tmp_name']);
  finfo_close($fileinfo);

  if (in_array($surnomtype, $nomtype)) {
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $dirIMG = 'assets/img/';
    $_FILES['file']['name'] = $_GET["pro_id"];
    $upload_file = $dirIMG . $_FILES['file']['name'] . '.' . $extension;
    chmod($_FILES['file']['tmp_name'], 0750);
    move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
    $result = true;

    echo '
    <form class="circle">
    <div class="outer-circle">
    <a href="liste.php" id="check"></a>
      <div class="inner-circle">  
      </div>
      <span id="un"></span>
      <span id="deux"></span>
      <span id="trois"></span>
      <span id="quatre"></span>
    </div>
  </form>
  ';
  } else {

    echo "<h4>Fichier non autorisé</h4>";
  };
} else { ?>

  <form action="#" method="POST" enctype="multipart/form-data">

    <fieldset>
      <legend>Upload de fichier</legend>

      <div class="row">
        <label class="col-12" for="file">Sélectionnez un ficher</label>
      </div>
      <div class="row">
        <input type="file" class="btn btn-warning" name="file" id="file" placeholder="Sélectionnez">
      </div>
      <div class="row justify-content-center">
        <img id="prevu" src="http://placehold.it" alt="" />
      </div>

      <div class="mt-3">
        <input type="submit" class="btn btn-danger" name="submit" id="submit" value="Envoyer">
        <a href="liste.php" class="btn btn-secondary">Retour</a>
      </div>

    </fieldset>

  </form>
<?php };

if (isset($_GET["pro_id"]) && $result) {

  $pro_id = $_GET["pro_id"];
  $pro_photo = $extension;
  $db = connexionBase();
  $requete = $db->prepare('UPDATE `jdt_produits` SET pro_photo=:pro_photo WHERE pro_id=:pro_id');
  $requete->bindValue(":pro_id", $pro_id);
  $requete->bindValue(":pro_photo", $pro_photo);
  $result = $requete->execute();
} else {

  $pro_id = 0;
}; ?>

<?php include "footer.php"; ?>