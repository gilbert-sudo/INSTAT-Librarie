 <?php
  include 'connexion.php';
  if (isset($_POST['change'])) {
    if (isset($_POST['newname']) and !empty($_POST['newname'])) {

      $new_cat = $_POST['newname'];
      $old_cat = $_GET['old_cat'];
      $select = $bdd->prepare("SELECT * FROM products WHERE category = ?");
      $select->execute(array($old_cat));
      $fetch_all = $select->fetchAll();
     
      foreach ($fetch_all as $value) {
        $id_prod = $value['PID'];
        var_dump($id_prod);
        $update = $bdd->prepare("UPDATE `products` SET `category` = ? WHERE `products`.`PID` = ?;");
        $update->execute(array($new_cat, $id_prod));
      }

      $newnameResp = $bdd->prepare("UPDATE `categorie` SET `type` = ? WHERE `categorie`.`id` = ? ");
      $newnameResp->execute(array($new_cat, $_GET['id']));
      header('Location:../pages/gerer_category.php');
    }
  }
