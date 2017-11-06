<?php

// connection to database

try {
    $db = new PDO('mysql:host=localhost;dbname=evaluation2;charset=utf8', 'testuser', 'iLA9UwtpNWXnIv2F', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$client_manager = new ClientsManager($db);
$account_manager = new AccountsManager($db);
