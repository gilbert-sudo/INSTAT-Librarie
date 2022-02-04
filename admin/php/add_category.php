<?php
include 'connexion.php';
if (isset($_POST['envoyer'])) {
	if (!empty($_POST['nom'])) {

			$nom = $_POST['nom'];
			$length = strlen($nom);
			
				if ($length < 50) {
					$req = $bdd->prepare("INSERT INTO `categorie` (`id`, `type`) VALUES (NULL,?);");
					$req->execute(array($nom));

					$msgmaintso = " <b>Catégorie bien ajouté <i class='fa fa-check-circle'></i> </b>";
				} else {
					$msgmena = " <b>Le nom ne doit pas dépassé les 50 mots ⚠</b>";
				}
		
	} else {
		$msgmena =  " <b>Veuillez d'abord remplir le champ!<i class='fa fa-warning'></i></b>";
	}
}
