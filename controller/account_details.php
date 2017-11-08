<?php

require_once '../model/data.php';
require_once '../services/services.php';

if(isset($_POST['disconnect'])) {
  disconnection();
}

if (isset($_SESSION['client'])) {

} else {
  header('Location: home.php');
}




 ?>
