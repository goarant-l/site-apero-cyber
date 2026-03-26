<?php
// Connexion à la base de données
$host = 'localhost:8889';
$dbname = 'site-marchand';
$username = 'root';
$password = 'root';
// Création d'une connexion PDO
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);