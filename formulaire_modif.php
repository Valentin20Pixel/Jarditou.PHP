<?php include("header.php");

require "script_modif.php";
// Je vais rechercher les infos de la table CATEGORIE
$db = connexionBase();
$requete1 = "SELECT * FROM jdt_categories ORDER BY cat_id";
$result1 = $db->query($requete1);
// Je vais rechercher les infos de la table PRODUITS
$requete = "SELECT * FROM jdt_produits WHERE pro_id=" . $pro_id;
$result = $db->query($requete);
$produit = $result->fetch(PDO::FETCH_OBJ);
// Je fais appelle de ma fontion verifpro qui est prevu pour les RegEx coté PHP
if (isset($_POST["modifier"])){
  $modif = verifpro();
};

if(isset($_POST["modifier"])){
if($isGood==true){
  echo '<script>alert("Produit modifié")</script>';
}else{
  echo '<script>alert("Erreur. Produit non modifié!")</script>';
};
};

$isGet = false;

if (isset($_POST["ID"])) {

  $isGet = true;
  $pro_id = $_POST["ID"];
} else {

  $pro_id = 0;
};

?>
<!-- voici mon formulaire de modif qui sera envoyé a une page PHP pour upload dans ma table -->
<div class="col-12">

  <form id="modif" action="#" method="POST">
    <fieldset>

      <div class="form-group">
        <label for="ID">ID</label>
        <input type="text" name="ID" class="form-control" id="ID" value="<?php if ($isGet) echo $produit->pro_id; ?>" readonly>
      </div>

      <div class="form-group">
        <label for="reference">Référence</label>
        <input type="text" name="reference" class="form-control" id="reference" value="<?php if ($isGet) echo $produit->pro_ref; ?>">
        <small id="Errref" class="form-text text-danger "><?php if (isset($modif['Errref'])) echo $modif['Errref']; ?></small>
      </div>

      <div class="form-group">
        <label for="categorie">Catégorie</label>

        <select class="custom-select" name="categorie" aria-valuenow="<?php if ($isGet) echo $produit->pro_cat_id; ?>" id="selectcat">
          <?php while ($categorie = $result1->fetch(PDO::FETCH_OBJ)) { ?>
            <option name="categorie" <?php if (isset($_POST['categorie']) && $_POST['categorie'] == $categorie->cat_id) echo "selected"; ?> value="<?= $categorie->cat_id ?>"><?= $categorie->cat_id ?>-<?= $categorie->cat_nom ?></option>
          <?php }; ?>
        </select>
        <small id="Errcat" class="form-text text-danger "><?php if (isset($modif['Errcat'])) echo $modif['Errcat']; ?></small>
      </div>

      <div class="form-group">
        <label for="libelle">Libellé</label>
        <input type="text" name="libelle" class="form-control" id="libelle" value="<?php if ($isGet) echo $produit->pro_libelle; ?>">
        <small id="Errlib" class="form-text text-danger "><?php if (isset($modif['Errlib'])) echo $modif['Errlib']; ?></small>
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="description"><?php if ($isGet) echo $produit->pro_description; ?></textarea>
        <small id="Errdes" class="form-text text-danger "><?php if (isset($modif['Errdes'])) echo $modif['Errdes']; ?></small>
      </div>

      <div class="form-group">
        <label for="prix">Prix</label>
        <input type="text" name="prix" class="form-control" id="prix" value="<?php if ($isGet) echo $produit->pro_prix; ?>">
        <small id="Errpri" class="form-text text-danger "><?php if (isset($modif['Errpri'])) echo $modif['Errpri']; ?></small>
      </div>

      <div class="form-group">
        <label for="stock">Stock</label>
        <input type="text" name="stock" class="form-control" id="stock" value="<?php if ($isGet) echo $produit->pro_stock; ?>">
        <small id="Errsto" class="form-text text-danger "><?php if (isset($modif['Errsto'])) echo $modif['Errsto']; ?></small>
      </div>

      <div class="form-group">
        <label for="couleur">Couleur</label>
        <input type="text" name="couleur" class="form-control" id="couleur" value="<?php if ($isGet) echo $produit->pro_couleur; ?>">
        <small id="Errcou" class="form-text text-danger "><?php if (isset($modif['Errcou'])) echo $modif['Errcou']; ?></small>
      </div>

      <div class="form">
        <label class="" for="bloque">Produit bloqué:</label>
          <input class="" type="radio" name="bloque" id="bloque1" value="1" <?php if ($isGet) if (($produit->pro_bloque) == 1) echo "checked" ?>>
          <label for="bloque1">Oui</label>
          <input class="" type="radio" name="bloque" id="bloque0" value="0" <?php if ($isGet) if (($produit->pro_bloque) == 0) echo "checked" ?>>
          <label for="bloque0">Non</label>
      </div>

      <div class="form-group">
        <label for="ajout">Date d'ajout : </label>
        <p><?php if ($isGet) echo $produit->pro_d_ajout; ?></p>
        <label for="modif">Date de modification : </label>
        <p><?php if ($isGet) echo $produit->pro_d_modif; ?></p>
      </div>

      <!-- voici mon bouton Envoyer pour le soumettre a mon script d'ajout -->
      <button type="submit" value="true" class="btn btn-primary" name="modifier" id="modifier">Confirmer</button>
      <!-- et la mon bouton Annuler qui me renvoi a la liste  -->
      <a href="detail.php?pro_id=<?=$_POST['ID'] ?>" class="btn btn-danger">Annuler</a>

    </fieldset>
  </form>

</div>

<?php include("footer.php"); ?>

