<?php

function deleted()
{
  //  je recupere l'ID de la clés primaire du produit que je veux supprimer 
  require "detail.php";
  $bd = connexionBase();
  if (isset($_POST["sup"]))
    $del = (int) $_POST["sup"];
  //  je prepare une requete qui sera executer avant d'etre rediriger vers la liste
  $requete = $bd->prepare('DELETE FROM `jdt_produits` WHERE `pro_id`=:pro_id');
  $requete->bindValue(":pro_id", $del);
  $requete->execute();
  exit;
};
header("location:liste.php");
deleted();
