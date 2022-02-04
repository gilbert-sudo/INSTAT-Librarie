<?php
include 'connexion.php';

if (isset($_GET['id'])) {
	$delresp = $bdd->prepare("DELETE FROM `categorie` WHERE `categorie`.`id` = ?;");
	$delresp->execute(array($_GET['id']));
	header('Location:../pages/gerer_category.php');
}