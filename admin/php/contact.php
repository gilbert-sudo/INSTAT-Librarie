<?php
include 'connexion.php';
try {
    $db = $bdd;
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch (Exception $e) {
    echo '{"status":0, "line":'.__LINE__.'}';
    exit();
}
function getPdo(): PDO
{
    global $db;
    return $db;
}

$bdd = getPdo();
if (isset($_POST['valider'])) {
    $tel = $_POST['phone'];
    $facebook = $_POST['facebook'];
    $email = $_POST['email'];
    $linkedin = $_POST['linkedin'];
    $twiter = $_POST['twiter'];
    $instagram = $_POST['instagram'];
    $siteweb = $_POST['siteweb'];
    
    $sql = "UPDATE contact SET `tel` = '$tel', `facebook` = '$facebook', `email` = '$email', `linkedin` = '$linkedin', `twiter` = '$twiter', `instagram` = '$instagram', `siteweb` = '$siteweb' WHERE 1;";
    $update = $bdd->prepare($sql);
    $update->execute();
    header('location: ../pages/contact.php?success=1');
}
