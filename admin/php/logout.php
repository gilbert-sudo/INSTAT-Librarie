<?php 
session_start();
$_SESSION = array();
session_destroy();
require_once 'connexion.php';
$fetch_products = $bdd->query('SELECT * FROM products');
$products = $fetch_products->fetchAll();
$products = json_encode($products);
file_put_contents('../update.json', $products);
header('Location: ../index.php');
