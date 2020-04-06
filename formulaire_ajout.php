<?php include "header.php";

require_once "script_ajout.php";
$db = connexionBase();
$requete = "SELECT * FROM jdt_categories ORDER BY cat_id";
$result = $db->query($requete);


if(isset($_POST["ajout"])){
  if($isGood==true){
    echo '<script>alert("Produit ajouter!")</script>';
  }else{
    echo '<script>alert("Erreur. Produit non ajouter. Reessayer!")</script>';
  };
  };
?>

<div class="col-12">
  <!-- voici mon formulaire d'ajout -->
  <form action="#" method="POST" enctype="multipart/form-data">
    <fieldset>

      <div class="form-group">
        <label for="ID">ID</label>

        <input type="text" name="ID" class="form-control" id="ID" value="" readonly>
      </div>

      <div class="form-group">
        <label for="reference">Référence</label>

        <input type="text" name="reference" class="form-control" id="reference" value="">
        <small id="Errref" class="form-text text-danger "><?php if (isset($ver['Errref'])) echo $ver['Errref']; ?></small>
      </div>

      <div class="form-group">
        <label for="categorie">Catégorie</label>

        <select class="custom-select" name="categorie" id="selectcat">
          <option selected value="">Catégorie</option>
          <?php while ($categorie = $result->fetch(PDO::FETCH_OBJ)) { ?>
            <option name="categorie"  value="<?= $categorie->cat_id ?>"><?= $categorie->cat_id ?>-<?= $categorie->cat_nom ?></option>
          <?php }; ?>
        </select>
        <small id="Errcat" class="form-text text-danger "><?php if (isset($ver['Errcat'])) echo $ver['Errcat']; ?></small>
      </div>

      <div class="form-group">
        <label for="libelle">Libellé</label>

        <input type="text" name="libelle" class="form-control" id="libelle" value="">
        <small id="Errcat" class="form-text text-danger "><?php if (isset($ver['Errcat'])) echo $ver['Errcat']; ?></small>
      </div>

      <div class="form-group">
        <label for="description">Description</label>

        <textarea name="description" class="form-control" id="description"></textarea>
        <small id="Errdes" class="form-text text-danger "><?php if (isset($ver['Errdes'])) echo $ver['Errdes']; ?></small>
      </div>

      <div class="form-group">
        <label for="prix">Prix</label>

        <input type="text" name="prix" class="form-control" id="prix" value="">
        <small id="Errpri" class="form-text text-danger "><?php if (isset($ver['Errpri'])) echo $ver['Errpri']; ?></small>
      </div>

      <div class="form-group">
        <label for="stock">Stock</label>

        <input type="text" name="stock" class="form-control" id="stock" value="">
        <small id="Errsto" class="form-text text-danger "><?php if (isset($ver['Errsto'])) echo $ver['Errsto']; ?></small>
      </div>

      <div class="form-group">
        <label for="couleur">Couleur</label>

        <input type="text" name="couleur" class="form-control" id="couleur" value="">
        <small id="Errcou" class="form-text text-danger "><?php if (isset($ver['Errcou'])) echo $ver['Errcou']; ?></small>
      </div>

      <div class="form">
        <label class="col-form-label" for="bloque">Produit bloqué:</label>

        <div class="custom-control custom-radio custom-control-inline">
          <input class="custom-control-input" type="radio" name="bloque" id="bloque" value="1" checked>
          <label class="custom-control-label" for="oui">Oui</label>
        </div>

        <div class="custom-control custom-radio custom-control-inline">
          <input class="custom-control-input" type="radio" name="bloque" id="bloque" value="0">
          <label class="custom-control-label" for="non">Non</label>
        </div>
        <small id="Errblo" class="form-text text-danger "><?php if (isset($ver['Errblo'])) echo $ver['Errblo']; ?></small>
      </div>

      <div class="form-group">
        <label for="ajout">Date d'ajout : </label>
        <label for="modif">Date de modification : </label>
      </div>

      <button type="submit" value="true" class="btn btn-primary" id="ajout" name="ajout">Ajouter</button>
      <a href="liste.php" class="btn btn-danger">Annuler</a>

    </fieldset>
  </form>

</div>

<?php include("footer.php"); ?>
