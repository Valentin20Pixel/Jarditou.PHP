<?php include "header.php"; ?>

<body>
  <div class="container-md bg_container">

    <?php
    // Je me connecte a ma base de donnée
    $db = connexionBase();
    $requete = "SELECT *  FROM jdt_produits ORDER BY pro_d_ajout DESC";
    $result = $db->query($requete);
    // si jai une erreur de connexion une erreur s'ecrira
    if (!$result) {
      $tableauErreurs = $db->errorInfo();
      echo $tableauErreur[2];
      die("Erreur dans la requête");
    };
    if ($result->rowCount() == 0) {
      die("La table est vide");
    };



    // Je bloque le btn ajout pour tout les utilisateurs sauf les admins
    if ($_SESSION["role"] == "admin") echo "<a href=\"formulaire_ajout.php\" class=\"btn btn-success\">Ajout</a>";
    //  voici comment jai realiser le haut de mon tableau
    echo '<table class="table table-hover table-sm table-responsive-sm">';
    echo '<tr class="headtable text-truncate">';
    echo '<th scope="col" class="sticky-top">Photo</th>';
    echo '<th scope="col" class="sticky-top success">ID</th>';
    echo '<th scope="col" class="sticky-top d-none d-md-table-cell">Référence</th>';
    echo '<th scope="col" class="sticky-top success">Libelle</th>';
    echo '<th scope="col" class="sticky-top">Prix</th>';
    echo '<th scope="col" class="sticky-top d-none d-md-table-cell success">Stock</th>';
    echo '<th scope="col" class="sticky-top">Couleur</th>';
    echo '<th scope="col" class="sticky-top d-none d-lg-table-cell success">Date d\'ajout</th>';
    echo '<th scope="col" class="sticky-top d-none d-xl-table-cell ">Date de modif</th>';
    echo '<th scope="col" class="sticky-top d-none d-lg-table-cell success">Bloqué</th>';
    if ($admin){ echo '<th scope="col">Inserer</th>';
    echo '<th scope="col">Détails</th>';};
    echo '</tr>';
    // et la comment jai organiser le remplissage avec un while 
    while ($row = $result->fetch(PDO::FETCH_OBJ)) { ?>
      <tr class="bobytable">
        <td class="gallery"><img src="assets/img/<?= $row->pro_id . '.' . $row->pro_photo ?>" class="thumbnail zoom position-relative" id="photodetail" width="100%"></td>
        <td class="success"><?= $row->pro_id ?></td>
        <td class="d-none d-md-table-cell"><?= $row->pro_ref ?></td>
        <td class="success"><?= $row->pro_libelle ?></td>
        <td><?= $row->pro_prix ?></td>
        <td class="success d-none d-md-table-cell"><?= $row->pro_stock ?></td>
        <td><?= $row->pro_couleur ?></td>
        <td class="success d-none d-lg-table-cell"><?= $row->pro_d_ajout ?></td>
        <td class="d-none d-xl-table-cell"><?= $row->pro_d_modif ?></td>
        <td class="success d-none d-lg-table-cell"><?= $row->pro_bloque ?></td>
      <?php if ($admin) echo "<td><a href=\"upload.php?pro_id=" . $row->pro_id . "\" class=\"btn btn-outline-light\">" . 'Img' . "</a></td>";
      echo "<td><a href=\"detail.php?pro_id=" . $row->pro_id . "\" class=\"btn btn-outline-light\">" . 'Détail' . "</a></td>";
      echo "</tr>";
    };
    echo "</table>";
    // comme plus haut jai bloqué l'ajout
    if ($_SESSION["role"] == "admin") echo "<a href=\"formulaire_ajout.php\" class=\"btn btn-success\">Ajout</a>";
      ?>
</body>
<?php include "footer.php"; ?>
