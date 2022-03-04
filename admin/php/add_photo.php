<?php
include 'connexion.php';
$extensionValide = array('jpg', 'gif', 'jpeg', 'png');
$extensionUpload = strtolower(substr(strrchr($_FILES['img']['name'], "."), 1));
if (in_array($extensionUpload, $extensionValide)) {
	$photo = 1;
	$chemin = "../images/carousel/" . $_FILES['img']['name'];
	if (!file_exists($chemin)) {
		$insertimg = move_uploaded_file($_FILES['img']['tmp_name'], $chemin);

		$req = $bdd->prepare("INSERT INTO `carousel` (`id`, `img`) VALUES (NULL, ?);");
		$req->execute(array($_FILES['img']['name']));
		$error = '1';
	} else {
		$error = '3';
	}
} else {
	$error = '2';
}

header('Location: ../pages/add_photo.php?error=' . $error);
