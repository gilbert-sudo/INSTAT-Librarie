<?php
include 'connexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
	$req = $bdd->prepare('SELECT * FROM carousel WHERE id = ?');
	$req->execute(array($id));
	$donnees = $req->fetch();

	unlink('../images/carousel/'.$donnees['img']);
	$delevent = $bdd->prepare("DELETE FROM `carousel` WHERE id = ? ;");
	$delevent->execute(array($_GET['id']));
	header('Location:../pages/gallery.php');
}