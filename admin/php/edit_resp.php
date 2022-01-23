 <?php
  include 'connexion.php';
  if (isset($_POST['change'])) {
    if (isset($_POST['newname']) and !empty($_POST['newname'])) {

      $newname = $_POST['newname'];

      $newnameResp = $bdd->prepare("UPDATE `categorie` SET `type` = ? WHERE `categorie`.`id` = ? ");
      $newnameResp->execute(array($newname, $_GET['id']));
      header('Location:gerer_resp.php');
    }
  }
