<?php
session_start();
require 'ClientsManager.php';
require 'AccountsManager.php';
require 'MovementsManager.php';
require 'dbconnect/dbconnect.php';
$client_manager = new ClientsManager($db);
$account_manager = new AccountsManager($db);
$movement_manager = new MovementsManager($db);
