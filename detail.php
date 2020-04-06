<?php include "header.php";
 // Inclusion de notre bibliothèque de fonctions

// si le bouton ajout est activer la fonction se lance
if (isset($_GET["ajout"]))
	$ajpr = ajoutpro();
// Je me connecte a la base pour pouvoir recuperer les infos sur le produit demander
$isGet = false;
if (isset($_GET["pro_id"])) {
	$isGet = true;
	$pro_id = $_GET["pro_id"];
	$db = connexionBase();
	$requete = $db->prepare("SELECT * FROM jdt_produits WHERE pro_id=:pro_id");
	$requete->bindValue(":pro_id", $pro_id);
	$result = $requete->execute();
	$produit = $requete->fetch(PDO::FETCH_OBJ);
} else {
	$pro_id = 0;
};
?>
</head>
<!-- voici mon formulaire de detail qui est inactif -->

<body>
	<div>
		<form id="modif" action="formulaire_modif.php" method="POST" enctype="multipart/form-data">
			<fieldset>
				<div class="form-group row justify-content-center">
					<img src="assets/img/<?= $pro_id . "." . $produit->pro_photo ?>" alt="" id="prophoto" class="" width="300">
				</div>
				<div class="form-group">
					<label for="ID">ID</label>
					<input type="text" name="ID" class="form-control" id="ID" value="<?php if ($isGet) echo $produit->pro_id; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="reference">Référence</label>
					<input type="text" name="reference" class="form-control" id="reference" value="<?php if ($isGet) echo $produit->pro_ref; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="categorie">Catégorie</label>
					<input type="text" name="categorie" class="form-control" id="categorie" value="<?php if ($isGet) echo $produit->pro_cat_id; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="libelle">Libellé</label>
					<input type="text" name="libelle" class="form-control" id="libelle" value="<?php if ($isGet) echo $produit->pro_libelle; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="description" class="form-control" id="description" readonly><?php if ($isGet) echo $produit->pro_description; ?></textarea>
				</div>
				<div class="form-group">
					<label for="prix">Prix</label>
					<input type="text" name="prix" class="form-control" id="prix" value="<?php if ($isGet) echo $produit->pro_prix; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="stock">Stock</label>
					<input type="text" name="stock" class="form-control" id="stock" value="<?php if ($isGet) echo $produit->pro_stock; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="couleur">Couleur</label>
					<input type="text" name="couleur" class="form-control" id="couleur" value="<?php if ($isGet) echo $produit->pro_couleur; ?>" readonly>
				</div>
				<div class="form">
					<label class="col-form-label" for="bloque">Produit bloqué:</label>
					<div class="custom-control custom-radio custom-control-inline">
						<input class="custom-control-input" type="radio" name="bloque" id="oui" value="oui" <?php if ($isGet) if (($produit->pro_bloque) == 1) echo "checked" ?> disabled>
						<label class="custom-control-label" for="oui">Oui</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input class="custom-control-input" type="radio" name="bloque" id="non" value="non" <?php if ($isGet) if (($produit->pro_bloque) == 0) echo "checked" ?> disabled>
						<label class="custom-control-label" for="non">Non</label>
					</div>
				</div>
				<div class="form-group">
					<label for="ajout">Date d'ajout : </label>
					<p><?php if ($isGet) echo $produit->pro_d_ajout; ?></p>
					<label for="modif">Date de modification : </label>
					<p><?php if ($isGet) echo $produit->pro_d_modif; ?></p>
				</div>
				<!-- j'ai inserer 2 boutons pour la modif et la suppression -->
				<a href="liste.php" class="btn btn-secondary">Retour</a>
				<?php if (($_SESSION['role'] == "admin")) { ?>
					<button type="submit" value="modif" class="btn btn-success" id="modif" name="modif">Modifier</button>
			</fieldset>
		</form>
		<form id="suppr" action="script_suppr.php" method="POST" class="position-relative" enctype="multipart/form-data">
			<input type="text" id="sup" name="sup" value="<?php if ($isGet) echo $produit->pro_id; ?>" hidden>
			<button type="submit" id="supprimer" name="supprimer" value="supprimer" class="btn btn-danger">Supprimer</button>
		</form>
	<?php }; ?>
	</div>
</body>
<?php include "footer.php"; ?>