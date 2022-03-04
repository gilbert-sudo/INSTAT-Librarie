<?php
include 'connexion.php';
$id = $_GET['id'];
if (isset($_GET['page'])) {
    $cpage = $_GET['page'];
}
$action = $_GET['action'];
if ($action == "ajouter") {
    $req = $bdd->prepare("UPDATE `products` SET `new` = '1' WHERE `products`.`PID` = ?;");
    $req->execute(array($id));
    header("Location:../pages/gerer_book.php?page=$cpage");
} elseif ($action == "effacer") {
    $req = $bdd->prepare("UPDATE `products` SET `new` = '0' WHERE `products`.`PID` = ?;");
    $req->execute(array($id));
    header("Location:../pages/top_book.php");
} else {
    header("Location:../pages/top_book.php");
}
