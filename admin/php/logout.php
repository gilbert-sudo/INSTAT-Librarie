<?php 
session_start();
$_SESSION = array();
session_destroy();
require_once 'connexion.php';
$fetch_products = $bdd->query('SELECT * FROM products');
$products = $fetch_products->fetchAll();
$products = json_encode($products);
file_put_contents('../update.json', $products);

//fetches the contact information from the database
$fetch_contact = $bdd->query('SELECT * FROM contact');
$contact = $fetch_contact->fetch();
$contact = json_encode($contact);
file_put_contents('../contact.json', $contact);

header('Location: ../index.php');
