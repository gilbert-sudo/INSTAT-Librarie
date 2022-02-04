<?php
include 'connexion.php';

if (isset($_GET['id_book'])) {
	$delevent = $bdd->prepare("DELETE FROM `products` WHERE PID = ? ;");
	$delevent->execute(array($_GET['id_book']));
	header('Location:../pages/gerer_book.php');
}