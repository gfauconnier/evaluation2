<?php
session_start();
require 'ClientsManager.php';
require 'AccountsManager.php';
require 'dbconnect/dbconnect.php';
$client_manager = new ClientsManager($db);
$account_manager = new AccountsManager($db);
