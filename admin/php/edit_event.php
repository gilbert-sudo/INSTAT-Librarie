<?php
include 'connexion.php';
$page = $_GET['page'];
function showindex($index, $var)
{
	if ($var == "") {
		$resp = "";
	} else {
		$resp = ", `$index` = '$var'";
	}
	return $resp;
}
if (isset($_POST['change'])) {
	if (!empty($_POST['langue']) and !empty($_POST['pages'])  and !empty($_POST['title']) and !empty($_POST['auteur']) and !empty($_POST['category']) and !empty($_POST['description'])) {
		if (isset($_POST['langue']) and isset($_POST['pages']) and isset($_POST['title']) and isset($_POST['auteur']) and isset($_POST['category']) and isset($_POST['description'])) {

			$id = $_GET['id'];
			$title = $_POST['title'];
			$auteur = $_POST['auteur'];
			$category = $_POST['category'];
			$description = $_POST['description'];
			$langue = $_POST['langue'];
			$pages = $_POST['pages'];

			$extensionValide = array('jpg', 'gif', 'jpeg', 'png');
			if ($_FILES['img']['name'] != "") {
				$extensionUpload = strtolower(substr(strrchr($_FILES['img']['name'], "."), 1));
			} else {
				$extensionUpload = "xxx";
			}
			$ess = in_array($extensionUpload, $extensionValide);
			if ($ess == true || $extensionUpload == "xxx") {
				$chemin = "../images/books/" . $_FILES['img']['name'];
				$insertimg = move_uploaded_file($_FILES['img']['tmp_name'], $chemin);
				$img = $_FILES['img']['name'];

				$extensionValide = "pdf";
				if ($_FILES['upFile']['name'] != "") {
					$extensionUpload = strtolower(substr(strrchr($_FILES['upFile']['name'], "."), 1));
				} else {
					$extensionUpload = "yyy";
				}
				var_dump($extensionUpload);
				if ($extensionValide == $extensionUpload || $extensionUpload == "yyy") {

					$chemin2 = "../PDF/" . $_FILES['upFile']['name'];
					$insertimg = move_uploaded_file($_FILES['upFile']['tmp_name'], $chemin2);
					$pdf = $_FILES['upFile']['name'];

					//$req = $bdd->prepare("INSERT INTO `products` (`PID`, `title`, `author`, `category`, `description`, `language`, `page`, `new`, `publishAt`, `img`, `pdf`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
					//$req->execute(array($title, $auteur, $category, $description, $langue, $pages, 1, date('Y-m-d'), $_FILES['img']['name'], $_FILES['upFile']['name']));
					$showindex = showindex("img", "$img") . showindex("pdf", "$pdf");
					$query = "UPDATE `products` SET `title` = '$title', `author` = '$auteur', `category` = '$category', `description` = '$description', `language` = '$langue', `page` = '$pages'" . $showindex . " WHERE `products`.`PID` = $id;";
					$req = $bdd->prepare($query);
					echo $query . "<br>";
					$req->execute();
					header("Location: ../pages/gerer_event.php?page=$page");

					$msgmaintso = "<b> Le livre a bien été publié <i class='fa fa-check-circle'></i> </b>";
				} else {
					$msgmena = " <b>Erreur: Le format de votre fichier doit être en PDF<i class='fa fa-warning'></i></b>";
					header("Location: ../pages/edit_event.php?page=$page&mm=$msgmena&id_event=$id");
				}
			} else {
				$msgmena = " <b>Erreur: Format d'image invalide <i class='fa fa-warning'></i></b>";
				header("Location: ../pages/edit_event.php?page=$page&mm=$msgmena&id_event=$id");
			}
		}
	} else {
		$msgmena = " <b>Erreur: Tous les champs doivent être remplis <i class='fa fa-warning'></i></b>";
		header("Location: ../pages/edit_event.php?page=$page&mm=$msgmena&id_event=$id");
	}
}
echo $msgmaintso . "<br>";
echo $msgmena . "<br>";
