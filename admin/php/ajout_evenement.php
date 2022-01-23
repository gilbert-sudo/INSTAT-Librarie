<?php
include 'connexion.php';
if (isset($_POST['envoyer'])) {
	if (!empty($_POST['langue']) and !empty($_POST['pages'])  and !empty($_POST['title']) and !empty($_POST['auteur']) and !empty($_POST['category']) and !empty($_POST['description']) and !empty($_FILES['upFile']['name']) and !empty($_FILES['img']['name'])) {
		if (isset($_POST['langue']) and isset($_POST['pages']) and isset($_POST['title']) and isset($_POST['auteur']) and isset($_POST['category']) and isset($_POST['description']) and isset($_FILES['upFile']['name']) and isset($_FILES['img']['name'])) {

			$title = $_POST['title'];
			$auteur = $_POST['auteur'];
			$category = $_POST['category'];
			$description = $_POST['description'];
			$langue = $_POST['langue'];
			$pages = $_POST['pages'];

			$extensionValide = array('jpg', 'gif', 'jpeg', 'png');
			$extensionUpload = strtolower(substr(strrchr($_FILES['img']['name'], "."), 1));

			if (in_array($extensionUpload, $extensionValide)) {
				$photo = 1;
				$chemin = "../images/books/" . $_FILES['img']['name'];
				$insertimg = move_uploaded_file($_FILES['img']['tmp_name'], $chemin);

				$extensionValide = array('pdf');
				$extensionUpload = strtolower(substr(strrchr($_FILES['upFile']['name'], "."), 1));
				if (in_array($extensionUpload, $extensionValide)) {

					$chemin2 = "../PDF/" . $_FILES['upFile']['name'];
					$insertimg = move_uploaded_file($_FILES['upFile']['tmp_name'], $chemin2);

					$req = $bdd->prepare("INSERT INTO `products` (`PID`, `title`, `author`, `category`, `description`, `language`, `page`, `new`, `publishAt`, `img`, `pdf`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
					$req->execute(array($title, $auteur, $category, $description, $langue, $pages, 1, date('Y-m-d'), $_FILES['img']['name'], $_FILES['upFile']['name']));

					$msgmaintso = "<b> Le livre a bien été publié <i class='fa fa-check-circle'></i> </b>";
				} else {
					$msgmena = " <b>Erreur: Format du PDF invalide <i class='fa fa-warning'></i></b>";
				}
			} else {
				$msgmena = " <b>Erreur: Format d'image invalide <i class='fa fa-warning'></i></b>";
			}
		}
	} else {
		$msgmena = " <b>Erreur: Tous les champs doivent être remplis <i class='fa fa-warning'></i></b>";
	}
}
