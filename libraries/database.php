<?php
function getPdo(): PDO
{
    $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}